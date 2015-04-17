<?php

define('YZ_APP_DIR', __DIR__.'/../../app');
define('YZ_VENDOR_DIR',__DIR__.'/../../app/vendor');

require(YZ_VENDOR_DIR . '/autoload.php');
require(YZ_APP_DIR . '/common/config/env.php');

defined('YII_ENV') || define('YII_ENV', getenv('YII_ENV'));
defined('YII_DEBUG') || define('YII_DEBUG', getenv('YII_DEBUG'));

require(YZ_VENDOR_DIR . '/yiisoft/yii2/Yii.php');
require(YZ_APP_DIR . '/common/config/bootstrap.php');
require(YZ_APP_DIR . '/backend/config/bootstrap.php');

$config = \yii\helpers\ArrayHelper::merge(
    require(YZ_APP_DIR . '/common/config/main.php'),
    require(YZ_APP_DIR . '/common/config/main-'.YII_ENV.'.php'),
    require(YZ_APP_DIR . '/backend/config/main.php'),
    require(YZ_APP_DIR . '/backend/config/main-'.YII_ENV.'.php')
);

$application = new \backend\base\Application($config);
$application->run();