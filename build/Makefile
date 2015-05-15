
default: build

all: build

build: php-fpm php-cli nginx

remove: remove-php-fpm remove-php-cli remove-nginx

php-fpm:
	docker build -t yz2app/php:5.6-fpm images/php-fpm

remove-php-fpm:
	docker rmi -f yz2app/php:5.6-fpm

php-cli:
	docker build -t yz2app/php:5.6-cli images/php-cli

remove-php-cli:
	docker rmi -f yz2app/php:5.6-cli

nginx:
	docker build -t yz2app/nginx:1.7 images/nginx

remove-nginx:
	docker rmi -f yz2app/nginx:1.7

