FROM php:8.4

RUN apt-get update && apt-get install zip unzip
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer
RUN pecl install xdebug && docker-php-ext-enable xdebug
RUN rm /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini
ADD config/conf.d/docker-php-ext-xdebug.ini /usr/local/etc/php/conf.d
RUN rm /usr/local/etc/php/php.ini-development
ADD config/php.ini-development /usr/local/etc/php
RUN mkdir -p /app
WORKDIR /app
