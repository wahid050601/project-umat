# FROM httpd:latest

FROM php:apache

# Aktifkan ekstensi mysqli
RUN docker-php-ext-install mysqli

# Kopi berkas konfigurasi PHP jika diperlukan
# COPY php.ini /usr/local/etc/php/

# Set working directory
WORKDIR /var/www/html