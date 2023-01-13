<?php

namespace backend\modules\api\controllers;

use common\models\Dados;
use common\models\User;
use yii\filters\auth\HttpBasicAuth;
use frontend\models\SignupForm;
use Yii;

class UserController extends \yii\web\Controller
{
    protected $user = null;

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
        return $this->asJson(["response" => "Falha ao Autenticar"]);
    }

    public function actionLogin()
    {
        $dados = Dados::findOne($this->user->id);
        if ($dados->codDesconto == "Sem Acesso") {
            $dados->codDesconto = "Sim";
            $dados->save();
        }

        $token = $this->user->auth_key;
        return $this->asJson(["response" => $token]);
    }

    public function actionRegister()
    {
        $model = new SignupForm();
        $model->load(Yii::$app->request->post(), '');
        if ($model->signup()) {
            return $this->asJson(["response" => "Sucesso"]);
        }
        //in case of 1+ errors from diferent models foreach will only return the first error
        foreach ($model->errors as $error) {
            return $this->asJson(["response" => $error[0]]);
        }
    }
}
