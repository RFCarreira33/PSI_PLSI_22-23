<?php

namespace backend\controllers;

use common\models\Produto;
use backend\models\ProdutoSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\data\ActiveDataProvider;
use yii\filters\AccessControl;
use common\models\Stock;
use common\models\Loja;

/**
 * ProdutoController implements the CRUD actions for Produto model.
 */
class ProdutoController extends Controller
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
     * Lists all Produto models.
     *
     * @return string
     */
    public function actionIndex()
    {
        if (!\Yii::$app->user->can('ReadProduto')) {
            throw new \yii\web\ForbiddenHttpException('Não tem permissão para aceder a esta página.');
        }
        $searchModel = new ProdutoSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Produto model.
     * @param int $id ID
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        if (!\Yii::$app->user->can('ReadProduto')) {
            throw new \yii\web\ForbiddenHttpException('Não tem permissão para aceder a esta página.');
        }
        $produto = Produto::findOne(['id' => $id]);
        $dataProvider = new ActiveDataProvider([
            'query' => $produto->getStocks(),
        ]);
        return $this->render('view', [
            'model' => $this->findModel($id),
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Creates a new Produto model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        if (!\Yii::$app->user->can('CreateProduto')) {
            throw new \yii\web\ForbiddenHttpException('Não tem permissão para aceder a esta página.');
        }
        $model = new Produto();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                $lojas = Loja::find()->all();
                foreach ($lojas as $loja) {
                    $stock = new Stock();
                    $stock->id_Produto = $model->id;
                    $stock->id_Loja = $loja->id;
                    $stock->quantidade = 0;
                    $stock->save();
                }
                return $this->redirect(['view', 'id' => $model->id]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Produto model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        if (!\Yii::$app->user->can('UpdateProduto')) {
            throw new \yii\web\ForbiddenHttpException('Não tem permissão para aceder a esta página.');
        }
        $model = $this->findModel($id);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Produto model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id ID
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        if (!\Yii::$app->user->can('DeleteProduto')) {
            throw new \yii\web\ForbiddenHttpException('Não tem permissão para aceder a esta página.');
        }
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Produto model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return Produto the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Produto::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}