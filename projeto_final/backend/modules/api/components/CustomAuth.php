<?php

namespace backend\modules\api\components;

use backend\models\AuthAssignment;
use yii\filters\auth\AuthMethod;
use Yii;

class CustomAuth extends AuthMethod
{
    public function authenticate($user, $request, $response)
    {
        $authToken = $request->getQueryString();
        if ($authToken == null) {
            throw new \yii\web\UnauthorizedHttpException('No authentication token provided');
        }
        $token = explode('=', $authToken)[1];
        $user = \common\models\User::findIdentityByAccessToken($token);
        // allows if account exists, its active and is cliente
        if (!$user) {
            throw new \yii\web\UnauthorizedHttpException('No authentication');
        }
        if (AuthAssignment::getUserRole($user->id) != 'cliente') {
            throw new \yii\web\UnauthorizedHttpException('Un authorized account');
        }
        Yii::$app->params['id'] = $user->id;
        return $user;
    }
}