<?php

return [
    'basePath' => dirname(__DIR__),
    'controllerNamespace' => 'frontend\controllers',
    'components' => [
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
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
