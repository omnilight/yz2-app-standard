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
    $config['modules']['debug'] = 'yii\debug\Module';
    $config['preload'][] = 'debug';
}

return $config;