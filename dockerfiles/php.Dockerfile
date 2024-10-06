FROM php:8.1-fpm-alpine

WORKDIR /var/www/teamwork

RUN docker-php-ext-install pdo pdo_mysql

