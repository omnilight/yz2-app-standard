<?php

defined('YII_ENV') || define('YII_ENV', getenv('APP_ENV')?:'prod');
defined('YII_DEBUG') || define('YII_DEBUG', YII_ENV == 'dev');

// fcgi doesn't have STDIN defined by default
defined('STDIN') or define('STDIN', fopen('php://stdin', 'r'));

define('YZ_APP_DIR',__DIR__.'/..');
define('YZ_VENDOR_DIR',__DIR__.'/../vendor');

define('YZ_APP_TYPE', 'console');
define('YZ_APP_TYPE_BACKEND', YZ_APP_TYPE == 'backend');
define('YZ_APP_TYPE_FRONTEND', YZ_APP_TYPE == 'frontend');
define('YZ_APP_TYPE_CONSOLE', YZ_APP_TYPE == 'console');

require(YZ_VENDOR_DIR . '/autoload.php');
require(YZ_VENDOR_DIR . '/yiisoft/yii2/yii/Yii.php');

$config = require YZ_APP_DIR . '/configs/console.php';

$application = new yii\console\Application($config);
$exitCode = $application->run();
exit($exitCode);