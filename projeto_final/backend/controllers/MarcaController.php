<?php

namespace backend\controllers;

use common\models\marca;
use backend\models\MarcaSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * MarcaController implements the CRUD actions for marca model.
 */
class MarcaController extends Controller
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
     * Lists all marca models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new MarcaSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single marca model.
     * @param string $nome Nome
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($nome)
    {
        return $this->render('view', [
            'model' => $this->findModel($nome),
        ]);
    }

    /**
     * Creates a new marca model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new marca();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'nome' => $model->nome]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing marca model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $nome Nome
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($nome)
    {
        $model = $this->findModel($nome);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'nome' => $model->nome]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing marca model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $nome Nome
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($nome)
    {
        $this->findModel($nome)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the marca model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $nome Nome
     * @return marca the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($nome)
    {
        if (($model = marca::findOne(['nome' => $nome])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
