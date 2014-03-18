<?php

return [
    'basePath' => dirname(__DIR__),
    'controllerNamespace' => 'frontend\controllers',
    'components' => [
        'urlManager' => [
            // Yz UrlManager by default uses pretty urls and script name
            'class' => '\yz\components\UrlManager',
            'rules' => [

            ],
        ],
        'request' => [
            'enableCsrfValidation' => true,
        ],
        'user' => [
            'identityClass' => '\app\models\User',
        ],
    ],
    'modules' => [

    ],
    'params' => [

    ],
];
/*YII_ENV_DEV ? [
    'modules' => [
        'debug' => 'yii\debug\Module',
    ],
    'preload' => ['debug'],
] : []*/