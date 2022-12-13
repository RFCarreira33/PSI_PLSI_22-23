<?php

namespace backend\modules\api\controllers;

use yii\rest\ActiveController;

class CategoriaController extends ActiveController
{
    public $modelClass = 'common\models\Categoria';

    public function actions()
    {
        $actions = parent::actions();
        //no use
        unset($actions['update']);
        unset($actions['delete']);
        unset($actions['create']);
        unset($actions['view']);
        return $actions;
    }
    protected function verbs()
    {
        $verbs = parent::verbs();
        $verbs =  [
            'index' => ['GET'],
            'view' => ['GET'],
        ];
        return $verbs;
    }
}