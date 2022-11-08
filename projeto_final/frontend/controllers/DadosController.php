<?php

namespace frontend\controllers;

use common\models\Dados;
use common\models\FaturaSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use yii;
use Yii as GlobalYii;

/**
 * DadosController implements the CRUD actions for Dados model.
 */
class DadosController extends Controller
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
     * Lists all Dados models.
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
     * Displays a single Dados model.
     * @param int $id_User Id User
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView()
    {
        $id_User = Yii::$app->user->id;
        return $this->render('view', [
            'model' => $this->findModel($id_User),
        ]);
    }

    /**
     * Creates a new Dados model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     *
    public function actionCreate()
    {
        $model = new Dados();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'id_User' => $model->id_User]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Dados model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id_User Id User
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate()
    {
        $model = Dados::find()->where(['id_User' => Yii::$app->user->id])->one();

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view']);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Dados model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id_User Id User
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id_User)
    {
        $this->findModel($id_User)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Dados model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id_User Id User
     * @return Dados the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id_User)
    {
        if (($model = Dados::findOne(['id_User' => $id_User])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
