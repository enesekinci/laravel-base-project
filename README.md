# Laravel Base Project

Bu proje, **CMS, CRM veya E-ticaret** projeleri için hazırlanmış bir **base/havuz proje**dir. Fork edildiğinde gereksiz modüller silinebilir ve sadece ihtiyaç duyulan modüller kalabilir.

## 🎯 Proje Amacı

Bu proje, SaaS yönetilecek bir sistemde olabilecek **ortak modülleri** içerir. Her modül **tamamen bağımsız**dır ve gereksiz modüller kolayca kaldırılabilir.

## 📦 Modüller

Proje Domain-Driven Design (DDD) yapısına göre organize edilmiştir:

- **Auth** - Authentication modülü (Login, Register, Password Reset)
- **Blog** - Blog modülü (Post, PostCategory, PostTag)
- **CMS** - Content Management modülü (Page, Menu, Slider, ContentBlock)
- **CRM** - Customer Relationship Management modülü (User, AdminActionLog)
- **Media** - Media Management modülü (MediaFile)
- **Settings** - Settings modülü (Setting)

Her modül kendi içinde:
- Models
- Controllers (Admin, Api)
- Services
- Requests (FormRequest)
- Resources (API Resources)
- Policies
- Events & Listeners
- Jobs
- Notifications
- Routes

içerir.

## 🚀 Kurulum

### Gereksinimler

- PHP 8.2+
- Composer
- Node.js & NPM
- PostgreSQL veya MySQL
- Redis (opsiyonel, cache için)

### Adımlar

1. **Projeyi klonlayın:**
```bash
git clone <repository-url>
cd laravel-base-project
```

2. **Bağımlılıkları yükleyin:**
```bash
composer install
npm install
```

3. **Environment dosyasını oluşturun:**
```bash
cp .env.example .env
php artisan key:generate
```

4. **Veritabanını yapılandırın:**
`.env` dosyasında veritabanı bilgilerinizi güncelleyin:
```env
DB_CONNECTION=pgsql
DB_HOST=127.0.0.1
DB_PORT=5432
DB_DATABASE=laravel
DB_USERNAME=postgres
DB_PASSWORD=
```

5. **Migration'ları çalıştırın:**
```bash
php artisan migrate
```

6. **Asset'leri build edin:**
```bash
npm run build
```

7. **Development server'ı başlatın:**
```bash
php artisan serve
```

## 📁 Klasör Yapısı

```
app/
  Domains/
    Auth/              # Authentication modülü
    Blog/              # Blog modülü
    Cms/               # CMS modülü
    Crm/               # CRM modülü
    Media/             # Media modülü
    Settings/          # Settings modülü
  Http/
    Controllers/       # Shared controllers (HealthCheck, Dashboard)
    Middleware/        # Middleware'ler
  Providers/           # Service Providers
  Jobs/                # Shared Jobs
  Mail/                # Shared Mail classes
  Notifications/       # Shared Notifications
  Support/             # Helper classes

database/
  migrations/
    auth/              # Auth modülü migration'ları
    blog/              # Blog modülü migration'ları
    cms/               # CMS modülü migration'ları
    crm/               # CRM modülü migration'ları
    media/             # Media modülü migration'ları
    settings/          # Settings modülü migration'ları
```

## ⚙️ Yapılandırma

### Modül Yönetimi

Modüller `config/modules.php` dosyasından yönetilir. Her modülün kendi `{Module}ServiceProvider`'ı vardır ve `ModuleServiceProvider` tarafından otomatik olarak yüklenir.

**Not:** Bu proje ağır modül paketleri (nwidart/laravel-modules gibi) kullanmaz. Bunun yerine Laravel'in native ServiceProvider sistemi ile hafif ve performanslı bir yapı kullanılır. Bu yaklaşım Octane + FrankenPHP ile mükemmel çalışır ve gereksiz overhead yaratmaz.

Bir modülü devre dışı bırakmak için:

```env
MODULE_BLOG_ENABLED=false
MODULE_CMS_ENABLED=false
```

Modül ServiceProvider'ları şu işlemleri yapar:
- Repository binding'leri
- Policy kayıtları
- Event listener kayıtları
- Route yükleme

### Environment Variables

Tüm environment variables `.env.example` dosyasında tanımlanmıştır. Projeyi başlatmadan önce `.env` dosyasını oluşturup gerekli değerleri güncelleyin.

### API Versioning

API route'ları versioning ile yapılandırılmıştır:
- `/api/v1/*` - Version 1 API routes
- Gelecekte `/api/v2/*` - Version 2 API routes

API versioning `ApiVersion` middleware ile yapılır.

## 🧪 Test

```bash
php artisan test
```

## 🔍 Database Monitoring

### PostgreSQL Performans Raporu

PostgreSQL performans metriklerini toplar ve sorunları tespit eder:

```bash
# Raporu oluştur
php artisan db:performance-report

# Raporu oluştur ve sorun varsa mail gönder
php artisan db:performance-report --send-mail
```

Komut haftalık olarak otomatik çalışır (Pazartesi 09:00) ve sorun tespit edilirse admin email adresine uyarı maili gönderir.

Detaylı bilgi için: [PostgreSQL Performance Report](docs/README_pg_performance.md)

### Slow Queries Raporu

Yavaş query'leri raporlar:

```bash
php artisan db:slow-queries-report
```

## 📚 Dokümantasyon

- [Laravel 12 Documentation](https://laravel.com/docs/12.x)
- [Project Roadmap](docs/project-roadmap.md)
- [Laravel Packages Guide](docs/laravel-packages-guide.md)
- [Module Management](docs/module-management.md) - Modül yönetimi ve ServiceProvider yapısı
- [Development Setup](docs/development-setup.md) - Local development kurulum rehberi
- [API Documentation](docs/api-documentation.md) - API kullanımı ve endpoint'ler
- [Deployment Guide](docs/deployment-guide.md) - Production deployment rehberi
- [Domain Structure](docs/domain-structure.md) - DDD yapısı ve modül organizasyonu
- [PostgreSQL Performance Report](docs/README_pg_performance.md) - PostgreSQL performans raporu ve monitoring

## 🔧 Best Practices

Bu proje aşağıdaki best practice'leri uygular:

- **Service Layer Pattern** - Business logic Service class'larında
- **FormRequest Validation** - Tüm validation'lar FormRequest'lerde
- **Policies** - Authorization logic Policy'lerde
- **API Resources** - Standart API response formatı
- **Events & Listeners** - Modüller arası iletişim için Event-driven pattern
- **Domain-Driven Design** - Modül bazlı organizasyon

## 📝 License

Bu proje MIT lisansı altında lisanslanmıştır.
