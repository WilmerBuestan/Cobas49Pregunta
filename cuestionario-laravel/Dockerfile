# Usamos la imagen oficial de PHP con Apache
FROM php:8.2-apache

# Instalamos extensiones de PHP necesarias
RUN apt-get update && apt-get install -y \
    unzip curl git libzip-dev \
    && docker-php-ext-install zip pdo pdo_mysql

# Instalamos Composer manualmente
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Configuramos el directorio de trabajo en Apache
WORKDIR /var/www/html

# Copiamos los archivos del proyecto
COPY . .

# Instalamos las dependencias de Laravel
RUN composer install --no-dev --optimize-autoloader

# Configuramos permisos adecuados
RUN chmod -R 777 storage bootstrap/cache

# Exponemos el puerto 8080
EXPOSE 8080

# Comando de inicio para Laravel
CMD ["php", "artisan", "serve", "--host=0.0.0.0", "--port=8080"]
