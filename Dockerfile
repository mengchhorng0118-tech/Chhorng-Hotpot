FROM php:8.2-cli

# Install system packages + PHP extensions
RUN apt-get update && apt-get install -y \
    git \
    curl \
    unzip \
    zip \
    libzip-dev \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    ca-certificates \
    nodejs \
    npm \
    && docker-php-ext-install zip pdo pdo_mysql mbstring \
    && update-ca-certificates \
    && apt-get clean && rm -rf /var/lib/apt/lists/*

# Install Composer
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

WORKDIR /var/www/html

# Copy project files
COPY . .

# Install PHP dependencies
RUN composer install --no-dev --optimize-autoloader

# Install Node and build frontend assets
RUN npm install && npm run build

# Create required storage directories and set permissions
RUN mkdir -p storage/framework/sessions \
             storage/framework/views \
             storage/framework/cache/data \
             storage/logs \
    && chmod -R 777 storage bootstrap/cache \
    && chmod +x start.sh

EXPOSE 10000

CMD ["/bin/sh", "start.sh"]
