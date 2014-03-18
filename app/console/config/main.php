<?php

return [
    'basePath' => dirname(__DIR__),
    'controllerNamespace' => 'console\controllers   ',
    'controllerMap' => [
        'migrate' => [
            'class' => 'yii\console\controllers\MigrateController',
            'migrationTable' => '{{%migrations}}',
        ],
    ],
    'components' => [

    ],
    'modules' => [

    ],
    'params' => [

    ],
];
