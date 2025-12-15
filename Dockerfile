FROM php:8.2-fpm

# System dependencies
RUN apt-get update && apt-get install -y \
    git \
    unzip \
    curl \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    zip \
    nodejs \
    npm \
    && apt-get clean && rm -rf /var/lib/apt/lists/*

# PHP extensions (MySQL only)
RUN docker-php-ext-install \
    pdo \
    pdo_mysql \
    mbstring \
    exif \
    pcntl \
    bcmath \
    gd

# Composer
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

# App directory
WORKDIR /var/www

# Copy project
COPY . .

# Install PHP deps
RUN composer install --no-dev --optimize-autoloader

# Build frontend
RUN npm install && npm run build

# Permissions
RUN chown -R www-data:www-data storage bootstrap/cache

# Expose port for Render
EXPOSE 10000

# Generate key safely
RUN php artisan key:generate || true

# Start app
CMD php artisan serve --host=0.0.0.0 --port=10000
