# Development Setup Guide

Bu doküman, projeyi local development ortamında çalıştırmak için gerekli adımları açıklar.

## Gereksinimler

- PHP 8.2 veya üzeri
- Composer 2.x
- Node.js 18+ ve NPM
- PostgreSQL 12+ veya MySQL 8+
- Redis (opsiyonel, cache için)
- Meilisearch (opsiyonel, search için)

## Kurulum Adımları

### 1. Projeyi Klonlayın

```bash
git clone <repository-url>
cd laravel-base-project
```

### 2. Bağımlılıkları Yükleyin

```bash
# PHP bağımlılıkları
composer install

# Node.js bağımlılıkları
npm install
```

### 3. Environment Dosyasını Oluşturun

```bash
cp .env.example .env
php artisan key:generate
```

### 4. Veritabanını Yapılandırın

`.env` dosyasında veritabanı bilgilerinizi güncelleyin:

```env
DB_CONNECTION=pgsql
DB_HOST=127.0.0.1
DB_PORT=5432
DB_DATABASE=laravel
DB_USERNAME=postgres
DB_PASSWORD=your_password
```

### 5. Veritabanını Oluşturun

```bash
# PostgreSQL için
createdb laravel

# MySQL için
mysql -u root -p
CREATE DATABASE laravel;
```

### 6. Migration'ları Çalıştırın

```bash
php artisan migrate
```

### 7. Seed'leri Çalıştırın (Opsiyonel)

```bash
php artisan db:seed
```

### 8. Storage Link'i Oluşturun

```bash
php artisan storage:link
```

### 9. Asset'leri Build Edin

```bash
# Production build
npm run build

# Development mode (watch)
npm run dev
```

### 10. Development Server'ı Başlatın

```bash
# Standart Laravel server
php artisan serve

# Veya Octane (daha hızlı)
php artisan octane:start --server=frankenphp
```

## Development Tools

### Composer Scripts

Proje, development için birkaç composer script içerir:

```bash
# Development server (server + queue + logs + vite)
composer dev

# Test çalıştır
composer test

# Code format
composer format

# Code analysis
composer analyse
```

### Laravel Tools

#### Telescope (Debugging)

```bash
# Install
php artisan telescope:install
php artisan migrate

# Access
http://localhost/telescope
```

#### Horizon (Queue Monitoring)

```bash
# Install
php artisan horizon:install
php artisan migrate

# Start
php artisan horizon

# Access
http://localhost/horizon
```

#### Pail (Log Viewer)

```bash
# Watch logs
php artisan pail

# Filter by level
php artisan pail --level=error
```

## Veritabanı Yönetimi

### Migration'lar

```bash
# Yeni migration oluştur
php artisan make:migration create_example_table

# Migration çalıştır
php artisan migrate

# Migration geri al
php artisan migrate:rollback

# Migration sıfırla
php artisan migrate:fresh
```

### Seeder'lar

```bash
# Seeder oluştur
php artisan make:seeder ExampleSeeder

# Seeder çalıştır
php artisan db:seed --class=ExampleSeeder

# Tüm seeder'ları çalıştır
php artisan db:seed
```

## Cache ve Optimizasyon

### Cache Temizleme

```bash
# Tüm cache'leri temizle
php artisan optimize-clear

# Sadece config cache
php artisan config:clear

# Sadece route cache
php artisan route:clear

# Sadece view cache
php artisan view:clear
```

### Optimizasyon

```bash
# Production için optimize et
php artisan optimize

# Config cache
php artisan config:cache

# Route cache
php artisan route:cache

# View cache
php artisan view:cache
```

## Testing

### Test Çalıştırma

```bash
# Tüm testler
php artisan test

# Belirli bir test dosyası
php artisan test tests/Feature/ExampleTest.php

# Belirli bir test
php artisan test --filter=testName
```

### Test Veritabanı

Test için ayrı bir veritabanı kullanılır. `.env.testing` dosyası oluşturun:

```env
DB_CONNECTION=pgsql
DB_DATABASE=laravel_test
```

## Modül Yönetimi

### Modül Aktif/Pasif Etme

`.env` dosyasında:

```env
MODULE_BLOG_ENABLED=false
MODULE_CMS_ENABLED=false
```

### Yeni Modül Ekleme

1. `app/{Module}/` klasör yapısını oluştur
2. `app/{Module}/Providers/{Module}ServiceProvider.php` oluştur
3. `config/modules.php` dosyasına ekle
4. `.env.example` dosyasına environment variable ekle

Detaylı bilgi için [Module Management](module-management.md) dokümantasyonuna bakın.

## Sorun Giderme

### Composer Install Hataları

```bash
# Composer cache temizle
composer clear-cache

# Vendor klasörünü sil ve yeniden yükle
rm -rf vendor
composer install
```

### NPM Install Hataları

```bash
# NPM cache temizle
npm cache clean --force

# Node modules sil ve yeniden yükle
rm -rf node_modules
npm install
```

### Permission Hataları

```bash
# Storage ve cache klasörlerine yazma izni ver
chmod -R 775 storage bootstrap/cache
```

### Veritabanı Bağlantı Hataları

1. `.env` dosyasındaki veritabanı bilgilerini kontrol et
2. Veritabanı sunucusunun çalıştığından emin ol
3. Veritabanının oluşturulduğundan emin ol

### Route Bulunamıyor

```bash
# Route cache temizle
php artisan route:clear

# Route listesi
php artisan route:list
```

## IDE Ayarları

### PHPStorm / IntelliJ IDEA

1. **Laravel Plugin**: Laravel plugin'i yükleyin
2. **PHP Interpreter**: PHP 8.2+ interpreter'ı ayarlayın
3. **Composer**: Composer path'ini ayarlayın
4. **Code Style**: Laravel Pint code style'ı kullanın

### VS Code

1. **PHP Extension**: PHP Intelephense extension'ı yükleyin
2. **Laravel Extension**: Laravel Extension Pack yükleyin
3. **Format on Save**: Pint ile format on save'i ayarlayın

## Docker (Opsiyonel)

Proje Docker ile de çalıştırılabilir. `Dockerfile` ve `docker-compose.yml` dosyaları mevcuttur.

```bash
# Docker container'ları başlat
docker-compose up -d

# Migration çalıştır
docker-compose exec app php artisan migrate

# Composer install
docker-compose exec app composer install
```

## Sonraki Adımlar

1. [API Documentation](api-documentation.md) - API kullanımı
2. [Module Management](module-management.md) - Modül yönetimi
3. [Deployment Guide](deployment-guide.md) - Production deployment

