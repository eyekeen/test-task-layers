FROM php:8.2-apache

RUN apt-get update && apt-get install -y \
    libpng-dev \
    libonig-dev \
    git \
    curl \
    libzip-dev \
    zip \
    unzip \
    && docker-php-ext-install pdo_mysql mbstring zip exif pcntl \
    && pecl install xdebug \
    && docker-php-ext-enable xdebug

WORKDIR /var/www/html

COPY . .

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

RUN composer install --no-scripts --no-autoloader
RUN composer dumpautoload -o
RUN composer run-script post-root-package-install
RUN composer run-script post-create-project-cmd