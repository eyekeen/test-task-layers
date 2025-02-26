# Используем официальный образ PHP 8.2 с Apache
FROM php:8.2-apache

# Устанавливаем необходимые расширения PHP
RUN apt-get update && apt-get install -y \
    libzip-dev \
    zip \
    unzip \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    git \
    curl \
    && docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd

# Установка Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Настройка Apache
RUN a2enmod rewrite

# Копируем конфигурацию Apache в контейнер
COPY apache-config.conf /etc/apache2/sites-available/000-default.conf

# Устанавливаем рабочую директорию
WORKDIR /var/www/html

# Копируем исходный код приложения в контейнер
COPY . .

# Устанавливаем права доступа
RUN chown -R www-data:www-data /var/www/html \
    && chmod -R 775 /var/www/html/storage \
    && chmod -R 775 /var/www/html/bootstrap/cache

# Установка зависимостей через Composer
RUN composer install --optimize-autoloader --no-dev

# Открываем порт для Apache
EXPOSE 80