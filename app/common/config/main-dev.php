<?php

return [
    'components' => [
        'db' => [
            'class' => 'yii\db\Connection',
            'charset' => 'utf8',
            'dsn' => 'mysql:host=localhost;dbname=yz2app',
            'username' => 'root',
            'password' => 'mysqlroot',
            'tablePrefix' => 'yz_',
        ],
        'cache' => [
            'class' => 'yii\caching\DummyCache',
            //'class' => 'yii\caching\FileCache',
            //'class' => 'yii\caching\MemCache',
        ],
    ]
];