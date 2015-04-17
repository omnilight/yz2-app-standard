<?php

Dotenv::load(dirname(dirname(__DIR__)));

Dotenv::required('YII_DEBUG', ['', '0', '1', 'true', true]);
Dotenv::required('YII_ENV',['dev','prod','test']);
Dotenv::required(['YII_TRACE_LEVEL']);
Dotenv::required(['APP_NAME']);
Dotenv::required(['DATABASE_DSN','DATABASE_USER','DATABASE_PASSWORD']);

if (file_exists(dirname(dirname(__DIR__)).'/version')) {
    Dotenv::setEnvironmentVariable('APP_VERSION', file_get_contents(dirname(dirname(__DIR__)).'/version'));
} else {
    Dotenv::setEnvironmentVariable('APP_VERSION', 'unknown');
}
