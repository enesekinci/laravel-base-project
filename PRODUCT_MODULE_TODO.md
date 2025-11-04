# Ürün Modülü Geliştirme TODO Listesi

## ✅ Tamamlanan İşlemler

### Backend - Temel Modüller

- [x] Categories CRUD (Migration, Model, Service, Controller, Routes)
- [x] Brands CRUD (Migration, Model, Service, Controller, Routes)
- [x] Tags CRUD (Migration, Model, Service, Controller, Routes)
- [x] Suppliers CRUD (Migration, Model, Service, Controller, Routes)
- [x] Mannequins CRUD (Migration, Model, Service, Controller, Routes)
- [x] Attributes CRUD (Migration, Model, Service, Controller, Routes)
- [x] Variations CRUD (Migration, Model, Service, Controller, Routes)

### Frontend - Temel Modüller

- [x] Categories Index, Create, Edit, Show sayfaları
- [x] Brands Index, Create, Edit, Show sayfaları
- [x] Tags Index, Create, Edit, Show sayfaları
- [x] Suppliers Index, Create, Edit, Show sayfaları
- [x] Mannequins Index, Create, Edit, Show sayfaları
- [x] Attributes Index, Create, Edit, Show sayfaları
- [x] Variations Index, Create, Edit, Show sayfaları

### Özellikler

- [x] Slug otomatik doldurma (Categories, Brands, Tags)
- [x] Checkbox hatası düzeltildi (tüm modüller)
- [x] Silme butonları eklendi (tüm Index sayfaları)
- [x] Tree görünümü (Categories)

---

## 🔄 Yapılacaklar

### 1. Menü Durumu Düzeltmesi

- [x] Sidebar menü açık/kapalı durumunu sayfa navigasyonunda koru (localStorage ile)

### 2. Variation Template Modülü (Yeni)

- [x] Migration: `variation_templates` tablosu
    - id, name, type (text, color, image), sort_order, is_active, timestamps
- [x] Migration: `variation_template_values` tablosu
    - id, variation_template_id, label, value, color (nullable), image (nullable), sort_order, timestamps
- [x] Model: `VariationTemplate` (relationships: values)
- [x] Model: `VariationTemplateValue`
- [x] FormRequest: `StoreVariationTemplateRequest`, `UpdateVariationTemplateRequest`
- [x] Service: `VariationTemplateService`
- [x] Controller: `VariationTemplateController` (CRUD)
- [x] Routes: Resource routes
- [x] Frontend: Index, Create, Edit, Show sayfaları
- [x] Frontend: Type seçimi (Text, Color, Image)
- [x] Frontend: Values yönetimi (Label, Order, Color/Image)

### 3. Product Attributes Modülü (Mevcut - Kontrol)

- [x] Attributes modülünün ürünlerle ilişkilendirilmesi kontrol et
- [x] Gerekirse `product_attributes` pivot tablosu (Products modülünde oluşturulacak)

### 4. Product Options Modülü (Yeni)

- [x] Migration: `product_options` tablosu
    - id, name, description, type, sort_order, is_active, timestamps
- [x] Migration: `product_option_values` tablosu
    - id, product_option_id, label, value, price_adjustment, sort_order, timestamps
- [x] Model: `ProductOption` (relationships: values)
- [x] Model: `ProductOptionValue`
- [x] FormRequest: `StoreProductOptionRequest`, `UpdateProductOptionRequest`
- [x] Service: `ProductOptionService`
- [x] Controller: `ProductOptionController` (CRUD)
- [x] Routes: Resource routes
- [x] Frontend: Index, Create, Edit, Show sayfaları
- [x] Frontend: Values yönetimi (Label, Price Adjustment)

### 5. Tax Classes Modülü (Yeni)

- [x] Migration: `tax_classes` tablosu
    - id, name, rate (decimal), is_active, timestamps
- [x] Model: `TaxClass`
- [x] FormRequest: `StoreTaxClassRequest`, `UpdateTaxClassRequest`
- [x] Service: `TaxClassService`
- [x] Controller: `TaxClassController` (CRUD)
- [x] Routes: Resource routes
- [x] Frontend: Index, Create, Edit, Show sayfaları

### 6. Products Modülü (Ana Modül)

- [ ] Migration: `products` tablosu
    - id, name, slug, sku, description (longtext), short_description
    - brand_id, tax_class_id
    - status (draft, published), is_virtual
    - seo_url, meta_title, meta_description
    - new_from, new_to
    - sort_order, timestamps, softDeletes
- [ ] Migration: `product_categories` pivot tablosu
- [ ] Migration: `product_tags` pivot tablosu
- [ ] Migration: `product_attributes` pivot tablosu (attribute_id, value)
- [ ] Migration: `product_variations` tablosu
    - id, product_id, variation_template_id (nullable)
    - name, sku, price, compare_price, stock, image
    - is_active, sort_order, timestamps
- [ ] Migration: `product_variation_values` tablosu
    - id, product_variation_id, variation_template_id, variation_template_value_id
    - timestamps
- [ ] Migration: `product_options` pivot tablosu (product_id, product_option_id)
- [ ] Migration: `product_media` tablosu
    - id, product_id, type (image, video), path, alt, sort_order, timestamps
- [ ] Migration: `product_links` tablosu (up-sells, cross-sells, related)
    - id, product_id, linked_product_id, type (up_sell, cross_sell, related), timestamps
- [ ] Model: `Product` (relationships: brand, categories, tags, attributes, variations, options, media, links)
- [ ] Model: `ProductVariation` (relationships: product, template, values)
- [ ] Model: `ProductMedia`
- [ ] Model: `ProductLink`
- [ ] FormRequest: `StoreProductRequest`, `UpdateProductRequest`
- [ ] Service: `ProductService`
- [ ] Controller: `ProductController` (CRUD)
- [ ] Routes: Resource routes
- [ ] Frontend: Index sayfası (liste, filtreleme, arama)
- [ ] Frontend: Create sayfası
    - [ ] Temel bilgiler (name, slug, description rich text, short_description)
    - [ ] Brand, Categories (multi-select), Tags (multi-select)
    - [ ] Tax Class, Status, Is Virtual
    - [ ] Attributes seçimi
    - [ ] Options seçimi
    - [ ] Variation Template seçimi ve yönetimi
    - [ ] Variation kombinasyonları (çaprazlama)
    - [ ] Her varyasyon için: fiyat, barkod, resim, stok
    - [ ] Media yönetimi (çoklu resim/video)
    - [ ] SEO (URL, Meta Title, Meta Description)
    - [ ] Additional (New From, New To)
    - [ ] Linked Products (Up-Sells, Cross-Sells, Related)
- [ ] Frontend: Edit sayfası (Create ile aynı yapı)
- [ ] Frontend: Show sayfası (detay görüntüleme)

### 7. Rich Text Editor

- [ ] Description alanı için rich text editor ekle (Tiptap veya benzeri)

### 8. Commit

- [ ] Tamamlanan işlemler için commit at

---

## Notlar

- Varyasyonlar zorunlu gibi davranılacak (en az 1 varyasyon olmalı)
- Pricing ve Inventory varyasyonlardan yönetilecek
- Variation Template seçildiğinde otomatik kombinasyonlar oluşturulacak
- Media için Spatie Media Library kullanılabilir
