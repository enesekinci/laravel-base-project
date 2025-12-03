# Deployment Guide

Bu doküman, projeyi production ortamına deploy etmek için gerekli adımları açıklar.

## Gereksinimler

- PHP 8.2+ (CLI ve FPM)
- Composer 2.x
- Node.js 18+ ve NPM
- PostgreSQL 12+ veya MySQL 8+
- Redis (cache ve queue için)
- Nginx veya Apache
- Supervisor (queue worker'lar için)
- SSL Certificate (HTTPS için)

## Pre-Deployment Checklist

- [ ] `.env` dosyası production değerleri ile yapılandırıldı
- [ ] `APP_DEBUG=false` ayarlandı
- [ ] `APP_ENV=production` ayarlandı
- [ ] `APP_KEY` oluşturuldu
- [ ] Veritabanı yapılandırıldı
- [ ] Redis yapılandırıldı
- [ ] Storage klasörü yazılabilir
- [ ] Cache klasörü yazılabilir
- [ ] SSL sertifikası kuruldu

## Deployment Adımları

### 1. Sunucu Hazırlığı

```bash
# PHP ve gerekli extension'ları yükle
sudo apt update
sudo apt install php8.2-fpm php8.2-cli php8.2-pgsql php8.2-redis php8.2-mbstring php8.2-xml php8.2-curl php8.2-zip

# Composer yükle
curl -sS https://getcomposer.org/installer | php
sudo mv composer.phar /usr/local/bin/composer

# Node.js yükle
curl -fsSL https://deb.nodesource.com/setup_18.x | sudo -E bash -
sudo apt install -y nodejs
```

### 2. Projeyi Sunucuya Yükle

```bash
# Git ile clone
git clone <repository-url> /var/www/laravel-base-project
cd /var/www/laravel-base-project

# Veya deployment script kullan
./deploy.sh
```

### 3. Bağımlılıkları Yükle

```bash
# Production bağımlılıkları
composer install --no-dev --optimize-autoloader

# Node.js bağımlılıkları
npm install

# Production build
npm run build
```

### 4. Environment Yapılandırması

```bash
# .env dosyası oluştur
cp .env.example .env

# APP_KEY oluştur
php artisan key:generate

# .env dosyasını düzenle
nano .env
```

`.env` dosyasında şu değerleri ayarlayın:

```env
APP_ENV=production
APP_DEBUG=false
APP_URL=https://yourdomain.com

DB_CONNECTION=pgsql
DB_HOST=127.0.0.1
DB_DATABASE=laravel
DB_USERNAME=postgres
DB_PASSWORD=secure_password

REDIS_HOST=127.0.0.1
REDIS_PASSWORD=null

CACHE_STORE=redis
QUEUE_CONNECTION=redis

# Modüller
MODULE_AUTH_ENABLED=true
MODULE_BLOG_ENABLED=true
MODULE_CMS_ENABLED=true
MODULE_CRM_ENABLED=true
MODULE_MEDIA_ENABLED=true
MODULE_SETTINGS_ENABLED=true
```

### 5. Veritabanı Kurulumu

```bash
# Migration çalıştır
php artisan migrate --force

# Seed çalıştır (opsiyonel)
php artisan db:seed --force
```

### 6. Storage ve Cache

```bash
# Storage link oluştur
php artisan storage:link

# Cache optimize et
php artisan config:cache
php artisan route:cache
php artisan view:cache
php artisan event:cache
```

### 7. İzinler

```bash
# Storage ve cache klasörlerine yazma izni ver
sudo chown -R www-data:www-data storage bootstrap/cache
sudo chmod -R 775 storage bootstrap/cache
```

### 8. Nginx Yapılandırması

`/etc/nginx/sites-available/laravel-base-project`:

```nginx
server {
    listen 80;
    listen [::]:80;
    server_name yourdomain.com;
    return 301 https://$server_name$request_uri;
}

server {
    listen 443 ssl http2;
    listen [::]:443 ssl http2;
    server_name yourdomain.com;

    root /var/www/laravel-base-project/public;

    add_header X-Frame-Options "SAMEORIGIN";
    add_header X-Content-Type-Options "nosniff";

    index index.php;

    charset utf-8;

    ssl_certificate /etc/letsencrypt/live/yourdomain.com/fullchain.pem;
    ssl_certificate_key /etc/letsencrypt/live/yourdomain.com/privkey.pem;

    location / {
        try_files $uri $uri/ /index.php?$query_string;
    }

    location = /favicon.ico { access_log off; log_not_found off; }
    location = /robots.txt  { access_log off; log_not_found off; }

    error_page 404 /index.php;

    location ~ \.php$ {
        fastcgi_pass unix:/var/run/php/php8.2-fpm.sock;
        fastcgi_param SCRIPT_FILENAME $realpath_root$fastcgi_script_name;
        include fastcgi_params;
    }

    location ~ /\.(?!well-known).* {
        deny all;
    }
}
```

Nginx'i yeniden yükle:

```bash
sudo nginx -t
sudo systemctl reload nginx
```

### 9. Octane Yapılandırması

Octane için Supervisor yapılandırması:

`/etc/supervisor/conf.d/octane.conf`:

```ini
[program:octane]
process_name=%(program_name)s
command=php /var/www/laravel-base-project/artisan octane:start --server=frankenphp --host=0.0.0.0 --port=8000
autostart=true
autorestart=true
user=www-data
redirect_stderr=true
stdout_logfile=/var/www/laravel-base-project/storage/logs/octane.log
```

Supervisor'ı yeniden yükle:

```bash
sudo supervisorctl reread
sudo supervisorctl update
sudo supervisorctl start octane
```

### 10. Queue Worker

Horizon için Supervisor yapılandırması:

`/etc/supervisor/conf.d/horizon.conf`:

```ini
[program:horizon]
process_name=%(program_name)s
command=php /var/www/laravel-base-project/artisan horizon
autostart=true
autorestart=true
user=www-data
redirect_stderr=true
stdout_logfile=/var/www/laravel-base-project/storage/logs/horizon.log
stopwaitsecs=3600
```

Supervisor'ı yeniden yükle:

```bash
sudo supervisorctl reread
sudo supervisorctl update
sudo supervisorctl start horizon
```

### 11. Cron Job

Laravel scheduler için cron job ekle:

```bash
crontab -e
```

Şu satırı ekle:

```
* * * * * cd /var/www/laravel-base-project && php artisan schedule:run >> /dev/null 2>&1
```

## Post-Deployment

### 1. Health Check

```bash
curl https://yourdomain.com/up
```

### 2. Log Kontrolü

```bash
# Application logs
tail -f storage/logs/laravel.log

# Horizon logs
tail -f storage/logs/horizon.log

# Octane logs
tail -f storage/logs/octane.log
```

### 3. Performance Monitoring

- Horizon dashboard: `https://yourdomain.com/horizon`
- Pulse dashboard: `https://yourdomain.com/pulse`

## SSL Sertifikası (Let's Encrypt)

```bash
# Certbot yükle
sudo apt install certbot python3-certbot-nginx

# SSL sertifikası al
sudo certbot --nginx -d yourdomain.com -d www.yourdomain.com

# Otomatik yenileme test et
sudo certbot renew --dry-run
```

## Backup Stratejisi

### Veritabanı Backup

```bash
# PostgreSQL
pg_dump -U postgres laravel > backup_$(date +%Y%m%d).sql

# MySQL
mysqldump -u root -p laravel > backup_$(date +%Y%m%d).sql
```

### Dosya Backup

```bash
# Storage klasörünü yedekle
tar -czf storage_backup_$(date +%Y%m%d).tar.gz storage/
```

### Otomatik Backup Script

`/usr/local/bin/backup-laravel.sh`:

```bash
#!/bin/bash
BACKUP_DIR="/backups/laravel-base-project"
DATE=$(date +%Y%m%d_%H%M%S)

# Veritabanı backup
pg_dump -U postgres laravel > $BACKUP_DIR/db_$DATE.sql

# Storage backup
tar -czf $BACKUP_DIR/storage_$DATE.tar.gz /var/www/laravel-base-project/storage

# Eski backup'ları sil (30 günden eski)
find $BACKUP_DIR -type f -mtime +30 -delete
```

Cron job ekle:

```bash
0 2 * * * /usr/local/bin/backup-laravel.sh
```

## Monitoring

### Uptime Monitoring

- UptimeRobot
- Pingdom
- StatusCake

### Error Tracking

- Sentry
- Bugsnag
- Rollbar

### Performance Monitoring

- New Relic
- Datadog
- Laravel Pulse (built-in)

## Security

### Firewall

```bash
# UFW yapılandırması
sudo ufw allow 22/tcp
sudo ufw allow 80/tcp
sudo ufw allow 443/tcp
sudo ufw enable
```

### Fail2Ban

```bash
# Fail2Ban yükle
sudo apt install fail2ban

# Yapılandır
sudo systemctl enable fail2ban
sudo systemctl start fail2ban
```

## Troubleshooting

### Permission Issues

```bash
sudo chown -R www-data:www-data /var/www/laravel-base-project
sudo chmod -R 775 storage bootstrap/cache
```

### Cache Issues

```bash
php artisan optimize-clear
php artisan optimize
```

### Queue Issues

```bash
# Horizon'u yeniden başlat
sudo supervisorctl restart horizon

# Failed job'ları kontrol et
php artisan horizon:status
```

### Database Connection Issues

1. `.env` dosyasındaki veritabanı bilgilerini kontrol et
2. Veritabanı sunucusunun çalıştığından emin ol
3. Firewall kurallarını kontrol et

## Rollback

Deployment başarısız olursa:

```bash
# Git ile önceki versiyona dön
git checkout <previous-commit>

# Cache temizle
php artisan optimize-clear

# Yeniden optimize et
php artisan optimize
```

## Sonraki Adımlar

1. [Development Setup](development-setup.md) - Local development
2. [API Documentation](api-documentation.md) - API kullanımı
3. [Module Management](module-management.md) - Modül yönetimi

