# Modül Yönetimi

Bu doküman, projedeki modül yönetimi sistemini açıklar.

## Genel Bakış

Proje, Domain-Driven Design (DDD) yapısına göre modüler bir yapıya sahiptir. Her modül tamamen bağımsızdır ve kendi ServiceProvider'ına sahiptir.

**Not:** Bu proje **nwidart/laravel-modules** gibi ağır paketler kullanmaz. Bunun yerine, Laravel'in native ServiceProvider sistemi ile hafif ve performanslı bir modül yapısı kullanılır.

## Modül Yapısı

Her modül şu yapıya sahiptir:

```
app/Controllers/{Module}/
├── Admin/
└── Api/
app/Models/{Module}/
app/Services/{Module}/
app/Requests/{Module}/
app/Resources/{Module}/
app/Policies/{Module}/
app/Events/{Module}/
app/Listeners/{Module}/
app/Jobs/{Module}/
app/Notifications/{Module}/
app/Actions/{Module}/      # (Opsiyonel)
app/Contracts/{Module}/    # (Opsiyonel - Repository interfaces)
app/Repositories/{Module}/  # (Opsiyonel - Repository implementations)

app/Providers/Domains/
└── {Module}ServiceProvider.php

routes/
├── web.php    # Admin route'ları burada
└── api.php    # API route'ları burada
```

**Önemli:**

- Modül klasörlerinde `routes.php` ve `Providers/` klasörü **YOK**
- Route'lar merkezi route dosyalarında (`routes/web.php`, `routes/api.php`)
- ServiceProvider'lar `app/Providers/Domains/` altında

## Modül ServiceProvider

Her modülün ServiceProvider'ı `app/Providers/Domains/{Module}ServiceProvider.php` konumunda bulunur. Bu ServiceProvider şu işlemleri yapar:

1. **Repository Binding**: Interface'leri implementation'lara bağlar
2. **Policy Kayıtları**: Model'ler için Policy'leri kaydeder
3. **Event Listener Kayıtları**: Event'leri listener'lara bağlar

**Not:** Route yükleme artık ServiceProvider'da değil, merkezi route dosyalarında yapılır.

### Örnek: BlogServiceProvider

```php
<?php

namespace App\Providers\Domains;

use App\Contracts\Blog\PostRepositoryInterface;
use App\Repositories\Blog\PostRepository;
use Illuminate\Support\Facades\Event;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;

class BlogServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        // Repository binding
        $this->app->bind(
            PostRepositoryInterface::class,
            PostRepository::class
        );
    }

    public function boot(): void
    {
        // Policy kayıtları
        Gate::policy(
            \App\Models\Blog\Post::class,
            \App\Policies\Blog\PostPolicy::class
        );

        // Event listener kayıtları
        Event::listen(
            \App\Events\Blog\PostCreated::class,
            \App\Listeners\Blog\SendPostNotification::class
        );
    }
}
```

## Modül Yükleme

Modül ServiceProvider'ları `ModuleServiceProvider` tarafından otomatik olarak yüklenir:

```php
protected function registerModuleProviders(): void
{
    $modules = config('modules.enabled', []);

    foreach ($modules as $module => $enabled) {
        if (! $enabled) {
            continue;
        }

        $moduleName = $this->getModuleName($module);
        $providerClass = "App\\Providers\\Domains\\{$moduleName}ServiceProvider";

        if (class_exists($providerClass)) {
            $this->app->register($providerClass);
        }
    }
}
```

Route'lar ise `routes/web.php` ve `routes/api.php` dosyalarında `config('modules.enabled.{module}')` kontrolü ile yüklenir.

## Modül Aktif/Pasif Etme

Modüller `config/modules.php` dosyasından yönetilir:

```php
'enabled' => [
    'auth' => env('MODULE_AUTH_ENABLED', true),
    'blog' => env('MODULE_BLOG_ENABLED', true),
    'cms' => env('MODULE_CMS_ENABLED', true),
    // ...
],
```

Bir modülü pasif etmek için `.env` dosyasında:

```env
MODULE_BLOG_ENABLED=false
```

## Yeni Modül Ekleme

Yeni bir modül eklemek için:

1. `app/Controllers/{Module}/`, `app/Models/{Module}/`, `app/Services/{Module}/` vb. klasör yapısını oluştur
2. `app/Providers/Domains/{Module}ServiceProvider.php` dosyasını oluştur
3. `routes/web.php` dosyasına admin route'larını ekle
4. `routes/api.php` dosyasına API route'larını ekle
5. `config/modules.php` dosyasına modülü ekle:
    ```php
    'enabled' => [
        'newmodule' => env('MODULE_NEWMODULE_ENABLED', true),
    ],
    'namespaces' => [
        'newmodule' => 'App\Controllers\NewModule',
    ],
    ```
6. `.env.example` dosyasına environment variable ekle:
    ```env
    MODULE_NEWMODULE_ENABLED=true
    ```

## Modül Silme

Bir modülü silmek için:

1. `config/modules.php` dosyasından modülü kaldır veya `enabled` değerini `false` yap
2. `app/Controllers/{Module}/`, `app/Models/{Module}/`, `app/Services/{Module}/` vb. klasörlerini sil
3. `app/Providers/Domains/{Module}ServiceProvider.php` dosyasını sil
4. `routes/web.php` ve `routes/api.php` dosyalarından modül route'larını kaldır
5. `database/migrations/{module}/` klasörünü sil (varsa)
6. `.env.example` dosyasından environment variable'ı kaldır

## Best Practices

1. **Her modül bağımsız olmalı**: Modüller birbirini direkt import etmemeli
2. **Interface-based communication**: Modüller arası iletişim interface üzerinden olmalı
3. **Event-driven**: Modüller arası iletişim için Event'ler kullanılmalı
4. **ServiceProvider'da sadece kayıt**: ServiceProvider'da sadece binding, policy, event listener kayıtları yapılmalı
5. **Route'lar merkezi**: Route'lar `routes/web.php` ve `routes/api.php` dosyalarında tanımlanmalı
6. **Modül klasörleri sadece business logic**: Modül klasörlerinde routes.php ve Providers/ klasörü olmamalı

## Örnekler

### Repository Binding

```php
public function register(): void
{
    $this->app->bind(
        PostRepositoryInterface::class,
        PostRepository::class
    );
}
```

### Policy Kayıtları

```php
public function boot(): void
{
    Gate::policy(
        \App\Models\Blog\Post::class,
        \App\Policies\Blog\PostPolicy::class
    );
}
```

### Event Listener Kayıtları

```php
public function boot(): void
{
    Event::listen(
        \App\Events\Blog\PostCreated::class,
        \App\Listeners\Blog\SendPostNotification::class
    );
}
```

## Sorun Giderme

### Modül ServiceProvider yüklenmiyor

1. `config/modules.php` dosyasında modülün `enabled` değerini kontrol et
2. ServiceProvider dosyasının `app/Providers/Domains/` klasöründe olduğunu kontrol et
3. ServiceProvider class adının doğru olduğunu kontrol et (namespace: `App\Providers\Domains`)

### Route'lar yüklenmiyor

1. Route'ların `routes/web.php` veya `routes/api.php` dosyalarında olduğunu kontrol et
2. Route'ların `config('modules.enabled.{module}')` kontrolü ile sarıldığını kontrol et
3. Route cache'i temizle: `php artisan route:clear`
