---
name: Klasör yapısı ve dokümantasyon güncellemesi
overview: README.md, LogAdminAction middleware, ve dokümantasyon dosyalarını yeni klasör yapısına (app/Controllers/Auth, app/Models/Crm vb.) göre güncelleme
todos: []
---

# Klasör Yapısı ve Dokümantasyon Güncellemesi

## Değişiklikler

### 1. README.md Klasör Yapısı Güncelleme

**Dosya:** `README.md` (satır 132-160)**Değişiklik:**

- `app/Domains/` yapısını kaldır
- Yeni yapıyı yansıt: `app/Controllers/Auth/`, `app/Models/Crm/`, `app/Services/Blog/` vb.

**Yeni yapı:**

```markdown
app/
  Controllers/
    Auth/          # Authentication controllers
    Blog/          # Blog controllers
    Cms/           # CMS controllers
    Crm/           # CRM controllers
    Media/         # Media controllers
    Settings/      # Settings controllers
  Models/
    Blog/          # Blog models
    Cms/           # CMS models
    Crm/           # CRM models (User, AdminActionLog)
    Media/         # Media models
    Settings/      # Settings models
  Services/
    Auth/          # Authentication services
    Blog/          # Blog services
    Cms/           # CMS services
    Crm/           # CRM services
    Media/         # Media services
    Settings/      # Settings services
  Actions/         # Action classes (Blog, Cms)
  Contracts/       # Repository interfaces (Blog)
  Repositories/    # Repository implementations (Blog)
  Policies/        # Policy classes (Blog, Cms, Media)
  Events/          # Event classes (Blog)
  Listeners/       # Listener classes (Blog)
  Requests/        # Form Request classes
  Resources/       # API Resource classes
  Http/
    Controllers/   # Shared controllers (HealthCheck, Dashboard)
    Middleware/    # Middleware'ler
  Providers/       # Service Providers
  Jobs/            # Shared Jobs
  Mail/            # Shared Mail classes
  Notifications/   # Shared Notifications
  Support/         # Helper classes
```



### 2. LogAdminAction Middleware Güncelleme

**Dosya:** `app/Http/Middleware/LogAdminAction.php` (satır 148-156)**Değişiklik:**

- Eski `App\Domains\X\Models` referanslarını kaldır
- Yeni `App\Models\X` yapısına göre güncelle

**Eski kod:**

```php
$domainModelClasses = [
    "App\\Domains\\Blog\\Models\\{$modelName}",
    "App\\Domains\\Cms\\Models\\{$modelName}",
    "App\\Domains\\Crm\\Models\\{$modelName}",
    "App\\Domains\\Media\\Models\\{$modelName}",
    "App\\Domains\\Settings\\Models\\{$modelName}",
    "App\\Models\\{$modelName}", // Fallback to old location
];
```

**Yeni kod:**

```php
$domainModelClasses = [
    "App\\Models\\Blog\\{$modelName}",
    "App\\Models\\Cms\\{$modelName}",
    "App\\Models\\Crm\\{$modelName}",
    "App\\Models\\Media\\{$modelName}",
    "App\\Models\\Settings\\{$modelName}",
];
```



### 3. Domain Structure Dokümantasyonu Güncelleme

**Dosya:** `docs/domain-structure.md`**Değişiklikler:**

- Tüm `app/Domains/X/` referanslarını `app/Controllers/X/`, `app/Models/X/`, `app/Services/X/` vb. olarak güncelle
- Namespace örneklerini güncelle: `App\Domains\Blog\Models` → `App\Models\Blog`
- Klasör yapısı örneklerini yeni yapıya göre güncelle
- ServiceProvider örneklerindeki namespace'leri güncelle

**Önemli bölümler:**

- Satır 16-121: Domain yapısı açıklaması
- Satır 271-333: Modül ekleme örnekleri
- Satır 369-391: ServiceProvider örnekleri

### 4. Module Management Dokümantasyonu Güncelleme

**Dosya:** `docs/module-management.md`**Değişiklikler:**

- Satır 15-36: Modül yapısı örneğini güncelle (`app/{Module}/` → `app/Controllers/{Module}/`, `app/Models/{Module}/` vb.)
- Satır 46: ServiceProvider konumunu güncelle (namespace değişmedi, sadece açıklama)
- Satır 56-92: ServiceProvider örneklerindeki namespace'leri güncelle
- Satır 144: Yeni modül ekleme adımlarını güncelle

**Önemli değişiklik:**

```markdown
Her modül şu yapıya sahiptir:

app/Controllers/{Module}/
app/Models/{Module}/
app/Services/{Module}/
app/Requests/{Module}/
app/Resources/{Module}/
app/Policies/{Module}/
app/Events/{Module}/
app/Listeners/{Module}/
app/Jobs/{Module}/
app/Notifications/{Module}/

app/Providers/Domains/
└── {Module}ServiceProvider.php
```



### 5. ModuleServiceProviderTest Güncelleme

**Dosya:** `tests/Feature/System/ModuleServiceProviderTest.php`**Durum:** Test dosyası zaten güncellenmiş görünüyor (yeni namespace'ler kullanılıyor). Sadece kontrol edip gerekirse küçük düzeltmeler yapılacak.**Kontrol edilecek:**

- Satır 88-90: `App\Contracts\Blog\PostRepositoryInterface` ve `App\Repositories\Blog\PostRepository` doğru mu?
- Satır 94-96: `App\Models\Blog\Post` ve `App\Policies\Blog\PostPolicy` doğru mu?
- Satır 100-102: `App\Models\Cms\Page` ve `App\Policies\Cms\PagePolicy` doğru mu?
- Satır 106-108: `App\Models\Media\MediaFile` ve `App\Policies\Media\MediaFilePolicy` doğru mu?

### 6. ModuleServiceProvider Kontrolü

**Dosya:** `app/Providers/ModuleServiceProvider.php`**Durum:** Bu dosya zaten doğru çalışıyor. `App\Providers\Domains\{Module}ServiceProvider` referansları doğru. Sadece kontrol edilecek.

### 7. ServiceProvider'lar Kontrolü

**Klasör:** `app/Providers/Domains/`**Durum:** ServiceProvider'lar tutulacak (kullanıcı tercihi). İçerikleri zaten güncellenmiş görünüyor. Sadece kontrol edilecek:

- BlogServiceProvider: `App\Contracts\Blog\`, `App\Repositories\Blog\`, `App\Models\Blog\`, `App\Policies\Blog\`, `App\Events\Blog\`, `App\Listeners\Blog\`
- CmsServiceProvider: `App\Models\Cms\`, `App\Policies\Cms\`
- MediaServiceProvider: `App\Models\Media\`, `App\Policies\Media\`
- AuthServiceProvider, CrmServiceProvider, SettingsServiceProvider: Boş, kontrol edilecek

## Uygulama Sırası

1. README.md klasör yapısını güncelle
2. LogAdminAction middleware'deki eski domain referanslarını düzelt
3. domain-structure.md dokümantasyonunu güncelle
4. module-management.md dokümantasyonunu güncelle
5. ModuleServiceProviderTest'i kontrol et ve gerekirse düzelt
6. Tüm ServiceProvider'ları kontrol et ve namespace'leri doğrula