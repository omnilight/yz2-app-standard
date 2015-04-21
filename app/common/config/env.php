<?php

Dotenv::load(YZ_BASE_DIR);

Dotenv::required('YII_DEBUG', ['', '0', '1', 'true', true]);
Dotenv::required('YII_ENV',['dev','prod','test']);
Dotenv::required(['YII_TRACE_LEVEL']);

Dotenv::setEnvironmentVariable('DATABASE_DSN', 'mysql:host={$DB_PORT_3306_TCP_ADDR};port={$DB_PORT_3306_TCP_PORT};dbname={$MYSQL_DATABASE}');
Dotenv::setEnvironmentVariable('DATABASE_USER', '{$MYSQL_USER}');
Dotenv::setEnvironmentVariable('DATABASE_PASSWORD', '{$MYSQL_PASSWORD}');

if (file_exists(YZ_BASE_DIR.'/version')) {
    Dotenv::setEnvironmentVariable('APP_VERSION', file_get_contents(YZ_BASE_DIR.'/version'));
} else {
    Dotenv::setEnvironmentVariable('APP_VERSION', 'unknown');
}
