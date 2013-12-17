<?php

$vendorDir = dirname(__DIR__);

return array (
  'yiisoft/yii2-debug' => 
  array (
    'name' => 'yiisoft/yii2-debug',
    'version' => '9999999-dev',
    'alias' => 
    array (
      '@yii/debug' => $vendorDir . '/yiisoft/yii2-debug/yii/debug',
    ),
  ),
  'yiisoft/yii2-gii' => 
  array (
    'name' => 'yiisoft/yii2-gii',
    'version' => '9999999-dev',
    'alias' => 
    array (
      '@yii/gii' => $vendorDir . '/yiisoft/yii2-gii/yii/gii',
    ),
  ),
  'kartik-v/yii2-widgets' => 
  array (
    'name' => 'kartik-v/yii2-widgets',
    'version' => '9999999-dev',
    'alias' => 
    array (
      '@kartik' => $vendorDir . '/kartik-v/yii2-widgets/kartik',
    ),
  ),
  'omnilight/yz2-gii' => 
  array (
    'name' => 'omnilight/yz2-gii',
    'version' => '9999999-dev',
    'alias' => 
    array (
      '@yz/gii' => $vendorDir . '/omnilight/yz2-gii/yz/gii',
    ),
    'bootstrap' => 'yz\\admin\\Extension',
  ),
  'yiisoft/yii2-bootstrap' => 
  array (
    'name' => 'yiisoft/yii2-bootstrap',
    'version' => '9999999-dev',
    'alias' => 
    array (
      '@yii/bootstrap' => $vendorDir . '/yiisoft/yii2-bootstrap/yii/bootstrap',
    ),
  ),
  'omnilight/yz2' => 
  array (
    'name' => 'omnilight/yz2',
    'version' => '9999999-dev',
    'alias' => 
    array (
      '@yz' => $vendorDir . '/omnilight/yz2/yz',
    ),
    'bootstrap' => 'yz\\admin\\Extension',
  ),
  'omnilight/yz2-admin' => 
  array (
    'name' => 'omnilight/yz2-admin',
    'version' => '9999999-dev',
    'alias' => 
    array (
      '@yz/admin' => $vendorDir . '/omnilight/yz2-admin/yz/admin',
    ),
    'bootstrap' => 'yz\\admin\\Extension',
  ),
);
