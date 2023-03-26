FROM php:8.2-fpm

WORKDIR /var/www

RUN apt-get update && \
    apt-get install -y --no-install-recommends \
    libfreetype6-dev \
    libjpeg62-turbo-dev \
    libpng-dev \
    libpq-dev \
    libzip-dev && \
    apt-get install -y \
    git \
    unzip \
    zip \
    sqlite3 \
    openssh-client \
    redis \
    default-mysql-client && \
    apt-get clean && \
    rm -rf /var/lib/apt/lists/*

RUN chown -R www-data:www-data .
RUN docker-php-ext-install pdo pdo_mysql sockets bcmath zip pcntl posix

COPY . .
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer
COPY ./docker/dev.ini /usr/local/etc/php/conf.d/dev.ini

RUN composer install
RUN chown -R www-data:www-data .

RUN /usr/bin/composer install

# RUN php /var/www/artisan migrate --force

USER root

EXPOSE 8000
