FROM php:7.4-fpm

RUN apt-get update -y && apt-get install -y \
    libzip-dev \
    unzip \
    git

RUN docker-php-ext-install zip

COPY --from=composer /usr/bin/composer /usr/bin/composer

WORKDIR /var/www

# Install app dependencies
COPY composer.json composer.lock ./
RUN composer install --no-autoloader --no-scripts

COPY . .

# Re-run composer, this time with autoloader & scripts
RUN composer install --optimize-autoloader
