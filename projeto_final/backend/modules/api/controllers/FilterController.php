<?php

namespace backend\modules\api\controllers;

use common\models\Marca;
use common\models\Categoria;
use yii\rest\ActiveController;

class FilterController extends BaseController
{
    //has to be set to use this controller
    public $modelClass = 'common\models\Categoria';

    public function behaviors()
    {
        $behaviors = parent::behaviors();
        return $behaviors;
    }

    public function actions()
    {
        $actions = parent::actions();
        //no use
        unset($actions['update']);
        unset($actions['delete']);
        unset($actions['create']);
        unset($actions['view']);
        //unset to override
        unset($actions['index']);
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

    public function actionIndex()
    {
        $categorias = Categoria::find()->all();
        $marcas = Marca::find()->all();
        $response = [
            'categorias' => $categorias,
            'marcas' => $marcas,
        ];
        return $response;
    }
}
