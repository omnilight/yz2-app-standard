<?php

$modules = [

];

if(YII_ENV_DEV) {
    $modules['debug'] = 'yii\debug\Module';
}

return $modules;