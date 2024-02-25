FROM php:8.2-cli

COPY php.ini /usr/local/etc/php/conf.d/php.ini

RUN apt update && apt install -y mc nano git \
    && docker-php-ext-install pdo_mysql mysqli

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

ENTRYPOINT ["php"]
