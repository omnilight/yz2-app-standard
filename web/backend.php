<?php
defined('YII_ENV') || define('YII_ENV', getenv('APP_ENV')?:'prod');
defined('YII_DEBUG') || define('YII_DEBUG', YII_ENV == 'dev');

define('YZ_APP_DIR',__DIR__.'/../app');
define('YZ_VENDOR_DIR',__DIR__.'/../app/vendor');

require(YZ_VENDOR_DIR . '/autoload.php');
require(YZ_VENDOR_DIR . '/yiisoft/yii2/yii/Yii.php');

$config = require YZ_APP_DIR . '/configs/backend.php';

$application = new yii\web\Application($config);
$application->run();