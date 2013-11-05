<?php

$config = [
    'modules' => require(__DIR__ . '/modules/backend.php'),
    'user' => [
        'identityClass' => 'app\models\backend\User',
        'enableAutoLogin' => false,
        'loginUrl'
    ],
];

$config = \yii\helpers\ArrayHelper::merge(
    require(__DIR__ . '/common.php'),
    $config
);

return $config;