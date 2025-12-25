---
name: Fast-commerce migration seeder factory test iyileştirmeleri
overview: Fast-commerce projesindeki migration, seeder, factory ve test yapılarındaki iyileştirmeleri ve düzeltmeleri boilerplate projeye geçiriyoruz.
todos: []
---

# Fast

-commerce Migration, Seeder, Factory ve Test İyileştirmeleri

## Amaç

Fast-commerce projesinde yapılan migration, seeder, factory ve test yapısındaki iyileştirmeleri ve düzeltmeleri boilerplate projeye geçirmek.

## Tespit Edilen Farklar ve İyileştirmeler

### 1. Migration Yapısı

**Fast-commerce'de:**

- `0001_01_01_000000_auth_system.php` migration'ı var (modül, rol, kullanıcı rolleri sistemi)
- Migration içinde seed data var (modüller, roller, test kullanıcıları)
- Foreign key'ler için index'ler ekleniyor
- `unsignedBigInteger` kullanılıyor
- `timestamps()` ve `softDeletes()` kullanılıyor

**Boilerplate'de:**

- Sadece `2025_11_22_090000_add_roles_to_users_table.php` var (basit)
- Auth sistemi migration'ı yok

**Yapılacaklar:**

- Fast-commerce'deki `auth_system.php` migration'ını boilerplate'e uyarlamak
- Modül ve rol sistemini eklemek (e-commerce özelliklerini çıkararak)
- Test kullanıcılarını eklemek

### 2. Seeder Yapısı

**Fast-commerce'de:**

- Seeder'lar daha detaylı (`SettingsSeeder`, `SliderSeeder`, `BlogPostSeeder`)
- `firstOrCreate` kullanımı var
- İlişkiler `syncWithoutDetaching` ile yönetiliyor
- `WithoutModelEvents` trait kullanılıyor

**Boilerplate'de:**

- Seeder'lar var ama daha basit
- `WithoutModelEvents` kullanılıyor

**Yapılacaklar:**

- `SettingsSeeder`'ı güncellemek (e-commerce ayarlarını çıkararak)
- `SliderSeeder`'ı güncellemek (namespace'leri düzeltmek: `App\Models\Cms\Slider`)
- `BlogPostSeeder`'ı güncellemek (namespace'leri düzeltmek: `App\Models\Blog\Post`)
- `firstOrCreate` ve `syncWithoutDetaching` kullanımını kontrol etmek

### 3. Factory Yapısı

**Fast-commerce'de:**

- Factory'ler modül bazlı namespace'lerde (`Database\Factories\Blog\PostFactory`)
- `$this->faker` kullanılıyor (eski Laravel)
- State method'ları var (`draft()`, `published()`)
- `Str::slug()` ve `Str::random()` kullanılıyor

**Boilerplate'de:**

- Factory'ler modül bazlı namespace'lerde (`Database\Factories\Blog\PostFactory`)
- `fake()` kullanılabilir (Laravel 12)
- State method'ları var ama fast-commerce'deki gibi değil

**Yapılacaklar:**

- `PostFactory`'yi fast-commerce'deki gibi güncellemek (state method'ları, slug generation)
- `UserFactory`'yi kontrol etmek (fast-commerce'deki gibi)
- Diğer factory'leri kontrol etmek ve güncellemek

### 4. Test Yapısı

**Fast-commerce'de:**

- `adminUser()` helper fonksiyonu var (`App\Models\User`)
- `declare(strict_types=1);` kullanılıyor
- `RefreshDatabase` trait kullanılıyor

**Boilerplate'de:**

- `adminUser()` helper fonksiyonu var (`App\Models\Crm\User`)
- `declare(strict_types=1);` kullanılıyor
- `RefreshDatabase` trait kullanılıyor

**Yapılacaklar:**

- `adminUser()` helper fonksiyonunu kontrol etmek (zaten doğru namespace kullanılıyor)
- Test helper fonksiyonlarını genişletmek (gerekirse)

## Uygulama Adımları

### 1. Migration Güncellemesi

**Dosya:** `database/migrations/0001_01_01_000000_create_users_table.php`

- Mevcut migration'ı `auth_system.php` ile değiştirmek
- Modül ve rol sistemini eklemek (e-commerce özelliklerini çıkararak)
- Test kullanıcılarını eklemek
- `add_roles_to_users_table.php` migration'ını kaldırmak (artık gerekli değil)

**Yeni dosya:** `database/migrations/0001_01_01_000000_auth_system.php`

- `modules` tablosu
- `role_types` tablosu
- `roles` tablosu
- `role_modules` tablosu
- `users` tablosu (güncellenmiş: `is_active`, `phone` alanları)
- `user_roles` tablosu
- Seed data (modüller, roller, test kullanıcıları)

### 2. Seeder Güncellemeleri

**Dosya:** `database/seeders/SettingsSeeder.php`

- E-commerce ayarlarını çıkarmak (storefront, currency, tax)
- Genel ayarları tutmak (site_name, site_description, vb.)
- Mail ve SMS ayarlarını tutmak

**Dosya:** `database/seeders/SliderSeeder.php`

- Namespace'leri düzeltmek: `App\Models\Cms\Slider`, `App\Models\Cms\SliderItem`
- `App\Models\Media\MediaFile` namespace'ini kullanmak
- `App\Models\Crm\User` namespace'ini kullanmak

**Dosya:** `database/seeders/BlogPostSeeder.php`

- Namespace'leri düzeltmek: `App\Models\Blog\Post`, `App\Models\Blog\PostCategory`, `App\Models\Blog\PostTag`
- `App\Models\Media\MediaFile` namespace'ini kullanmak
- `App\Models\Crm\User` namespace'ini kullanmak

### 3. Factory Güncellemeleri

**Dosya:** `database/factories/Blog/PostFactory.php`

- State method'larını fast-commerce'deki gibi güncellemek (`draft()`, `published()`)
- Slug generation'ı fast-commerce'deki gibi yapmak (`Str::slug($title).'-'.Str::random(6)`)
- `fake()` yerine `$this->faker` kullanmak (Laravel 12'de her ikisi de çalışır)

**Dosya:** `database/factories/UserFactory.php`

- Fast-commerce'deki gibi kontrol etmek (zaten benzer)

### 4. Test Güncellemeleri

**Dosya:** `tests/Pest.php`

- `adminUser()` helper fonksiyonunu kontrol etmek (zaten doğru)
- Gerekirse ek helper fonksiyonları eklemek

## Önemli Notlar

1. **E-commerce özelliklerini çıkarmak:** Fast-commerce'deki e-commerce özelliklerini (storefront, currency, tax, vb.) boilerplate'den çıkarmak gerekiyor.
2. **Namespace'leri düzeltmek:** Fast-commerce'de `App\Models\User` kullanılıyor, boilerplate'de `App\Models\Crm\User` kullanılıyor. Tüm seeder ve factory'lerde namespace'leri düzeltmek gerekiyor.
3. **Migration sırası:** `auth_system.php` migration'ı `0001_01_01_000000_` ile başlamalı, diğer migration'lar bundan sonra gelmeli.
4. **Test kullanıcıları:** Fast-commerce'deki test kullanıcılarını boilerplate'e uyarlamak (e-commerce özelliklerini çıkararak).

## Dosya Listesi

### Güncellenecek Dosyalar:

- `database/migrations/0001_01_01_000000_create_users_table.php` → `0001_01_01_000000_auth_system.php` olarak değiştirilecek
- `database/migrations/2025_11_22_090000_add_roles_to_users_table.php` → Silinecek (artık gerekli değil)
- `database/seeders/SettingsSeeder.php` → Güncellenecek
- `database/seeders/SliderSeeder.php` → Güncellenecek
- `database/seeders/BlogPostSeeder.php` → Güncellenecek
- `database/factories/Blog/PostFactory.php` → Güncellenecek
- `database/factories/UserFactory.php` → Kontrol edilecek

### Yeni Dosyalar:

- `database/migrations/0001_01_01_000000_auth_system.php` → Oluşturulacak

## Test Senaryoları

1. Migration'ları çalıştırmak ve rollback yapmak
2. Seeder'ları çalıştırmak