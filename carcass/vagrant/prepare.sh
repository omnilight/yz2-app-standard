#!/usr/bin/env bash

# Note that this setup script is written with Ubuntu distro in mind.
# Specifically, "precise64" box distributed directly from Vagrant project, which is Ubuntu 12.04.
# You have to carefully check all non-`/vagrant` paths here if you use a custom box.

DB_PASS=mysqlroot
DB_NAME=yz2app

# We are going to install packages here
sudo apt-get update

# We want PHP 5.4 on Ubuntu 12.04, adding PPA for it
sudo apt-get install -y python-software-properties
sudo add-apt-repository ppa:ondrej/php5

# Updating repo index after adding PPA
sudo apt-get update

# Preparing answers for automatic install
debconf-set-selections <<< "mysql-server mysql-server/root_password password ${DB_PASS}"
debconf-set-selections <<< "mysql-server mysql-server/root_password_again password ${DB_PASS}"

# Getting updated list of packages
apt-get update

# Installing software
# `apache php5` is obvious
# `vim mysql-client` is for ease of using the VM through `vagrant ssh`
# `php5-curl` is a requirement for Goutte library required by Mink Selenium driver
# `git` is required because we will use Composer from inside Vagrant VM
apt-get install -y apache2 php5 \
                    php5-dev php-pear php5-curl php5-intl php5-gd  php5-mysqlnd php5-mcrypt \
 					vim mysql-client mysql-server git le mc
sudo pecl install xdebug

xdebug=`find / -name "xdebug.so" 2>/dev/null`
cat /vagrant/carcass/vagrant/xdebug.conf >> /etc/php5/apache2/php.ini
echo zend_extension="$xdebug" >> /etc/php5/apache2/php.ini
cat /vagrant/carcass/vagrant/xdebug.conf >> /etc/php5/cli/php.ini
echo zend_extension="$xdebug" >> /etc/php5/cli/php.ini

# Has to remove default virtual host listening on 80 port (HAS to be done before restarting Apache)
rm -rf /etc/apache2/sites-enabled/*

# Enabling mod_rewrite on server
## `cd` is just for symlink to have same format as others inside `mods-enabled/`
cd /etc/apache2/mods-enabled/
ln -s ../mods-available/rewrite.load rewrite.load

# Make the apache load under our user account.
sed -ri 's/^(export APACHE_RUN_USER=)(.*)$/\1vagrant/' /etc/apache2/envvars
sed -ri 's/^(export APACHE_RUN_GROUP=)(.*)$/\1vagrant/' /etc/apache2/envvars

# Shut up Apache spouting nonsense about ServerName not defined.
touch /etc/apache2/conf-available/globalname.conf
echo "ServerName yii2app" > /etc/apache2/conf-available/globalname.conf
cd /etc/apache2/conf-enabled
ln -s ../conf-available/globalname.conf globalname.conf

# Creating database
mysql -u root -p${DB_PASS} -e "create database if not exists ${DB_NAME}";