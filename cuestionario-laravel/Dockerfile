# Usamos la imagen oficial de PHP con Apache
FROM php:8.2-apache

# Instalamos dependencias necesarias
RUN apt-get update && apt-get install -y \
    libpq-dev zip unzip curl && docker-php-ext-install \
    pdo pdo_pgsql

# Instalamos Composer globalmente
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Configuramos el directorio de trabajo
WORKDIR /var/www/html

# Copiamos los archivos del proyecto
COPY . .

# Instalamos dependencias de Laravel
RUN composer install --no-dev --optimize-autoloader

# Damos permisos a los directorios de Laravel
RUN chmod -R 777 storage bootstrap/cache

# EJECUTAR MIGRACIONES EN EL BUILD
RUN php artisan migrate --force

# Configuramos el punto de entrada
CMD ["php", "artisan", "serve", "--host=0.0.0.0", "--port=8080"]
