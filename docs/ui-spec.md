FastCommerce – UI Spec v1 0. Mimarî Özet

Backend: Laravel (API first, Sanctum, Meilisearch, test’li domain mantığı hazır)

Admin:

Layout: Blade + HTML + CORK TEMPLATE (BASED)

Dinamik kısım: Pure JS + Alpine.js (SPA yok, React yok)

AJAX: /api/admin/\* endpointleri

Storefront (müşteri tarafı):

Layout: Blade (veya ayrı front - ama bu spec Blade + Alpine kabul ediyor)

AJAX: /api/\* endpointleri

Auth:

Admin: web guard + is_admin = true zorunluluğu

Customer: auth:sanctum (token) + /api/auth/\* endpointleri (register/login/logout/me)

Klasör önerisi:

resources/views/admin/layouts/app.blade.php

resources/views/admin/\*.blade.php

resources/views/storefront/layouts/app.blade.php

resources/views/storefront/\*.blade.php

JS:

resources/js/admin/\*.js

resources/js/storefront/\*.js

Alpine global init: resources/js/alpine.js

1. Admin UI
   1.1. Admin Layout

Dosya: resources/views/admin/layouts/app.blade.php

İçerik:

<html> + <head>

Title, meta, CSS, JS bundle

<body>

Sidebar

Topbar

Main content slot

Global modals (confirm, toast)

Sidebar Menüsü (tree)

Dashboard

Products

- Products
- Categories
- Brands
- Attributes
- Options
- Tags

Sales

- Orders
- Coupons
- Transactions

Customers

- Customers
- Customer Addresses (view only, detail içinden)

Content

- Pages
- Blog Posts
- Blog Categories
- Blog Tags
- Menus
- Sliders
- Content Blocks
- Media Library

Localization

- Languages (ileride)
- Tax Classes

Shipping & Payment

- Shipping Methods
- Payment Methods

Settings

- General
- Storefront
- Mail
- SMS
- Currency & Taxes

Topbar:

Search input (global search için ileride)

“New Product” kısa yolu

User dropdown (logout)

1.2. Admin – Genel UI Pattern’ler
Table pattern

Reusable Blade partial: admin/components/table.blade.php

Özellikler:

Kolon başlıkları (slot)

<tbody> içinde loop

Actions column (edit/delete/restore)

Filter bar pattern

Her list sayfasının üstünde:

Search input

Status dropdown (is_active, status gibi)

Date range (isteğe bağlı)

“Reset filters” butonu

Pagination

Laravel pagination JSON’undan: meta.current_page, meta.last_page, meta.per_page, meta.total

Ön yüzde standard pagination component (Prev / Next / sayfa numaraları)

Modal pattern

Alpine ile:

<div x-data="{ open: false }">

x-show="open"

Form submit → AJAX → success → modal kapat → listeyi yeniden yükle

2. Admin – Modül Bazlı Ekranlar

Aşağıdaki tüm sayfalar admin layout’u kullanır ve AJAX ile /api/admin/\* endpointlerine vurur.

2.1. Products
2.1.1. Product List

View: admin/products/index.blade.php

Endpoint: GET /api/admin/products

Query:

search (name/sku)

category_id

brand_id

is_active

in_stock

page, per_page

Kolonlar:

Checkbox (bulk)

Image (thumbnail – first product image / media)

Name

SKU

Price

Stock (total or manage_stock info)

Status (is_active + in_stock)

Created at

Actions (edit, delete, restore)

Actions:

“New Product” → create sayfasına gider

“Edit” → edit sayfası

“Delete” → soft delete via DELETE /api/admin/products/{id}

“Restore” → POST /api/admin/products/{id}/restore

“Toggle Active” → POST /api/admin/products/{id}/toggle-active

2.1.2. Product Create / Edit

View: admin/products/form.blade.php

Endpoints:

Create:

POST /api/admin/products

Edit:

GET /api/admin/products/{id}

PUT /api/admin/products/{id}

Related:

GET /api/admin/categories?tree=1 (kategori select/tree)

GET /api/admin/brands

GET /api/admin/tags

GET /api/admin/attributes

GET /api/admin/options

GET /api/admin/media?collection=products

Form sekmeleri:

General

Name, Slug

SKU

Status (is_active)

Description / Short description

Pricing

Price

Special price, type (percent/fixed), start/end

Tax class select

Inventory

manage_stock

quantity

in_stock (override)

Associations

Categories (multi-select tree)

Brand

Tags (multi-select, tagify)

Images

Thumbnail / gallery seçimi (Media Library modal)

Sort order

Attributes

Attribute value assignment (material, neck type vs.)

Options & Variants

Option selection (color, size vs.)

Variant generation (aşağıda)

2.1.3. Variant Management

View (aynı form içinde tab): admin/products/variants.blade.php (partial)

Endpoints:

GET /api/admin/products/{id}/variants

POST /api/admin/products/{id}/variants/generate

PUT /api/admin/product-variants/{id}

DELETE /api/admin/product-variants/{id}

Variant tab:

Sol tarafta: seçili options (color, size, vs.)
(kullanıcı product formda options seçince)

“Generate variants” butonu:

Payload: seçilen option_value_id dizisi

POST /api/admin/products/{id}/variants/generate

Response:

data[] => variant list + attribute combination

meta.created_count, meta.skipped_count

Aşağıda grid/table:

Columns: SKU, Option values (Color, Size ...), Price, Quantity, Is active

Inline edit (Alpine ile) + Save butonu:

PUT /api/admin/product-variants/{id}

2.2. Categories / Brands / Tags / Attributes / Options

Hepsinin pattern’i aynı:

2.2.1. Categories

List View: admin/categories/index.blade.php

Endpoints:

GET /api/admin/categories

search, parent_id, is_active

POST /api/admin/categories

PUT /api/admin/categories/{id}

DELETE /api/admin/categories/{id}

POST /api/admin/categories/{id}/restore

Form fields:

Name

Slug

Parent category

Description

Image (media picker)

sort_order

is_active

UI:

Tree view / düz liste

Inline edit veya modal

2.2.2. Brands

List + form:

Name

Slug

Logo (media)

is_active

2.2.3. Tags

List + form:

Name

Slug

2.2.4. Attributes & Options

Attributes:

Name

Slug

Type (text, select, multi_select, color etc.)

is_filterable

Values (attribute_values) → nested list

Options:

Name

Type (select, radio, checkbox, color)

Option values (value, sort_order)

Her biri için:

GET /api/admin/attributes

POST /api/admin/attributes

PUT /api/admin/attributes/{id}

DELETE /api/admin/attributes/{id}

Values alt endpointler:

POST /api/admin/attributes/{id}/values

PUT /api/admin/attribute-values/{id}

DELETE /api/admin/attribute-values/{id}

2.3. Media Library

View: admin/media/index.blade.php

Endpoints:

GET /api/admin/media?search=&collection=&page=1

POST /api/admin/media (file upload)

PUT /api/admin/media/{id}

DELETE /api/admin/media/{id}

POST /api/admin/media/{id}/restore

UI:

Grid view:

Thumbnail + filename + collection + alt

Filter:

Collection (products, sliders, banners, blogs, etc.)

Search (filename/alt)

“Upload” butonu:

File input (multiple)

AJAX upload

“Select media” modal:

Başka sayfalardan (product images, slider item image vs.) açılır.

Parent sayfa, seçilen media’nın id + url’sini alır.

2.4. Sliders
2.4.1. Slider List

View: admin/sliders/index.blade.php

Endpoints:

GET /api/admin/sliders?search=&is_active=

POST /api/admin/sliders

PUT /api/admin/sliders/{id}

DELETE /api/admin/sliders/{id}

POST /api/admin/sliders/{id}/restore

Fields:

name

code (unique, ör: home_main)

is_active

sort_order

2.4.2. Slider Detail (Items)

View: admin/sliders/show.blade.php

Endpoint: GET /api/admin/sliders/{id} (items ile)

Item endpoints:

GET /api/admin/sliders/{slider}/items

POST /api/admin/sliders/{slider}/items

PUT /api/admin/slider-items/{id}

DELETE /api/admin/slider-items/{id}

POST /api/admin/slider-items/{id}/restore

Item fields:

media_file_id (image)

title

subtitle

button_text

button_url

link_url

sort_order

is_active

meta (json extra)

UI:

Slider info üstte

Aşağıda item listesi (table) + “Add item” modal

2.5. Content Blocks

View: admin/content-blocks/index.blade.php

Endpointler:

GET /api/admin/content-blocks?search=&group=home

POST /api/admin/content-blocks

PUT /api/admin/content-blocks/{id}

DELETE /api/admin/content-blocks/{id}

Fields:

key (ör: home.featured_categories, home.product_tabs_one)

name (admin label)

type (json, html, markdown)

value (json)

is_active

UI:

Sol listede block listesi

Sağda seçili block edit alanı:

type=json → JSON editor (textarea + küçük helper text)

type=html → textarea (veya WYSIWYG)

Home sayfasındaki her section bu bloklardan gelecektir.

2.6. Orders (Admin)
2.6.1. Order List

View: admin/orders/index.blade.php

Endpoint: GET /api/admin/orders

Query:

search (order number, email)

status

payment_status

date_from, date_to

page

Kolonlar:

Order #

Customer (name/email)

Status

Payment status

Total

Created at

2.6.2. Order Detail

View: admin/orders/show.blade.php

Endpoint: GET /api/admin/orders/{id} (items, addresses, transactions ile)

Sekmeler:

Overview

Status badges

Totals (subtotal, discount, shipping, grand_total)

Status change buttons (processing, shipped, completed, cancelled)

POST /api/admin/orders/{id}/status (payload: status)

Items

Products list (name, sku, qty, price, total)

Transactions

GET /api/admin/orders/{id}/transactions

Payment + refund kayıtları

Addresses

Billing / shipping

Refund

Form:

amount

POST /api/admin/orders/{id}/refund

State machine, backend’de hazır: UI sadece ilgili endpointleri tetikleyecek.

2.7. Coupons

View: admin/coupons/index.blade.php, admin/coupons/form.blade.php

Endpoints:

GET /api/admin/coupons

POST /api/admin/coupons

PUT /api/admin/coupons/{id}

DELETE /api/admin/coupons/{id}

Fields:

code

type (percent / fixed / free_shipping)

value

start_date / end_date

usage_limit

per_user_limit

min_order_total

is_active

2.8. Customers

View: admin/customers/index.blade.php, admin/customers/show.blade.php

Endpoints:

GET /api/admin/customers?search=

GET /api/admin/customers/{id} (addresses + orders ile)

Kolonlar:

Name, email, phone, registered_at

Detail:

Info

Addresses

Orders

2.9. Blog / Pages / Menus

Blog:

Posts:

List: GET /api/admin/posts

Form: POST/PUT /api/admin/posts

Fields: title, slug, excerpt, content, status, published_at, categories, tags, cover media

Categories / Tags:

Klasik CRUD (name + slug)

Pages:

List + form:

title, slug, content, is_active, show_in_footer, meta_title, meta_description

Endpoints:

GET /api/admin/pages, POST /api/admin/pages, PUT /api/admin/pages/{id}, DELETE /api/admin/pages/{id}

Menus:

Menu list:

GET /api/admin/menus

Menu detail:

GET /api/admin/menus/{id} (items ile)

Items:

POST /api/admin/menus/{menu}/items

PUT /api/admin/menu-items/{id}

DELETE /api/admin/menu-items/{id}

Menu item fields:

title

type (url/page/category/post)

url / target_id (type’a göre)

parent_id (nested)

sort_order

is_active

2.10. Settings

View: admin/settings/index.blade.php

UI sekmeleri:

General

Storefront

Mail

SMS

Currency & Taxes

Social login (ileride)

Endpoints:

GET /api/admin/settings?group=general

POST /api/admin/settings/{group}

Payload örneği:

{
"values": [
{ "key": "site_name", "value": "FastCommerce", "type": "string" },
{ "key": "logo_media_id", "value": 123, "type": "integer" },
{ "key": "maintenance_enabled", "value": true, "type": "boolean" }
]
}

3. Storefront (Customer Side)
   3.1. Layout

View: storefront/layouts/app.blade.php

Header:

Logo

Main menu (from menus → code=main)

Search bar

Account (login/register or user menu)

Cart icon (mini summary)

Footer:

Menu (footer menu)

CMS pages (about, contact, etc.)

Social links (settings)

3.2. Pages & Endpoints
3.2.1. Home Page

View: storefront/home.blade.php
Endpointler (Blade içinde backend çağırabilir veya AJAX):

Sliders:

GET /api/sliders/home_main (veya admin koduna göre)

Content blocks:

GET /api/content-blocks?keys[]=home.slider_banners&keys[]=home.featured_categories&...

Product listing:

“Featured / New / Best Sellers” için:

GET /api/products?filter[featured]=1

GET /api/products?sort=-created_at

vs.

Home sayfası tamamen ContentBlocks + sliders + product list üzerinden çalışır.

3.2.2. Category Listing

View: storefront/category.blade.php
Endpoint: GET /api/products/search

Query params:

search (optional)

category_id

brand_id

filterler:

filter[color]=

filter[size]=

filter[attribute][material]=

vs.

page, per_page, sort

UI:

Sol taraf: filters

Üst: sort (price asc/desc, newest)

Grid: product cards

3.2.3. Product Detail

View: storefront/product.blade.php
Endpoint:

GET /api/products/{slug} veya {id}

Döndürülenler:

Product base fields

Variants + options

Attributes

Images

UI:

Image gallery

Price:

Variant seçimine göre dinamik (JS + endpoint’ten gelen fiyat/stock)

Option selector:

Color, size, vs. (option values)

Quantity input

Add to cart button:

POST /api/cart/items:

product_id

product_variant_id (opsiyonel)

quantity

3.2.4. Search Results

View: storefront/search.blade.php
Endpoint: GET /api/products/search?search=query&... (Meilisearch)

3.3. Cart / Checkout
3.3.1. Cart

View: storefront/cart.blade.php
Endpoints:

GET /api/cart → current cart

POST /api/cart/items

PUT /api/cart/items/{id}

DELETE /api/cart/items/{id}

UI:

List of items:

Name, variant labels, price, quantity, total

Update quantity (plus/minus)

Remove item

Cart summary: subtotal, discount, shipping placeholder, grand total estimate

“Proceed to checkout” → /checkout

3.3.2. Checkout

View: storefront/checkout.blade.php
Precondition: kullanıcı login; değilse /login?redirect=/checkout

Endpoints:

Addresses:

GET /api/account/addresses

POST /api/account/addresses (checkout içinden de yeni adres oluşturabilir)

Shipping methods:

GET /api/shipping-methods (aktif olanlar)

Payment methods:

GET /api/payment-methods (aktif olanlar)

Checkout:

POST /api/checkout

Payload:

shipping_address_id

billing_address_id (opsiyonel)

shipping_method_id

payment_method_id

notes

Response:

order_id

payment.redirectUrl (PayTR) veya

payment.htmlForm (Iyzico)
Front:

Eğer redirectUrl varsa JS ile window.location = redirectUrl

Eğer htmlForm varsa innerHTML ile sayfaya bas, auto-submit.

Success / Fail sayfaları:

storefront/checkout-success.blade.php

GET /order-success?order_id=123

GET /api/orders/{id} ile siparişi göster

storefront/checkout-failed.blade.php

GET /order-failed?order_id=123

3.4. Auth & Account (Frontend)
3.4.1. Login / Register

Views:

storefront/auth/login.blade.php

storefront/auth/register.blade.php

Endpoints:

POST /api/auth/register

POST /api/auth/login

POST /api/auth/logout

GET /api/auth/me

Front:

Token’ı localStorage / cookie’de tut (spec olarak: localStorage: auth_token)

Axios / fetch:

All /api/account/\*, /api/checkout, /api/cart gibi uçlara Authorization: Bearer {token} gönder.

3.4.2. Account Dashboard

View: storefront/account/dashboard.blade.php
Endpoints:

GET /api/auth/me

GET /api/account/orders (last orders)

3.4.3. Account Orders

View: storefront/account/orders.blade.php
Endpoints:

List: GET /api/account/orders

Detail: GET /api/account/orders/{id}

3.4.4. Account Addresses

View: storefront/account/addresses.blade.php
Endpoints:

GET /api/account/addresses

POST /api/account/addresses

PUT /api/account/addresses/{id}

DELETE /api/account/addresses/{id}

3.5. Blog / Pages / Menus (Frontend)
Blog

Blog list:

storefront/blog/index.blade.php

GET /api/blog/posts?search=&category=&tag=&page=

Post detail:

storefront/blog/show.blade.php

GET /api/blog/posts/{slug}

Pages

Generic CMS page:

Route: /page/{slug}

GET /api/pages/{slug}

Menus

Header + footer menüleri:

GET /api/menus/{code} → main, footer
(veya Blade’de backend’ten direkt çek)

4. Component Breakdown (Cursor için net görevler)

Cursor’a verilecek ana işler:

4.1. Admin tarafında oluşturulacak ana bileşenler

Admin Layout

admin/layouts/app.blade.php

resources/js/admin/init.js (Alpine, axios config, csrf, base URL vs.)

Generic Components

Table partial

Filter bar partial

Pagination partial

Modal partial

Toast/notification component (Alpine store)

Products Module

admin/products/index.blade.php + JS (list + filters + actions)

admin/products/form.blade.php + JS (create/edit with tabs)

admin/products/variants.blade.php partial + JS (variant generation, inline edit)

Taxonomy Modules

Categories, Brands, Tags, Attributes, Options

Her biri için index + modal/form

JSON endpointlere uygun axios çağrıları

Media Library

Grid view + Upload + Select modal

JS:

upload queue

search + filter

callback ile parent sayfaya seçilen media id/url döndürme

Sliders & Content Blocks

Slider list + detail (item editor)

ContentBlocks JSON/HTML editor

Orders

List view + filters

Detail view:

Status buttons

Refund modal (amount + POST /orders/{id}/refund)

Settings

Tabbed UI

GET /settings?group=... + POST /settings/{group} ile çalışacak generic form builder (key → input)

4.2. Storefront bileşenleri

Storefront Layout

Header: menu + search + cart + account

Footer: menu + CMS links

Home Page

Sliders & content blocks reading

Product sections (carousels vs.)

Catalog

Category listing (filters + sorting)

Search result page

Product Detail

Gallery

Options selectors

Dynamic price/stock info

Add to cart

Cart & Checkout

Cart page

Checkout wizard:

Step 1: Address

Step 2: Shipping method

Step 3: Payment method

Step 4: Review & pay

Payment integration:

PayTR redirect

Iyzico form render

Auth & Account

Login/Register forms

Account dashboard

Orders

Addresses

Blog & Pages

Blog list/detail

CMS page renderer
