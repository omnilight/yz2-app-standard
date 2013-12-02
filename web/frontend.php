<?php
defined('YII_DEBUG') or define('YII_DEBUG', true);
defined('YII_ENV') or define('YII_ENV', 'dev');

defined('YII_ENV') || define('YII_ENV', getenv('APP_ENV')?:'prod');
defined('YII_DEBUG') || define('YII_DEBUG', YII_ENV == 'dev');

define('YZ_ROOT',dirname(__FILE__));
define('YZ_APP_DIR',YZ_ROOT.'/../protected');
define('YZ_VENDOR_DIR',YZ_ROOT.'/../protected/vendor');

require(YZ_VENDOR_DIR . '/autoload.php');
require(YZ_VENDOR_DIR . '/yiisoft/yii2/yii/Yii.php');

$config = \yii\helpers\ArrayHelper::merge(
    require(YZ_APP_DIR . '/configs/common.php'),
    require(YZ_APP_DIR . '/configs/frontend.php')
);

$application = new yii\web\Application($config);
$application->run();