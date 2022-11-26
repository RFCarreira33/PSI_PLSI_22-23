<?php

namespace backend\modules\api\controllers;

use yii\rest\ActiveController;
use backend\modules\api\components\CustomAuth;
use common\models\Carrinho;
use Yii;
use yii\data\ActiveDataProvider;

class CarrinhoController extends ActiveController
{
    public $modelClass = 'common\models\Carrinho';

    public function behaviors()
    {
        Yii::$app->params['id'] = 0;
        $behaviors = parent::behaviors();
        $behaviors['authenticator'] = [
            'class' => CustomAuth::className(),
        ];
        return $behaviors;
    }

    protected function verbs()
    {
        $verbs = parent::verbs();
        $verbs =  [
            'index' => ['GET', 'POST', 'HEAD'],
        ];
        return $verbs;
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

    public function actionIndex()
    {
        $activeData = new ActiveDataProvider([
            // filters faturas by user id dont add ->all() to the end of the query
            'query' => Carrinho::find()->where(['id_Cliente' => Yii::$app->params['id']]),
            //can add pagination here
            'pagination' => false
        ]);
        return $activeData;
    }
}