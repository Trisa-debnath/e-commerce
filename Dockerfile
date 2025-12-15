# ---- Base PHP Image ----
FROM php:8.2-fpm

# ---- System Dependencies ----
RUN apt-get update && apt-get install -y \
    git \
    unzip \
    curl \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    zip \
    nodejs \
    npm

# ---- PHP Extensions ----
RUN docker-php-ext-install pdo pdo_mysql pdo_pgsql mbstring exif pcntl bcmath gd

# ---- Install Composer ----
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

# ---- Set Working Directory ----
WORKDIR /var/www

# ---- Copy Files ----
COPY . .

# ---- Install PHP Dependencies ----
RUN composer install --no-dev --optimize-autoloader

# ---- Install Node & Build Assets ----
RUN npm install && npm run build

# ---- Permissions ----
RUN chown -R www-data:www-data storage bootstrap/cache

# ---- Expose Port ----
EXPOSE 10000

# ---- Start Laravel ----
CMD php artisan serve --host=0.0.0.0 --port=10000
