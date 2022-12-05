<?php
$config =  yii\helpers\ArrayHelper::merge(
    require(__DIR__ . '/main.php'),
    require(__DIR__ . '/main-local.php'),
    [
        'id' => 'app-tests',
        'components' => [
            'db' => [
                'dsn' => 'mysql:host=localhost;dbname=projeto_final_teste',
                'username' => 'root',
                'password' => 'root',
                'charset' => 'utf8',
            ]
        ]
    ]
);
return $config;