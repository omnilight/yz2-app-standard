<?php

$modules = [
    'admin' => [
        'class' => 'yz\admin\AdminModule'
    ]
];

$modules = \yii\helpers\ArrayHelper::merge(
    require(__DIR__.'/common.php'),
    $modules
);

return $modules;