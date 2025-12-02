# Deployment Testing Guide

Bu doküman, deploy edilen Laravel Octane (FrankenPHP) projesini test etmek için kapsamlı bir rehberdir.

## 🚀 Hızlı Test

### 1. Health Check Endpoints

```bash
# Basic health check (Laravel built-in)
curl https://yourdomain.com/up

# Detailed health check (custom)
curl https://yourdomain.com/health/detailed
```

### 2. Otomatik Test Scripti

```bash
# Test scriptini çalıştır
BASE_URL=https://yourdomain.com ./tests/deployment-test.sh
```

## 📋 Manuel Test Adımları

### 1. Basic Connectivity

```bash
# Homepage
curl -I https://yourdomain.com

# Health check
curl https://yourdomain.com/up
```

**Beklenen:** HTTP 200 OK

### 2. Detailed Health Check

```bash
curl https://yourdomain.com/health/detailed | jq
```

**Beklenen:**

```json
{
    "status": "healthy",
    "checks": {
        "database": {
            "status": "healthy",
            "message": "Database connection successful"
        },
        "redis": {
            "status": "healthy",
            "message": "Redis connection successful"
        },
        "queue": {
            "status": "healthy",
            "message": "Queue system operational. Failed jobs: 0"
        },
        "disk": {
            "status": "healthy",
            "message": "Disk usage: 45.23% (50.12 GB free of 100.00 GB)"
        },
        "memory": {
            "status": "healthy",
            "message": "Memory usage: 35.67% (128.45 MB / 512M)"
        }
    },
    "timestamp": "2024-01-15T10:30:00+00:00"
}
```

### 3. Octane Status (Container İçinde)

Coolify veya Docker container'ına bağlan:

```bash
# Container'a bağlan
docker exec -it <container-name> bash

# Octane status kontrolü
php artisan octane:status

# Worker sayısını kontrol et
ps aux | grep octane
```

**Beklenen:**

- Octane çalışıyor
- Worker'lar aktif
- Port 80'de dinliyor

### 4. Redis Bağlantısı

```bash
# Container içinde
php artisan tinker

# Redis test
Redis::ping();
Cache::put('test', 'value', 60);
Cache::get('test');
```

**Beklenen:**

- `PONG` döner
- Cache çalışıyor

### 5. Database Bağlantısı

```bash
# Container içinde
php artisan tinker

# Database test
DB::connection()->getPdo();
DB::table('users')->count();
```

**Beklenen:**

- Bağlantı başarılı
- Query çalışıyor

### 6. Queue Worker

```bash
# Container içında
php artisan queue:work --once

# Supervisor status
supervisorctl status
```

**Beklenen:**

- Queue worker çalışıyor
- Supervisor tüm process'leri yönetiyor

### 7. Performance Test

```bash
# Response time test
time curl -s https://yourdomain.com/up > /dev/null

# Load test (Apache Bench)
ab -n 100 -c 10 https://yourdomain.com/up

# Load test (wrk)
wrk -t4 -c100 -d30s https://yourdomain.com/up
```

**Beklenen:**

- Response time < 100ms (FrankenPHP için)
- 100 request/s üzeri throughput

### 8. Log Kontrolü

```bash
# Container içinde
tail -f storage/logs/laravel.log

# Supervisor logs
tail -f /var/log/supervisor/supervisord.log
```

**Beklenen:**

- Hata yok
- Warning'ler minimal

## 🔍 Troubleshooting

### Health Check Failed

```bash
# Container'a bağlan
docker exec -it <container-name> bash

# Logları kontrol et
tail -f storage/logs/laravel.log

# Octane restart
php artisan octane:restart
```

### Redis Connection Failed

```bash
# Redis bağlantısını test et
php artisan tinker
Redis::connection()->ping();

# Config kontrolü
php artisan config:show cache
php artisan config:show database.redis
```

### Database Connection Failed

```bash
# Database bağlantısını test et
php artisan tinker
DB::connection()->getPdo();

# Config kontrolü
php artisan config:show database.connections
```

### Octane Not Running

```bash
# Supervisor status
supervisorctl status

# Octane restart
supervisorctl restart octane

# Manual start (test için)
php artisan octane:start --server=frankenphp
```

## 📊 Monitoring

### Health Check Monitoring

Health check endpoint'ini monitoring tool'unuzla (UptimeRobot, Pingdom, vb.) izleyin:

```
URL: https://yourdomain.com/health/detailed
Expected: HTTP 200
Check Interval: 1 minute
```

### Performance Monitoring

```bash
# Response time monitoring
watch -n 1 'curl -o /dev/null -s -w "%{time_total}\n" https://yourdomain.com/up'

# Memory usage
docker stats <container-name>
```

## ✅ Test Checklist

- [ ] Basic health check (`/up`) çalışıyor
- [ ] Detailed health check (`/health/detailed`) çalışıyor
- [ ] Database bağlantısı başarılı
- [ ] Redis bağlantısı başarılı
- [ ] Cache çalışıyor
- [ ] Queue worker çalışıyor
- [ ] Octane çalışıyor
- [ ] Response time < 100ms
- [ ] Log'larda hata yok
- [ ] Supervisor tüm process'leri yönetiyor
- [ ] Memory usage normal
- [ ] Disk usage normal

## 🎯 Production Ready Checklist

- [ ] Environment variables doğru ayarlanmış
- [ ] Redis prefix unique (çoklu proje için)
- [ ] Database migrations çalıştırılmış
- [ ] Cache cleared (`php artisan optimize:clear`)
- [ ] Config cached (`php artisan config:cache`)
- [ ] Route cached (`php artisan route:cache`)
- [ ] View cached (`php artisan view:cache`)
- [ ] Queue worker çalışıyor
- [ ] Scheduler çalışıyor
- [ ] Log rotation ayarlanmış
- [ ] Backup stratejisi hazır
- [ ] Monitoring kurulmuş

## 📝 Notlar

- FrankenPHP port 80'de çalışıyor (Nginx gerekmez)
- Supervisor tüm process'leri yönetiyor (Octane, Queue, Scheduler)
- Health check endpoint'leri rate limit'ten muaf
- Production'da `APP_DEBUG=false` olmalı
- Redis prefix her proje için unique olmalı
