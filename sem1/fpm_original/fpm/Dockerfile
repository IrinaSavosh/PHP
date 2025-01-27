FROM php:8.2-fpm

COPY ./php.ini /usr/local/etc/php/conf.d/php-custom.ini


# RUN docker-php-ext-install mysqli pdo_mysql && docker-php-ext-enable mysqli pdo_mysql
# RUN pecl install -o -f xdebug && docker-php-ext-enable xdebug
WORKDIR /data

VOLUME /data

CMD ["php-fpm"]
