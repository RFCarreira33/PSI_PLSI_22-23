<?php

namespace backend\modules\api\controllers;

use backend\modules\api\components\CustomAuth;
use yii\rest\ActiveController;
use Yii;
use common\models\Fatura;
use Dompdf\Dompdf;
use Dompdf\Options;

class FaturaController extends BaseController
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

    public function actionView()
    {
        $fatura = Fatura::findOne(['id' => Yii::$app->request->get('id'), 'id_Cliente' => Yii::$app->params['id']]);
        if ($fatura == null) {
            return 'Produto não encontrado';
        }
        //convert to pdf
        $dompdf = new Dompdf;
        $dompdf->loadHtml($this->renderPartial('print', [
            'model' => $fatura,
        ]));
        $dompdf->render();
        //convert the output to base64
        $data = $dompdf->output();
        $response = [
            'pdf' => base64_encode($data),
        ];
        return $response;
    }
}
