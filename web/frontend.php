<?php

// Checking for development mode
if(is_file(dirname(__FILE__).'/.devenv') || getenv('YZ_APP_ENV') == 'dev') {
    define('DEV_ENV',true);
    defined('YII_DEBUG') or define('YII_DEBUG', true);
    defined('YII_ENV') or define('YII_ENV', 'dev');
}

define('YZ_ROOT',dirname(__FILE__));
define('YZ_APP_DIR',YZ_ROOT.'/../protected');
define('YZ_VENDOR_DIR',YZ_ROOT.'/../protected/vendor');

require(YZ_VENDOR_DIR . '/autoload.php');
require(YZ_VENDOR_DIR . '/yiisoft/yii2/yii/Yii.php');

$config = require(YZ_APP_DIR.'/config/web.php');

$application = new yii\web\Application($config);
$application->run();