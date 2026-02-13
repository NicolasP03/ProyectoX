# Usamos PHP 8.4
FROM php:8.4-cli

WORKDIR /var/www

RUN apt-get update && apt-get install -y \
    git unzip libzip-dev zip \
    && docker-php-ext-install pdo pdo_mysql

# Copiamos composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

CMD php artisan serve --host=0.0.0.0 --port=8000
