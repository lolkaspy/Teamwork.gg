FROM php:8.3-fpm-alpine

WORKDIR /var/www/teamwork

RUN apk --no-cache add \
        bash \
        imagemagick \
        imagemagick-dev \
        libtool \
        autoconf \
        gcc \
        g++ \
        make \
        && pecl install imagick \
        && docker-php-ext-enable imagick


RUN docker-php-ext-install pdo pdo_mysql

