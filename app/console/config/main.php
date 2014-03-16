<?php

Yii::$objectConfig['yii\console\controllers\MigrateController'] = [
    'migrationTable' => '{{%migrations}}'
];

return \yii\helpers\ArrayHelper::merge(
    (require __DIR__ . '/common.php'),
    [
		'runtimePath' => __DIR__ . '/../runtime/console',

        'controllerNamespace' => 'app\controllers\console',
        'modules' => require(__DIR__ . '/modules/console.php'),
        'params' => [

        ],
    ],
    YII_ENV_DEV? [

    ] : []
);
