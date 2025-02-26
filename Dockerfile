# Базовый образ с Apache и PHP 8.2
FROM php:8.2-apache

# Установка расширений PHP
RUN docker-php-ext-install pdo pdo_mysql

# Копирование конфигурации Apache
COPY ./apache-config.conf /etc/apache2/sites-available/000-default.conf

# Включение модуля mod_rewrite для Laravel
RUN a2enmod rewrite

# Установка рабочей директории
WORKDIR /var/www/html

# Копирование кода приложения
COPY . /var/www/html

# Установка прав доступа
RUN chown -R www-data:www-data /var/www/html