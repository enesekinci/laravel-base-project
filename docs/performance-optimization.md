# Performance Optimization Guide

## Response Time Optimizasyonları

### 1. Database Persistent Connection ✅

- **Sorun**: Her request'te yeni database connection açılıyor (10-50ms overhead)
- **Çözüm**: `config/database.php` içinde `PDO::ATTR_PERSISTENT => true` eklendi
- **Etki**: Connection overhead'i ortadan kaldırır, ~20-40ms kazanç

### 2. Redis Persistent Connection ✅

- **Sorun**: Her request'te yeni Redis connection açılıyor (5-15ms overhead)
- **Çözüm**: `config/database.php` içinde `persistent => true` eklendi
- **Etki**: Connection overhead'i ortadan kaldırır, ~10-20ms kazanç

### 3. Octane Worker Sayısı ✅

- **Sorun**: `--workers=auto` yetersiz olabilir
- **Çözüm**: `docker/supervisor/supervisord.conf` içinde `--workers=8` olarak ayarlandı
- **Etki**: Daha fazla eşzamanlı request işlenebilir, latency azalır

### 4. Max Requests Artırıldı ✅

- **Sorun**: Worker'lar çok sık yeniden başlatılıyor (memory leak önleme)
- **Çözüm**: `--max-requests=1000` olarak artırıldı (500'den)
- **Etki**: Worker restart overhead'i azalır

## Beklenen Performans İyileştirmeleri

### Önceki Durum (150-200ms)

- Network latency: ~50-80ms
- SSL/TLS handshake: ~20-30ms
- Database connection: ~10-50ms
- Redis connection: ~5-15ms
- Application processing: ~20-30ms
- **Toplam: ~150-200ms**

### Optimize Edilmiş Durum (50-80ms hedef)

- Network latency: ~50-80ms (değişmez)
- SSL/TLS handshake: ~20-30ms (değişmez)
- Database connection: ~0ms (persistent) ✅
- Redis connection: ~0ms (persistent) ✅
- Application processing: ~10-20ms (worker optimizasyonu) ✅
- **Toplam: ~80-130ms (hedef: 50-80ms)**

## Ek Optimizasyon Önerileri

### 1. Response Caching

```php
// routes/web.php veya controller'da
Route::get('/up', function () {
    return response()->json(['status' => 'ok'], 200);
})->middleware('cache.headers:public;max_age=60');
```

### 2. Database Query Optimization

- Index'leri kontrol et
- N+1 query problemlerini çöz
- Eager loading kullan

### 3. Redis Response Cache

```php
// Health check için response cache
Route::get('/up', function () {
    return Cache::remember('health-check', 10, function () {
        return response()->json(['status' => 'ok'], 200);
    });
});
```

### 4. OPcache Optimizasyonu

- `opcache.enable=1`
- `opcache.memory_consumption=256`
- `opcache.max_accelerated_files=20000`

### 5. CDN Kullanımı

- Static asset'ler için CDN
- Cloudflare veya benzeri servis

## Test Sonuçları

### wrk Test (100 connections, 30s)

- **Önceki**: ~1721 req/s, 60ms latency
- **Hedef**: ~3000+ req/s, 30-50ms latency

### Apache Bench (1000 requests, 50 concurrent)

- **Önceki**: ~213 req/s, 235ms response time
- **Hedef**: ~500+ req/s, 100-150ms response time

## Monitoring

### Octane Admin Port

```bash
# Worker durumunu kontrol et
curl http://localhost:2019/workers
```

### Response Time Monitoring

- Laravel Telescope (development)
- Application Performance Monitoring (APM) tools
- Custom logging middleware

## Notlar

- Persistent connection'lar Octane için kritik öneme sahip
- Worker sayısı CPU core sayısına göre ayarlanmalı (genellikle core \* 2)
- Max requests çok yüksek olursa memory leak riski artar
- Production'da monitoring ve alerting kurulmalı
