<?php

namespace backend\modules\api\controllers;

use common\models\Dados;
use yii\rest\ActiveController;
use backend\modules\api\components\CustomAuth;
use Symfony\Component\VarDumper\Cloner\Data;
use Yii;
use yii\data\ActiveDataProvider;

class DadosController extends ActiveController
{
    public $modelClass = 'common\models\Dados';

    public function behaviors()
    {
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
        unset($actions['delete']);
        unset($actions['create']);
        unset($actions['view']);
        //unset to override
        unset($actions['update']);
        unset($actions['index']);
        return $actions;
    }

    protected function verbs()
    {
        $verbs = parent::verbs();
        $verbs =  [
            'index' => ['GET', 'HEAD'],
            'update' => ['PUT', 'PATCH', 'POST'],
        ];
        return $verbs;
    }

    public function actionIndex()
    {
        $activeData = new ActiveDataProvider([
            'query' => Dados::find()->where(['id_User' => Yii::$app->params['id']])->select('nome, telefone, nif, morada, codPostal'),
            //can add pagination here
            'pagination' => false
        ]);
        return $activeData;
    }

    public function actionUpdate()
    {
        $model = Dados::findOne(['id_User' => Yii::$app->params['id']]);
        $model->load(Yii::$app->getRequest()->getBodyParams(), '');
        if ($model->save()) {
            return 'Dados atualizados com sucesso';
        } else {
            foreach ($model->errors as $erro) {
                return $erro[0];
            }
        }
    }
}