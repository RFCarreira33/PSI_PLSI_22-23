<?php

namespace backend\modules\api\controllers;

use yii\rest\ActiveController;

class MarcaController extends ActiveController
{
    public $modelClass = 'common\models\Marca';

    public function actions()
    {
        $actions = parent::actions();
        unset($actions['update']);
        unset($actions['delete']);
        unset($actions['create']);
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
}