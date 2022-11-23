<?php

namespace frontend\controllers;

use common\models\Dados;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\AccessControl;
use yii;

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
            ]
        );
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
        $model = $this->findModel($id_User);
        return $this->render('view', [
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