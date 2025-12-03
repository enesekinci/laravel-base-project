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
  Domains/
    Auth/              # Authentication modülü (ortak)
      Models/
      Controllers/
        Admin/
        Api/
      Services/
      Actions/
      Requests/
      Resources/
      Policies/
      Events/
      Listeners/
      Jobs/
      Notifications/
    
    Blog/              # Blog modülü (CMS)
      Models/
        Post.php
        PostCategory.php
        PostTag.php
      Controllers/
        Admin/
        Api/
      Services/
      Actions/
      Requests/
      Resources/
      Policies/
      Events/
      Listeners/
      Jobs/
      Notifications/
    
    Cms/               # CMS modülü
      Models/
        Page.php
        Menu.php
        MenuItem.php
        Slider.php
        SliderItem.php
        ContentBlock.php
      Controllers/
        Admin/
        Api/
      Services/
      Actions/
      Requests/
      Resources/
      Policies/
      Events/
      Listeners/
      Jobs/
      Notifications/
    
    Crm/               # CRM modülü
      Models/
        User.php
        AdminActionLog.php
      Controllers/
        Admin/
        Api/
      Services/
      Actions/
      Requests/
      Resources/
      Policies/
      Events/
      Listeners/
      Jobs/
      Notifications/
    
    Media/             # Media modülü (ortak)
      Models/
        MediaFile.php
      Controllers/
        Admin/
        Api/
      Services/
      Actions/
      Requests/
      Resources/
      Policies/
      Events/
      Listeners/
      Jobs/
      Notifications/
    
    Settings/          # Settings modülü (ortak)
      Models/
        Setting.php
      Controllers/
        Admin/
        Api/
      Services/
      Actions/
      Requests/
      Resources/
      Policies/
      Events/
      Listeners/
      Jobs/
      Notifications/
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

1. `app/Domains/{Module}/` klasör yapısını oluştur (Models, Controllers, Services, vb.)
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
    }

    public function boot(): void
    {
        // Policy kayıtları buraya
        Gate::policy(
            \App\Domains\{Module}\Models\{Model}::class,
            \App\Domains\{Module}\Policies\{Model}Policy::class
        );

        // Event listener kayıtları buraya
        Event::listen(
            \App\Domains\{Module}\Events\{Event}::class,
            \App\Domains\{Module}\Listeners\{Listener}::class
        );
    }
}
```

Route örneği (`routes/web.php`):

```php
// {Module} Module Routes
if (config('modules.enabled.{module}', true)) {
    Route::prefix('admin/{module}')->middleware(['web', 'auth', 'admin'])->group(function () {
        Route::resource('items', \App\Domains\{Module}\Controllers\Admin\{Controller}::class);
    });
}
```

Route örneği (`routes/api.php`):

```php
// {Module} Module API Routes
if (config('modules.enabled.{module}', true)) {
    Route::prefix('v1/{module}')->middleware(['api'])->group(function () {
        Route::get('/items', [\App\Domains\{Module}\Controllers\Api\{Controller}::class, 'index']);
    });
}
```

## Modül Silme

Bir modülü silmek için:

1. `config/modules.php` dosyasından modülü kaldır veya `enabled` değerini `false` yap
2. `app/Domains/{Module}/` klasörünü sil
3. `app/Providers/Domains/{Module}ServiceProvider.php` dosyasını sil
4. `routes/web.php` ve `routes/api.php` dosyalarından modül route'larını kaldır
5. `database/migrations/{module}/` klasörünü sil

## Örnek: Auth Modülü

Auth modülü şu yapıya sahiptir:

- **Models**: Yok (User model'i CRM modülünde)
- **Controllers**: LoginController, RegisterController, MeController, WebAuthController
- **Services**: AuthService
- **Routes**: Web ve API route'ları

## Sonraki Adımlar

1. ✅ Domain klasör yapısı oluşturuldu
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

