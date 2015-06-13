<?php

/**
 * Aliases configuration
 *
 * All aliases that are used in application are placed here
 */

// Aliases to applications
Yii::setAlias('common', dirname(dirname(__DIR__)) . '/common');
Yii::setAlias('frontend', dirname(dirname(__DIR__)) . '/frontend');
Yii::setAlias('backend', dirname(dirname(__DIR__)) . '/backend');
Yii::setAlias('console', dirname(dirname(__DIR__)) . '/console');

// Modules
Yii::setAlias('modules', dirname(dirname(__DIR__)) . '/modules');

// Application migrations
Yii::setAlias('migrations', dirname(dirname(__DIR__)) . '/migrations');

// Data
Yii::setAlias('data',  dirname(dirname(dirname(__DIR__))) . '/data');

// Web
Yii::setAlias('frontendWebroot', dirname(dirname(dirname(__DIR__))) . '/web/frontend');
Yii::setAlias('backendWebroot', dirname(dirname(dirname(__DIR__))) . '/web/backend');
Yii::setAlias('frontendWeb', getenv('FRONTEND_WEB'));
Yii::setAlias('backendWeb', getenv('BACKEND_WEB'));


/**
 * Configuration of the dependency injector container (DI)
 *
 */


// Example:
//Yii::$container->set('acme\DummyInterface', 'acme\DummyClass');