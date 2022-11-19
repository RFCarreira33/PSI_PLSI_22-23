<?php

namespace frontend\controllers;

use common\models\Produto;
use common\models\Carrinho;
use common\models\Dados;
use frontend\models\CarrinhoSearch;
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
                        'delete' => ['POST'],
                    ],
                ],
            ]
        );
    }

    /**
     * Lists all Carrinho models.
     *
     * @return string
     *
    public function actionIndex()
    {
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
        $dados = Dados::findOne(['id_User' => Yii::$app->user->id]);
        $carrinhos = $dados->carrinhos;
        return $this->render('view', ['carrinhos' => $carrinhos]);
    }

    /**
     * Creates a new Carrinho model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate($id, $quantidade)
    {

        $dados = Dados::findOne(['id_User' => Yii::$app->user->id]);
        $carrinho = Carrinho::findOne(['id_Cliente' => $dados->id_User, 'id_Produto' => $id]);

        if ($carrinho == null) {
            $carrinho = new Carrinho;
            $carrinho->id_Cliente = $dados->id_User;
            $carrinho->id_Produto = $id;
            $carrinho->Quantidade = $quantidade;
        } else {
            $carrinho->Quantidade += $quantidade;
        }
        $carrinho->save();
        return $this->redirect('view');
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