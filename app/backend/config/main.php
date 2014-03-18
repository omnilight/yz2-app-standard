<?php

return [
    'basePath' => dirname(__DIR__),
    'controllerNamespace' => 'backend\controllers',
    'components' => [
        'urlManager' => [
            // Yz UrlManager by default uses pretty urls and script name
            'class' => '\yz\components\UrlManager',
            'rules' => [

            ],
        ],
        'user' => [
            'identityClass' => '\yz\admin\models\User',
            'enableAutoLogin' => false,
            'loginUrl' => ['admin/main/login']
        ],
        'authManager' => [
            'class' => '\yz\admin\components\AuthManager',
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


