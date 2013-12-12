<?php

return \yii\helpers\ArrayHelper::merge(
    (require __DIR__ . '/common.php'),
    [
        'modules' => require(__DIR__ . '/modules/frontend.php'),
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
                'identityClass' => 'app\models\User',
            ],
        ],
        'on '.\yii\base\Application::EVENT_BEFORE_REQUEST => function() {
                \yz\UrlCollector::collect();
            },
    ],
    YII_ENV_DEV? [
        'modules' => [
            'debug' => 'yii\debug\Module',
        ],
        'preload' => ['debug'],
    ] : []
);
