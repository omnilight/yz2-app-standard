<?php

Yii::setAlias('@app',YZ_APP_DIR);

$config = [
    'id' => 'yz2-app-standard',
    'basePath' => dirname(__DIR__),
    'extensions' => require(YZ_VENDOR_DIR . '/yiisoft/extensions.php'),
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

return $config;