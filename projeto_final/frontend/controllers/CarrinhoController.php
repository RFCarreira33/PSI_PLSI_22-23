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
     */
    public function actionIndex()
    {
    }

    /**
     * Displays a single Carrinho model.
     * @param int $idCliente Id Cliente
     * @param int $idProduto Id Produto
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($idCliente, $idProduto)
    {
        return $this->render('view', [
            'model' => $this->findModel($idCliente, $idProduto),
        ]);
    }

    /**
     * Creates a new Carrinho model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate($id)
    {
        if (!Yii::$app->user->can('carrinho')) {
            return $this->redirect('site/login');
        }

        $dados = Dados::find()->where(['idUser' => Yii::$app->user->id])->one();
        $carrinho = $dados->getCarrinhos()->where(['idProduto' => $id])->one();

        if ($carrinho == null) {
            $carrinho = new Carrinho;
            $carrinho->idCliente = $dados->idUser;
            $carrinho->idProduto = $id;
            $carrinho->quantidade + 31; //passar quantidades não a toa 
        } else {
            $carrinho->quantidade += 22;
        }
        $carrinho->save();
        $carrinhos = $dados->getCarrinhos()->all();
        return $this->render('view', ['carrinhos' => $carrinhos]);
    }

    /**
     * Updates an existing Carrinho model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $idCliente Id Cliente
     * @param int $idProduto Id Produto
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($idCliente, $idProduto)
    {
        $model = $this->findModel($idCliente, $idProduto);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'idCliente' => $model->idCliente, 'idProduto' => $model->idProduto]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Carrinho model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $idCliente Id Cliente
     * @param int $idProduto Id Produto
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($idCliente, $idProduto)
    {
        $this->findModel($idCliente, $idProduto)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Carrinho model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $idCliente Id Cliente
     * @param int $idProduto Id Produto
     * @return Carrinho the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($idCliente, $idProduto)
    {
        if (($model = Carrinho::findOne(['idCliente' => $idCliente, 'idProduto' => $idProduto])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
