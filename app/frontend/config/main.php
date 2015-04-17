<?php

return [
    'basePath' => dirname(__DIR__),
    'controllerNamespace' => 'frontend\controllers',
    'components' => [
        'request' => [
            'cookieValidationKey' => getenv('APP_FRONTEND_COOKIE_VALIDATION_KEY'),
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
