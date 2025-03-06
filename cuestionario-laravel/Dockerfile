# Usamos una imagen de PHP con soporte para PostgreSQL y Composer
FROM php:8.2-fpm

# Instalamos dependencias del sistema necesarias para Laravel y PostgreSQL
RUN apt-get update && apt-get install -y \
    libpq-dev zip unzip curl && docker-php-ext-install \
    pdo pdo_pgsql

# Instalamos Composer globalmente
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Configuramos el directorio de trabajo
WORKDIR /var/www/html

# Copiamos los archivos del proyecto
COPY . .

# Damos permisos de ejecución al entrypoint
RUN chmod +x /var/www/html/entrypoint.sh

# Instalamos dependencias de Laravel
RUN composer install --no-dev --optimize-autoloader

# Damos permisos a los directorios de Laravel
RUN chmod -R 777 storage bootstrap/cache

# Configuramos el punto de entrada
ENTRYPOINT ["/bin/sh", "/var/www/html/entrypoint.sh"]
CMD ["php", "artisan", "serve", "--host=0.0.0.0", "--port=8080"]
