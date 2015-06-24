<?php

return [
    'bootstrap' => ['debug'],
    'components' => [
        'assetManager' => [
            'linkAssets' => false,
            'forceCopy' => false,
        ],
    ],
    'modules' => [
        'gii' => [
            'class' => yii\gii\Module::class,
            'allowedIPs' => ['*'],
            'generators' => [
                'yz-model' => ['class' => yz\gii\generators\model\Generator::class],
                'yz-crud' => ['class' => yz\gii\generators\crud\Generator::class],
                'yz-module' => ['class' => yz\gii\generators\module\Generator::class],
            ],
        ],
        'debug' => [
            'class' => yii\debug\Module::class,
            'allowedIPs' => ['*'],
        ],
    ],
];