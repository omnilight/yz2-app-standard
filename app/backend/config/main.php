<?php

return [
    'basePath' => dirname(__DIR__),
    'controllerNamespace' => 'backend\controllers',
    'components' => [
        'request' => [
            'cookieValidationKey' => '',
        ],
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
                '' => 'admin/main/index',
                'login' => 'admin/main/login',
                'logout' => 'admin/main/logout',
                'profile' => 'admin/profile/index',
            ],
        ],
        'user' => [
            'identityClass' => '\yz\admin\models\User',
            'enableAutoLogin' => false,
            'loginUrl' => ['admin/main/login'],
            'on afterLogin' => ['\yz\admin\models\User', 'onAfterLoginHandler'],
        ],
        'authManager' => [
            'class' => '\yz\admin\components\AuthManager',
        ],
        'assetManager' => [
            'linkAssets' => true,
        ]
    ],
    'modules' => [
        'admin' => [
            'class' => '\yz\admin\Module',
        ]
    ],
    'params' => [

    ],
];


