FROM php:8.4-cli

# Install system dependencies
RUN apt-get update && apt-get install -y \
    git \
    curl \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    libonig-dev \
    libxml2-dev \
    libssl-dev \
    libcurl4-openssl-dev \
    libzip-dev \
    pkg-config \
    zip \
    unzip \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install pdo pdo_mysql mbstring exif pcntl bcmath gd zip \
    && rm -rf /var/lib/apt/lists/*

# Install MongoDB PHP extension
RUN pecl install mongodb && docker-php-ext-enable mongodb

# Install Composer
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

# Install Node.js 20 for Vite asset building
RUN curl -fsSL https://deb.nodesource.com/setup_20.x | bash - \
    && apt-get install -y nodejs \
    && rm -rf /var/lib/apt/lists/*

# Set working directory
WORKDIR /app

# Copy composer files first (for Docker layer caching)
COPY composer.json composer.lock ./
RUN composer install --optimize-autoloader --no-scripts --no-interaction --no-dev

# Copy package.json and install Node dependencies
COPY package.json vite.config.js ./
RUN npm install

# Copy the rest of the application
COPY . .

# Re-run composer scripts (post-autoload-dump etc.) now that full source is available
RUN composer dump-autoload --optimize

# Build frontend assets with Vite
RUN npm run build

# Ensure Laravel storage directories exist and are writable
RUN mkdir -p storage/framework/cache/data \
    storage/framework/sessions \
    storage/framework/views \
    storage/logs \
    bootstrap/cache \
    && chmod -R 775 storage bootstrap/cache

# Expose the port Railway will assign
EXPOSE ${PORT:-8080}

# Start the application
CMD php artisan migrate --force && php artisan serve --host=0.0.0.0 --port=${PORT:-8080}
