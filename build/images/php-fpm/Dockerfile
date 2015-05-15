FROM php:5.6-fpm

MAINTAINER Pavel Agalecky <pavel.agalecky@gmail.com>

# Install php5 modules
RUN apt-get update && \
    apt-get install -y \
        php5-gd \
        php5-intl \
        php5-curl \
        php5-mcrypt \
        zlib1g-dev \
        --no-install-recommends && \
    rm -r /var/lib/apt/lists/*

RUN docker-php-ext-install \
    pdo_mysql \
    zip \
    mbstring