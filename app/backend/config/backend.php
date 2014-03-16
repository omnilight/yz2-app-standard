<?php

return \yii\helpers\ArrayHelper::merge(
    (require __DIR__ . '/common.php'),
    [
		'controllerNamespace' => 'app\controllers\backend',
        'components' => [
            'urlManager' => [
                // Yz UrlManager by default uses pretty urls and script name
                'class' => '\yz\components\UrlManager',
                'rules' => [

                ],
            ],
            'user' => [
                'identityClass' => '\yz\admin\common\models\User',
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
    ],
    YII_ENV_DEV? [
        'modules' => [
            'gii' => [
                'class' => 'yii\gii\Module',
                'allowedIPs' => ['*'],
				'generators' => [
					'yz-model' => ['class' => 'yz\gii\generators\model\Generator'],
					'yz-crud' => ['class' => 'yz\gii\generators\crud\Generator'],
					'yz-module' => ['class' => 'yz\gii\generators\module\Generator'],
				],
            ],
            'debug' => [
				'class' => 'yii\debug\Module',
				'allowedIPs' => ['*'],
			],
        ],
        'preload' => ['debug'],
    ] : []
);
