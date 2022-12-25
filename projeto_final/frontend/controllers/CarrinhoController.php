<?php

namespace frontend\controllers;

use common\models\Produto;
use common\models\Carrinho;
use common\models\Dados;
use common\models\Empresa;
use frontend\models\CarrinhoSearch;
use common\models\Stock;
use Yii;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;

/**
 * CarrinhoController implements the CRUD actions for Carrinho model.
 */
class CarrinhoController extends Controller
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
	 * Displays a single Carrinho model.
	 * @param int $id_Cliente Id Cliente
	 * @param int $id_Produto Id Produto
	 * @return string
	 * @throws NotFoundHttpException if the model cannot be found
	 */
	public function actionView()
	{
		$_SESSION['promoCode'] = "";
		$dados = Dados::findOne(['id_User' => Yii::$app->user->id]);
		$carrinhos = $dados->carrinhos;

		return $this->render('view', ['carrinhos' => $carrinhos]);
	}

	/**
	 * Creates a new Carrinho model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 * @return string|\yii\web\Response
	 */
	public function actionCreate()
	{
		$quantidade = Yii::$app->request->post('quantidade');
		$id = Yii::$app->request->post('id');

		$dados = Dados::findOne(['id_User' => Yii::$app->user->id]);
		$carrinho = Carrinho::findOne(['id_Cliente' => $dados->id_User, 'id_Produto' => $id]);

		try {
			if ($quantidade <= 0) {
				throw new \Exception('Quantidade inválida');
			}
			//If there is already a product in the cart, update the quantity 
			if ($carrinho == null) {
				$carrinho = new Carrinho;
				$carrinho->id_Cliente = $dados->id_User;
				$carrinho->id_Produto = $id;
				$carrinho->Quantidade = $quantidade;
			} else {
				$carrinho->Quantidade += $quantidade;
			}
			//Verifies if produto is Ativo
			if ($carrinho->produto->Ativo == 0) {
				Yii::$app->session->setFlash('error', 'Produto não está disponível');
				return $this->goHome();
			}
			//Doesn't allow more then 20 units of the same product
			if ($carrinho->Quantidade > 20) {
				throw new \Exception('Não é possível adicionar mais de 20 unidades do mesmo produto');
			}
			if ($carrinho->Quantidade > $carrinho->produto->getStockTotal()) {
				throw new \Exception('Não foi possivel adicionar o produto ao carrinho, a quantidade pretendida é superior ao stock disponível');
			}
			// If all the verifications are passed, save the product in the cart
			$carrinho->save();
			return $this->redirect('view');
		} catch (\Exception $e) {
			Yii::$app->session->setFlash('error', $e->getMessage());
			return $this->redirect(['produto/view', 'id' => $id]);
		}
	}

	/**
	 * Updates an existing Carrinho model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param int $id_Cliente Id Cliente
	 * @param int $id_Produto Id Produto
	 * @return string|\yii\web\Response
	 * @throws NotFoundHttpException if the model cannot be found
	 */
	public function actionUpdate($id_Cliente, $id_Produto)
	{
		$model = $this->findModel($id_Cliente, $id_Produto);

		if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
			return $this->redirect(['view', 'id_Cliente' => $model->id_Cliente, 'id_Produto' => $model->id_Produto]);
		}

		return $this->render('update', [
			'model' => $model,
		]);
	}

	/**
	 * Deletes an existing Carrinho model.
	 * If deletion is successful, the browser will be redirected to the 'index' page.
	 * @param int $id_Cliente Id Cliente
	 * @param int $id_Produto Id Produto
	 * @return \yii\web\Response
	 * @throws NotFoundHttpException if the model cannot be found
	 */
	public function actionDelete($id_Produto)
	{
		$this->findModel(Yii::$app->user->id, $id_Produto)->delete();

		return $this->redirect(['carrinho/view']);
	}

	/**
	 * It changes the quantity of a product in the cart and returns the total price of the product, the
	 * total stock of the product, the total number of products in the cart and the total price of all
	 * products in the cart
	 */
	public function actionChangequantity()
	{
		if (Yii::$app->request->isAjax) {
			$data = Yii::$app->request->post();
			$dados = Dados::findOne(['id_User' => Yii::$app->user->id]);
			$carrinho = $dados->getCarrinhos()->where(['id_Produto' => $data['id_Produto']])->one();
			$carrinho->Quantidade = $data['value'];
			$carrinho->save();

			$result = [
				'total' => Produto::findOne($data['id_Produto'])->preco * $data['value'],
				'stock' => Produto::findOne($data['id_Produto'])->getStockTotal(),
				'totalProducts' => $dados->getCarrinhos()->sum("quantidade"),
				'totalPrice' => $dados->getCarrinhos()->innerJoin("produto", "id = id_produto")->sum("quantidade * preco"),
			];

			return json_encode($result);
		}
	}

	public function actionApplypromocode()
	{
		if (Yii::$app->request->isAjax) {
			$data = Yii::$app->request->post();
			$dados = Dados::findOne(['id_User' => Yii::$app->user->id]);
			$empresa = Empresa::find()->one();

			$promoCode = $empresa->codigoDesconto;
			$discountValue = $empresa->valorDesconto;

			if ($data['promoCode'] != $promoCode) {
				return (json_encode('Código inválido.'));
			}
			if ($dados->codDesconto == "Sem Acesso") {
				return (json_encode('Instale a nossa aplicação para ter acesso ao código de desconto.'));
			}
			if ($dados->codDesconto == "Não") {
				return (json_encode('Código já foi usado.'));
			}
			$result = [
				'discount' => number_format(($data['subtotal'] * $discountValue / 100), 2, ".", ""),
				'totalPrice' => number_format(($data['subtotal'] - $data['subtotal'] * $discountValue / 100), 2, ".", ""),
			];

			$_SESSION["promoCode"] = $data['promoCode'];
			return json_encode($result);
		}
	}

	public function actionClear()
	{
		$dados = Dados::findOne(['id_User' => Yii::$app->user->id]);
		$carrinho = $dados->carrinhos;
		foreach ($carrinho as $carrinhos) {
			$carrinhos->delete();
		}
		return $this->redirect(['carrinho/view']);
	}

	/**
	 * Finds the Carrinho model based on its primary key value.
	 * If the model is not found, a 404 HTTP exception will be thrown.
	 * @param int $id_Cliente Id Cliente
	 * @param int $id_Produto Id Produto
	 * @return Carrinho the loaded model
	 * @throws NotFoundHttpException if the model cannot be found
	 */
	protected function findModel($id_Cliente, $id_Produto)
	{
		if (($model = Carrinho::findOne(['id_Cliente' => $id_Cliente, 'id_Produto' => $id_Produto])) !== null) {
			return $model;
		}

		throw new NotFoundHttpException('The requested page does not exist.');
	}
}
