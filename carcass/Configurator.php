<?php

namespace yz2app\carcass;

use Composer\Script\Event;

/**
 * Class Configurator
 * @package \yz2app\carcass
 */
class Configurator
{
    protected static $_questions = [
        '#vagrantVMName#' => ['Define name of the vagrant virtual machine [#DEFAULT#]: ', 'yz2-app-standard'],
        '#vagrantDomainName#' => ['Define domain of the vagrant server [#DEFAULT#]: ', 'yz2appstandard.dev'],
    ];

    protected static $_replacements = [
        'Vagrantfile' => [
            '#VAGRANT_VM_NAME#' => '#vagrantVMName#',
        ],
        'carcass/vagrant/app.apache2.conf' => [
            '#VAGRANT_SERVER_NAME#' => '#vagrantDomainName#',
        ]
    ];

    /**
     * Executes after composer's create-project command
     * @param Event $event
     */
    public static function postCreateProject(Event $event)
    {
        $io = $event->getIO();

        $basedir = dirname(dirname(__FILE__));

        $variables = [];
        foreach (self::$_questions as $varName => $question) {
            $variables[$varName] = $io->ask(strtr($question[0], [
                '#DEFAULT#' => $question[1]
            ]), $question[1]);
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