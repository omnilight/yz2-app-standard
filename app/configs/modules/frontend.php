<?php

$modules = [

];

return \yii\helpers\ArrayHelper::merge(
    (require __DIR__ . '/common.php'),
    $modules
);