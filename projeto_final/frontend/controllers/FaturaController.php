<?php

namespace frontend\controllers;

use common\models\Fatura;
use common\models\Dados;
use common\models\Carrinho;
use common\models\FaturaSearch;
use common\models\LinhaFatura;
use common\models\Stock;
use common\models\Empresa;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use yii;
use yii\helpers\Url;
use Dompdf\Dompdf;
use Dompdf\Options;

/**
 * FaturaController implements the CRUD actions for Fatura model.
 */
class FaturaController extends Controller
{
	/**
	 * @inheritDoc
	 */
	public function behaviors()
	{
		return array_merge(
			parent::behaviors(),
			[
				'access' => [
					'class' => AccessControl::class,
					'rules' => [
						[
							'allow' => true,
							'roles' => ['cliente']
						],
					],
				],
				'verbs' => [
					'class' => VerbFilter::className(),
					'actions' => [
						'create' => ['POST'],
					],
				],
			]
		);
	}
	public function beforeAction($action)
	{
		$this->enableCsrfValidation = false;
		return parent::beforeAction($action);
	}
	/**
	 * Lists all Fatura models.
	 *
	 * @return string
	 */
	public function actionIndex()
	{
		if (!Yii::$app->user->can('FrontendReadFatura')) {
			throw new \yii\web\ForbiddenHttpException('Não tem permissão para aceder a esta página.');
		}
		$searchModel = new FaturaSearch();
		$dataProvider = $searchModel->search($this->request->queryParams);

		return $this->render('index', [
			'searchModel' => $searchModel,
			'dataProvider' => $dataProvider,
		]);
	}

	public function actionPdf($id)
	{
		$model = $this->findModel($id);
		if (!Yii::$app->user->can('Comprador', ['fatura' => $model])) {
			return $this->render('index');
		}
		//convert to pdf
		$options = new Options();
		$options->setIsRemoteEnabled(true);
		$dompdf = new Dompdf($options);
		$dompdf->loadHtml($this->renderPartial('print', [
			'model' => $model,
		]));
		$dompdf->render();
		ob_end_clean();
		$dompdf->stream(
			"Fatura_Nº$model->id.pdf",
			[
				'Attachment' => false,
				'chroot' => Yii::getAlias('@webroot'),
			]
		);
	}
	/**
	 * Creates a new Fatura model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 * @return string|\yii\web\Response
	 */
	public function actionCreate()
	{
		if (!Yii::$app->user->can('FrontendReadFatura')) {
			throw new \yii\web\ForbiddenHttpException('Não tem permissão para aceder a esta página.');
		}

		if (!isset($_SESSION["promoCode"]) || $_SESSION["promoCode"] == null) {
			$code = $_SESSION["promoCode"] = "";
		} else {
			$code = $_SESSION["promoCode"];
		}

		if (!isset($_SESSION["shippingMethod"]) || $_SESSION["shippingMethod"] == null) {
			return $this->redirect(URL::toRoute(['carrinho/view']));
		} else {
			$shippingMethod = $_SESSION["shippingMethod"];
		}

		$dados = Dados::findOne(['id_User' => Yii::$app->user->id]);
		$carrinhos = Carrinho::findAll(['id_Cliente' => $dados->id_User]);
		$empresa = Empresa::find()->one();

		$morada = Yii::$app->request->post('morada');
		if ($morada == null) {
			$morada = $dados->morada;
		}

		$subtotal = 0;
		$valorIva = 0;
		$promoCode = $empresa->codigoDesconto;
		$discountValue = $empresa->valorDesconto;

		if (sizeof($carrinhos) <= 0) {
			return $this->redirect(URL::toRoute(['carrinho/view']));
		} //checks if the cart is empty

		foreach ($carrinhos as $carrinho) {
			$ivaP = $carrinho->produto->iva->percentagem / 100;
			$valorIva += $carrinho->Quantidade * $carrinho->produto->preco * $ivaP;
			$subtotal += $carrinho->Quantidade * $carrinho->produto->preco;
		}

		try {
			foreach ($carrinhos as $carrinho) {
				$stock = $carrinho->produto->getStockTotal();
				if ($stock < $carrinho->Quantidade) {
					throw new \Exception("Stock insuficiente para " . $carrinho->produto->nome);
				}
			}
		} catch (\Exception $e) {
			Yii::$app->session->setFlash('error', $e->getMessage());
			return $this->redirect(URL::toRoute(['carrinho/view']));
		}

		//Create Fatura
		$fatura = new Fatura;
		$fatura->id_Cliente = $dados->id_User;
		$fatura->nome = $dados->nome;
		$fatura->nif = $dados->nif;
		$fatura->codPostal = $dados->codPostal;
		$fatura->telefone = $dados->telefone;
		$fatura->morada = $morada;
		$fatura->email = $dados->user->email;
		$fatura->dataFatura = date("Y-m-d H:i:s");
		$fatura->valorIva = $valorIva;
		$fatura->subtotal = $subtotal;
		$fatura->entrega = $shippingMethod;

		if ($code != "" && $code == $promoCode && $dados->codDesconto == "Sim") //checks if promo code was used and if so, updates the values
		{
			$fatura->valorDesconto = $subtotal * $discountValue / 100;
			$fatura->valorTotal = $subtotal - $subtotal * $discountValue / 100;

			$dados->codDesconto = "Não";
			$dados->save();
		} else {
			$fatura->valorDesconto = 0;
			$fatura->valorTotal = $subtotal;
		}

		$fatura->save();

		//Create Linhas Fatura
		foreach ($carrinhos as $carrinho) {
			$linhaFatura = new LinhaFatura;
			$linhaFatura->id_Fatura = $fatura->id;
			$linhaFatura->id_Produto = $carrinho->produto->id;
			$linhaFatura->produto_nome = $carrinho->produto->nome;
			$linhaFatura->produto_referencia = $carrinho->produto->referencia;
			$linhaFatura->quantidade = $carrinho->Quantidade;
			$linhaFatura->valor = $carrinho->produto->preco * $carrinho->Quantidade;
			$ivaP = $carrinho->produto->iva->percentagem;
			$linhaFatura->valorIva = $carrinho->Quantidade * $carrinho->produto->preco * ($ivaP / 100);
			$linhaFatura->save();

			$stocks = Stock::find()->where(["id_produto" => $carrinho->produto->id])->all();

			$tempQuantidade = $carrinho->Quantidade;
			foreach ($stocks as $stock) {
				switch ($stock->quantidade) {
					case $tempQuantidade <= $stock->quantidade:
						$stock->quantidade -= $tempQuantidade;
						$tempQuantidade = 0;
						break;
					case $tempQuantidade > $stock->quantidade:
						$stockRestante = $stock->quantidade;
						$tempQuantidade -= $stockRestante;
						$stock->quantidade = 0;
						break;
				}
				$stock->save();
				if ($tempQuantidade == 0) {
					break;
				}
			}
		}

		$_SESSION["promoCode"] = "";
		$_SESSION["shippingMethod"] = "";

		$this->redirect('/carrinho/clear');
	}


	/**
	 * Finds the Fatura model based on its primary key value.
	 * If the model is not found, a 404 HTTP exception will be thrown.
	 * @param int $id ID
	 * @return Fatura the loaded model
	 * @throws NotFoundHttpException if the model cannot be found
	 */
	protected function findModel($id)
	{
		if (($model = Fatura::findOne(['id' => $id])) !== null) {
			return $model;
		}

		throw new NotFoundHttpException('The requested page does not exist.');
	}
}
