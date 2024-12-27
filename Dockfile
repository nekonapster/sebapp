# Usa una imagen base de PHP con soporte FPM
FROM php:8.2-fpm

# Instala dependencias del sistema necesarias para extensiones
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

# Instala Composer
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

# Establece el directorio de trabajo
WORKDIR /var/www/html

# Copia el archivo composer.json y composer.lock al contenedor
COPY composer.json composer.lock ./

# Instala las dependencias de Composer
RUN composer install --no-dev --optimize-autoloader

# Copia el resto de los archivos de tu aplicación al contenedor
COPY . .

# Establece permisos correctos para storage y bootstrap/cache
RUN chown -R www-data:www-data storage bootstrap/cache \
    && chmod -R 775 storage bootstrap/cache

# Expone el puerto 8000 para Laravel
EXPOSE 8000

# Instala Node.js y npm
RUN curl -fsSL https://deb.nodesource.com/setup_16.x | bash - \
    && apt-get install -y nodejs

# Instala dependencias de npm y compila assets
RUN npm install && npm run build

# Comando por defecto para ejecutar Laravel
CMD ["php", "artisan", "serve", "--host=0.0.0.0", "--port=8000"]

