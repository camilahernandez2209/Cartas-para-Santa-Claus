FROM php:8.2-apache

RUN apt-get update && apt-get install -y \
    && docker-php-ext-install pdo pdo_mysql \
    && apt-get clean \
    && rm -rf /var/lib/apt/lists/*

RUN sed -i 's/Listen 80/Listen 10000/' /etc/apache2/ports.conf \
    && sed -i 's/*:80/*:10000/' /etc/apache2/sites-available/000-default.conf

EXPOSE 10000
