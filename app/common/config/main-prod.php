<?php

return [
    'components' => [
        'cache' => [
            'class' => yii\caching\DummyCache::class,
            //'class' => yii\caching\FileCache::class,
            //'class' => yii\caching\MemCache::class,
        ],
    ]
];