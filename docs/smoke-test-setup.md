# Smoke Test Kurulum ve Çalıştırma Kılavuzu

## ✅ Tamamlanan İşler

1. ✅ Laravel Dusk kuruldu
2. ✅ `.env.dusk.local` dosyası oluşturuldu
3. ✅ Smoke test dosyaları hazırlandı
4. ✅ ChromeDriver kuruldu
5. ✅ GitHub Actions CI/CD pipeline eklendi
6. ✅ Composer scripts eklendi

## ⚠️ Bilinen Sorunlar

### Migration Sırası Sorunları

Bazı migration'larda foreign key sırası sorunları olabilir. Bu sorunlar test sırasında `RefreshDatabase` tarafından otomatik çözülüyor.

**Çözüm:** Migration dosya isimlerini düzenleyerek sırayı düzeltmek gerekiyor.

## 🚀 Smoke Test Çalıştırma

### 1. Ortam Hazırlığı

```bash
# .env.dusk.local dosyası oluşturulmalı
# Test database'i oluşturulmalı: app_test
```

### 2. Laravel Server'ı Başlat

```bash
# Terminal 1
php artisan serve --port=8000
```

### 3. ChromeDriver'ı Başlat

```bash
# Terminal 2
./vendor/laravel/dusk/bin/chromedriver-mac-arm --port=9515
```

### 4. Smoke Testleri Çalıştır

```bash
# Terminal 3
php artisan dusk --group=smoke

# Veya composer script ile:
composer test-smoke
```

## 📋 Smoke Test Senaryoları

1. ✅ **Home Page Opens** - Ana sayfa açılıyor mu?
2. ✅ **Login Page Opens** - Login sayfası açılıyor mu?
3. ✅ **Login → Dashboard** - Login yapıp dashboard'a erişiliyor mu?
4. ⚠️ **Product List** - Ürün listesi açılıyor mu? (Route henüz yok)
5. ⚠️ **Add to Cart** - Sepete ekleme çalışıyor mu? (Route henüz yok)
6. ⚠️ **Checkout Page** - Checkout sayfası açılıyor mu? (Route henüz yok)

## 🔧 Sorun Giderme

### Migration Hataları

Eğer migration hataları alıyorsanız:

```bash
# Test database'i temizle
psql -U postgres -d postgres -c "DROP DATABASE IF EXISTS app_test;"
psql -U postgres -d postgres -c "CREATE DATABASE app_test;"

# Migration'ları çalıştır
php artisan migrate --env=dusk --force
```

### ChromeDriver Bağlantı Hatası

```bash
# ChromeDriver'ı kontrol et
curl http://localhost:9515/status

# Eğer çalışmıyorsa yeniden başlat
pkill -f chromedriver
./vendor/laravel/dusk/bin/chromedriver-mac-arm --port=9515 &
```

### Server Bağlantı Hatası

```bash
# Server'ın çalıştığını kontrol et
curl http://127.0.0.1:8000

# Eğer çalışmıyorsa yeniden başlat
php artisan serve --port=8000
```

## 📝 Sonraki Adımlar

1. Migration sırası sorunlarını düzelt
2. Storefront route'larını ekle (products, cart, checkout)
3. UI elementlerine `dusk` attribute'ları ekle
4. Tüm smoke testlerin geçtiğini doğrula

## 📚 İlgili Dokümantasyon

- [Test Standartları](./test-standards.md)
- [GitHub Actions CI/CD](../.github/workflows/ci.yml)

