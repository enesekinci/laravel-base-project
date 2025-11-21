1️⃣ Temizlenmiş Admin Modül Listesi
A. Catalog (ÜRÜN TARAFI) – ÖNCELİK

Products [MVP]

Product CRUD

SEO alanları

Stok / fiyat alanları

Meilisearch index sync (zaten var)

İlişkiler:

Categories

Brand

Attributes (EAV)

Options (variation options)

Tags

Images

Reviews (sadece liste + onay/red V2)

Categories [MVP]

CRUD

Parent/child

sort_order

is_active

Brands [MVP]

CRUD

Logo alanı

Attributes [MVP]

Attribute CRUD

Attribute değerleri (product_attribute_values üzerinden)

Attribute Sets [V2]

Set CRUD

Set–Attribute ilişkisi

Variations [MVP]

Variant listesi (per product)

Variant update (price, stock, active)

Variant delete

Variant generate (zaten var, admin endpointleri ile bağlanacak)

Options [MVP]

Option CRUD (örn. Renk, Beden)

Option Value CRUD (Siyah, Beyaz, S, M, L)

Tags [V2]

Basit CRUD (etiket sistemi)

Reviews [V2]

Müşteri yorumları liste

Onayla / reddet / soft delete

B. Sales (SATIŞ) – ÇEKİRDEK

Cart [MVP]

Şu an backend + testler hazır ✅

Orders [MVP]

Order CRUD (admin view)

Order status değişimi (pending, paid, shipped, cancelled vs.)

Cart → Order oluşturma (checkout tarafında)

Order items ilişkisi

Transactions [V2]

Payment provider transaction kayıtları (iyzico/paytr/stripe vs.)

Payment status (success, failed, refunded)

C. Promotions (KAMPANYA) – TEK ADIM GERİ

Coupons [MVP]

Kupon CRUD

Kupon tipleri: fixed / percent

min order amount, start/end date, usage limit

Order tarafında uygulama

Flash Sales [V2]

Belirli ürün/ kategori + zaman aralığı için özel fiyat

Önce normal “special price / special date” ile idare edebiliriz, flash sale’ı sonra açarız.

D. Content / CMS – SONRAKİ DALGA

Pages [V2]

Statik sayfalar (Hakkında, KVKK, İade politikası)

Menus [V2]

Menu CRUD

Menu items (page / category / custom url)

Blog [V3]

Posts

Categories

Tags
(Tamamen opsiyonel, proje ihtiyacına göre)

Media [MVP-ish]

Aslında ürün görselleri için bir upload sistemi zaten lazım.

Bunu önce sadece ürün görselleri için minimal tasarlarız; genel “Media Library” konseptini V2’de açarız.

E. Users & ACL – ZORUNLU AMA ÇEKİRDEKTEN SONRA

Users [MVP]

Admin panelde müşteri listesi + kullanıcı listesi

Roles / Permissions [MVP/V2]

En azından admin / staff ayrımı

İleride granüler permission (product.manage, order.view vs.)

F. Localization & Taxes – GEREKLİ, AMA İKİNCİ DALGA

Languages [V2]

Çoklu dil (TR/EN vs.)

Sitede language switcher

Product translation yapısını sonradan bağlarız

Currency Rates [V2]

Eğer çoklu para birimi olacaksa

Taxes [MVP]

Zaten tax_classes var

Admin’de tax class CRUD ekranı + rate yönetimi

G. Appearance / Storefront – MVP BİTTİKTEN SONRA

Bunlar tamamen admin panel “ayar ekranı”; iş mantığı ağır değil, daha çok config:

Sliders [V2]

Home page slider

Storefront Settings [V2/V3]

General (site adı, meta vs.)

Logo

Footer

Newsletter integration

Product page settings (grid, per page)

Social links

Home Page Sections [V3]

Slider banners

Featured categories

Product tabs

Brand carousels

Blog list vs.
(Tamamen frontend gösterim, backend tarafında sadece “hangi section açık, hangi kategori/ürün bağlı” gibi data tutarız.)

H. Reports – V2

Satış raporları

En çok satan ürünler

Gün/ay bazlı gelir

Bu kısım Order data’sına bağımlı olduğu için orders bitmeden anlamlı değil.

I. Tools – V2/V3

Sitemap [V2]

product, category, page için sitemap XML üretimi

(İleride) Cache clear / index rebuild / search reindex gibi maintenance araçları

J. Settings – GENEL AYARLAR

Burayı sadeleştiriyorum; iki başlık yeter:

General Settings [MVP]

Site adı, e-posta, domain, favicon vs.

Maintenance mode

Logo (admin + storefront)

Store info (adres, telefon, vergi no vs.)

Mail ayarları

SMS ayarları (opsiyonel, V2)

Google reCAPTCHA (V2)

Custom CSS/JS (V2)

Shipping Methods [MVP]

Free Shipping

Local Pickup

Flat Rate
(3 temel kargo metodu backend’de basit tarife mantığıyla yeterli.)

Payment Methods [MVP/V2]

İlk aşamada 1–2 provider seçmemiz yeter: mesela

Iyzico

PayTR

Diğerleri (Craftgate, Stripe, PayPal vs.) V2 / müşteri ihtiyacına göre.

Social Logins [V2/V3]

Facebook / Google login
(Önce klasik e-posta/şifre veya sadece admin tarafına odaklan.)

2️⃣ Biz Backend’de Hangi Sırayla Gideceğiz?

Senin hedefin:

“Önce backend + test + logic bitsin, sonra Cursor sadece tema giydirsin.”

O yüzden backend roadmap’i şöyle sıralıyorum:

📦 Faz 1 – Catalog + Cart (Çekirdek – Şu anki durum)

 Product altyapısı (migration, ilişkiler, filtre)

 Variations + generator

 Meilisearch search endpoint

 Cart katmanı (migrations, service, controller, testler)

✅ Bu fazın çekirdeği bitti.

Eksik: Admin product CRUD + admin listing endpointleri
→ İlk uğraşacağımız yer burası olacak.

🧱 Faz 2 – Admin Catalog Backend (ŞİMDİ)

Sırayla:

Admin Products

List (filtre+search)

Show (detay + ilişkiler)

Create

Update

Soft delete + restore

Toggle active / toggle in_stock

Admin Product Variants

List (per product)

Update (price, stock, is_active)

Delete

Generate endpoint (bizde var, admin kontratı finalize)

Admin Categories

CRUD

Attach/sync to product (zaten pivot var, endpoint şart)

Admin Brands

CRUD

Admin Options & OptionValues

CRUD (renk/beden yönetimi)

Admin Attributes & AttributeSets

Attribute CRUD

Attribute set CRUD

Ürün–attribute değerlerini set eden endpoint

Admin Product Images

Upload endpoint

Delete

Set base

Sort

Bu faz bitince:
Admin panelde ürün tarafına dair ne istersen UI ile yapılabilir durumda olacağız.

💳 Faz 3 – Sales Backend

Order Model + Migration

Checkout Service (Cart → Order)

Admin Orders endpoints (list, detail, status update)

Payment provider abstraction (şimdilik stub + fake provider, sonra Iyzico/PayTR)

🎯 Faz 4 – Coupons & Taxes & Shipping

Bu aşamada:

Coupons CRUD + order’a uygulama

Tax class admin CRUD (zaten tablo var)

Shipping methods config + order total hesaplamasına entegrasyon

📄 Faz 5 – CMS (Pages/Menus/Media) & Settings

Bu, e-ticaret çekirdeği bittikten sonra gelecek.