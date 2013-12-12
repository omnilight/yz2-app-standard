<?php

$modules = [
    'admin' => [
        'class' => 'yz\admin\Module'
    ]
];

return \yii\helpers\ArrayHelper::merge(
    (require __DIR__ . '/common.php'),
    $modules
);