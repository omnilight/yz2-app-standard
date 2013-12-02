<?php

$config = [
    'modules' => require(__DIR__ . '/modules/backend.php'),
    'components' => [
//        'user' => [
//            'identityClass' => '\app\models\backend\Users',
//            'enableAutoLogin' => false,
//        ],
        'authManager' => [
            'class' => '\yz\admin\components\AuthManager',
        ]
    ]
];

return $config;