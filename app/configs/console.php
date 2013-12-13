<?php

Yii::$objectConfig['yii\console\controllers\MigrateController'] = [
    'migrationTable' => '{{%migrations}}'
];

return \yii\helpers\ArrayHelper::merge(
    (require __DIR__ . '/common.php'),
    [
        'controllerPath' => dirname(__DIR__) . '/commands',
        'controllerNamespace' => 'app\commands',
        'modules' => require(__DIR__ . '/modules/console.php'),
        'params' => [

        ],
    ],
    YII_ENV_DEV? [

    ] : []
);
