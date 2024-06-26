FROM php:8.0-apache

RUN docker-php-ext-install pdo pdo_mysql
RUN docker-php-ext-enable pdo pdo_mysql
RUN pecl install mongodb && docker-php-ext-enable mongodb