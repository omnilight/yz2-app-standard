<?php

return \yii\helpers\ArrayHelper::merge(
    (require __DIR__ . '/common.php'),
    [
        'modules' => require(__DIR__ . '/modules/backend.php'),
        'components' => [
            'urlManager' => [
                // Yz UrlManager by default uses pretty urls and script name
                'class' => '\yz\components\UrlManager',
                'rules' => [

                ],
            ],
            'user' => [
                'identityClass' => '\yz\admin\models\Users',
                'enableAutoLogin' => false,
            ],
            'authManager' => [
                'class' => '\yz\admin\components\AuthManager',
            ]
        ],
        'params' => [

        ],
    ],
    YII_ENV_DEV? [
        'modules' => [
            'gii' => [
                'class' => 'yii\gii\Module',
                'allowedIPs' => ['*'],
            ],
            'debug' => 'yii\debug\Module',
        ],
        'preload' => ['debug'],
    ] : []
);
