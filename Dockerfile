# Usa una imagen base de PHP con soporte FPM
FROM php:8.2-fpm

# Instala dependencias del sistema necesarias para extensiones de PHP
RUN apt-get update && apt-get install -y \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    libonig-dev \
    libxml2-dev \
    zlib1g-dev \
    libzip-dev \
    unzip \
    git \
    curl \
    && docker-php-ext-install gd zip opcache

# Instala la extensión de MongoDB
RUN pecl install mongodb \
    && docker-php-ext-enable mongodb

# Instala Composer (última versión)
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

# Establece el directorio de trabajo
WORKDIR /var/www/html

# Copia los archivos del proyecto al contenedor
COPY . .

# Instala las dependencias de Composer
RUN composer install --no-dev --optimize-autoloader --no-scripts

# Ejecuta los scripts de post-instalación de Composer
RUN composer run-script post-autoload-dump

# Genera el archivo de clave de aplicación
RUN php artisan key:generate

# Ajusta permisos para directorios importantes
RUN chown -R www-data:www-data storage bootstrap/cache \
    && chmod -R 775 storage bootstrap/cache

# Expone el puerto en el que Laravel servirá la aplicación
EXPOSE 8000

# Comando por defecto para ejecutar Laravel
CMD ["php", "artisan", "serve", "--host=0.0.0.0", "--port=8000"]
