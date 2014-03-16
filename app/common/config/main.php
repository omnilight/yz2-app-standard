<?php

Yii::setAlias('@app', YZ_APP_DIR);

return [
	'id' => 'yz2-app-standard',
	'language' => 'ru',
	'sourceLanguage' => 'en-US',
	'preload' => [],
	'extensions' => require(YZ_VENDOR_DIR . '/yiisoft/extensions.php'),
	'components' => [
		'cache' => [
			'class' => 'yii\caching\DummyCache',
			//'class' => 'yii\caching\FileCache',
			//'class' => 'yii\caching\MemCache',
		],
		'db' => [
			'class' => 'yii\db\Connection',
			// Your connection settings go there
			'dsn' => 'mysql:host=localhost;dbname=yz2app',
			'username' => 'root',
			'password' => 'mysqlroot',
			'charset' => 'utf8',
			// All tables in Yz uses format {{%tableName}} so do not remove tablePrefix property, but
			// change it to your own
			'tablePrefix' => 'yz_',
		],
		'formatter' => [
			'class' => 'yii\base\Formatter',
			//'class' => 'yii\i18n\Formatter',
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
