<?php

Yii::setAlias('@app',YZ_APP_DIR);

return \yii\helpers\ArrayHelper::merge(
    [
        'id' => 'yz2-app-standard',
        'basePath' => dirname(__DIR__),
        'preload' => [],
        'extensions' => require(YZ_VENDOR_DIR . '/yiisoft/extensions.php'),
        'modules' => require(__DIR__ . '/modules/common.php'),
        'components' => [
            'cache' => [
                'class' => 'yii\caching\DummyCache',
                //'class' => 'yii\caching\FileCache',
                //'class' => 'yii\caching\MemCache',
            ],
            'db' => [
                'class' => 'yii\db\Connection',
                // Your connection settings go there
                'dsn' => 'mysql:host=localhost;dbname=yz2app',
                'username' => 'root',
                'password' => 'mysqlroot',
                'charset' => 'utf8',
                // All tables in Yz uses format {{%tableName}} so do not remove tablePrefix property
                'tablePrefix' => 'yz_',
            ],
            'log' => [
                'traceLevel' => YII_DEBUG ? 3 : 0,
                'targets' => [
                    [
                        'class' => 'yii\log\FileTarget',
                        'levels' => ['error', 'warning', 'trace'],
                    ],
                ],
            ],
        ],
        'params' => [
            'application-type' => YZ_APP_TYPE,
        ],
    ],
    YII_ENV_DEV? [

    ] : []
);
