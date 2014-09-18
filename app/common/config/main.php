<?php

return [
    'id' => 'yz2-app-standard',
    'language' => 'ru',
    'sourceLanguage' => 'en-US',
    'extensions' => require(YZ_VENDOR_DIR . '/yiisoft/extensions.php'),
    'vendorPath' => YZ_VENDOR_DIR,
    'components' => [
        'i18n' => [
            'translations' => [
                'common' => [
                    'class' => 'yii\i18n\PhpMessageSource',
                    'basePath' => '@common/messages',
                    'sourceLanguage' => 'en-US',
                ],
                'frontend' => [
                    'class' => 'yii\i18n\PhpMessageSource',
                    'basePath' => '@frontend/messages',
                    'sourceLanguage' => 'en-US',
                ],
                'backend' => [
                    'class' => 'yii\i18n\PhpMessageSource',
                    'basePath' => '@backend/messages',
                    'sourceLanguage' => 'en-US',
                ],
                'console' => [
                    'class' => 'yii\i18n\PhpMessageSource',
                    'basePath' => '@console/messages',
                    'sourceLanguage' => 'en-US',
                ],
            ]
        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning', 'trace'],
                ],
            ],
        ],
    ],
];
