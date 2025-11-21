# Meilisearch Entegrasyonu - Değişiklik Raporu

## Özet

PostgreSQL'deki ILIKE/trigram optimizasyonu yerine, full-text search ve facet filtering için Meilisearch entegrasyonu yapıldı. PostgreSQL sadece ilişkisel veri yönetimi için kullanılıyor, arama işlemleri Meilisearch üzerinden yapılıyor.

## Yapılan Değişiklikler

### 1. Composer Dependencies

**Eklenen Paketler:**
- `laravel/scout` (v10.22.0) - Laravel Scout search engine abstraction
- `meilisearch/meilisearch-php` (v1.16.1) - Meilisearch PHP client

**Kurulum:**
```bash
composer require laravel/scout meilisearch/meilisearch-php
```

### 2. Configuration Files

#### `.env` Dosyası
```env
SCOUT_DRIVER=meilisearch
MEILISEARCH_HOST=http://127.0.0.1:7700
MEILISEARCH_KEY=ktoKlzZaLmZJd6FhxI2mS96Jlv0gsgbFnIEKVptE7Hg
```

#### `config/scout.php`
- Laravel Scout config dosyası publish edildi
- Meilisearch driver ayarları mevcut (host, key)

### 3. Model Değişiklikleri

#### `app/Models/Product.php`

**Eklenenler:**
- `Laravel\Scout\Searchable` trait
- `searchableAs()` metodu → `'products'` index adı
- `shouldBeSearchable()` metodu → Test ortamında otomatik sync'i devre dışı bırakır
- `toSearchableArray()` metodu → Meilisearch'e gönderilecek veri formatı

**toSearchableArray() İçeriği:**
- Base alanlar: `id`, `name`, `slug`, `sku`, `price`, `is_active`, `in_stock`
- Brand: `brand` (marka adı)
- Categories: `category_ids`, `category_names`
- Options (variants): `colors`, `color_ids`, `sizes`, `size_ids`
- Attributes: `attributes` (tüm attribute'ler), `attribute_material`, `attribute_neck_type` (facet için)

**Önemli:** Test ortamında `shouldBeSearchable()` false döndüğü için, testlerde manuel `searchable()` çağrısı yapılıyor.

### 4. Controller

#### `app/Http/Controllers/Api/ProductSearchController.php` (YENİ)

**Özellikler:**
- `__invoke()` metodu - Single action controller
- Meilisearch client kullanımı
- `buildFilterExpression()` - Request filter'larını Meili filter syntax'ına çevirir
- Response formatı: `data` (ProductResource collection) + `meta` (pagination)

**Filter Desteği:**
- `filter[color]` → `color_ids = {id}`
- `filter[size]` → `size_ids = {id}`
- `filter[attribute][material]` → `attribute_material = "value"`
- `filter[in_stock]` → `in_stock = true/false`
- `filter[is_active]` → `is_active = true/false`

**SearchResult API:**
- `$result->getHits()` - Sonuç listesi
- `$result->getEstimatedTotalHits()` - Toplam sonuç sayısı

### 5. Routes

#### `routes/api.php`

**Eklenen Route:**
```php
Route::get('/products/search', \App\Http\Controllers\Api\ProductSearchController::class);
```

**Endpoint:**
```
GET /api/products/search?search=shirt&filter[color]=10&filter[attribute][material]=Pamuk&page=1&per_page=20
```

### 6. Console Command

#### `app/Console/Commands/SetupMeilisearchIndex.php` (YENİ)

**Komut:**
```bash
php artisan meilisearch:setup-products
```

**Yaptığı İşlemler:**
1. Scout driver kontrolü (meilisearch olmalı)
2. Filterable attributes ayarlama:
   - `is_active`, `in_stock`
   - `category_ids`
   - `color_ids`, `size_ids`
   - `attribute_material`, `attribute_neck_type`
3. Sortable attributes ayarlama:
   - `price`, `name`

### 7. Test Dosyaları

#### `tests/Feature/Api/ProductMeilisearchTest.php` (YENİ)

**Test Senaryoları:**
1. **Text Search Test:**
   - 2 tişört + 1 alakasız ürün oluşturulur
   - `search=shirt` ile arama yapılır
   - Sadece tişörtlerin dönmesi beklenir

2. **Facet Filter Test:**
   - 3 ürün oluşturulur (Siyah+Pamuk, Beyaz+Pamuk, Siyah+Polyester)
   - `search=shirt&filter[color]=Siyah&filter[attribute][material]=Pamuk` ile arama
   - Sadece Siyah+Pamuk ürünün dönmesi beklenir

**Helper Fonksiyon:**
- `createSearchableTshirt()` - Test için ürün + variant + option + attribute setup

**Önemli Notlar:**
- Test ortamında `shouldBeSearchable()` false döndüğü için manuel sync yapılıyor
- Sync sonrası `sleep(1)` ile Meili task'larının tamamlanması bekleniyor
- Meili driver set edilmemişse testler skip ediliyor

#### `tests/Pest.php`

**Eklenen:**
- Test ortamında Meili çalışmıyorsa Scout driver'ı `null` yapma kontrolü
- Meili bağlantı hatası durumunda otomatik fallback

### 8. Dokümantasyon

#### `docs/meilisearch-setup.md` (YENİ)

**İçerik:**
- Kurulum adımları (Docker + Laravel)
- Environment variables
- Index ayarları
- API endpoint kullanımı
- Mimari açıklama
- Otomatik sync mekanizması
- Troubleshooting

## Mimari Değişiklikler

### Önceki Yaklaşım (PostgreSQL)
```
GET /api/products?search=shirt
→ PostgreSQL ILIKE query
→ Seq Scan (küçük data için OK, büyük data için problem)
```

### Yeni Yaklaşım (Meilisearch)
```
GET /api/products/search?search=shirt&filter[color]=10
→ Meilisearch full-text search + facet filtering
→ ID listesi döner
→ PostgreSQL'den whereIn('id', $ids) ile ilişkisel veri çekilir
→ Response formatlanır
```

### Veri Akışı

1. **Index'e Ekleme:**
   - Product model'de `Searchable` trait var
   - `Product::create()` → Otomatik Meili'ye sync (production)
   - `Product::update()` → Otomatik Meili'de güncellenir
   - `Product::delete()` → Otomatik Meili'den silinir

2. **Arama:**
   - Meilisearch: Full-text search + facet filtering
   - PostgreSQL: ID listesi ile ilişkisel veri (variants, attributes, brand, vb.)

3. **Response:**
   - ProductResource ile formatlanmış veri
   - Pagination meta bilgisi

## Test Sonuçları

### Önceki Durum
```
✓ 33 tests passed (243 assertions)
- 2 Meilisearch testleri skipped
```

### Şimdiki Durum
```
✓ 35 tests passed (274 assertions)
- 2 Meilisearch testleri geçiyor ✅
- Tüm diğer testler geçiyor ✅
```

## Kullanım Senaryoları

### 1. İlk Kurulum
```bash
# Meili'yi başlat (local)
brew services start meilisearch
# veya
meilisearch --master-key {key}

# Index ayarlarını yap
php artisan meilisearch:setup-products

# Ürünleri import et
php artisan scout:import "App\Models\Product"
```

### 2. API Kullanımı

**Basit Arama:**
```
GET /api/products/search?search=shirt
```

**Arama + Filter:**
```
GET /api/products/search?search=shirt&filter[color]=10&filter[attribute][material]=Pamuk
```

**Pagination:**
```
GET /api/products/search?search=shirt&page=2&per_page=20
```

### 3. Otomatik Sync

Production'da:
- `Product::create()` → Meili'ye otomatik eklenir
- `$product->update()` → Meili'de otomatik güncellenir
- `$product->delete()` → Meili'den otomatik silinir

Test ortamında:
- `shouldBeSearchable()` false döndüğü için otomatik sync yok
- Testlerde manuel `$product->searchable()` çağrısı yapılmalı

## Dosya Değişiklikleri

### Yeni Dosyalar
1. `app/Http/Controllers/Api/ProductSearchController.php`
2. `app/Console/Commands/SetupMeilisearchIndex.php`
3. `tests/Feature/Api/ProductMeilisearchTest.php`
4. `docs/meilisearch-setup.md`

### Değiştirilen Dosyalar
1. `app/Models/Product.php` - Searchable trait + toSearchableArray()
2. `routes/api.php` - `/products/search` route eklendi
3. `tests/Pest.php` - Meili bağlantı kontrolü eklendi
4. `.env` - Meilisearch ayarları eklendi
5. `config/scout.php` - Publish edildi (mevcut)

### Composer
- `composer.json` - `laravel/scout`, `meilisearch/meilisearch-php` eklendi
- `composer.lock` - Güncellendi

## Önemli Notlar

1. **Test Ortamı:** `shouldBeSearchable()` test ortamında false döndüğü için, testlerde manuel sync yapılıyor.

2. **Meili Key:** Local development için master key `.env` dosyasına eklendi. Production'da farklı key kullanılmalı.

3. **Index Ayarları:** `meilisearch:setup-products` komutu bir kere çalıştırılmalı (deploy sonrası).

4. **Sync Mekanizması:** Production'da otomatik, test ortamında manuel.

5. **Performance:** Meilisearch full-text search için optimize edilmiş, PostgreSQL sadece ilişkisel veri için kullanılıyor.

## Sonraki Adımlar (Öneriler)

1. **Production Deployment:**
   - Meilisearch instance kurulumu
   - Master key yönetimi
   - Index ayarlarının otomatik yapılması (deployment script)

2. **Monitoring:**
   - Meili task'larının durumu
   - Search performans metrikleri
   - Index sync durumu

3. **Optimizasyon:**
   - Searchable attributes ayarları (hangi alanlar aranabilir)
   - Ranking rules
   - Synonyms

4. **Backup:**
   - Meili index backup stratejisi
   - Disaster recovery planı

