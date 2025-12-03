# Redis Queue Güvenli Konfigürasyon Rehberi

Bu doküman, Laravel queue için Redis'in güvenli şekilde yapılandırılmasını açıklar. Queue job'larının restart sonrası kaybolmaması ve eviction policy nedeniyle silinmemesi için kritik ayarlar içerir.

## Önemli Notlar

⚠️ **Queue job'larının uçmaması için:**

- Queue için **ayrı Redis database** kullanılmalı (database 2)
- Eviction policy **`noeviction`** olmalı (job'lar asla silinmez)
- RDB + AOF persistence aktif olmalı (restart sonrası job kaybı olmaması için)

## Redis Database Yapısı

Projede Redis database'leri şu şekilde ayrılmıştır:

- **Database 0**: Genel kullanım (Session, genel veriler)
- **Database 1**: Cache verileri
- **Database 2**: Queue job'ları (güvenlik için ayrı)

## Redis Konfigürasyonu (redis.conf)

### 1. Persistence Ayarları (RDB + AOF)

Queue job'larının restart sonrası kaybolmaması için persistence aktif olmalı:

```conf
# RDB Snapshot (Hızlı yedekleme)
save 900 1      # 15 dakikada en az 1 key değişirse snapshot
save 300 10     # 5 dakikada en az 10 key değişirse snapshot
save 60 10000   # 1 dakikada en az 10000 key değişirse snapshot

# AOF (Append Only File) - Her komutu logla
appendonly yes
appendfsync everysec  # Her saniye disk'e yaz (güvenlik + performans dengesi)
no-appendfsync-on-rewrite no
auto-aof-rewrite-percentage 100
auto-aof-rewrite-min-size 64mb
```

### 2. Memory ve Eviction Policy

**Queue database için kritik:** Eviction policy `noeviction` olmalı, aksi halde job'lar uçabilir!

```conf
# Memory limit (production için uygun değeri ayarlayın)
maxmemory 2gb

# Eviction policy: noeviction (job'lar asla silinmez)
# ⚠️ ÖNEMLİ: Queue database'inde mutlaka noeviction kullan!
maxmemory-policy noeviction
```

**Eviction Policy Seçenekleri:**

- ✅ **`noeviction`** (Queue için önerilen): Memory dolduğunda yeni yazma işlemlerini reddeder, mevcut verileri silmez
- ❌ **`allkeys-lru`**: En az kullanılan key'leri siler (job'lar uçabilir!)
- ❌ **`volatile-lru`**: Expire olan key'lerden en az kullanılanları siler (job'lar uçabilir!)
- ❌ **`allkeys-random`**: Rastgele key'leri siler (job'lar uçabilir!)

### 3. Database Bazlı Eviction Policy (Redis 7+)

Redis 7+ ile database bazlı eviction policy ayarlanabilir:

```conf
# Database 2 (queue) için özel eviction policy
# CONFIG SET maxmemory-policy-db-2 noeviction
```

## Laravel Konfigürasyonu

### config/database.php

```php
'redis' => [
    'client' => env('REDIS_CLIENT', 'phpredis'),

    'queue' => [
        'host' => env('REDIS_QUEUE_HOST', env('REDIS_HOST', '127.0.0.1')),
        'password' => env('REDIS_QUEUE_PASSWORD', env('REDIS_PASSWORD')),
        'port' => env('REDIS_QUEUE_PORT', env('REDIS_PORT', '6379')),
        'database' => env('REDIS_QUEUE_DB', '2'), // Database 2: Queue job'ları
    ],
],
```

### config/queue.php

```php
'connections' => [
    'redis' => [
        'driver' => 'redis',
        'connection' => 'queue',  // Queue için ayrı connection
        'queue' => env('REDIS_QUEUE', 'default'),
        'retry_after' => 90,
        'block_for' => null,
    ],
],
```

### .env

```env
# Queue için ayrı Redis connection
REDIS_QUEUE_HOST=127.0.0.1
REDIS_QUEUE_PASSWORD=null
REDIS_QUEUE_PORT=6379
REDIS_QUEUE_DB=2
REDIS_QUEUE_CONNECTION=queue
```

## Kontrol ve Test

### 1. Redis Eviction Policy Kontrolü

```bash
# Redis CLI'ye bağlan
redis-cli

# Eviction policy'yi kontrol et
CONFIG GET maxmemory-policy

# Queue database'ine geç (database 2)
SELECT 2

# Eviction policy'yi noeviction yap
CONFIG SET maxmemory-policy noeviction
```

### 2. Persistence Kontrolü

```bash
# RDB kontrolü
CONFIG GET save

# AOF kontrolü
CONFIG GET appendonly
```

### 3. Memory Kullanımı

```bash
# Memory kullanımını kontrol et
INFO memory

# Queue database'inde kaç key var
SELECT 2
DBSIZE
```

## Production Önerileri

1. **Memory Limit**: Production'da uygun memory limit ayarlayın (örn: 4GB, 8GB)
2. **Monitoring**: Redis memory kullanımını izleyin (Laravel Pulse, Redis Monitor)
3. **Alerting**: Memory %80'i geçtiğinde uyarı alın
4. **Backup**: RDB ve AOF dosyalarını düzenli yedekleyin
5. **Testing**: Restart sonrası job'ların kaybolmadığını test edin

## Sorun Giderme

### Job'lar Uçuyor

**Sorun:** Queue job'ları kayboluyor veya siliniyor

**Çözüm:**

1. Eviction policy'yi kontrol edin: `CONFIG GET maxmemory-policy`
2. `noeviction` olmalı, değilse: `CONFIG SET maxmemory-policy noeviction`
3. Queue database'ini kontrol edin: `SELECT 2` → `DBSIZE`

### Restart Sonrası Job Kaybı

**Sorun:** Redis restart sonrası queue job'ları kayboluyor

**Çözüm:**

1. AOF aktif mi kontrol edin: `CONFIG GET appendonly` → `yes` olmalı
2. RDB aktif mi kontrol edin: `CONFIG GET save`
3. Persistence dosyalarını kontrol edin: `ls -lh /var/lib/redis/`

### Memory Doldu

**Sorun:** Redis memory doldu, yeni job'lar eklenemiyor

**Çözüm:**

1. Memory limit'i artırın: `CONFIG SET maxmemory 4gb`
2. Eski job'ları temizleyin: `php artisan queue:flush` (dikkatli kullanın!)
3. Failed job'ları temizleyin: `php artisan queue:failed:flush`

## Docker/Production Setup

### docker-compose.yml Örneği

```yaml
redis:
    image: redis:7-alpine
    command: >
        redis-server
        --appendonly yes
        --appendfsync everysec
        --maxmemory 2gb
        --maxmemory-policy noeviction
        --save 900 1
        --save 300 10
        --save 60 10000
    volumes:
        - redis-data:/data
    ports:
        - '6379:6379'
```

### Systemd Service (Linux)

```ini
[Unit]
Description=Redis Queue Server
After=network.target

[Service]
Type=notify
ExecStart=/usr/bin/redis-server /etc/redis/redis-queue.conf
Restart=always
User=redis
Group=redis

[Install]
WantedBy=multi-user.target
```

## Kaynaklar

- [Redis Persistence Documentation](https://redis.io/docs/management/persistence/)
- [Redis Eviction Policies](https://redis.io/docs/management/eviction/)
- [Laravel Queue Documentation](https://laravel.com/docs/queues)
