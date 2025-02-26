FROM php:8.2-apache

# Install dependencies
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

# Copy composer.lock and composer.json
COPY composer.lock composer.json ./

# Install dependencies
RUN composer install --no-scripts --no-autoloader
RUN composer dumpautoload -o
RUN composer run-script post-root-package-install
RUN composer run-script post-create-project-cmd

# Copy application code
COPY . .

# Configure Apache
RUN a2enmod rewrite

# Set permissions for storage and bootstrap/cache directories
RUN chown -R www-data:www-data /var/www/html/storage
RUN chown -R www-data:www-data /var/www/html/bootstrap/cache

# Expose port 80
EXPOSE 80