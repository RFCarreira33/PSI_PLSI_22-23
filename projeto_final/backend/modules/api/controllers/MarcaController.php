<?php

namespace backend\modules\api\controllers;

use yii\rest\ActiveController;

class MarcaController extends ActiveController
{
    public $modelClass = 'common\models\Marca';

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
        ];
        return $verbs;
    }
}