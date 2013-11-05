<?php

$config = [

];

$config = \yii\helpers\ArrayHelper::merge(
    require(__DIR__ . '/common.php'),
    $config
);

return $config;