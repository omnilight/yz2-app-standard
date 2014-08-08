<?php

namespace yz2app\carcass;

use Composer\Script\Event;

/**
 * Class Configurator
 * @package \yz2app\carcass
 */
class Configurator
{
    const VAGRANTFILE_FILENAME = 'Vagrantfile';
    const APACHE_VHOST_FILENAME = 'carcass/vagrant/app.apache2.conf';

    public static function postCreateProject(Event $event)
    {
        $io = $event->getIO();
        $vagrantVMName = $io->ask("Define name of the vagrant virtual machine name [yz2-app-standard]: ", 'yz2-app-standard');
        $vagrantServerName = $io->ask("Define name of the vagrant server name [yz2appstandard.dev]: ", 'yz2appstandard.dev');

        $basedir = dirname(dirname(__FILE__));

        $vagrantfile = $basedir . '/' . self::VAGRANTFILE_FILENAME;
        $apache = $basedir . '/' . self::APACHE_VHOST_FILENAME;

        $replacements = [
            $vagrantfile => [
                '#VAGRANT_VM_NAME#' => $vagrantVMName,
            ],
            $apache => [
                '#VAGRANT_SERVER_NAME#' => $apache,
            ]
        ];

        foreach ($replacements as $fileName => $list) {
            $content = file_get_contents($fileName);
            $content = strtr($content, $list);
            file_put_contents($fileName, $content);
        }
    }
} 