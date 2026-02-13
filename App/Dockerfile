FROM php:8.4-fpm

# Directorio de trabajo
WORKDIR /var/www

# Instalar dependencias del sistema
RUN apt-get update && apt-get install -y \
    git \
    unzip \
    libzip-dev \
    zip \
    curl \
    libonig-dev \
    libxml2-dev \
    && docker-php-ext-install pdo pdo_mysql mbstring bcmath xml zip \
    && apt-get clean \
    && rm -rf /var/lib/apt/lists/*

# Instalar Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Copiar archivos del proyecto
COPY ./src/laravel /var/www

# Establecer permisos correctos
RUN chown -R www-data:www-data /var/www \
    && chmod -R 755 /var/www/storage \
    && chmod -R 755 /var/www/bootstrap/cache

# Instalar dependencias de Composer
RUN composer install --no-dev --optimize-autoloader --no-interaction

# Exponer puerto
EXPOSE 9000

# Comando por defecto
CMD ["php-fpm"]