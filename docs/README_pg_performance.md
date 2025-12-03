# PostgreSQL Performans Raporu

Bu doküman, PostgreSQL performans raporu komutunun kullanımını ve yapılandırmasını açıklar.

## Genel Bakış

`db:performance-report` komutu, PostgreSQL veritabanının performans metriklerini toplar, sorunları tespit eder ve rapor oluşturur. Sorun tespit edilirse, yapılandırılmış admin email adresine otomatik olarak uyarı maili gönderir.

## Komut Kullanımı

### Manuel Çalıştırma

```bash
# Raporu oluştur (mail gönderme)
php artisan db:performance-report

# Raporu oluştur ve sorun varsa mail gönder
php artisan db:performance-report --send-mail
```

### Otomatik Çalıştırma (Scheduler)

Komut, Laravel scheduler ile haftalık olarak otomatik çalışır:

- **Zamanlama:** Her Pazartesi saat 09:00
- **Mail Gönderimi:** Sorun tespit edilirse otomatik mail gönderilir
- **Log:** `storage/logs/postgres-performance-report.log`

Scheduler'ı aktif etmek için production'da cron job ekleyin:

```bash
* * * * * cd /path-to-your-project && php artisan schedule:run >> /dev/null 2>&1
```

## Tespit Edilen Metrikler

### 1. Database Boyutu
- Toplam database boyutu
- Büyük tablolar listesi (top 10)

### 2. Cache Hit Ratio
- **Heap Cache Hit Ratio:** Tablo verilerinin cache'den okunma oranı (hedef: >90%)
- **Index Cache Hit Ratio:** Index'lerin cache'den okunma oranı (hedef: >95%)

### 3. Connection İstatistikleri
- Toplam connection sayısı
- Aktif connection sayısı
- Idle connection sayısı
- Idle in transaction connection sayısı
- Max connection limit'i

### 4. Dead Tuples
- Her tablodaki dead tuple sayısı ve oranı
- Son vacuum/autovacuum tarihleri

### 5. Lock İstatistikleri
- Lock türleri ve sayıları
- Blocking lock'lar

### 6. Vacuum İstatistikleri
- Hiç vacuum edilmemiş tablolar
- 7 günden fazla vacuum edilmemiş tablolar

### 7. Index Kullanımı
- Kullanılmayan index'ler
- Index scan istatistikleri

### 8. Slow Queries (pg_stat_statements varsa)
- Yavaş query'ler listesi
- Mean execution time
- Total execution time

## Tespit Edilen Sorunlar

Komut aşağıdaki sorunları tespit eder:

### 🔴 Kritik Sorunlar

1. **Yüksek Connection Kullanımı** (>80%)
   - Connection limit'ine yaklaşılıyor
   - Yeni connection'lar reddedilebilir

2. **Blocking Locks**
   - Query'ler birbirini bekliyor
   - Performans düşüşüne neden olabilir

### 🟡 Uyarılar

1. **Düşük Heap Cache Hit Ratio** (<90%)
   - Tablo verileri disk'ten okunuyor
   - Performans düşük olabilir

2. **Düşük Index Cache Hit Ratio** (<95%)
   - Index'ler disk'ten okunuyor
   - Performans düşük olabilir

3. **Idle in Transaction Connections** (>5)
   - Connection'lar transaction içinde bekliyor
   - Lock'ları tutabilir

4. **Yüksek Dead Tuple Oranı** (>20%)
   - Tablolarda çok fazla dead tuple var
   - VACUUM gerekli

### 🔵 Bilgi

1. **Kullanılmayan Index'ler** (>5)
   - Hiç kullanılmayan index'ler disk alanı kaplıyor
   - Yazma performansını düşürebilir

2. **Çok Büyük Tablolar** (>10GB)
   - Partitioning veya arşivleme düşünülebilir

3. **7 Günden Fazla Vacuum Edilmemiş Tablolar**
   - Düzenli vacuum gerekli

## Email Bildirimleri

### Yapılandırma

Admin email adresi `config/mail.php` dosyasında veya `.env` dosyasında yapılandırılmalıdır:

```env
MAIL_ADMIN_EMAIL=admin@example.com
```

Veya `config/mail.php`:

```php
'admin_email' => env('MAIL_ADMIN_EMAIL', env('MAIL_FROM_ADDRESS')),
```

### Email İçeriği

Email şunları içerir:
- Tespit edilen sorunlar (severity ile)
- Performans metrikleri özeti
- Öneriler ve çözümler

### Email Formatı

Email markdown formatında gönderilir ve şunları içerir:
- Sorun özeti
- Detaylı metrikler
- Uygulama linki

## Sorun Giderme

### "Bu komut sadece PostgreSQL için çalışır" Hatası

Komut sadece PostgreSQL veritabanı için çalışır. MySQL veya SQLite kullanıyorsanız bu komut çalışmaz.

### "pg_stat_statements extension kurulu değil" Uyarısı

Slow query raporu için `pg_stat_statements` extension'ı gerekli. Kurulum için:

```sql
CREATE EXTENSION IF NOT EXISTS pg_stat_statements;
```

Ve `postgresql.conf` dosyasında:

```conf
shared_preload_libraries = 'pg_stat_statements'
```

PostgreSQL'i yeniden başlatın.

### Email Gönderilmiyor

1. Mail yapılandırmasını kontrol edin:
   ```bash
   php artisan config:show mail
   ```

2. Admin email adresini kontrol edin:
   ```bash
   php artisan tinker
   >>> config('mail.admin_email')
   ```

3. Mail loglarını kontrol edin:
   ```bash
   tail -f storage/logs/laravel.log
   ```

## Örnek Çıktı

```
PostgreSQL performans raporu oluşturuluyor...

📊 Performans metrikleri toplanıyor...
🔍 Sorunlar tespit ediliyor...

═══════════════════════════════════════════════════════════
📊 PostgreSQL Performans Raporu
═══════════════════════════════════════════════════════════

💾 Database Boyutu: 2.5 GB

✅ Heap Cache Hit Ratio: %92.5
✅ Index Cache Hit Ratio: %98.3

✅ Connections: 15/100 (%15)
   - Active: 3
   - Idle: 12
   - Idle in Transaction: 0

⚠️  Dead Tuples: 3 tabloda dead tuple var

═══════════════════════════════════════════════════════════
⚠️  Tespit Edilen Sorunlar (2)
═══════════════════════════════════════════════════════════

🟡 [warning] Yüksek Dead Tuple Oranı
   Tablo 'public.orders' için dead tuple oranı %25.5 (1250 dead tuples). VACUUM gerekli.

🔵 [info] Kullanılmayan Index'ler
   8 index hiç kullanılmamış. Bu index'ler disk alanı kaplıyor ve yazma performansını düşürebilir.

═══════════════════════════════════════════════════════════
```

## Best Practices

1. **Düzenli Monitoring:** Haftalık raporları düzenli kontrol edin
2. **Proaktif Çözüm:** Sorunları erken tespit edip çözün
3. **Vacuum Schedule:** Düzenli VACUUM ve ANALYZE çalıştırın
4. **Index Optimizasyonu:** Kullanılmayan index'leri kaldırın
5. **Connection Pooling:** Connection sayısını optimize edin

## İlgili Komutlar

- `db:slow-queries-report`: Yavaş query'leri raporla
- `db:table`: Tablo detaylarını göster
- `db:show`: Database özetini göster

## Kaynaklar

- [PostgreSQL Performance Tuning](https://www.postgresql.org/docs/current/performance-tips.html)
- [pg_stat_statements Documentation](https://www.postgresql.org/docs/current/pgstatstatements.html)
- [Laravel Scheduler Documentation](https://laravel.com/docs/scheduling)

