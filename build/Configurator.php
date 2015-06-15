<?php

namespace yz2app\build;

use Composer\Script\Event;

/**
 * Class Configurator
 * @package \yz2app\carcass
 */
class Configurator
{
    protected static $_questions = [
        '#vagrantVMName#' => ['Define name of the vagrant virtual machine [#DEFAULT#]: ', 'yz2app'],
        '#frontendHost#' => ['Define frontend host [#DEFAULT#]: ', 'yz2app.192.168.7.6.xip.io'],
        '#backendHost#' => ['Define backend host [#DEFAULT#]: ', 'backend.#frontendHost#'],
    ];

    protected static $_replacements = [
        'Vagrantfile' => [
            '#VAGRANT_VM_NAME#' => '#vagrantVMName#',
        ],
        'build/vagrant/configs/nginx.conf' => [
            '#FRONTEND_HOST#' => '#frontendHost#',
            '#BACKEND_HOST#' => '#backendHost#',
        ],
        '.env-dist' => [
            '#FRONTEND_HOST#' => '#frontendHost#',
            '#BACKEND_HOST#' => '#backendHost#',
        ],
    ];

    /**
     * Executes after composer's create-project command
     * @param Event $event
     */
    public static function postCreateProject(Event $event)
    {
        self::configureVariables($event);
    }

    protected static function configureVariables(Event $event)
    {
        $io = $event->getIO();

        $basedir = dirname(dirname(__FILE__));

        $variables = [];
        foreach (self::$_questions as $varName => $question) {
            $variables[$varName] = strtr($io->ask(strtr($question[0], [
                '#DEFAULT#' => isset($question[1]) ? strtr($question[1], $variables) : '',
            ]), $question[1]), $variables);
        }

        foreach (self::$_replacements as $fileName => $replacements) {
            $realName = $basedir . '/' . $fileName;
            if (!file_exists($realName)) {
                $io->write('File ' . $fileName . ' does not exist!');
                continue;
            }

            $replacements = array_combine(array_keys($replacements), array_map(function ($item) use ($variables) {
                return strtr($item, $variables);
            }, array_values($replacements)));

            $content = file_get_contents($realName);
            $content = strtr($content, $replacements);
            file_put_contents($realName, $content);
        }
    }
} 