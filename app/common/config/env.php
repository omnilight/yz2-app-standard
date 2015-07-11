<?php

Dotenv::load(YZ_BASE_DIR);

Dotenv::required('YII_DEBUG', ['', '0', '1', 'true', true]);
Dotenv::required('YII_ENV',['dev','prod','test']);
Dotenv::required(['YII_TRACE_LEVEL']);

