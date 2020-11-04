FROM php:7.4-fpm

ARG WITH_XDEBUG=true

RUN curl -sL https://deb.nodesource.com/setup_12.x | bash - && \
    apt-get update -y && \
    apt-get install -y \
        libzip-dev \
        unzip \
        git \
        nodejs

RUN docker-php-ext-install \
        pdo_mysql \
        zip

RUN if [ $WITH_XDEBUG = "true" ] ; then \
        pecl install xdebug; \
        docker-php-ext-enable xdebug; \
        echo "error_reporting=E_ALL" >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini; \
        echo "display_startup_errors=On" >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini; \
        echo "display_errors=On" >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini; \
        echo "xdebug.remote_enable=1" >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini; \
        echo "xdebug.remote_connect_back=1" >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini; \
    fi ;

COPY --from=composer /usr/bin/composer /usr/bin/composer

WORKDIR /var/www

COPY package.json package-lock.json ./
RUN npm install

# Install app dependencies
COPY composer.json composer.lock ./
RUN composer install --no-autoloader --no-scripts

COPY . .

# Re-run composer, this time with autoloader & scripts
RUN composer install --optimize-autoloader
