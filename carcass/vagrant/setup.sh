#!/usr/bin/env bash

# Moving to codebase root now
cd /vagrant

# Firing up the Composer to install thirdparty libraries
php composer.phar install

# Note that all binaries will be installed into `bin/` under ROOT_DIR
# including phpunit, behat, phing and yiic

# Preparing the server log directories (MUST be done before starting Apache)
# Folders should be writable by server process
mkdir app/runtime/app_logs

# Setting up two hosts for apache (port-based virtual hosts)
cp /vagrant/carcass/vagrant/app.apache2.conf /etc/apache2/sites-enabled/
/etc/init.d/apache2 restart

# Init the database with rudimentary init data
php yii migrate --migrationPath="@yz/migrations" --interactive=0
php yii migrate --migrationPath="@yz/admin/migrations" --interactive=0

echo "Bootstrap script has been ended";