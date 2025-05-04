FROM php:8.3-fpm

# Install dependencies
RUN apt-get update && apt-get install -y \
    build-essential \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    libonig-dev \
    libxml2-dev \
    zip \
    unzip \
    curl \
    git \
    libzip-dev

# Install Node.js and npm
RUN curl -sL https://deb.nodesource.com/setup_18.x | bash - \
    && apt-get install -y nodejs \
    && npm install -g npm

# Install PHP extensions
RUN docker-php-ext-install pdo_mysql mbstring zip exif pcntl bcmath gd

# Install Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Set work directory
WORKDIR /var/www

# Add custom PHP configuration
RUN { \
    echo 'upload_max_filesize = 100M'; \
    echo 'post_max_size = 100M'; \
    echo 'memory_limit = 512M'; \
    echo 'max_execution_time = 300'; \
    echo 'max_input_time = 300'; \
} > /usr/local/etc/php/conf.d/custom.ini

# Copy all application files
COPY . .

# Install PHP dependencies
RUN composer install --optimize-autoloader --no-dev

# Install Node.js dependencies
RUN npm ci

# Build Vite assets
RUN npm run build

# Verify the build directory exists and files are there
RUN ls -la public/build/

# Add debugging information
RUN echo "Contents of public/build:" && ls -la public/build/

# Set permissions
RUN chown -R www-data:www-data /var/www \
    && chmod -R 755 /var/www/storage \
    && chmod -R 755 /var/www/bootstrap/cache \
    && chmod -R 755 /var/www/public/build

# Expose port
EXPOSE 9000

CMD ["php-fpm"]