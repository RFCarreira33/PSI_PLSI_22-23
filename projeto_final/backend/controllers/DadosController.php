<?php

namespace backend\controllers;

use common\models\dados;
use backend\models\DadosSearch;
use common\models\User;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;

/**
 * DadosController implements the CRUD actions for Dados model.
 */
class DadosController extends Controller
{

    const STATUS_DELETED = 0;
    const STATUS_INACTIVE = 9;
    const STATUS_ACTIVE = 10;
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
     * Lists all dados models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new DadosSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single dados model.
     * @param int $idUser Id User
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($idUser)
    {
        return $this->render('view', [
            'model' => $this->findModel($idUser),
            'status' => User::findIdentity($idUser)
        ]);
    }

    /**
     * Creates a new dados model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new dados();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'idUser' => $model->idUser]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing dados model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $idUser Id User
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($idUser)
    {
        $model = $this->findModel($idUser);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'idUser' => $model->idUser]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing dados model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $idUser Id User
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
    public function actionDelete($idUser)
    {
        $this->findModel($idUser)->delete();

        return $this->redirect(['index']);
    }

     */
    public function actionChange($idUser)
    {
        $user = User::findOne(['id' => $idUser]);
        $user->status == self::STATUS_ACTIVE ? $user->status = self::STATUS_DELETED : $user->status = self::STATUS_ACTIVE;
        $user->save();
        return $this->redirect(['index']);
    }

    /**
     * Finds the dados model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $idUser Id User
     * @return dados the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($idUser)
    {
        if (($model = dados::findOne(['idUser' => $idUser])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}