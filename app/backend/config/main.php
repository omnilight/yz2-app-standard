<?php

return [
    'basePath' => dirname(__DIR__),
    'controllerNamespace' => 'backend\controllers',
    'components' => [
        'request' => [
            'cookieValidationKey' => /* COOKIE_KEY_BEGIN */'PUT-KEY-HERE'/* COOKIE_KEY_END */,
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
            'on afterLogin' => function($event) {
                    /** @var \yii\web\UserEvent $event */
                    /** @var \yz\admin\models\User $identity */
                    $identity = $event->identity;
                    $identity->updateAttributes([
                        'logged_at' => new \yii\db\Expression('NOW()'),
                    ]);
                }
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


