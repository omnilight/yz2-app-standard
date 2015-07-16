<?php

$dotEnv = new \Dotenv\Dotenv(YZ_BASE_DIR);
$dotEnv->load();

// Place required env variables here
$dotEnv->required([
    'DB_DSN',
]);


