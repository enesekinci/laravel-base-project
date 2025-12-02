#!/bin/sh
set -e

echo "🚀 Starting Laravel application..."

# Octane worker sayısını ayarla (default: 8, CPU core sayısına göre optimize edilebilir)
export OCTANE_WORKERS=${OCTANE_WORKERS:-8}
export OCTANE_MAX_REQUESTS=${OCTANE_MAX_REQUESTS:-1000}

# Fix permissions (runtime'da da yapılmalı)
echo "🔧 Fixing permissions..."
mkdir -p /var/www/html/storage/logs || true
mkdir -p /var/www/html/storage/framework/cache || true
mkdir -p /var/www/html/storage/framework/sessions || true
mkdir -p /var/www/html/storage/framework/views || true
chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache || true
chmod -R 775 /var/www/html/storage /var/www/html/bootstrap/cache || true
chmod -R 775 /var/www/html/storage/logs || true
# Log dosyalarını oluştur (eğer yoksa)
touch /var/www/html/storage/logs/laravel.log || true
chown www-data:www-data /var/www/html/storage/logs/laravel.log || true
chmod 664 /var/www/html/storage/logs/laravel.log || true

# Run migrations (will fail gracefully if database is not ready)
echo "📦 Running migrations..."
php artisan migrate --force --no-interaction || echo "⚠️  Migration failed or skipped (database may not be ready yet)"

# Optimize Laravel (only if not in local environment)
if [ "$APP_ENV" != "local" ]; then
    echo "⚡ Optimizing Laravel..."
    php artisan optimize:clear || true
    php artisan config:clear || true
    php artisan route:clear || true
    php artisan view:clear || true
    php artisan optimize || true
    
    # Octane için özel optimizasyonlar
    if [ -n "$OCTANE_SERVER" ] || [ "$OCTANE_SERVER" != "" ]; then
        echo "🚀 Optimizing for Octane..."
        php artisan octane:install --server=${OCTANE_SERVER:-frankenphp} --no-interaction || true
    fi
fi

echo "✅ Laravel is ready!"

# Execute the main command
exec "$@"

