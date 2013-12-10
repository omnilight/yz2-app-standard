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
    $config['modules']['gii'] = [
        'class' => 'yii\gii\Module',
        'allowedIPs' => ['*'],
    ];

    $config['modules']['debug'] = 'yii\debug\Module';
    $config['preload'][] = 'debug';
}

return $config;