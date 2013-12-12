<?php

$config = [
    'modules' => require(__DIR__ . '/modules/backend.php'),
    'components' => [
        'user' => [
            'identityClass' => '\yz\admin\models\Users',
            'enableAutoLogin' => false,
        ],
        'authManager' => [
            'class' => '\yz\admin\components\AuthManager',
        ]
    ]
];

if(YII_ENV_DEV) {
    $devConfig = [
        'modules' => [
            'gii' => [
                'class' => 'yii\gii\Module',
                'allowedIPs' => ['*'],
            ],
            'debug' => 'yii\debug\Module',
        ],
        'preload' => ['debug'],
    ];
}else {
    $devConfig = [];
}

return \yii\helpers\ArrayHelper::merge(
    (require __DIR__ . '/common.php'),
    $config,
    $devConfig
);