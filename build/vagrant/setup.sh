#!/usr/bin/env bash

# Update package
sudo apt-get update

# Preparing answers for automatic install
debconf-set-selections <<< "mysql-server mysql-server/root_password password yz2app"
debconf-set-selections <<< "mysql-server mysql-server/root_password_again password yz2app"

# Install libraries
apt-get install -y \
    mysql-server mysql-client \
    nginx \
    php5 php5-fpm \
    php-pear php5-dev \
    php5-mysqlnd php5-curl php5-gd php5-intl \
    php5-mcrypt php5-memcached php5-sqlite \
    git mc le

# Install xdebug
sudo pecl install xdebug

xdebug=`find / -name "xdebug.so" 2>/dev/null`
cat /vagrant/build/vagrant/configs/xdebug.conf >> /etc/php5/fpm/php.ini
echo zend_extension="$xdebug" >> /etc/php5/fpm/php.ini
cat /vagrant/build/vagrant/configs/xdebug.conf >> /etc/php5/cli/php.ini
echo zend_extension="$xdebug" >> /etc/php5/cli/php.ini

# Install docker
wget -q -O - https://get.docker.io/gpg | apt-key add -
echo deb http://get.docker.io/ubuntu docker main > /etc/apt/sources.list.d/docker.list
apt-get update -qq; apt-get install -q -y --force-yes lxc-docker

# Add vagrant user to docker group
gpasswd -a vagrant docker

# Install docker-compose
curl -L https://github.com/docker/compose/releases/download/1.2.0/docker-compose-`uname -s`-`uname -m` > /usr/local/bin/docker-compose
chmod +x /usr/local/bin/docker-compose

# Configuration of the VM

cd /vagrant

# Creating database
mysql -u root -pyz2app -e "create database if not exists yz2app";

# Configuring nginx
rm /etc/nginx/sites-available/default
cp build/vagrant/configs/nginx.conf /etc/nginx/sites-available/default


# Restarting services
service nginx restart
service mysql restart

# Configure application
cd /vagrant/app/bin

echo "Appling migrations"
php yii migrate --interactive=0
echo "Creating default admin"
php yii admin-users/create-default-admin
