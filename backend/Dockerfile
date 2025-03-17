
FROM php:8.0-apache

# Enable mod_rewrite 
RUN a2enmod rewrite


WORKDIR /var/www/html


COPY . /var/www/html/


RUN docker-php-ext-install pdo pdo_mysql


EXPOSE 80
