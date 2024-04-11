FROM php:8.3.2-fpm

RUN apt-get update && apt-get install -y \
    git \
    unzip \
    libpq-dev \
    && docker-php-ext-install pdo pdo_pgsql

RUN apt-get update && docker-php-ext-install pdo_mysql

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

ENV COMPOSER_ALLOW_SUPERUSER=1

RUN usermod -u 1000 www-data

RUN chmod -R 755 /var/*

WORKDIR /var/www

COPY . .

RUN cd /var/www

RUN composer install

# Execute as migrações do Laravel
#RUN php artisan migrate

EXPOSE 9000

CMD ["php", "artisan", "serve", "--host", "0.0.0.0", "--port=9000"]




