<?php

namespace frontend\controllers;

use frontend\models\Carrinho;
use frontend\models\CarrinhoSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

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
        $searchModel = new CarrinhoSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
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
    public function actionCreate()
    {
        $model = new Carrinho();
<<<<<<< Updated upstream

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'idCliente' => $model->idCliente, 'idProduto' => $model->idProduto]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
=======
        $model->idCliente = Yii::$app->user->id;
        $model->idProduto = $id;
        $model->Quantidade = 2;

        $carrinhos = Carrinho::find()->all();
        foreach($carrinhos as $carrinho)
        {
            if($carrinho->idProduto == $id)
            {
                //$carrinho = Carrinho::find()->where(['idProduto' => $id])->one();
                $carrinho->Quantidade = $carrinho->Quantidade + 1;
                $carrinho -> save();
                $carrinhosUser = Carrinho::find()->where(['idCliente' => Yii::$app->user->id])->all();
                return $this->render('view',['carrinhos' => $carrinhosUser]);
            }
        }
        
        if ($model->save()) 
        {
            return $this->render('view');
        }

        return $this->redirect('site/index');
>>>>>>> Stashed changes
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
