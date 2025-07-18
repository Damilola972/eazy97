FROM php:8.2-fpm

# Install system dependencies
RUN apt-get update && apt-get install -y \
    git \
    curl \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    zip \
    unzip \
    libzip-dev \
    libpq-dev \
    libsqlite3-dev \
    sqlite3

# Install PHP extensions
RUN docker-php-ext-install pdo pdo_mysql mbstring exif pcntl bcmath gd zip

# Install Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Set working directory
WORKDIR /var/www

# Copy existing app directory contents
COPY . /var/www

# Give permissions
RUN chown -R www-data:www-data /var/www && chmod -R 755 /var/www

# Expose port
EXPOSE 8000

# Start the Laravel server
CMD php artisan serve --host=0.0.0.0 --port=8000