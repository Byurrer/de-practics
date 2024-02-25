# syntax=docker/dockerfile:1

FROM php:8.2-fpm

ENV COMPOSER_ALLOW_SUPERUSER=1

COPY php.ini /usr/local/etc/php/conf.d/php.ini

RUN apt update && apt install -y mc nano git \
    && docker-php-ext-install pdo_mysql mysqli

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

ADD https://github.com/Byurrer/de-lemp-php.git /app

WORKDIR /app

RUN composer install
