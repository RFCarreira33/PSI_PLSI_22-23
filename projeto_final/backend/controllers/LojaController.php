<?php

namespace backend\controllers;

use common\models\Loja;
use backend\models\LojaSearch;
use common\models\Produto;
use common\models\Stock;
use Yii;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;

/**
 * LojaController implements the CRUD actions for Loja model.
 */
class LojaController extends Controller
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
                            'roles' => ['admin']
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
     * Lists all Loja models.
     *
     * @return string
     */
    public function actionIndex()
    {
        if (!Yii::$app->user->can('ReadLoja')) {
            throw new \yii\web\ForbiddenHttpException('Não tem permissão para aceder a esta página.');
        }
        $searchModel = new LojaSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Loja model.
     * @param int $id ID
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        if (!Yii::$app->user->can('ReadLoja')) {
            throw new \yii\web\ForbiddenHttpException('Não tem permissão para aceder a esta página.');
        }
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Loja model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        if (!Yii::$app->user->can('CreateLoja')) {
            throw new \yii\web\ForbiddenHttpException('Não tem permissão para aceder a esta página.');
        }
        $model = new Loja();
        $model->id_Empresa = 1;

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                $produtos = Produto::find()->all();
                foreach ($produtos as $produto) {
                    $stock = new Stock();
                    $stock->id_Produto = $produto->id;
                    $stock->id_Loja = $model->id;
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
     * Updates an existing Loja model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        if (!Yii::$app->user->can('UpdateLoja')) {
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
     * Deletes an existing Loja model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id ID
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        if (!Yii::$app->user->can('DeleteLoja')) {
            throw new \yii\web\ForbiddenHttpException('Não tem permissão para aceder a esta página.');
        }
        $loja = $this->findModel($id);
        $stocks = $loja->stocks;
        foreach ($stocks as $stock) {
            $stock->delete();
        }
        $loja->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Loja model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return Loja the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Loja::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}