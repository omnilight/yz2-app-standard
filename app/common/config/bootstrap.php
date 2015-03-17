<?php

Yii::setAlias('common', dirname(dirname(__DIR__)) . '/common');
Yii::setAlias('frontend', dirname(dirname(__DIR__)) . '/frontend');
Yii::setAlias('backend', dirname(dirname(__DIR__)) . '/backend');
Yii::setAlias('console', dirname(dirname(__DIR__)) . '/console');
Yii::setAlias('modules', dirname(dirname(__DIR__)) . '/modules');
Yii::setAlias('migrations', dirname(dirname(__DIR__)) . '/migrations');

// Web
Yii::setAlias('frontendWebroot', dirname(dirname(dirname(__DIR__))) . '/web/frontend');
Yii::setAlias('backendWebroot', dirname(dirname(dirname(__DIR__))) . '/web/backend');


// Environment specific settings
switch (YII_ENV) {
    case YII_ENV_DEV:
        Yii::setAlias('frontendWeb', 'http://localhost:8880/');
        Yii::setAlias('backendWeb', 'http://localhost:8880/backend');
        break;
    case YII_ENV_PROD:
        Yii::setAlias('frontendWeb', 'http://localhost');
        Yii::setAlias('backendWeb', 'http://backend.localhost');
        break;
}