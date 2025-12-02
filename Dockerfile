# ============================================================================
# Build Stage - Dependencies ve asset'leri build et
# ============================================================================
FROM php:8.5-fpm-alpine AS builder

# System dependencies ve build tools
RUN apk add --no-cache \
    git \
    curl \
    libpng-dev \
    libzip-dev \
    zip \
    unzip \
    oniguruma-dev \
    postgresql-dev \
    freetype-dev \
    libjpeg-turbo-dev \
    zlib-dev \
    sqlite-dev \
    nodejs \
    npm

# PHP extensions kurulumu
RUN docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install pdo_mysql pdo_pgsql pdo_sqlite mbstring exif pcntl bcmath gd zip

# Composer kurulumu
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Working directory
WORKDIR /var/www/html

# Composer dependencies
COPY composer.json composer.lock ./
RUN composer install --no-dev --no-interaction --prefer-dist --optimize-autoloader --no-scripts

# Node dependencies ve asset build
COPY package.json package-lock.json* ./
RUN npm ci || npm install
COPY . .
RUN npm run build && npm cache clean --force

# ============================================================================
# Production Stage - FrankenPHP ile çalışan production image
# ============================================================================
# FrankenPHP resmi image kullan (PHP + Caddy built-in)
FROM dunglas/frankenphp:latest

# PHP extensions kurulumu (FrankenPHP image'ında install-php-extensions var)
RUN install-php-extensions \
    pdo_mysql \
    pdo_pgsql \
    pdo_sqlite \
    mbstring \
    exif \
    pcntl \
    bcmath \
    gd \
    zip \
    opcache

# Supervisor kurulumu (process management için)
RUN apt-get update && apt-get install -y supervisor && rm -rf /var/lib/apt/lists/*

# Application dosyalarını kopyala
COPY --from=builder /var/www/html /var/www/html

# Supervisor config
COPY docker/supervisor/supervisord.conf /etc/supervisor/conf.d/supervisord.conf

# Entrypoint script
COPY docker-entrypoint.sh /usr/local/bin/
RUN chmod +x /usr/local/bin/docker-entrypoint.sh

# Working directory
WORKDIR /var/www/html

# Permissions (FrankenPHP image'ında www-data user'ı var)
RUN chown -R www-data:www-data /var/www/html \
    && chmod -R 775 /var/www/html/storage \
    && chmod -R 775 /var/www/html/bootstrap/cache \
    && mkdir -p /var/www/html/storage/logs \
    && chmod -R 775 /var/www/html/storage/logs

# FrankenPHP için Caddy config (opsiyonel, varsayılan ayarlar genellikle yeterli)
# FrankenPHP built-in Caddy kullanıyor, ekstra config gerekmez

# Port expose (FrankenPHP built-in Caddy web server)
# Coolify genellikle port 80 kullanır, ancak FrankenPHP port 80'de çalışabilir
EXPOSE 80

# Entrypoint ve command
ENTRYPOINT ["/usr/local/bin/docker-entrypoint.sh"]
CMD ["/usr/bin/supervisord", "-c", "/etc/supervisor/conf.d/supervisord.conf"]
