<?php

namespace backend\modules\api\controllers;

use common\models\Dados;
use common\models\User;
use yii\filters\auth\HttpBasicAuth;
use frontend\models\SignupForm;
use Yii;

class UserController extends \yii\web\Controller
{
    public $user = null;

    public function behaviors()
    {
        $behaviors = parent::behaviors();
        $behaviors['authenticator'] = [
            'class' => HttpBasicAuth::className(),
            'except' => ['register'],
            'auth' => [$this, 'auth'],
        ];
        return $behaviors;
    }

    public function actions()
    {
        $actions = parent::actions();
        //no use
        unset($actions['index']);
        unset($actions['update']);
        unset($actions['delete']);
        unset($actions['view']);
        unset($actions['create']);
        return $actions;
    }

    public function beforeAction($action)
    {
        $this->enableCsrfValidation = false;
        return parent::beforeAction($action);
    }

    protected function verbs()
    {
        $verbs = parent::verbs();
        $verbs =  [
            'login' => ['GET'],
            'register' => ['POST'],
        ];
        return $verbs;
    }

    public function auth($username, $password)
    {
        $user = User::findByUsername($username);
        if ($user && $user->validatePassword($password)) {
            $this->user = $user;
            return $user;
        }
        return "Falha ao Autenticar";
    }

    public function actionLogin()
    {
        return $this->user->auth_key;
    }

    public function actionRegister()
    {
        $model = new SignupForm();
        $model->load(Yii::$app->request->post(), '');
        if ($model->signup()) {
            return "Sucesso";
        }
        //in case of 1+ errors from diferent models foreach will only return the first error
        foreach ($model->errors as $error) {
            return $error[0];
        }
    }
}