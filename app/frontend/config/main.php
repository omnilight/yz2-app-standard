<?php

return [
    'basePath' => dirname(__DIR__),
    'controllerNamespace' => 'frontend\controllers',
    'components' => [
        'request' => [
            'cookieValidationKey' => /* COOKIE_KEY_BEGIN */'PUT-KEY-HERE'/* COOKIE_KEY_END */,
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
