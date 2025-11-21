# Meilisearch Entegrasyonu

## Kurulum

### 1. Docker ile Meilisearch

```bash
docker run -it --rm \
  -p 7700:7700 \
  -e MEILI_MASTER_KEY=your_master_key \
  getmeili/meilisearch:v1.10
```

### 2. Laravel Scout + Meilisearch

```bash
composer require laravel/scout meilisearch/meilisearch-php
php artisan vendor:publish --provider="Laravel\Scout\ScoutServiceProvider"
```

### 3. Environment Variables

`.env` dosyasına ekle:

```env
SCOUT_DRIVER=meilisearch
MEILISEARCH_HOST=http://127.0.0.1:7700
MEILISEARCH_KEY=your_master_key
```

## Index Ayarları

### Meili Index Setup

```bash
php artisan meilisearch:setup-products
```

Bu command şunları yapar:

-   Filterable attributes: `is_active`, `in_stock`, `category_ids`, `color_ids`, `size_ids`, `attribute_material`, `attribute_neck_type`
-   Sortable attributes: `price`, `name`

### İlk Import

```bash
php artisan scout:import "App\Models\Product"
```

## API Endpoint

### Search Endpoint

```
GET /api/products/search?search=shirt&filter[color]=10&filter[attribute][material]=Pamuk
```

**Parametreler:**

-   `search`: Metin arama
-   `filter[color]`: Renk option value ID
-   `filter[size]`: Beden option value ID
-   `filter[attribute][material]`: Attribute değeri (örn: "Pamuk")
-   `filter[in_stock]`: Stokta olanlar (true/false)
-   `filter[is_active]`: Aktif ürünler (true/false)
-   `page`: Sayfa numarası
-   `per_page`: Sayfa başına kayıt (default: 20)

**Response:**

```json
{
    "data": [
        {
            "id": 1,
            "name": "Basic T-Shirt",
            "slug": "basic-t-shirt",
            "price": 299.9,
            "in_stock": true,
            "is_active": true
        }
    ],
    "meta": {
        "total": 1,
        "current_page": 1,
        "per_page": 20,
        "from": 1,
        "to": 1
    }
}
```

## Mimari

### Akış

1. **Meilisearch**: Full-text search + facet filtering

    - Metin arama: `name`, `sku`, `brand`, `category_names`
    - Facet filtreleme: `color_ids`, `size_ids`, `attribute_material`, vb.

2. **PostgreSQL**: İlişkisel veri

    - Meili'den dönen ID listesi ile `whereIn('id', $ids)`
    - Eager loading: `variants`, `attributeValues`, `brand`, `taxClass`

3. **Response**: ProductResource ile formatlanmış veri

### Product Model - toSearchableArray()

**Index'e giden alanlar:**

-   `id`, `name`, `slug`, `sku`, `price`
-   `is_active`, `in_stock`
-   `brand` (marka adı)
-   `category_ids`, `category_names`
-   `colors`, `color_ids` (renk değerleri ve ID'leri)
-   `sizes`, `size_ids` (beden değerleri ve ID'leri)
-   `attributes` (tüm attribute'ler)
-   `attribute_material`, `attribute_neck_type` (facet için direkt alanlar)

## Otomatik Sync

Product model'de `Searchable` trait kullanıldığı için:

-   `Product::create()` → Meili'ye otomatik eklenir
-   `$product->update()` → Meili'de otomatik güncellenir
-   `$product->delete()` → Meili'den otomatik silinir

## Test

```bash
php artisan test --filter=ProductMeilisearchTest
```

**Not:** Testler Meilisearch'in çalıştığını varsayar. Test öncesi Meili ayağa kalkmış olmalı.

## Troubleshooting

### Meili bağlantı hatası

-   Meili çalışıyor mu kontrol et: `curl http://127.0.0.1:7700/health`
-   `.env` dosyasında `MEILISEARCH_HOST` ve `MEILISEARCH_KEY` doğru mu?

### Index bulunamadı

-   `php artisan meilisearch:setup-products` çalıştır
-   `php artisan scout:import "App\Models\Product"` ile ürünleri import et

### Filtreler çalışmıyor

-   Filterable attributes doğru ayarlanmış mı? `php artisan meilisearch:setup-products`
-   `toSearchableArray()` metodunda facet alanları doğru mu?
