# Kiddy-Back Özelliklerinin Entegrasyonu

Bu doküman, kiddy-back projesinden alınan ve laravel-base-project'e entegre edilen özellikleri açıklar.

## Eklenen Özellikler

### 1. QueryCountLoggerMiddleware

**Dosya:** `app/Http/Middleware/QueryCountLoggerMiddleware.php`

**Amaç:** N+1 query problem'lerini tespit etmek için query sayısını loglar.

**Özellikler:**
- Sadece production dışı ortamlarda aktif
- Query sayısı threshold'u aşarsa warning log'u yazar
- İsteğe bağlı olarak `X-SQL-Count` header'ı ekler

**Kullanım:**
```php
// bootstrap/app.php içinde middleware olarak ekle
$middleware->api(append: [
    \App\Http\Middleware\QueryCountLoggerMiddleware::class,
]);
```

**Config:**
```env
LOG_QUERY_COUNT_THRESHOLD=20
LOG_INCLUDE_QUERY_COUNT_HEADER=false
```

### 2. IsActiveScope ve IsActive Trait

**Dosyalar:**
- `app/Scopes/IsActiveScope.php`
- `app/Traits/IsActive.php`

**Amaç:** Model'lerde `is_active` kolonunu otomatik olarak filtreler. Sadece aktif kayıtlar döner.

**Kullanım:**
```php
use App\Traits\IsActive;

class Product extends Model
{
    use IsActive;
    // ...
}

// Sadece aktif ürünler
Product::all(); // is_active = true olanlar

// Scope'u bypass et
Product::withoutGlobalScope(IsActiveScope::class)->get();

// Veya macro method'ları kullan
Product::withInactive()->get(); // Tüm kayıtlar
Product::onlyInactive()->get(); // Sadece inactive kayıtlar
```

**Not:** Bu trait'i kullanmak için model'de `is_active` kolonu olmalıdır.

### 3. SetLocale Middleware Geliştirmesi

**Dosya:** `app/Http/Middleware/SetLocale.php`

**Yeni Özellikler:**
- `user-lang` header desteği (API için)
- `Accept-Language` header parsing iyileştirmesi
- Config'den desteklenen locale'ler

**Kullanım:**
```php
// Header ile
GET /api/products
Headers: user-lang: tr

// Query parameter ile
GET /api/products?locale=tr

// Accept-Language header ile
GET /api/products
Headers: Accept-Language: tr-TR,tr;q=0.9,en-US;q=0.8
```

**Config:**
```env
APP_SUPPORTED_LOCALES=tr,en
```

### 4. LogRequest Middleware Geliştirmesi

**Dosya:** `app/Http/Middleware/LogRequest.php`

**Yeni Özellikler:**
- File upload tracking
- Custom header logging (client-time-zone, urs-id, urss-id)
- Request body logging (password alanları hariç)

**Log Formatı:**
```json
{
    "method": "POST",
    "url": "https://example.com/api/products",
    "path": "api/products",
    "ip": "127.0.0.1",
    "user_id": 1,
    "status_code": 200,
    "response_time_ms": 125.5,
    "user_agent": "Mozilla/5.0...",
    "timezone": "Europe/Istanbul",
    "urs_id": "123",
    "urss_id": "456",
    "request": {
        "name": "Product Name",
        "price": 99.99
    },
    "files": ["image.jpg", "document.pdf"]
}
```

### 5. AfterLocalTime Validation Rule

**Dosya:** `app/Rules/AfterLocalTime.php`

**Amaç:** Client timezone'unda bir tarihin belirtilen tarihten sonra olup olmadığını kontrol eder.

**Kullanım:**
```php
use App\Rules\AfterLocalTime;

$request->validate([
    'start_date' => ['required', 'date', new AfterLocalTime($request)],
]);
```

**Gereksinimler:**
- `client-time-zone` header (örn: "Europe/Istanbul")
- `client-time` header (opsiyonel, yoksa şu anki zaman kullanılır)

**Örnek:**
```php
// Request
POST /api/events
Headers:
  client-time-zone: Europe/Istanbul
  client-time: 2024-01-15 10:00:00
Body:
  start_date: 2024-01-14 09:00:00

// Validation: start_date client-time'dan önce, hata verir
```

## Config Güncellemeleri

### config/logging.php

Yeni ayarlar:
```php
'query_count_threshold' => env('LOG_QUERY_COUNT_THRESHOLD', 20),
'include_query_count_header' => env('LOG_INCLUDE_QUERY_COUNT_HEADER', false),
```

### config/app.php

Yeni ayar:
```php
'supported_locales' => explode(',', (string) env('APP_SUPPORTED_LOCALES', 'tr,en')),
```

## Environment Variables

Aşağıdaki environment variable'ları `.env` dosyasına ekleyebilirsiniz:

```env
# Locale
APP_SUPPORTED_LOCALES=tr,en

# Query Count Logging
LOG_QUERY_COUNT_THRESHOLD=20
LOG_INCLUDE_QUERY_COUNT_HEADER=false
```

## Middleware Kullanımı

### QueryCountLoggerMiddleware

Development ve staging ortamlarında query sayısını loglamak için:

```php
// bootstrap/app.php
$middleware->api(append: [
    \App\Http\Middleware\QueryCountLoggerMiddleware::class,
]);
```

**Not:** Production'da otomatik olarak devre dışı kalır.

## Best Practices

### IsActive Trait Kullanımı

1. **Model'de kullan:**
   ```php
   use App\Traits\IsActive;
   
   class Product extends Model
   {
       use IsActive;
   }
   ```

2. **Scope'u bypass et:**
   ```php
   // Admin panelinde tüm ürünleri göster
   Product::withoutGlobalScope(IsActiveScope::class)->get();
   ```

3. **Sadece inactive kayıtları getir:**
   ```php
   Product::onlyInactive()->get();
   ```

### Query Count Monitoring

1. **Threshold ayarla:**
   ```env
   LOG_QUERY_COUNT_THRESHOLD=20
   ```

2. **Header ekle (development için):**
   ```env
   LOG_INCLUDE_QUERY_COUNT_HEADER=true
   ```

3. **Log'ları kontrol et:**
   ```bash
   tail -f storage/logs/laravel.log | grep "Yüksek query sayısı"
   ```

### Locale Yönetimi

1. **Desteklenen locale'leri ayarla:**
   ```env
   APP_SUPPORTED_LOCALES=tr,en,de,fr
   ```

2. **API'de locale belirt:**
   ```bash
   curl -H "user-lang: tr" https://api.example.com/products
   ```

3. **Web'de query parameter kullan:**
   ```
   https://example.com/products?locale=tr
   ```

## Sorun Giderme

### QueryCountLoggerMiddleware Çalışmıyor

- Production ortamında otomatik olarak devre dışı kalır
- Middleware'in bootstrap/app.php'de kayıtlı olduğundan emin olun

### IsActive Scope Çalışmıyor

- Model'de `is_active` kolonu olduğundan emin olun
- Migration'da `is_active` kolonu `boolean` veya `tinyInteger` olmalı
- Trait'in model'de kullanıldığından emin olun

### Locale Değişmiyor

- `APP_SUPPORTED_LOCALES` config'inde locale'in olduğundan emin olun
- Header veya query parameter'ın doğru gönderildiğinden emin olun
- Middleware'in bootstrap/app.php'de kayıtlı olduğundan emin olun

## Gelecek İyileştirmeler

- [ ] QueryCountLoggerMiddleware için dashboard/alert sistemi
- [ ] IsActive scope için admin panel toggle
- [ ] Locale için database tabanlı yönetim
- [ ] AfterLocalTime için daha fazla validation rule

