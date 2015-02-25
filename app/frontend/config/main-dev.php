<?php

return [
    'bootstrap' => ['debug'],
    'components' => [
        'assetManager' => [
            'linkAssets' => false,
            'forceCopy' => true,
        ],
    ],
    'modules' => [
        'debug' => [
            'class' => 'yii\debug\Module',
            'allowedIPs' => ['*'],
        ],
    ],
];