<?php

namespace frontend\controllers;

use common\models\Fatura;
use common\models\Dados;
use common\models\Carrinho;
use common\models\FaturaSearch;
use common\models\LinhaFatura;
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
                        'delete' => ['POST'],
                    ],
                ],
            ]
        );
    }

    /**
     * Lists all Fatura models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new FaturaSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }


    /**
     * Displays a single Fatura model.
     * @param int $id ID
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {

        $fatura =  $this->findModel($id);
        if (\Yii::$app->user->can('Comprador', ['fatura' => $fatura])) {
            return $this->renderPartial('view', ['model' => $fatura]);
        }
        return $this->render('view', ['model' => $fatura]);
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

        $dados = Dados::findOne(['id_User' => Yii::$app->user->id]);
        $carrinhos = Carrinho::findAll(['id_Cliente' => $dados->id_User]);

        $valorTotal = 0;
        $valorIva = 0;

        foreach ($carrinhos as $carrinho) {
            $ivaP = $carrinho->produto->iva->percentagem / 100;
            $valorIva += $carrinho->Quantidade * $carrinho->produto->preco * $ivaP;
            $valorTotal += $carrinho->Quantidade * $carrinho->produto->preco;
        }

        $fatura = new Fatura;
        $fatura->id_Cliente = $dados->id_User;
        $fatura->nome = $dados->nome;
        $fatura->nif = $dados->nif;
        $fatura->codPostal = $dados->codPostal;
        $fatura->telefone = $dados->telefone;
        $fatura->morada = $dados->morada;
        $fatura->email = $dados->user->email;
        $fatura->dataFatura = date("Y-m-d H:i:s");
        $fatura->valorIva = $valorIva;
        $fatura->valorTotal = $valorTotal;
        $fatura->save();

        foreach ($carrinhos as $carrinho) {
            $linhaFatura = new LinhaFatura;
            $linhaFatura->id_Fatura = $fatura->id;
            $linhaFatura->produto_nome = $carrinho->produto->nome;
            $linhaFatura->produto_referencia = $carrinho->produto->referencia;
            $linhaFatura->quantidade = $carrinho->Quantidade;
            $linhaFatura->valor = $carrinho->produto->preco * $carrinho->Quantidade;
            $ivaP = $carrinho->produto->iva->percentagem;
            $linhaFatura->valorIva = $carrinho->Quantidade * $carrinho->produto->preco * ($ivaP / 100);
            $linhaFatura->save();
        }
        $this->redirect('/carrinho/clear');
    }

    /**
     * Updates an existing Fatura model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     *
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Fatura model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id ID
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     *
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
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