<?php
$params = array_merge(
    require __DIR__ . '/../../common/config/params.php',
    require __DIR__ . '/../../common/config/params-local.php',
    require __DIR__ . '/params.php',
    require __DIR__ . '/params-local.php'
);

return [
    'id' => 'app-backend',
    'basePath' => dirname(__DIR__),
    'controllerNamespace' => 'backend\controllers',
    'bootstrap' => ['log'],
    'modules' => [
        'api' => [
            'class' => 'backend\modules\api\ModuleAPI',
        ],
        'parsers' => [
            'application/json' => 'yii\web\JsonParser',
        ],
    ],
    'components' => [
        'request' => [
            'csrfParam' => '_csrf-backend',
        ],
        'user' => [
            'identityClass' => 'common\models\User',
            'enableAutoLogin' => true,
            'identityCookie' => ['name' => '_identity-backend', 'httpOnly' => true],
        ],
        'session' => [
            // this is the name of the session cookie used for login on the backend
            'name' => 'advanced-backend',
        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => \yii\log\FileTarget::class,
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
                [
                    'class' => 'yii\rest\UrlRule', 'controller' => 'api/produto',
                    //creates a new rule for the controller
                    'extraPatterns' => [
                        'GET search' => 'search',
                        'POST location' => 'location',

                    ],

                ],
                [
                    'class' => 'yii\rest\UrlRule', 'controller' => 'api/carrinho',
                    'extraPatterns' => [
                        'POST coupon' => 'coupon',
                        'POST buy' => 'buy',

                    ],
                ],
                ['class' => 'yii\rest\UrlRule', 'controller' => 'api/fatura'],
                ['class' => 'yii\rest\UrlRule', 'controller' => 'api/filter'],
                [
                    'class' => 'yii\rest\UrlRule', 'controller' => 'api/user',
                    'extraPatterns' => [
                        'GET login' => 'login',
                        'POST register' => 'register',

                    ],
                ],
                ['class' => 'yii\rest\UrlRule', 'controller' => 'api/dados'],
            ],
        ],
    ],
    'params' => $params,
];
