<?php

namespace console\controllers;

use console\base\Controller;
use yii\helpers\Console;


/**
 * Class ConfigurationController
 * @package \console\controllers
 */
class ConfigurationController extends Controller
{
    public $cookieValidationKeyPath = [
        '@frontend/config/main.php',
        '@backend/config/main.php',
    ];

    public function actionInitial()
    {
        Console::output("Applying migrations...");

        \Yii::$app->runAction('migrate', [
            'interactive' => $this->interactive ? 1 : 0,
        ]);

        Console::output("All configuration is done!");
    }

    public function actionGenerateCookieKey()
    {
        if ($this->confirm("Generate cookieValidationKey?")) {
            foreach ($this->cookieValidationKeyPath as $path) {
                $key = \Yii::$app->security->generateRandomString(64);
                $file = \Yii::getAlias($path);
                $content = preg_replace('/(("|\')cookieValidationKey("|\')\s*=>\s*)(""|\'\')/', "\\1'$key'", file_get_contents($file));
                file_put_contents($file, $content);
                Console::output("Generated file " . $path);
            }
        }
    }
}