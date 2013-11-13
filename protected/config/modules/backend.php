<?php

$modules = [
    'gii' => [
        'class' => 'yii\gii\Module',
    ],
    'admin' => [
        'class' => 'yz\admin\Module'
    ]
];

$modules = \yii\helpers\ArrayHelper::merge(
    require(__DIR__.'/common.php'),
    $modules
);

return $modules;