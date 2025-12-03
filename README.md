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
- Redis (cache ve queue için)
- Meilisearch (search engine için)
- Laravel Valet (macOS için önerilen)

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

3. **Local servisleri kurun (macOS):**

```bash
# PostgreSQL, Redis, Meilisearch kurulumu
./scripts/setup-local-services.sh
```

**Not:** Linux veya Windows kullanıyorsanız, servisleri manuel olarak kurmanız gerekiyor.

4. **Environment dosyasını oluşturun:**

```bash
cp .env.example .env
php artisan key:generate
```

5. **Veritabanını yapılandırın:**
   `.env` dosyasında veritabanı bilgilerinizi güncelleyin:

```env
DB_CONNECTION=pgsql
DB_HOST=127.0.0.1
DB_PORT=5432
DB_DATABASE=laravel
DB_USERNAME=$(whoami)  # macOS'ta genellikle kullanıcı adınız
DB_PASSWORD=

REDIS_HOST=127.0.0.1
REDIS_PORT=6379

MEILISEARCH_HOST=http://127.0.0.1:7700
MEILISEARCH_KEY=your_master_key_here
```

6. **Veritabanını oluşturun:**

```bash
createdb laravel
```

7. **Migration'ları çalıştırın:**

```bash
php artisan migrate
```

8. **Asset'leri build edin:**

```bash
npm run build
```

9. **Meilisearch index'lerini ayarlayın:**

```bash
php artisan meilisearch:setup-products
php artisan scout:import "App\Models\Product"
```

10. **Valet ile siteyi bağlayın (macOS):**

```bash
valet link laravel-base-project
# veya
valet park
```

Artık `http://laravel-base-project.test` adresinden erişebilirsiniz.

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

## 🚢 Deployment

### Production Deployment

Production'da sadece **Dockerfile** kullanılır. PostgreSQL, Redis ve Meilisearch sunucuda ayrı ayrı çalışır.

#### Coolify ile Deployment

1. **Coolify'da Laravel uygulaması oluşturun**
    - Coolify dashboard'a giriş yapın
    - "New Resource" > "Dockerfile" seçin
    - Repository'yi bağlayın

2. **Sunucuda servisleri hazırlayın**
    - PostgreSQL: Coolify'ın "PostgreSQL Database" özelliğini kullanın veya ayrı bir servis olarak kurun
    - Redis: Ayrı bir servis olarak kurun
    - Meilisearch: Ayrı bir servis olarak kurun

3. **Environment Variables'ları ayarlayın**
    - Coolify dashboard'da environment variables bölümüne gidin
    - `.env.example` dosyasındaki tüm değişkenleri ekleyin
    - Özellikle şunları ayarlayın:
        - `APP_KEY` - `php artisan key:generate` ile oluşturun
        - `DB_HOST` - PostgreSQL servisinin hostname'i
        - `REDIS_HOST` - Redis servisinin hostname'i
        - `MEILISEARCH_HOST` - Meilisearch servisinin hostname'i

4. **Deploy edin**
    - Coolify Dockerfile'ı kullanarak uygulamayı deploy edecek
    - Migration'lar otomatik olarak çalışacak (docker-entrypoint.sh içinde)

Detaylı bilgi için: [Deployment Guide](docs/deployment-guide.md)

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
