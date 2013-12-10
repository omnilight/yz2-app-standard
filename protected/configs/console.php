<?php

Yii::$objectConfig['yii\console\controllers\MigrateController'] = [
    'migrationTable' => '{{%migrations}}'
];

$config = [
    'controllerPath' => dirname(__DIR__) . '/commands',
    'controllerNamespace' => 'app\commands',
    'modules' => require(__DIR__ . '/modules/console.php'),
];

if(YII_ENV_DEV) {
    // Put your development config here
}

return $config;