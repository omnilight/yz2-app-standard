<?php

$config = [
    'modules' => require(__DIR__ . '/modules/backend.php'),
    'user' => [
        'identityClass' => \app\models\backend\Users::className(),
        'enableAutoLogin' => false,
    ],
    'authManager' => [
        'class' => \yz\admin\components\AuthManager::className(),
    ]
];

$config = \yii\helpers\ArrayHelper::merge(
    require(__DIR__ . '/common.php'),
    $config
);

return $config;