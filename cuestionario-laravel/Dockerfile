# Usamos la imagen oficial de PHP con Apache
FROM php:8.2-apache

# Instalamos extensiones necesarias
RUN apt-get update && apt-get install -y \
    libzip-dev unzip curl && docker-php-ext-install zip pdo pdo_pgsql

# Instalamos Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Copiamos los archivos del proyecto
WORKDIR /var/www/html
COPY . .

# Damos permisos de ejecución al entrypoint
RUN chmod +x /var/www/html/entrypoint.sh

# Instalamos dependencias de Laravel
RUN composer install --no-dev --optimize-autoloader

# Configuramos permisos adecuados
RUN chmod -R 777 storage bootstrap/cache

# Configuramos el punto de entrada
ENTRYPOINT ["/bin/sh", "/var/www/html/entrypoint.sh"]
CMD ["php", "artisan", "serve", "--host=0.0.0.0", "--port=8080"]
