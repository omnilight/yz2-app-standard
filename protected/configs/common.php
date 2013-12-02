<?php

Yii::setAlias('@app',YZ_APP_DIR);

$config = [
    'id' => 'yz2-app-standard',
    'basePath' => dirname(__DIR__),
    'preload' => [],
    'extensions' => require(YZ_VENDOR_DIR . '/yiisoft/extensions.php'),
    'modules' => require(__DIR__ . '/modules/common.php'),
    'components' => [
        'request' => [
            'enableCsrfValidation' => true,
        ],
        'cache' => [
            'class' => 'yii\caching\DummyCache',
            //'class' => 'yii\caching\FileCache',
            //'class' => 'yii\caching\MemCache',
        ],
        'user' => [
            'identityClass' => 'app\models\User',
        ],
    ]
];

if(YII_ENV_DEV) {
    $config['preload'][] = 'debug';
}

return $config;