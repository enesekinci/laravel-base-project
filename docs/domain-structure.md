# Domain-Driven Design (DDD) Yapısı

Bu doküman, projenin Domain-Driven Design (DDD) yapısını ve modül organizasyonunu açıklar.

## Genel Yaklaşım

Bu proje bir **base/havuz proje** olarak tasarlanmıştır. Fork edildiğinde gereksiz modüller silinebilir ve sadece ihtiyaç duyulan modüller kalabilir. Bu nedenle:

- Her modül **tamamen bağımsız** olmalı
- Modüller arası **minimal bağımlılık** (sadece interface/contract üzerinden)
- Her modül kendi **Models, Controllers, Services, Requests, Resources, Policies, Events, Listeners, Jobs, Notifications** içermeli
- **Shared/Common** klasörü yok - her şey modül içinde

## Domain Yapısı

```
app/
  Controllers/
    Auth/              # Authentication controllers
      Admin/
      Api/
    Blog/              # Blog controllers
      Admin/
      Api/
    Cms/               # CMS controllers
      Admin/
      Api/
    Crm/               # CRM controllers
      Admin/
      Api/
    Media/             # Media controllers
      Admin/
      Api/
    Settings/          # Settings controllers
      Admin/
      Api/

  Models/
    Blog/              # Blog models
      Post.php
      PostCategory.php
      PostTag.php
    Cms/               # CMS models
      Page.php
      Menu.php
      MenuItem.php
      Slider.php
      SliderItem.php
      ContentBlock.php
    Crm/               # CRM models
      User.php
      AdminActionLog.php
    Media/             # Media models
      MediaFile.php
    Settings/          # Settings models
      Setting.php

  Services/
    Auth/              # Authentication services
    Blog/              # Blog services
    Cms/               # CMS services
    Crm/               # CRM services
    Media/             # Media services
    Settings/          # Settings services

  Actions/
    Auth/               # Authentication actions
    Blog/              # Blog actions
    Cms/               # CMS actions
    Crm/               # CRM actions
    Media/             # Media actions
    Settings/          # Settings actions

  Contracts/
    Blog/              # Blog repository interfaces

  Repositories/
    Blog/              # Blog repository implementations

  Requests/
    Auth/              # Authentication form requests
    Blog/              # Blog form requests
    Cms/               # CMS form requests
    Crm/               # CRM form requests
    Media/             # Media form requests
    Settings/          # Settings form requests

  Resources/
    Auth/              # Authentication API resources
    Blog/              # Blog API resources
    Cms/               # CMS API resources
    Crm/               # CRM API resources
    Media/             # Media API resources
    Settings/          # Settings API resources

  Policies/
    Auth/              # Authentication policies
    Blog/              # Blog policies
    Cms/               # CMS policies
    Crm/               # CRM policies
    Media/             # Media policies
    Settings/          # Settings policies

  Events/
    Auth/              # Authentication events
    Blog/              # Blog events
    Cms/               # CMS events
    Crm/               # CRM events
    Media/             # Media events
    Settings/          # Settings events

  Listeners/
    Auth/              # Authentication listeners
    Blog/              # Blog listeners
    Cms/               # CMS listeners
    Crm/               # CRM listeners
    Media/             # Media listeners
    Settings/          # Settings listeners

  Jobs/
    Auth/              # Authentication jobs
    Blog/              # Blog jobs
    Cms/               # CMS jobs
    Crm/               # CRM jobs
    Media/             # Media jobs
    Settings/          # Settings jobs

  Notifications/
    Auth/              # Authentication notifications
    Blog/              # Blog notifications
    Cms/               # CMS notifications
    Crm/               # CRM notifications
    Media/             # Media notifications
    Settings/          # Settings notifications
```

## Modül Yapılandırması

Modüller `config/modules.php` dosyasında yapılandırılır:

```php
'enabled' => [
    'auth' => env('MODULE_AUTH_ENABLED', true),
    'blog' => env('MODULE_BLOG_ENABLED', true),
    'cms' => env('MODULE_CMS_ENABLED', true),
    'crm' => env('MODULE_CRM_ENABLED', true),
    'media' => env('MODULE_MEDIA_ENABLED', true),
    'settings' => env('MODULE_SETTINGS_ENABLED', true),
    'ecommerce' => env('MODULE_ECOMMERCE_ENABLED', false),
],
```

Modül pasif edilmek istendiğinde `.env` dosyasında ilgili değişken `false` yapılabilir veya kodları silinebilir.

## Modül Route Yükleme

Route'lar merkezi route dosyalarında tanımlanır:

- **Web routes**: `routes/web.php` - Admin panel route'ları
- **API routes**: `routes/api.php` - API route'ları

Her modülün route'ları ilgili route dosyasında `config('modules.enabled.{module}')` kontrolü ile yüklenir.

## Modül ServiceProvider Yapısı

Her modülün ServiceProvider'ı `app/Providers/Domains/{Module}ServiceProvider.php` konumunda bulunur. Bu ServiceProvider'lar:

- Repository binding'leri yapar
- Policy kayıtlarını yapar
- Event listener kayıtlarını yapar

**Not:** Route yükleme artık ServiceProvider'da değil, merkezi route dosyalarında yapılır.

ServiceProvider'lar `ModuleServiceProvider` tarafından otomatik olarak yüklenir.

## Migration Yapısı

Migrations modül bazında organize edilir:

```
database/
  migrations/
    auth/
      2025_01_01_000000_create_users_table.php
      2025_01_01_000001_create_personal_access_tokens_table.php

    blog/
      2025_01_01_000000_create_posts_table.php
      2025_01_01_000100_create_post_categories_table.php

    cms/
      2025_01_01_000000_create_pages_table.php
      2025_01_01_000100_create_menus_table.php
```

## Modül Bağımsızlığı Kuralları

1. **Namespace isolation**: Her modül kendi namespace'inde
2. **No direct dependencies**: Modüller birbirini direkt import etmemeli
3. **Interface-based communication**: Modüller arası iletişim interface üzerinden
4. **Event-driven**: Modüller arası iletişim için Event'ler kullan
5. **Config-based activation**: Modüller config ile aktif/pasif edilebilmeli

## Best Practices

### Service Layer

Her modül için Service class'ları oluşturulmalı. Controller'lar sadece HTTP işini yapmalı, business logic Service'lerde olmalı.

```php
// ✅ İyi
public function store(StorePostRequest $request, PostService $service)
{
    $post = $service->create($request->validated());
    return response()->json(new PostResource($post), 201);
}

// ❌ Kötü
public function store(Request $request)
{
    $request->validate([...]);
    $post = Post::create([...]);
    // ... 50 satır business logic
}
```

### Form Requests

Tüm controller method'ları için FormRequest kullanılmalı:

```php
class StorePostRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'title' => ['required', 'string', 'max:255'],
            'content' => ['required', 'string'],
        ];
    }
}
```

### Policies

Her model için Policy oluşturulmalı:

```php
class PostPolicy
{
    public function viewAny(User $user): bool
    {
        return $user->isAdmin();
    }

    public function create(User $user): bool
    {
        return $user->isAdmin();
    }
}
```

### API Resources

Standart API response formatı için Resource kullanılmalı:

```php
class PostResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'content' => $this->content,
            'created_at' => $this->created_at,
        ];
    }
}
```

## Modül Ekleme

Yeni bir modül eklemek için:

1. `app/Controllers/{Module}/`, `app/Models/{Module}/`, `app/Services/{Module}/` vb. klasör yapısını oluştur
2. `app/Providers/Domains/{Module}ServiceProvider.php` dosyasını oluştur
3. `routes/web.php` dosyasına admin route'larını ekle
4. `routes/api.php` dosyasına API route'larını ekle
5. `config/modules.php` dosyasına modülü ekle
6. `database/migrations/{module}/` klasörünü oluştur
7. Modül kodlarını yaz

ServiceProvider örneği:

```php
<?php

namespace App\Providers\Domains;

use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;

class {Module}ServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        // Repository binding'leri buraya
        $this->app->bind(
            \App\Contracts\{Module}\{Model}RepositoryInterface::class,
            \App\Repositories\{Module}\{Model}Repository::class
        );
    }

    public function boot(): void
    {
        // Policy kayıtları buraya
        Gate::policy(
            \App\Models\{Module}\{Model}::class,
            \App\Policies\{Module}\{Model}Policy::class
        );

        // Event listener kayıtları buraya
        Event::listen(
            \App\Events\{Module}\{Event}::class,
            \App\Listeners\{Module}\{Listener}::class
        );
    }
}
```

Route örneği (`routes/web.php`):

```php
// {Module} Module Routes
if (config('modules.enabled.{module}', true)) {
    Route::prefix('admin/{module}')->middleware(['web', 'auth', 'admin'])->group(function () {
        Route::resource('items', \App\Controllers\{Module}\Admin\{Controller}::class);
    });
}
```

Route örneği (`routes/api.php`):

```php
// {Module} Module API Routes
if (config('modules.enabled.{module}', true)) {
    Route::prefix('v1/{module}')->middleware(['api'])->group(function () {
        Route::get('/items', [\App\Controllers\{Module}\Api\{Controller}::class, 'index']);
    });
}
```

## Modül Silme

Bir modülü silmek için:

1. `config/modules.php` dosyasından modülü kaldır veya `enabled` değerini `false` yap
2. `app/{Module}/` klasörünü sil
3. `app/Providers/Domains/{Module}ServiceProvider.php` dosyasını sil
4. `routes/web.php` ve `routes/api.php` dosyalarından modül route'larını kaldır
5. `database/migrations/{module}/` klasörünü sil

## Örnek: Auth Modülü

Auth modülü şu yapıya sahiptir:

- **Models**: Yok (User model'i CRM modülünde: `App\Models\Crm\User`)
- **Controllers**: `App\Controllers\Auth\LoginController`, `App\Controllers\Auth\RegisterController`, `App\Controllers\Auth\MeController`, `App\Controllers\Auth\WebAuthController`
- **Services**: `App\Services\Auth\AuthService`
- **Routes**: Web ve API route'ları

## Sonraki Adımlar

1. ✅ Tip bazlı klasör yapısı oluşturuldu (Controllers, Models, Services, vb.)
2. ✅ Modül yapılandırma sistemi oluşturuldu
3. ✅ Modül ServiceProvider yapısı oluşturuldu
4. ✅ Auth modülü oluşturuldu
5. ✅ Blog modülü oluşturuldu
6. ✅ CMS modülü oluşturuldu
7. ✅ CRM modülü oluşturuldu
8. ✅ Media modülü oluşturuldu
9. ✅ Settings modülü oluşturuldu
10. ✅ Service layer uygulandı (PostService, PageService, MediaService, vb.)
11. ✅ Policies oluşturuldu (PostPolicy, PagePolicy, MediaFilePolicy)
12. ✅ API Resources oluşturuldu (PostResource, PageResource, MediaFileResource)

## Modül ServiceProvider Örnekleri

### Blog Modülü ServiceProvider

Blog modülü ServiceProvider'ı (`app/Providers/Domains/BlogServiceProvider.php`) şu işlemleri yapar:

- **Repository Binding**: `PostRepositoryInterface` → `PostRepository`
- **Policy Kayıtları**: `Post` model'i için `PostPolicy`
- **Event Listener Kayıtları**: `PostCreated` event'i için `SendPostNotification` listener

### CMS Modülü ServiceProvider

CMS modülü ServiceProvider'ı (`app/Providers/Domains/CmsServiceProvider.php`) şu işlemleri yapar:

- **Policy Kayıtları**: `Page` model'i için `PagePolicy`

### Media Modülü ServiceProvider

Media modülü ServiceProvider'ı (`app/Providers/Domains/MediaServiceProvider.php`) şu işlemleri yapar:

- **Policy Kayıtları**: `MediaFile` model'i için `MediaFilePolicy`

**Not:** Route'lar artık ServiceProvider'da değil, `routes/web.php` ve `routes/api.php` dosyalarında tanımlanır.
