FROM php:8.2-fpm

WORKDIR /var/www

RUN apt-get update && \
    apt-get install -y \
    git \
    openssh-client && \
    apt-get clean && \
    rm -rf /var/lib/apt/lists/*

RUN chown -R www-data:www-data .

COPY . .
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer
COPY ./docker/dev.ini /usr/local/etc/php/conf.d/dev.ini

RUN composer install
RUN chown -R www-data:www-data .

RUN /usr/bin/composer install

# RUN php /var/www/artisan migrate --force

USER root

EXPOSE 8000
