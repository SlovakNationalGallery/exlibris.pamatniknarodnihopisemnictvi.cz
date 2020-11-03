FROM php:7.4-fpm

RUN curl -sL https://deb.nodesource.com/setup_12.x | bash - && \
    apt-get update -y && \
    apt-get install -y \
        libzip-dev \
        unzip \
        git \
        nodejs

RUN docker-php-ext-install zip

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
