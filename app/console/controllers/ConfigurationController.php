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
    public $migrationPath = [
        '@yz/migrations',
        '@yz/admin/migrations',
        '@migrations',
    ];

    public $cookieValidationKeyPath = [
        '@frontend/config/main.php',
        '@backend/config/main.php',
    ];

    /**
     * @var string Regular expression for searching cookie key. Should be in the form
     * (start_delimiter)(key)(end_delimiter)
     */
    public $cookieValidationKeyRegExp = '#(/\* COOKIE_KEY_BEGIN \*/)([^/]*)(/\* COOKIE_KEY_END \*/)#';

    public function actionInitial()
    {
        Console::output("Applying migrations...");

        foreach ($this->migrationPath as $path) {
            \Yii::$app->runAction('migrate', [
                'migrationPath' => $path,
                'interactive' => $this->interactive ? 1 : 0,
            ]);
        }

        \Yii::$app->runAction('configuration/generate-cookie-key', [
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
                $exported = var_export($key, true);
                $configContent = file_get_contents($file);
                $configContent = preg_replace_callback($this->cookieValidationKeyRegExp, function ($matches) use ($exported) {
                    return $matches[1] . $exported . $matches[3];
                }, $configContent);
                file_put_contents($file, $configContent);
                Console::output("Generated file " . $path);
            }
        }
    }
}