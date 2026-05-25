FROM php:8.3-cli

# Install system dependencies
RUN apt-get update && apt-get install -y \
    unzip \
    git \
    curl \
    libzip-dev \
    zip

# Install PHP extensions
RUN docker-php-ext-install pdo pdo_mysql

# Install Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

WORKDIR /var/www/html

# Copy project files
COPY . .

# Install Laravel dependencies
RUN composer install

# Generate storage link
RUN php artisan storage:link || true
RUN touch database/database.sqlite
RUN chmod -R 777 database
RUN chmod -R 777 storage
EXPOSE 10000

CMD php artisan serve --host=0.0.0.0 --port=10000