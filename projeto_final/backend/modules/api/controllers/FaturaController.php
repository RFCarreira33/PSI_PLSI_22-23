<?php

namespace backend\modules\api\controllers;

use backend\modules\api\components\CustomAuth;
use yii\rest\ActiveController;
use Yii;
use yii\data\ActiveDataProvider;
use common\models\Fatura;
use common\models\LinhaFatura;

class FaturaController extends ActiveController
{
    public $modelClass = 'common\models\Fatura';

    public function behaviors()
    {
        Yii::$app->params['id'] = 0;
        $behaviors = parent::behaviors();
        $behaviors['authenticator'] = [
            'class' => CustomAuth::className(),
        ];
        return $behaviors;
    }

    public function actions()
    {
        $actions = parent::actions();
        //no use
        unset($actions['update']);
        unset($actions['delete']);
        //not sure if need
        unset($actions['create']);
        //unset to override
        unset($actions['index']);
        unset($actions['view']);
        return $actions;
    }

    protected function verbs()
    {
        $verbs = parent::verbs();
        $verbs =  [
            'index' => ['GET', 'POST', 'HEAD'],
            'view' => ['GET', 'HEAD'],
        ];
        return $verbs;
    }


    public function actionIndex()
    {
        $activeData = new ActiveDataProvider([
            // filters faturas by user id dont add ->all() to the end of the query
            'query' => Fatura::find()->where(['id_Cliente' => Yii::$app->params['id']]),
            //can add pagination here
            'pagination' => false
        ]);
        return $activeData;
    }

    //returns linhasFatura from fatura
    public function actionView()
    {
        //verifies if fatura belongs to user
        $linha = LinhaFatura::find()->where(['id_Fatura' => Yii::$app->request->get('id')])->one();
        if ($linha->fatura->id_Cliente != Yii::$app->params['id']) {
            throw new \yii\web\UnauthorizedHttpException('Proibido - Fatura não pertence a este cliente');
        }
        $activeData = new ActiveDataProvider([
            'query' => LinhaFatura::find(['id_Fatura' => Yii::$app->request->get('id')]),
            //can add pagination here
            'pagination' => false
        ]);
        return $activeData;
    }
}