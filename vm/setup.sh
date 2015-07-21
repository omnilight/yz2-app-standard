#!/usr/bin/env bash

frontend_host=$(echo "$1")
backend_host=$(echo "$2")

# Update package
sudo apt-get update


# Configuring locales
update-locale LC_ALL="C"
dpkg-reconfigure locales

# Preparing answers for automatic install
debconf-set-selections <<< "mysql-server mysql-server/root_password password root"
debconf-set-selections <<< "mysql-server mysql-server/root_password_again password root"

# Install libraries
apt-get install -y \
    mysql-server mysql-client \
    nginx \
    php5 php5-fpm \
    php-pear php5-dev \
    php5-mysqlnd php5-curl php5-gd php5-intl \
    php5-mcrypt php5-memcached php5-sqlite \
    php5-xdebug \
    git mc le

php5enmod mcrypt

# Configure libraries
if ! grep --quiet '^xdebug.remote_enable = on$' /etc/php5/mods-available/xdebug.ini; then
    (
     echo "xdebug.remote_enable = on";
     echo "xdebug.remote_connect_back = on";
     echo "xdebug.remote_host = 192.168.7.1";
     echo "xdebug.idekey = \"PHPSTORM\"";
    ) >> /etc/php5/mods-available/xdebug.ini
fi

# Configuration of the VM

cd /vagrant

# Creating database
mysql -u root -proot -e "create database if not exists yz2app";

# Configuring nginx
rm /etc/nginx/sites-available/default
cp build/configs/nginx.conf /etc/nginx/sites-available/yz2app
sed -i 's/<frontend_host>/${frontend_host}/' /etc/nginx/sites-available/yz2app
sed -i 's/<backend_host>/${backend_host}/' /etc/nginx/sites-available/yz2app

# Setup environment
cp .env.dist .env
sed -i 's/<frontend_host>/${frontend_host}/' .env
sed -i 's/<backend_host>/${backend_host}/' .env

# Restarting services
service nginx restart
service mysql restart
service php5-fpm restart

# Configure application
cd /vagrant

# Setup project
php yii app/setup
php yii migrate --interactive=0
php yii admin-users/create-default-admin
