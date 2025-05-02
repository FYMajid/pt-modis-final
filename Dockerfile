# Gunakan image PHP dengan FPM dan ekstensi yang dibutuhkan Laravel
FROM php:8.2-fpm

# Install dependencies sistem
RUN apt-get update && apt-get install -y \
    build-essential \
    libpng-dev \
    libjpeg-dev \
    libonig-dev \
    libxml2-dev \
    zip \
    unzip \
    git \
    curl \
    && docker-php-ext-install pdo pdo_mysql mbstring exif pcntl bcmath gd

# Install Composer
COPY --from=composer:2.6 /usr/bin/composer /usr/bin/composer

# Set working directory
WORKDIR /var/www

# Salin file Laravel ke container
COPY . .

# Install dependensi Laravel
RUN composer install

# Set permission folder Laravel (storage & bootstrap/cache)
RUN chown -R www-data:www-data /var/www \
    && chmod -R 775 storage bootstrap/cache

# Expose port (jika ingin menggunakan php artisan serve)
EXPOSE 8000

# Jalankan Laravel menggunakan PHP built-in server
CMD ["php", "artisan", "serve", "--host=0.0.0.0", "--port=8000"]
