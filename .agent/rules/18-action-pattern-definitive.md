---
alwaysApply: true
---

# LARAVEL ACTION PATTERN – DEFINITIVE RULESET

Bu doküman Action vs Service tartışmasını bitirir ve Cursor'un otomatik doğru sınıf üretmesini sağlar.

## 1️⃣ Action vs Service Karar Tablosu

| Kriter                          | Action              | Service                  |
| ------------------------------- | ------------------- | ------------------------ |
| Temel amaç                      | Use-case / iş akışı | Ortak iş kuralı          |
| Sorumluluk                      | Orchestration       | Hesaplama / domain logic |
| Birden fazla adım               | ✅                  | ❌                       |
| Transaction açar mı             | ✅                  | ❌                       |
| Event / Job tetikler mi         | ✅                  | ❌                       |
| Birden fazla Service çağırır mı | ✅                  | ❌                       |
| Tek başına DB write yapar mı    | ✅                  | ⚠️ (tercihen hayır)      |
| Controller'dan çağrılır mı      | ✅                  | ❌                       |
| Başka Action'lardan çağrılır mı | ❌                  | ✅                       |
| HTTP bağımlılığı                | ❌                  | ❌                       |

## Net Karar Kuralları

### Action Yaz

- "Bir şey oluyor" hissi varsa
- İş adım adım ilerliyorsa
- Transaction gerekiyorsa
- Event / Notification / Job tetikleniyorsa
- Aynı işlem API + Job + Command'dan çağrılacaksa

### Service Yaz

- Hesaplama yapıyorsa
- Kurallar içeriyorsa
- Birden fazla Action tarafından kullanılıyorsa
- "Nasıl" sorusuna cevap veriyorsa

> **Kural:**  
> Action = **Ne oluyor?**  
> Service = **Nasıl oluyor?**

## Anti-Pattern Alarmı 🚨

❌ `PostService` içinde:

- create
- update
- delete
- publish
- unpublish
- notify

varsa → **Mimari çöp.**

Bunu şöyle parçala:

- CreatePostAction
- UpdatePostAction
- PublishPostAction

* SlugService
* ContentService

## 2️⃣ Action Template Şablonu

```php
<?php

declare(strict_types=1);

namespace App\Actions\{Domain};

use Illuminate\Support\Facades\DB;

final class {ActionName}Action
{
    public function __construct(
        // Service bağımlılıkları burada
    ) {}

    public function handle(array $data)
    {
        return DB::transaction(function () use ($data) {

            /**
             * ❌ Validation YOK
             * ❌ Authorization YOK
             * ❌ HTTP nesnesi YOK
             */

            // 1. Domain write
            // 2. Service çağrıları
            // 3. Event / Job / Notification
            // 4. Return
        });
    }
}
```

## 3️⃣ Action Dosya Yapısı

```
app/Actions/
├── Blog/
│   ├── CreatePostAction.php
│   ├── UpdatePostAction.php
│   └── PublishPostAction.php
├── Cms/
│   ├── CreatePageAction.php
│   └── UpdatePageAction.php
└── Media/
    ├── UploadMediaAction.php
    └── DeleteMediaAction.php
```

## 4️⃣ Naming Kuralları

### Action

- Fiil + Nesne + Action
- Tekil use-case
- Genel isim YASAK

❌ `HandleDataAction`  
❌ `ProcessSomething`  
✅ `CreatePostAction`  
✅ `PublishPostAction`

### Service

- Nesne + Service / Calculator / Resolver
- Fiil içermez

✅ `SlugService`  
✅ `ContentService`  
✅ `MediaService`

## 5️⃣ Transaction Kuralı (KIRMIZI ÇİZGİ)

- **Birden fazla write → Action transaction açar**
- **Service transaction AÇMAZ**
- **Controller transaction AÇMAZ**

```php
// ✅ İyi - Action transaction açar
class CreatePostAction
{
    public function handle(array $data): Post
    {
        return DB::transaction(function () use ($data) {
            $post = Post::create([...]);
            $post->categories()->sync([...]);
            event(new PostCreated($post));
            return $post;
        });
    }
}

// ❌ Kötü - Service transaction açmaz
class PostService
{
    public function create(array $data): Post
    {
        return DB::transaction(function () use ($data) {
            // Service transaction açmaz!
        });
    }
}
```

## 6️⃣ Event / Job Kuralı

- **Event Action'dan fırlatılır**
- **Listener / Job iş yapar**
- **Action async iş yapmaz**

```php
// ✅ İyi - Action event fırlatır
class CreatePostAction
{
    public function handle(array $data): Post
    {
        $post = Post::create([...]);
        event(new PostCreated($post)); // Event fırlat
        return $post;
    }
}

// ❌ Kötü - Service event fırlatmaz
class PostService
{
    public function create(array $data): Post
    {
        $post = Post::create([...]);
        event(new PostCreated($post)); // Service event fırlatmaz!
        return $post;
    }
}
```

## 7️⃣ Controller Kullanımı (İNCE OLACAK)

```php
// ✅ İyi - Controller Action çağırır
public function store(StorePostRequest $request, CreatePostAction $action)
{
    $post = $action->handle($request->validated());
    return new PostResource($post);
}

// ❌ Kötü - Controller Service çağırır (karmaşık iş için)
public function store(StorePostRequest $request, PostService $service)
{
    $post = $service->createWithRelations([...]); // Karmaşık iş Service'de
    return new PostResource($post);
}
```

**Controller:**

- Request alır
- Action çağırır
- Response döner
- Başka bir şey YAPMAZ

## 8️⃣ Action İçinde OLMAMASI Gerekenler

- Request / Response nesneleri
- HTTP status code
- JSON formatlama
- `Auth::user()` çağrıları (parametre olarak ver)
- Validation kuralları

## 9️⃣ Test Stratejisi

### Action Testi

- HTTP YOK
- Middleware YOK
- Event fake'lenir

```php
it('yazı oluşturur ve event fırlatır', function () {
    Event::fake();

    $action = new CreatePostAction();
    $post = $action->handle($data);

    Event::assertDispatched(PostCreated::class);
    expect($post)->toBeInstanceOf(Post::class);
});
```

### Controller Testleri

- Sadece request + response doğrular
- İş mantığı test ETMEZ

## 🔟 Over-Engineering Koruması

Aşağıdakilerden **en az 2 tanesi** doğruysa Action yaz:

- [ ] Birden fazla adım var
- [ ] Transaction gerekiyor
- [ ] Event / Job var
- [ ] Aynı iş başka yerden çağrılacak
- [ ] Controller şişiyor

**Aksi halde:**

- ❌ Action yazma
- ❌ Dosya çöplüğü oluşturma

## 1️⃣1️⃣ Nihai Kural (Özet)

- **Controller = HTTP**
- **Action = Use-case**
- **Service = Kural**
- **Model = Veri**
- **Event/Job = Side-effect**

Bu sınırlar **DELİNMEZ**.

## 1️⃣2️⃣ Son Uyarı ⚠️

Action:

- Küçük projede opsiyonel
- Orta–büyük projede zorunlu
- Yanlış kullanılırsa mimariyi BATIRIR
- Doğru kullanılırsa projeyi 5 yıl taşır
