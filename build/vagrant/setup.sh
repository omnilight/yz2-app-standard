#!/usr/bin/env bash

# Update package
sudo apt-get update

# Install libraries
apt-get install -y \
    php5 php-pear php5-curl php5-intl php5-gd \
    git mc le

# Install docker
wget -q -O - https://get.docker.io/gpg | apt-key add -
echo deb http://get.docker.io/ubuntu docker main > /etc/apt/sources.list.d/docker.list
apt-get update -qq; apt-get install -q -y --force-yes lxc-docker

# Add vagrant user to docker group
gpasswd -a vagrant docker

# Install docker-compose
curl -L https://github.com/docker/compose/releases/download/1.2.0/docker-compose-`uname -s`-`uname -m` > /usr/local/bin/docker-compose
chmod +x /usr/local/bin/docker-compose

sudo pecl install xdebug

xdebug=`find / -name "xdebug.so" 2>/dev/null`
cat /vagrant/carcass/vagrant/xdebug.conf >> /etc/php5/apache2/php.ini
echo zend_extension="$xdebug" >> /etc/php5/apache2/php.ini
cat /vagrant/carcass/vagrant/xdebug.conf >> /etc/php5/cli/php.ini
echo zend_extension="$xdebug" >> /etc/php5/cli/php.ini

# Building images for application
cd /vagrant/build && make all