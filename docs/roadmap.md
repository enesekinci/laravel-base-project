# E-Ticaret Platform Roadmap

## A. Katalog Katmanı (Catalog Layer) - %70 Tamamlandı

### Tamamlananlar ✅
- [x] Products (Migration + Model + Seeder)
- [x] Variants (Migration + Model)
- [x] Options / OptionValues (Migration + Model)
- [x] Attributes (EAV) (Migration + Model)
- [x] TaxClass (Migration + Model)
- [x] Brands (Migration + Model)
- [x] Categories + pivots (Migration + Model)
- [x] Tags + pivots (Migration + Model)
- [x] Product images (Migration + Model)
- [x] Filtreleme & QueryBuilder (ProductFilters + ProductQueryBuilder)
- [x] Varyasyon üretme endpoint (Service + Controller)
- [x] API Resources (ProductResource, ProductVariantResource)
- [x] Public API (Liste + Detay)
- [x] Admin CRUD API
- [x] Test Suite (26 test, 128 assertion)

### Kalanlar 🔄
- [ ] Admin tarafında ürün & varyant CRUD ekranları (Inertia + React)
- [ ] Varyasyon üretme UI (Alpine.js ile)
- [ ] Media upload entegrasyonu
- [ ] Bulk operations (toplu güncelleme, silme)

**Not:** Bu katman tamamlanmadan sepet/ödeme konuşmak anlamsız.

---

## B. Sepet & Checkout Katmanı (Cart & Checkout Layer)

### Gerekli Tablolar
- [ ] `carts` - Sepet (user_id / guest_token)
- [ ] `cart_items` - Sepet öğeleri (product_variant_id, qty, unit_price, tax, discount)
- [ ] `coupons` - Kuponlar (code, type, value, min_amount, date_range, usage_limit)
- [ ] `shipping_methods` - Kargo yöntemleri (name, type, price_calculation)
- [ ] `shipping_zones` - Kargo bölgeleri (country, city, price)

### Servisler
- [ ] `CartService` - Sepet yönetimi (ekle, çıkar, güncelle)
- [ ] `CheckoutService` - Checkout işlemleri (fiyat hesaplama, doğrulama)
- [ ] `ShippingCalculator` - Kargo fiyat hesaplama

### API Endpoints
- [ ] `POST /api/cart` - Sepet oluştur
- [ ] `GET /api/cart/{id}` - Sepet detay
- [ ] `POST /api/cart/{id}/items` - Ürün ekle
- [ ] `PUT /api/cart/{id}/items/{item}` - Ürün güncelle
- [ ] `DELETE /api/cart/{id}/items/{item}` - Ürün çıkar
- [ ] `POST /api/cart/{id}/apply-coupon` - Kupon uygula
- [ ] `POST /api/checkout` - Checkout başlat

**Mantık:** UI → Controller → Service (CartService, CheckoutService) → Model / Repo

---

## C. Payment Katmanı (Payment Layer)

### Gerekli Tablolar
- [ ] `payments` - Ödemeler (order_id, provider, amount, status, transaction_id)
- [ ] `payment_methods` - Ödeme yöntemleri (name, provider, config, is_active)

### Servisler
- [ ] `PaymentService` - Ödeme işlemleri (init, callback, verify)
- [ ] Provider entegrasyonları (İyzico, PayTR, Stripe)

### API Endpoints
- [ ] `POST /api/payments/init` - Ödeme başlat
- [ ] `POST /api/payments/callback` - Ödeme callback
- [ ] `GET /api/payments/{id}/status` - Ödeme durumu

**Flow:**
1. Order draft oluştur
2. Payment init → Provider'a yönlendir
3. Success callback → Order finalize
4. Stock düşümü

**Doğru Tasarım:**
- `payments` tablosu ayrı
- `orders` tablosu ayrı
- Payment status: `pending`, `paid`, `failed`
- Order status: `pending`, `confirmed`, `shipped`, `cancelled`

---

## D. Order & Fulfillment Katmanı (Order Management)

### Gerekli Tablolar
- [ ] `orders` - Siparişler (order_number, user_id, status, totals, addresses)
- [ ] `order_items` - Sipariş öğeleri (product_variant_id, qty, price, tax, discount)
- [ ] `order_addresses` - Sipariş adresleri (billing, shipping)
- [ ] `order_status_history` - Durum geçmişi (status, note, timestamp)

### Servisler
- [ ] `OrderService` - Sipariş yönetimi
- [ ] `StockService` - Stok yönetimi (düşüm, artırma)

### Stok Düşüm Mantığı
- ❌ Sepetten değil
- ✅ Order "paid/confirmed" olduğunda stok düş
- ✅ Order iptal edilirse stok geri ekle

### API Endpoints
- [ ] `GET /api/orders` - Sipariş listesi
- [ ] `GET /api/orders/{id}` - Sipariş detay
- [ ] `PUT /api/admin/orders/{id}/status` - Durum güncelle

---

## E. Admin & İş Tarafı Özellikleri (Admin Features)

### Raporlar
- [ ] Günlük/haftalık/aylık satış raporları
- [ ] En çok satan ürün / kategori
- [ ] Müşteri analitikleri
- [ ] Stok raporları

### Ürün Yönetimi
- [ ] Ürün publish planlama (`published_at` kolonu)
- [ ] Bulk import/export (CSV)
- [ ] Ürün kopyalama
- [ ] Çoklu fiyat (B2B/B2C) - `customer_group_prices` (ileride)

### Sipariş Yönetimi
- [ ] Sipariş durumu yönetimi
- [ ] Kargo takip entegrasyonu
- [ ] Fatura oluşturma
- [ ] İade/İptal yönetimi

---

## F. V2 / Gelişmiş Özellikler (Advanced Features)

### Müşteri Deneyimi
- [ ] Wishlist (Favoriler)
- [ ] Recently viewed (Son görüntülenenler)
- [ ] Cross-sell / Upsell önerileri
- [ ] Ürün karşılaştırma
- [ ] Ürün yorumları ve puanlama

### Çoklu Mağaza (Multi-tenant)
- [ ] Store yönetimi
- [ ] Store bazlı ürün/fiyat
- [ ] Store bazlı kargo yöntemleri

### Lokalizasyon
- [ ] Çoklu dil desteği (i18n)
- [ ] Çoklu para birimi
- [ ] Bölgesel fiyatlandırma

### Performans & Ölçeklenebilirlik
- [ ] Full-text search (Meilisearch / Typesense / Elasticsearch)
- [ ] Cache stratejisi (Redis)
- [ ] Queue işlemleri (Laravel Queue)
- [ ] CDN entegrasyonu (görseller için)
- [ ] Database sharding (ileride)

---

## Teknik Notlar

### Controller Pattern
```
View (Blade + JS/Alpine) → Controller → Service (iş mantığı) → Model / Repo
```

- Controller ince olacak (5-10 satır)
- Karmaşık mantık Service katmanında
- Alpine.js sadece UI'ı oynatan ince katman

### Test Stratejisi
- Unit testler: Service'ler, Helper'lar
- Feature testler: API endpoint'leri, CRUD işlemleri
- Integration testler: Tam akışlar (sepet → checkout → ödeme)

### Performans Optimizasyonları
- Index'ler: Kritik sorgular için composite index'ler
- Eager loading: N+1 problem'den kaçınma
- Cache: Sık kullanılan veriler (kategoriler, markalar)
- Queue: Uzun süren işlemler (email, bildirim)

---

## Öncelik Sırası

1. ✅ **Katalog Katmanı** (Devam ediyor)
2. 🔄 **Sepet & Checkout** (Sonraki adım)
3. ⏳ **Payment** (Sepet sonrası)
4. ⏳ **Order Management** (Payment sonrası)
5. ⏳ **Admin Features** (Paralel geliştirilebilir)
6. ⏳ **V2 Features** (İleride)

---

## Notlar

- Her katman bağımsız test edilebilir olmalı
- Service katmanı business logic'i taşır
- Controller sadece HTTP işini yapar
- Frontend (Alpine.js) sadece UI state yönetir
- Database index'leri performans için kritik

