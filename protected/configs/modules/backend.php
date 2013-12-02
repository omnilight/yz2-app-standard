<?php

$modules = [
    'admin' => [
        'class' => 'yz\admin\Module'
    ]
];

if(YII_ENV_DEV) {
    $modules['gii'] = [
        'class' => 'yii\gii\Module',
        'allowedIPs' => ['*'],
    ];
}

return $modules;