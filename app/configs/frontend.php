<?php

$config = [
    'request' => [
        'enableCsrfValidation' => true,
    ],
    'user' => [
        'identityClass' => 'app\models\User',
    ],
    'modules' => require(__DIR__ . '/modules/frontend.php'),
];

if(YII_ENV_DEV) {
    $devConfig = [
        'modules' => [
            'debug' => 'yii\debug\Module',
        ],
        'preload' => 'debug',
    ];
}else {
    $devConfig = [];
}

return \yii\helpers\ArrayHelper::merge(
    (require __DIR__ . '/common.php'),
    $config,
    $devConfig
);