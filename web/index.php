<?php
defined('YII_ENV') || define('YII_ENV', getenv('APP_ENV')?:'prod');
defined('YII_DEBUG') || define('YII_DEBUG', YII_ENV == 'dev');

define('YZ_APP_DIR',__DIR__.'/../app');
define('YZ_VENDOR_DIR',__DIR__.'/../app/vendor');

define('YZ_APP_TYPE', 'frontend');
define('YZ_APP_TYPE_BACKEND', YZ_APP_TYPE == 'backend');
define('YZ_APP_TYPE_FRONTEND', YZ_APP_TYPE == 'frontend');
define('YZ_APP_TYPE_CONSOLE', YZ_APP_TYPE == 'console');

require(YZ_VENDOR_DIR . '/autoload.php');
require(YZ_VENDOR_DIR . '/yiisoft/yii2/Yii.php');

$config = require YZ_APP_DIR . '/configs/frontend.php';

$application = new yii\web\Application($config);
$application->run();