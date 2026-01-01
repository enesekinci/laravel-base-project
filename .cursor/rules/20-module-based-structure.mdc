---
alwaysApply: true
---

# MODÜL BAZLI KLASÖRLEME KURALLARI

## Genel Kural

**Her modül kendi klasörü altında tüm dosyalarını içermelidir.** Modüller tamamen bağımsız olmalı ve kolayca kaldırılabilir olmalıdır.

## Modül Yapısı

Her modül şu klasör yapısına sahip olmalıdır:

```
app/
  Models/{Module}/
    Model1.php
    Model2.php
  Controllers/{Module}/
    Admin/Controller1.php
    Api/Controller1.php
  Livewire/{Module}/
    Admin/Component1.php
    Admin/Component2.php
  Services/{Module}/
    Service1.php
  Actions/{Module}/
    CreateAction.php
    UpdateAction.php
  Requests/{Module}/
    StoreRequest.php
    UpdateRequest.php
  Resources/{Module}/
    Resource1.php
  Policies/{Module}/
    Policy1.php
  Events/{Module}/
    Event1.php
  Listeners/{Module}/
    Listener1.php
  Jobs/{Module}/
    Job1.php
  Notifications/{Module}/
    Notification1.php

resources/views/
  livewire/{module}/
    admin/
      component1.blade.php
      component2.blade.php

database/migrations/
  {module}/
    2025_01_01_000000_create_table1.php
    2025_01_01_000001_create_table2.php

tests/Feature/{Module}/
    Test1.php
    Test2.php

tests/Unit/{Module}/
    Test1.php
```

## Örnek: Blog Modülü

```
app/
  Models/Blog/
    Post.php
    PostCategory.php
    PostTag.php
  Controllers/Blog/
    Admin/PostController.php
    Api/PostController.php
  Livewire/Blog/
    Admin/PostIndex.php
    Admin/PostForm.php
    Admin/PostCategoryIndex.php
    Admin/PostCategoryForm.php
  Services/Blog/
    PostService.php
    PostCategoryService.php
  Actions/Blog/
    CreatePostAction.php
    UpdatePostAction.php
    CreatePostCategoryAction.php
  Requests/Blog/
    StorePostRequest.php
    UpdatePostRequest.php
    StorePostCategoryRequest.php
  Resources/Blog/
    PostResource.php
    PostCategoryResource.php
  Policies/Blog/
    PostPolicy.php
  Events/Blog/
    PostCreated.php
    PostUpdated.php
  Listeners/Blog/
    SendPostNotification.php
  Jobs/Blog/
    PublishPostJob.php
  Notifications/Blog/
    PostPublishedNotification.php

resources/views/
  livewire/blog/
    admin/
      post-index.blade.php
      post-form.blade.php
      post-category-index.blade.php
      post-category-form.blade.php

database/migrations/
  blog/
    2025_01_01_000000_create_posts_table.php
    2025_01_01_000001_create_post_categories_table.php
    2025_01_01_000002_create_post_tags_table.php

tests/Feature/Blog/
    PostTest.php
    PostCategoryTest.php

tests/Unit/Blog/
    PostServiceTest.php
    CreatePostActionTest.php
```

## Modül İsimlendirme

- Modül isimleri **PascalCase** olmalı: `Blog`, `Cms`, `Crm`, `Settings`
- View klasörleri **küçük harf** olmalı: `blog`, `cms`, `crm`, `settings`
- Migration klasörleri **küçük harf** olmalı: `blog`, `cms`, `crm`, `settings`

## Modül Bağımlılıkları

- Modüller birbirini **direkt import etmemeli**
- Modüller arası iletişim **interface/contract** üzerinden olmalı
- Modüller arası iletişim için **Event'ler** kullanılmalı
- **Shared/Common** klasörü yok - her şey modül içinde

## Modül ServiceProvider

Her modülün ServiceProvider'ı `app/Providers/Domains/{Module}ServiceProvider.php` konumunda olmalı:

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
        $this->app->bind(
            PostRepositoryInterface::class,
            PostRepository::class
        );
    }

    public function boot(): void
    {
        Gate::policy(
            \App\Models\Blog\Post::class,
            \App\Policies\Blog\PostPolicy::class
        );

        Event::listen(
            \App\Events\Blog\PostCreated::class,
            \App\Listeners\Blog\SendPostNotification::class
        );
    }
}
```

## Modül Route'ları

Route'lar merkezi route dosyalarında tanımlanmalı (`routes/web.php`, `routes/api.php`):

```php
// routes/web.php
if (config('modules.enabled.blog', true)) {
    Route::prefix('admin/blog')->middleware(['web', 'auth', 'admin'])->group(function (): void {
        Route::get('/posts', [\App\Livewire\Blog\Admin\PostIndex::class])->name('admin.blog.posts.index');
        Route::get('/posts/create', [\App\Livewire\Blog\Admin\PostForm::class])->name('admin.blog.posts.create');
        Route::get('/posts/{post}/edit', [\App\Livewire\Blog\Admin\PostForm::class])->name('admin.blog.posts.edit');
    });
}
```

## Modül Migration'ları

Migration'lar modül klasörü altında olmalı:

```
database/migrations/blog/
  2025_01_01_000000_create_posts_table.php
  2025_01_01_000001_create_post_categories_table.php
```

Migration path'leri `config/modules.php` veya özel bir service provider ile yapılandırılmalı.

## Modül Test'leri

Test'ler modül klasörü altında olmalı:

```
tests/Feature/Blog/
    PostTest.php
    PostCategoryTest.php

tests/Unit/Blog/
    PostServiceTest.php
    CreatePostActionTest.php
```

## Modül Silme

Bir modülü silmek için `php artisan module:remove {module}` komutu kullanılmalı. Bu komut:

1. Modülün tüm dosyalarını siler
2. Migration dosyası oluşturur (modül tablolarını silmek için)
3. `config/modules.php` dosyasından modülü kaldırır
4. Route'lardan modül route'larını kaldırır
5. ServiceProvider'ı siler

## Önemli Notlar

- **Her modül bağımsız olmalı**: Modüller birbirini direkt import etmemeli
- **Interface-based communication**: Modüller arası iletişim interface üzerinden olmalı
- **Event-driven**: Modüller arası iletişim için Event'ler kullanılmalı
- **Modül klasörleri sadece business logic**: Modül klasörlerinde routes.php ve Providers/ klasörü olmamalı (ServiceProvider `app/Providers/Domains/` altında)
- **Route'lar merkezi**: Route'lar `routes/web.php` ve `routes/api.php` dosyalarında tanımlanmalı
