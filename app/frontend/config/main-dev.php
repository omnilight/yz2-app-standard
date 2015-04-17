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
        'debug' => [
            'class' => 'yii\debug\Module',
            'allowedIPs' => ['*'],
        ],
    ],
];