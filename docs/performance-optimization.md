# Performance Optimization Checklist

## Index Kontrolü ✅

### Tamamlanan Index'ler

#### `products` tablosu
- ✅ `product_id` (foreign key)
- ✅ `brand_id` (index)
- ✅ `tax_class_id` (index)
- ✅ `slug` (index)
- ✅ `sku` (index)
- ✅ `name` (index) - **Yeni eklendi**
- ✅ `is_active` (index)
- ✅ `in_stock` (index)

#### `product_variants` tablosu
- ✅ `product_id` (index)
- ✅ `sku` (index)
- ✅ `is_active` (index)
- ✅ `in_stock` (index)

#### `variant_option_values` tablosu
- ✅ `variant_id` (index)
- ✅ `option_id` (index)
- ✅ `option_value_id` (index)
- ✅ Unique constraint: `[variant_id, option_id, option_value_id]`

#### `product_attribute_values` tablosu
- ✅ `product_id` (index)
- ✅ `attribute_id` (index)
- ✅ `option_value_id` (index)
- ✅ Composite index: `[product_id, attribute_id]`

#### `option_values` tablosu
- ✅ `option_id` (index)
- ✅ `sort_order` (index)

#### `attributes` tablosu
- ✅ `slug` (index)
- ✅ `is_filterable` (index)
- ✅ `option_id` (index)

## Search Optimizasyonu ✅

### Database Driver Uyumluluğu
- PostgreSQL: `ILIKE` (case-insensitive)
- SQLite/MySQL: `LIKE` (case-insensitive via collation)
- Otomatik driver kontrolü eklendi

### Search Parametresi
```
GET /api/products?search=shirt&filter[color]=10&filter[attribute][material]=Pamuk
```

**Arama Alanları:**
- `name` (ILIKE/LIKE)
- `sku` (ILIKE/LIKE)

## Test Coverage ✅

### Search Testleri
- ✅ Name ile arama
- ✅ SKU ile arama
- ✅ Search + Filter kombinasyonu

## Performance Test Seeder

### Kullanım
```bash
php artisan db:seed --class=PerformanceTestSeeder
```

### Oluşturulan Veri
- **1,500 ürün**
- **10 marka**
- **8 kategori**
- **3 option** (Renk, Beden, Malzeme)
- **15 attribute**
- **Her ürüne 2-5 variant**
- **Her ürüne 3-8 attribute değeri**

### Toplam Veri
- ~1,500 product
- ~4,500-7,500 product_variant
- ~4,500-12,000 product_attribute_value
- ~13,500-22,500 variant_option_values

## EXPLAIN ANALYZE Senaryoları

### Senaryo 1: Basit Search
```sql
EXPLAIN ANALYZE
SELECT * FROM products 
WHERE name LIKE '%shirt%' OR sku LIKE '%shirt%';
```

**Beklenen:**
- `name` index kullanımı (prefix search için)
- `sku` index kullanımı

### Senaryo 2: Filter + Search
```sql
EXPLAIN ANALYZE
SELECT * FROM products 
WHERE (name LIKE '%shirt%' OR sku LIKE '%shirt%')
AND EXISTS (
    SELECT 1 FROM product_variants 
    WHERE product_variants.product_id = products.id
    AND EXISTS (
        SELECT 1 FROM variant_option_values
        JOIN option_values ON option_values.id = variant_option_values.option_value_id
        WHERE variant_option_values.variant_id = product_variants.id
        AND option_values.id = 10
    )
);
```

**Beklenen:**
- `product_variants.product_id` index
- `variant_option_values.variant_id` index
- `variant_option_values.option_value_id` index

### Senaryo 3: Attribute Filter + Search
```sql
EXPLAIN ANALYZE
SELECT * FROM products 
WHERE (name LIKE '%shirt%' OR sku LIKE '%shirt%')
AND EXISTS (
    SELECT 1 FROM product_attribute_values
    JOIN attributes ON attributes.id = product_attribute_values.attribute_id
    WHERE product_attribute_values.product_id = products.id
    AND attributes.slug = 'material'
    AND attributes.is_filterable = true
    AND product_attribute_values.value_string = 'Pamuk'
);
```

**Beklenen:**
- `product_attribute_values.[product_id, attribute_id]` composite index
- `attributes.slug` index
- `attributes.is_filterable` index

## İleri Seviye Optimizasyonlar (Gelecek)

### 1. Full-Text Search (PostgreSQL)
```sql
-- GIN index ile full-text search
CREATE INDEX products_name_fts_idx ON products 
USING gin(to_tsvector('turkish', name));

-- Arama sorgusu
SELECT * FROM products 
WHERE to_tsvector('turkish', name) @@ to_tsquery('turkish', 'shirt');
```

### 2. Partial Index'ler
```sql
-- Sadece aktif ürünler için index
CREATE INDEX products_active_name_idx ON products(name) 
WHERE is_active = true;
```

### 3. Composite Index'ler
```sql
-- Sık kullanılan kombinasyonlar için
CREATE INDEX products_active_in_stock_idx ON products(is_active, in_stock);
```

### 4. Search Engine Entegrasyonu
- Meilisearch / Typesense / Elasticsearch
- Product index'i otomatik sync
- Search API → Search engine → Product IDs → DB'den preload

## Monitoring

### Query Performance
```php
// Laravel Debugbar veya Telescope ile
DB::enableQueryLog();
$products = Product::query()->withIncludes($request)->applyFilters($request)->paginate(15);
dd(DB::getQueryLog());
```

### Slow Query Log
PostgreSQL'de:
```sql
-- Slow query log aktif et
ALTER SYSTEM SET log_min_duration_statement = 1000; -- 1 saniye
SELECT pg_reload_conf();
```

## Checklist

- [x] Tüm kritik index'ler eklendi
- [x] Search parametresi eklendi
- [x] Database driver uyumluluğu
- [x] Search testleri yazıldı
- [x] Performance test seeder oluşturuldu
- [ ] EXPLAIN ANALYZE çalıştırıldı (manuel)
- [ ] Slow query log kontrol edildi
- [ ] Full-text search entegrasyonu (ileride)

