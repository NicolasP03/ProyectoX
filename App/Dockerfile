FROM php:8.1-fpm

# Instalar dependencias del sistema y extensiones PHP necesarias
RUN apt-get update && apt-get install -y \
    git \
    curl \
    zip \
    unzip \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    libonig-dev \
    libzip-dev \
 && docker-php-ext-configure gd --with-freetype --with-jpeg \
 && docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd zip

# Instalar Composer
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

WORKDIR /var/www/html

# Copiar primero solo composer.json y composer.lock para aprovechar cache
COPY composer.json composer.lock ./

# Instalar dependencias de PHP
RUN composer install --no-interaction --prefer-dist --optimize-autoloader || true

# Copiar el resto del proyecto
COPY . .

# Crear carpetas necesarias y permisos
RUN mkdir -p storage bootstrap/cache \
 && chown -R www-data:www-data /var/www/html \
 && chmod -R 775 storage bootstrap/cache

EXPOSE 8000
CMD ["php-fpm"]
