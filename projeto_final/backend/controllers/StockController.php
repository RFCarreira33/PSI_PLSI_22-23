<?php

namespace backend\controllers;

use common\models\Stock;
use backend\models\StockSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;

/**
 * StockController implements the CRUD actions for Stock model.
 */
class StockController extends Controller
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
                            'roles' => ['admin', 'funcionario']
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
     * Lists all Stock models.
     *
     * @return string
     */
    public function actionIndex()
    {
        if (!\Yii::$app->user->can('ReadStock')) {
            throw new \yii\web\ForbiddenHttpException('Não tem permissão para aceder a esta página.');
        }
        $searchModel = new StockSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }
    /**
     * Updates an existing Stock model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id_Loja Id Loja
     * @param int $id_Produto Id Produto
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id_Loja, $id_Produto)
    {
        if (!\Yii::$app->user->can('UpdateStock')) {
            throw new \yii\web\ForbiddenHttpException('Não tem permissão para aceder a esta página.');
        }
        $model = $this->findModel($id_Loja, $id_Produto);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id_Loja' => $model->id_Loja, 'id_Produto' => $model->id_Produto]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Finds the Stock model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id_Loja Id Loja
     * @param int $id_Produto Id Produto
     * @return Stock the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id_Loja, $id_Produto)
    {
        if (($model = Stock::findOne(['id_Loja' => $id_Loja, 'id_Produto' => $id_Produto])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}