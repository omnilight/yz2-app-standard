<?php

return [
    'bootstrap' => ['gii'],
    'modules' => [
        'gii' => [
            'class' => yii\gii\Module::class,
            'generators' => [
                'yz-model' => ['class' => yz\gii\generators\model\Generator::class],
                'yz-crud' => ['class' => yz\gii\generators\crud\Generator::class],
                'yz-module' => ['class' => yz\gii\generators\module\Generator::class],
            ],
        ],
    ]
];