<?php

return [
    'basePath' => dirname(__DIR__),
    'controllerNamespace' => 'frontend\controllers',
    'components' => [
        'request' => [
            'cookieValidationKey' => '',
        ],
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [

            ],
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
