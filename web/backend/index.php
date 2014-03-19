<?php
defined('YII_ENV') || define('YII_ENV', getenv('APP_ENV')?:'prod');
defined('YII_DEBUG') || define('YII_DEBUG', YII_ENV == 'dev');

switch (YII_ENV) {
    case 'dev':
        define('YZ_APP_DIR', __DIR__.'/../../app');
        define('YZ_VENDOR_DIR',__DIR__.'/../../app/vendor');
        break;
    case 'prod':
        define('YZ_APP_DIR', __DIR__.'/../../app');
        define('YZ_VENDOR_DIR',__DIR__.'/../../app/vendor');
        break;
    default:
        throw new Exception("Unknown YII_ENV: ".YII_ENV);
}

require(YZ_VENDOR_DIR . '/autoload.php');
require(YZ_VENDOR_DIR . '/yiisoft/yii2/Yii.php');
require(YZ_APP_DIR . '/common/config/aliases-'.YII_ENV.'.php');

$config = \yii\helpers\ArrayHelper::merge(
    require(YZ_APP_DIR . '/common/config/main.php'),
    require(YZ_APP_DIR . '/common/config/main-'.YII_ENV.'.php'),
    require(YZ_APP_DIR . '/backend/config/main.php'),
    require(YZ_APP_DIR . '/backend/config/main-'.YII_ENV.'.php')
);

$application = new yii\web\Application($config);
$application->run();