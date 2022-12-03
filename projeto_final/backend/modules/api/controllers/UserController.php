<?php

namespace backend\modules\api\controllers;

use common\models\User;
use yii\filters\auth\HttpBasicAuth;
use backend\models\AuthAssignment;

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
        unset($actions['create']);
        unset($actions['view']);
        return $actions;
    }

    public function auth($username, $password)
    {
        $user = $this->user = User::findByUsername($username);
        if ($user && $user->validatePassword($password)) {
            return $user;
        }
        throw new \yii\web\ForbiddenHttpException('No authentication'); //403
    }

    public function actionLogin()
    {
        return $this->user->auth_key;
    }
}