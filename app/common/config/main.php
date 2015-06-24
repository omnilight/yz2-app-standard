<?php

return [
    'id' => 'yz2-app-standard',
    'language' => 'ru',
    'sourceLanguage' => 'en-US',
    'extensions' => require(YZ_VENDOR_DIR . '/yiisoft/extensions.php'),
    'vendorPath' => YZ_VENDOR_DIR,
    'bootstrap' => [
        'log',
    ],
    'components' => [
        'db' => [
            'class' => yii\db\Connection::class,
            'charset' => 'utf8',
            'dsn' => getenv('DATABASE_DSN'),
            'username' => getenv('DATABASE_USER'),
            'password' => getenv('DATABASE_PASSWORD'),
            'tablePrefix' => getenv('DATABASE_TABLE_PREFIX'),
        ],
        'i18n' => [
            'translations' => [
                'common' => [
                    'class' => yii\i18n\PhpMessageSource::class,
                    'basePath' => '@common/messages',
                    'sourceLanguage' => 'en-US',
                ],
                'frontend' => [
                    'class' => yii\i18n\PhpMessageSource::class,
                    'basePath' => '@frontend/messages',
                    'sourceLanguage' => 'en-US',
                ],
                'backend' => [
                    'class' => yii\i18n\PhpMessageSource::class,
                    'basePath' => '@backend/messages',
                    'sourceLanguage' => 'en-US',
                ],
                'console' => [
                    'class' => yii\i18n\PhpMessageSource::class,
                    'basePath' => '@console/messages',
                    'sourceLanguage' => 'en-US',
                ],
            ]
        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => yii\log\FileTarget::class,
                    'levels' => ['error', 'warning', 'trace'],
                ],
            ],
        ],
    ],
    'modules' => [

    ],
];
