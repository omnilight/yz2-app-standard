<?php

return [
    'bootstrap' => ['gii'],
    'modules' => [
        'gii' => [
            'class' => 'yii\gii\Module',
            'generators' => [
                'yz-model' => ['class' => 'yz\gii\generators\model\Generator'],
                'yz-crud' => ['class' => 'yz\gii\generators\crud\Generator'],
                'yz-module' => ['class' => 'yz\gii\generators\module\Generator'],
            ],
        ],
    ]
];