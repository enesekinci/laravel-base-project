---
name: Laravel Base Project Refactor - Livewire 3 + MaryUI Migration
overview: Laravel base project'i 2026 standartlarına çekmek için Livewire 3 + MaryUI'ye geçiş, template kalıntılarını temizleme, PHP 8.3 upgrade, tüm endpoint'ler için Swagger dokümantasyonu ve her kod için test yazımı.
todos:
  - id: cleanup_templates
    content: "Template kalıntılarını kaldır: public/cork/, public/porto/, cork-template/ klasörlerini sil"
    status: completed
  - id: php_upgrade
    content: PHP versiyonunu 8.2'den 8.3'e yükselt (composer.json, Dockerfile)
    status: completed
  - id: install_livewire
    content: Livewire 3 kurulumu yap ve yapılandır
    status: completed
    dependencies:
      - php_upgrade
  - id: install_maryui
    content: MaryUI kurulumu yap ve yapılandır
    status: completed
    dependencies:
      - install_livewire
  - id: convert_layout
    content: Admin layout'u Livewire + MaryUI x-mary-main yapısına çevir
    status: completed
    dependencies:
      - install_maryui
  - id: convert_auth
    content: Auth sayfalarını (login, register, forgot-password, reset-password) Livewire component'lerine çevir
    status: completed
    dependencies:
      - convert_layout
  - id: convert_dashboard
    content: Dashboard'u Livewire component'e çevir
    status: completed
    dependencies:
      - convert_layout
  - id: swagger_auth
    content: Auth endpoint'leri için Swagger annotation'ları ekle (LoginController, RegisterController, MeController, LogoutController)
    status: completed
  - id: swagger_base
    content: Base OpenAPI tanımını oluştur (@OA\Info, @OA\Server)
    status: completed
  - id: tests_auth
    content: Auth Livewire component'leri için test yaz (LoginTest, RegisterTest, ForgotPasswordTest)
    status: completed
    dependencies:
      - convert_auth
  - id: tests_dashboard
    content: Dashboard Livewire component'i için test yaz
    status: completed
    dependencies:
      - convert_dashboard
  - id: module_structure_rules
    content: Modül bazlı klasörleme cursor rules yaz (views, migrations, models, controllers modül bazlı olacak)
    status: completed
  - id: cursor_rules
    content: .cursorrules dosyası oluştur ve Livewire 3 Class Components (Volt değil) + MaryUI kurallarını ekle
    status: completed
    dependencies:
      - install_maryui
      - module_structure_rules
  - id: reorganize_views
    content: Mevcut view'ları modül bazlı klasörlere taşı (blog, cms, crm, settings)
    status: completed
    dependencies:
      - module_structure_rules
  - id: reorganize_migrations
    content: Mevcut migration'ları modül bazlı klasörlere taşı (blog, cms, crm, settings)
    status: completed
    dependencies:
      - module_structure_rules
  - id: module_remove_command
    content: Modül silme command'ı oluştur (php artisan module:remove {module})
    status: completed
    dependencies:
      - reorganize_views
      - reorganize_migrations
  - id: profile_component
    content: Kullanıcı profil sayfası Livewire component'i oluştur (test ve Swagger dahil)
    status: completed
    dependencies:
      - convert_layout
  - id: crm_module
    content: CRM modülü Livewire component'leri oluştur (kullanıcı yönetimi - test ve Swagger dahil)
    status: completed
    dependencies:
      - convert_layout
      - reorganize_views
  - id: settings_module
    content: Settings modülü Livewire component'leri oluştur (test ve Swagger dahil)
    status: completed
    dependencies:
      - convert_layout
      - reorganize_views
  - id: cms_module
    content: CMS modülü Livewire component'leri oluştur (sayfa yönetimi, slider - test ve Swagger dahil)
    status: completed
    dependencies:
      - convert_layout
      - reorganize_views
  - id: blog_module
    content: Blog modülü Livewire component'leri oluştur (post, post category - test ve Swagger dahil)
    status: completed
    dependencies:
      - convert_layout
      - reorganize_views
  - id: update_readme
    content: README.md dosyasını güncelle (yeni stack bilgileri)
    status: completed
    dependencies:
      - install_maryui
  - id: final_checks
    content: "Son kontroller: test çalıştır, Swagger generate et, browser test yap, modül silme command test"
    status: completed
    dependencies:
      - tests_auth
      - tests_dashboard
      - swagger_auth
      - swagger_base
      - profile_component
      - crm_module
      - settings_module
      - cms_module
      - blog_module
      - module_remove_command
---

# Laravel Base

Project Refactor Plan

## 1. Temizlik ve Kaldırma İşlemleri

### 1.1 Template Kalıntılarını Kaldırma

- `public/cork/` klasörünü tamamen sil (1029 dosya)
- `public/porto/` klasörünü tamamen sil (3452 dosya)
- `cork-template/` klasörünü tamamen sil
- `.gitignore` dosyasına bu klasörleri ekle (eğer yoksa)

### 1.2 Gereksiz Bağımlılıkları Temizleme

- `composer.json` ve `package.json` dosyalarını kontrol et
- Kullanılmayan JS kütüphanelerini kaldır (Cork/Porto'ya özel olanlar)
- Alpine.js kalacak (Livewire ile uyumlu)

## 2. PHP ve Laravel Upgrade

### 2.1 PHP Versiyonu Güncelleme

- `composer.json` içinde PHP gereksinimini `^8.2` → `^8.3` yap
- `Dockerfile` içinde PHP versiyonunu 8.3'e güncelle (varsa)
- `.env.example` dosyasını kontrol et

### 2.2 Composer Bağımlılıkları

- Laravel 12 zaten kurulu, kontrol et
- Deprecated helper'ları temizle (varsa)

## 3. Livewire 3 + MaryUI Kurulumu

### 3.1 Livewire 3 Kurulumu

```bash
composer require livewire/livewire:^3.0
php artisan livewire:install
```



### 3.2 MaryUI Kurulumu

```bash
composer require robsontenorio/mary
php artisan mary:install
```



### 3.3 Vite Yapılandırması

- `vite.config.js` dosyasını güncelle
- Livewire ve MaryUI asset'lerini ekle
- Tailwind v4 zaten kurulu, kontrol et

## 4. Frontend Dönüşümü (Blade → Livewire)

### 4.1 Layout Dönüşümü

- `resources/views/admin/layouts/app.blade.php` → Livewire + MaryUI `x-mary-main` yapısına çevir
- Sidebar ve Navbar'ı MaryUI component'leri ile yeniden yaz
- `resources/views/layouts/dashboard.blade.php` → Livewire layout'a çevir

### 4.2 Auth Sayfaları

- `resources/views/auth/login.blade.php` → Livewire component + MaryUI form
- `resources/views/auth/register.blade.php` → Livewire component + MaryUI form
- `resources/views/auth/forgot-password.blade.php` → Livewire component
- `resources/views/auth/reset-password.blade.php` → Livewire component

### 4.3 Dashboard

- `resources/views/dashboard.blade.php` → Livewire component
- `app/Http/Controllers/DashboardController.php` → Livewire component'e çevir

### 4.4 Admin Component Showcase

- `resources/views/admin/components.blade.php` → Livewire component (veya kaldır)
- `app/Http/Controllers/Admin/ComponentController.php` → Livewire component'e çevir

### 4.5 Profil Sayfaları

- Kullanıcı profil sayfası için Livewire component oluştur (`app/Livewire/Admin/Profile.php`)
- Profil düzenleme formu için MaryUI component'leri kullan
- Test ve Swagger dokümantasyonu ekle

## 5. Test Altyapısı

### 5.1 Mevcut Test Yapısını Kontrol

- `tests/Pest.php` dosyası zaten var
- Pest PHP 4.1 zaten kurulu
- Laravel Dusk zaten kurulu

### 5.2 Test Stratejisi

- Her yeni Livewire component için test yaz
- Her Action/Service için unit test
- Her Controller endpoint'i için feature test
- Browser test'leri için Dusk kullan

### 5.3 Test Dosyaları Oluşturma

- `tests/Feature/Auth/LoginTest.php` (Livewire component testi)
- `tests/Feature/Auth/RegisterTest.php`
- `tests/Feature/Admin/DashboardTest.php`
- `tests/Feature/Admin/ComponentShowcaseTest.php`
- Mevcut test dosyalarını güncelle

## 6. Swagger/OpenAPI Dokümantasyonu

### 6.1 Mevcut Durum

- L5-Swagger zaten kurulu (`darkaonline/l5-swagger:^9.0`)
- `config/l5-swagger.php` yapılandırması var
- Swagger annotation'ları henüz yazılmamış

### 6.2 Swagger Annotation'ları Ekleme

#### 6.2.1 Ana OpenAPI Tanımı

- `app/Http/Controllers/Controller.php` base controller'a `@OA\Info` ekle
- `routes/api.php` dosyasına `@OA\Server` ekle

#### 6.2.2 Auth Endpoint'leri

- `app/Controllers/Auth/LoginController.php` → `@OA\Post` annotation
- `app/Controllers/Auth/RegisterController.php` → `@OA\Post` annotation
- `app/Controllers/Auth/MeController.php` → `@OA\Get` annotation
- `app/Controllers/Auth/LogoutController.php` → `@OA\Post` annotation

#### 6.2.3 Schema Tanımları

- `app/Resources/` klasöründe Swagger schema'ları oluştur
- Request/Response DTO'ları için `@OA\Schema` annotation'ları

### 6.3 Swagger Generation

- `php artisan l5-swagger:generate` komutunu çalıştır
- `storage/api-docs/api-docs.json` dosyasının oluştuğunu kontrol et

## 7. Modül Bazlı Klasörleme ve Cursor Rules

### 7.1 Modül Bazlı Klasörleme Cursor Rules

**ÖNEMLİ:** Modül bazlı klasörleme kurallarını `.cursorrules` dosyasına ekle:

- Her modül kendi klasörü altında tüm dosyalarını içermeli:
- `app/Models/{Module}/` - Model'ler
- `app/Controllers/{Module}/` - Controller'lar
- `app/Services/{Module}/` - Service'ler
- `app/Actions/{Module}/` - Action'lar
- `app/Requests/{Module}/` - Form Request'ler
- `app/Resources/{Module}/` - API Resources
- `app/Livewire/{Module}/` - Livewire component'ler
- `resources/views/livewire/{module}/` - Livewire view'ları
- `database/migrations/{module}/` - Migration'lar (modül bazlı klasörleme)
- `tests/Feature/{Module}/` - Feature test'ler
- `tests/Unit/{Module}/` - Unit test'ler

**Örnek Blog Modülü Yapısı:**

```javascript
app/
  Models/Blog/
    Post.php
    PostCategory.php
  Controllers/Blog/
    Admin/PostController.php
    Api/PostController.php
  Livewire/Blog/
    Admin/PostIndex.php
    Admin/PostForm.php
  Services/Blog/
    PostService.php
  Actions/Blog/
    CreatePostAction.php
    UpdatePostAction.php

resources/views/
  livewire/blog/admin/
    post-index.blade.php
    post-form.blade.php

database/migrations/
  blog/
    2025_01_01_000000_create_posts_table.php
    2025_01_01_000001_create_post_categories_table.php

tests/Feature/Blog/
    PostTest.php
    PostCategoryTest.php
```



### 7.2 .cursorrules Dosyası

- Proje kök dizinine `.cursorrules` dosyası oluştur
- **Livewire 3 Class Components (Volt DEĞİL)** kuralını ekle:
- "Strictly use Livewire Class components (not Volt) for consistency with the existing architecture."
- Livewire 3 + MaryUI kurallarını ekle
- Modül bazlı klasörleme kurallarını ekle (7.1'deki yapı)
- Test zorunluluğunu belirt
- Swagger annotation zorunluluğunu belirt

### 7.3 Mevcut Cursor Rules Güncelleme

- `.cursor/rules/` klasöründeki mevcut kuralları güncelle
- Cork template kurallarını kaldır
- Livewire + MaryUI kurallarını ekle
- Modül bazlı klasörleme kurallarını ekle

## 8. Kod Kalitesi ve Standartlar

### 8.1 Laravel Pint

- `vendor/bin/pint --dirty` çalıştır
- Tüm dosyaları formatla

### 8.2 PHPStan

- `vendor/bin/phpstan analyse` çalıştır
- Hataları düzelt

### 8.3 Test Coverage

- `php artisan test --coverage` çalıştır
- Minimum %80 coverage hedefle

## 9. Dokümantasyon

### 9.1 README Güncelleme

- `README.md` dosyasını güncelle
- Livewire 3 + MaryUI stack bilgilerini ekle
- Kurulum talimatlarını güncelle

### 9.2 Migration Guide

- `docs/livewire-migration.md` dosyası oluştur (opsiyonel)
- Blade → Livewire geçiş notlarını ekle

## 10. Modül Yönetimi ve Organizasyon

### 10.1 Modül Bazlı Views Organizasyonu

- Mevcut view'ları modül bazlı klasörlere taşı:
- `resources/views/admin/blog/` → Blog modülü view'ları
- `resources/views/admin/cms/` → CMS modülü view'ları (pages, sliders)
- `resources/views/admin/crm/` → CRM modülü view'ları (kullanıcı yönetimi)
- `resources/views/admin/settings/` → Settings modülü view'ları

### 10.2 Modül Bazlı Migrations Organizasyonu

- Mevcut migration'ları modül bazlı klasörlere taşı:
- `database/migrations/blog/` → Blog migration'ları
- `database/migrations/cms/` → CMS migration'ları (pages, sliders, menus)
- `database/migrations/crm/` → CRM migration'ları
- `database/migrations/settings/` → Settings migration'ları

**Migration Taşıma Stratejisi:**

- Mevcut migration dosyalarını modül klasörlerine taşı
- Migration dosya isimlerini koru (timestamp'ler önemli)
- `composer.json` veya özel bir service provider ile migration path'lerini yapılandır

### 10.3 Modül Silme Command'ı

- `php artisan make:command ModuleRemoveCommand` ile command oluştur
- Command şu işlemleri yapmalı:

1. Modül adını parametre olarak al
2. Modülün tüm dosyalarını bul ve sil:

    - `app/Models/{Module}/`
    - `app/Controllers/{Module}/`
    - `app/Services/{Module}/`
    - `app/Actions/{Module}/`
    - `app/Livewire/{Module}/`
    - `app/Requests/{Module}/`
    - `app/Resources/{Module}/`
    - `resources/views/livewire/{module}/`
    - `database/migrations/{module}/`
    - `tests/Feature/{Module}/`
    - `tests/Unit/{Module}/`

3. Migration dosyası oluştur (modül tablolarını silmek için)
4. `config/modules.php` dosyasından modülü kaldır
5. `routes/web.php` ve `routes/api.php` dosyalarından route'ları kaldır
6. `app/Providers/Domains/{Module}ServiceProvider.php` dosyasını sil
7. Service provider kaydını `bootstrap/providers.php` veya ilgili dosyadan kaldır

**Command Kullanımı:**

```bash
php artisan module:remove blog
```

**Güvenlik:**

- Command çalıştırılmadan önce onay iste
- Dry-run modu ekle (sadece göster, silme)
- Backup önerisi ekle

### 10.4 Modül Modülleri Oluşturma

Aşağıdaki modüller için Livewire component'ler, test'ler ve Swagger dokümantasyonu oluştur:

1. **Kullanıcı Yönetimi (CRM)**

- Kullanıcı listesi (Livewire + MaryUI table)
- Kullanıcı oluşturma/düzenleme formu
- Test'ler
- Swagger annotation'ları

2. **Ayarlar (Settings)**

- Ayarlar listesi ve düzenleme
- Grup bazlı ayar yönetimi
- Test'ler
- Swagger annotation'ları

3. **Sayfa Yönetimi (CMS)**

- Sayfa listesi
- Sayfa oluşturma/düzenleme formu
- Test'ler
- Swagger annotation'ları

4. **Blog**

- Blog post listesi
- Blog post oluşturma/düzenleme formu
- Test'ler
- Swagger annotation'ları

5. **Blog Kategori**

- Kategori listesi
- Kategori oluşturma/düzenleme formu
- Test'ler
- Swagger annotation'ları

6. **Slider**

- Slider listesi
- Slider oluşturma/düzenleme formu
- Slider item yönetimi
- Test'ler
- Swagger annotation'ları

**Her Modül İçin:**

- Livewire Class component'ler (Volt değil)
- MaryUI component'leri kullan
- Feature test'ler (Pest)
- Swagger/OpenAPI annotation'ları
- Modül bazlı klasörleme (10.1 ve 10.2'deki yapı)

## 11. Son Kontroller

### 11.1 Çalışma Kontrolleri

- `php artisan serve` ile local test
- `npm run dev` ile frontend build
- `php artisan test` ile tüm testlerin geçmesi
- `php artisan l5-swagger:generate` ile Swagger generation
- `php artisan module:remove blog --dry-run` ile modül silme command'ını test et

### 11.2 Browser Test

- `php artisan dusk` ile browser test'leri çalıştır
- Login/Register akışlarını test et
- Profil sayfasını test et
- Her modül için CRUD işlemlerini test et

## Dosya Yapısı Değişiklikleri

### Silinecek Dosyalar/Klasörler

- `public/cork/` (1029 dosya)
- `public/porto/` (3452 dosya)
- `cork-template/` (tüm içerik)

### Yeni Dosyalar

**Livewire Component'ler:**

- `app/Livewire/Admin/Dashboard.php`
- `app/Livewire/Admin/Profile.php`
- `app/Livewire/Auth/LoginForm.php`
- `app/Livewire/Auth/RegisterForm.php`
- `app/Livewire/Auth/ForgotPasswordForm.php`
- `app/Livewire/Auth/ResetPasswordForm.php`
- `app/Livewire/Crm/UserIndex.php`
- `app/Livewire/Crm/UserForm.php`
- `app/Livewire/Settings/SettingIndex.php`
- `app/Livewire/Settings/SettingForm.php`
- `app/Livewire/Cms/PageIndex.php`
- `app/Livewire/Cms/PageForm.php`
- `app/Livewire/Cms/SliderIndex.php`
- `app/Livewire/Cms/SliderForm.php`
- `app/Livewire/Blog/PostIndex.php`
- `app/Livewire/Blog/PostForm.php`
- `app/Livewire/Blog/PostCategoryIndex.php`
- `app/Livewire/Blog/PostCategoryForm.php`

**View Dosyaları:**

- `resources/views/livewire/admin/dashboard.blade.php`
- `resources/views/livewire/admin/profile.blade.php`
- `resources/views/livewire/auth/login-form.blade.php`
- `resources/views/livewire/auth/register-form.blade.php`
- `resources/views/livewire/crm/user-index.blade.php`
- `resources/views/livewire/crm/user-form.blade.php`
- `resources/views/livewire/settings/setting-index.blade.php`
- `resources/views/livewire/settings/setting-form.blade.php`
- `resources/views/livewire/cms/page-index.blade.php`
- `resources/views/livewire/cms/page-form.blade.php`
- `resources/views/livewire/cms/slider-index.blade.php`
- `resources/views/livewire/cms/slider-form.blade.php`
- `resources/views/livewire/blog/post-index.blade.php`
- `resources/views/livewire/blog/post-form.blade.php`
- `resources/views/livewire/blog/post-category-index.blade.php`
- `resources/views/livewire/blog/post-category-form.blade.php`

<<<<<<< Current (Your changes)**Command:**=======**Command:**