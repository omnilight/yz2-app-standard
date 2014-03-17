<?php

defined('YII_ENV') || define('YII_ENV', getenv('APP_ENV') ? : 'prod');
defined('YII_DEBUG') || define('YII_DEBUG', YII_ENV == 'dev');

// fcgi doesn't have STDIN defined by default
defined('STDIN') or define('STDIN', fopen('php://stdin', 'r'));

define('YZ_APP_DIR', __DIR__ . '/..');
define('YZ_VENDOR_DIR', __DIR__ . '/../vendor');

require(YZ_VENDOR_DIR . '/autoload.php');
require(YZ_VENDOR_DIR . '/yiisoft/yii2/Yii.php');
require(YZ_APP_DIR . '/common/config/aliases.php');

$config = \yii\helpers\ArrayHelper::merge(
    YZ_APP_DIR . '/common/config/main.php',
    YZ_APP_DIR . '/console/config/main.php'
);

$application = new yii\console\Application($config);
$exitCode = $application->run();
exit($exitCode);
