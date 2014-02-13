<?php

return \yii\helpers\ArrayHelper::merge(
    (require __DIR__ . '/common.php'),
    [
		'runtimePath' => __DIR__ . '/../runtime/frontend',
		'viewPath' => __DIR__ . '/../views/frontend',

		'controllerPath' => __DIR__ . '/../controllers/frontend',
		'controllerNamespace' => 'app\controllers\frontend',
        'modules' => require(__DIR__ . '/modules/frontend.php'),
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
        'params' => [

        ],
    ],
    YII_ENV_DEV? [
        'modules' => [
            'debug' => 'yii\debug\Module',
        ],
        'preload' => ['debug'],
    ] : []
);
