FROM php:7.2-fpm
RUN apt-get update && apt-get install -y \
    libfreetype6-dev \
    libjpeg62-turbo-dev \
    libpng-dev \
    && docker-php-ext-install -j$(nproc) iconv \
    && docker-php-ext-configure gd --with-freetype-dir=/usr/include/ --with-jpeg-dir=/usr/include/ \
    && docker-php-ext-install -j$(nproc) gd 

COPY etc/supervisord.conf /etc/supervisor/conf.d/supervisord.conf
COPY etc/php/php.ini /etc/php7/conf.d/zzz_custom.ini

RUN curl --insecure https://getcomposer.org/composer.phar -o /usr/bin/composer && \
    chmod +x /usr/bin/composer

RUN composer selfupdate

