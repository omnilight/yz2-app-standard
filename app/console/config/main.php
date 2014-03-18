<?php

return [
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
