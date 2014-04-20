<?php

return [
    'bootstrap' => ['debug'],
    'modules' => [
        'gii' => [
            'class' => 'yii\gii\Module',
            'allowedIPs' => ['*'],
            'generators' => [
                'yz-model' => ['class' => 'yz\gii\generators\model\Generator'],
                'yz-crud' => ['class' => 'yz\gii\generators\crud\Generator'],
                'yz-module' => ['class' => 'yz\gii\generators\module\Generator'],
            ],
        ],
        'debug' => [
            'class' => 'yii\debug\Module',
            'allowedIPs' => ['*'],
        ],
    ],
];