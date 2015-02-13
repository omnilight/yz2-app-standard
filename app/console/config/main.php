<?php

return [
    'basePath' => dirname(__DIR__),
    'controllerNamespace' => 'console\controllers',
    'controllerMap' => [
        'migrate' => [
            'class' => 'dmstr\console\controllers\MigrateController',
            'migrationTable' => '{{%migrations}}',
        ],
    ],
    'components' => [

    ],
    'modules' => [

    ],
    'params' => [
        'yii.migrations' => [
            '@migrations',
        ]
    ],
];
