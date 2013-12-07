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

return $config;