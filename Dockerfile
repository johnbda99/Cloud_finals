FROM php:5.6.32-apache-jessie

COPY . /var/www/html/
RUN docker-php-ext-install mysqli && docker-php-ext-enable mysqli

EXPOSE 80
