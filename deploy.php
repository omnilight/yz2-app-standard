<?php

/**
 * Deploying recipe for deployer utility
 *
 * NOTE: you should add the following permission to the sudo file (with visudo command)
 *
 * user_name ALL=(ALL) NOPASSWD: /usr/bin/setfacl
 */

require 'recipe/common.php';

serverList('deploy/servers.yml');

/**
 * Do not use sudo to setup writable folders.
 * You should setup access to setfacl via sudoers file on the server
 */
set('writable_use_sudo', false);

set('repository', '<repo_url>');

set('shared_dirs', [
    'data',
    'app/frontend/runtime',
    'app/backend/runtime',
    'app/common/runtime',
    'app/console/runtime',
    'app/backend/web/media',
    'app/frontend/web/media',
]);

set('shared_files', [
    '.env',
]);

set('writable_dirs', [
    'data',
    'app/frontend/runtime',
    'app/backend/runtime',
    'app/common/runtime',
    'app/console/runtime',
    'app/backend/web/media',
    'app/frontend/web/media',
    'app/backend/web/assets',
    'app/frontend/web/assets',
]);

/**
 * Migrate database
 */
task('database:migrate', function () {
    run('php {{release_path}}/yii migrate/up --interactive=0');
})->desc('Migrate database');

/**
 * Saving version of the application
 */
task('save_version', function () {
    run ('cd {{release_path}} && git rev-parse --short HEAD > .version');
})->desc('Saving version');

task('prepare', [
    'deploy:prepare',
    'deploy:release',
    'deploy:update_code',
    'deploy:shared',
    'deploy:writable',
    'deploy:vendors',
    'deploy:symlink',
    'cleanup'
])->desc('Prepare library, using first time deploy');

task('deploy', [
    'deploy:prepare',
    'deploy:release',
    'deploy:update_code',
    'deploy:shared',
    'deploy:writable',
    'deploy:vendors',
    'database:migrate',
    'save_version',
    'deploy:symlink',
    'cleanup'
])->desc('Deploy');

after('deploy', 'success');


