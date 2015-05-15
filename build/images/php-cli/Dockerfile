FROM php:5.6-cli

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

# Install composer
ENV PATH /root/.composer/vendor/bin:$PATH
RUN curl -sS https://getcomposer.org/installer | php && \
    mv composer.phar /usr/local/bin/composer && \
    composer global require "fxp/composer-asset-plugin:1.0.0" && \
    composer global dumpautoload --optimize