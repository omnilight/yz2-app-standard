<?php

return \yii\helpers\ArrayHelper::merge(
    (require __DIR__ . '/common.php'),
    [
        'modules' => require(__DIR__ . '/modules/backend.php'),
        'components' => [
            'urlManager' => [
                'enablePrettyUrl' => true,
                'showScriptName' => false,
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
        'on '.\yii\base\Application::EVENT_BEFORE_REQUEST =>  function() {
                \yz\helpers\UrlCollector::collect();
            },
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
