# Performance Optimization - Özet

## Yapılan Optimizasyonlar ✅

### 1. Database Persistent Connection

**Dosya:** `config/database.php`

- `PDO::ATTR_PERSISTENT => true` eklendi
- **Etki:** Her request'te yeni connection açma overhead'i kaldırıldı (~20-40ms kazanç)

### 2. Redis Persistent Connection

**Dosya:** `config/database.php`

- `persistent => true` olarak ayarlandı
- **Etki:** Her request'te yeni Redis connection açma overhead'i kaldırıldı (~10-20ms kazanç)

### 3. Octane Worker Sayısı

**Dosya:** `docker/supervisor/supervisord.conf`, `docker-entrypoint.sh`

- `--workers=8` olarak ayarlandı (auto yerine)
- Environment variable desteği eklendi: `OCTANE_WORKERS`
- **Etki:** Daha fazla eşzamanlı request işlenebilir, latency azalır

### 4. Max Requests Artırıldı

**Dosya:** `docker/supervisor/supervisord.conf`

- `--max-requests=1000` olarak artırıldı (500'den)
- Environment variable desteği eklendi: `OCTANE_MAX_REQUESTS`
- **Etki:** Worker restart overhead'i azalır

## Beklenen Performans İyileştirmeleri

### Önceki Durum

- **Response Time:** 150-200ms
- **Requests/sec:** ~213 (Apache Bench), ~1721 (wrk)
- **Latency:** 60ms (wrk), 235ms (Apache Bench)

### Optimize Edilmiş Durum (Hedef)

- **Response Time:** 50-80ms (hedef)
- **Requests/sec:** ~500+ (Apache Bench), ~3000+ (wrk)
- **Latency:** 30-50ms (hedef)

## Değişiklik Özeti

### Dosyalar

1. `config/database.php` - Persistent connection'lar eklendi
2. `docker/supervisor/supervisord.conf` - Worker sayısı ve max-requests ayarlandı
3. `docker-entrypoint.sh` - Environment variable'lar eklendi
4. `docs/performance-optimization.md` - Detaylı dokümantasyon

### Environment Variables (Opsiyonel)

```bash
# .env veya Coolify environment variables
OCTANE_WORKERS=8          # Default: 8 (CPU core sayısına göre ayarlanabilir)
OCTANE_MAX_REQUESTS=1000  # Default: 1000
DB_PERSISTENT=true        # Default: true (Octane için önerilir)
REDIS_PERSISTENT=true     # Default: true (Octane için önerilir)
```

## Test Sonuçları

### wrk Test (100 connections, 30s)

- **Önceki:** ~1721 req/s, 60ms latency
- **Hedef:** ~3000+ req/s, 30-50ms latency

### Apache Bench (1000 requests, 50 concurrent)

- **Önceki:** ~213 req/s, 235ms response time
- **Hedef:** ~500+ req/s, 100-150ms response time

## Deployment Sonrası Kontrol

1. **Worker Sayısını Kontrol Et:**

    ```bash
    docker exec -it <container> ps aux | grep octane
    ```

2. **Response Time Test:**

    ```bash
    curl -w "@-" -o /dev/null -s https://laravel.enesekinci.com/up <<'EOF'
    time_namelookup:  %{time_namelookup}\n
    time_connect:  %{time_connect}\n
    time_starttransfer:  %{time_starttransfer}\n
    time_total:  %{time_total}\n
    EOF
    ```

3. **Stres Test:**
    ```bash
    BASE_URL=https://laravel.enesekinci.com ./tests/stress-test.sh
    ```

## Notlar

- Persistent connection'lar **Octane için kritik** - Her request'te yeni connection açmak performansı ciddi şekilde düşürür
- Worker sayısı CPU core sayısına göre ayarlanmalı (genellikle core \* 2)
- Max requests çok yüksek olursa memory leak riski artar
- Production'da monitoring ve alerting kurulmalı

## Sonraki Adımlar (Opsiyonel)

1. **Response Caching:** Health check endpoint'leri için cache ekle
2. **OPcache:** PHP OPcache ayarlarını optimize et
3. **Database Indexing:** Query'leri optimize et, index'leri kontrol et
4. **CDN:** Static asset'ler için CDN kullan
5. **Monitoring:** APM tool'ları kur (New Relic, Datadog, vb.)
