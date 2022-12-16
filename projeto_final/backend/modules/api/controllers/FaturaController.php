<?php

namespace backend\modules\api\controllers;

use backend\modules\api\components\CustomAuth;
use yii\rest\ActiveController;
use Yii;
use common\models\Fatura;

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
        $faturas = Fatura::findAll(['id_Cliente' => Yii::$app->params['id']]);
        $response = [];
        foreach ($faturas as $fatura) {
            $data = [
                'fatura' => $fatura,
                'linhasFatura' => $fatura->linhafaturas,
            ];
            $response[] = $data;
        }
        return $response;
    }
}