FROM php:8.4-apache

RUN apt-get update && apt-get install -y \
    libpq-dev \
    unzip \
    git \
    && rm -rf /var/lib/apt/lists/*

WORKDIR /var/www/html

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

COPY . /var/www/html/

RUN composer install --no-dev --optimize-autoloader

RUN docker-php-ext-install pdo pdo_pgsql

COPY apache.conf /etc/apache2/sites-available/000-default.conf

RUN a2enmod rewrite

ENV PORT=80
EXPOSE ${PORT}

CMD sed -i "s/Listen 80/Listen ${PORT}/g" /etc/apache2/ports.conf && apache2-foreground