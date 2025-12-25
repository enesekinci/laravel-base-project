---
alwaysApply: true
---

# LARAVEL ADVANCED PATTERNS

## Action/UseCase Pattern

- **Action sınıfları tek bir sorumluluğa sahip olmalı**: `CreatePostAction`, `UpdatePageAction`
- **Action'lar transaction içinde çalışmalı** (birden fazla tablo yazılıyorsa)
- **Action'lar event fırlatmalı** (yan etkiler için)
- **Service'ler action'ları orkestre eder**, action'lar tek iş yapar

```php
// ✅ İyi - Action pattern
class CreatePostAction
{
    public function __construct(
        private readonly PostRepository $repository
    ) {}

    public function execute(CreatePostData $data): Post
    {
        return DB::transaction(function () use ($data) {
            $post = $this->repository->create($data->toArray());

            if ($data->categories) {
                $post->categories()->sync($data->categories);
            }

            event(new PostCreated($post));

            return $post;
        });
    }
}

// ❌ Kötü - Controller'da business logic
public function store(Request $request)
{
    $post = Post::create([...]);
    // 50 satır business logic
}
```

## Event-Driven Architecture

- **Yan etkiler (mail, bildirim, log, dış sistem) Event/Listener ile yapılmalı**
- **Event isimleri geçmiş zaman**: `PostCreated`, `PageUpdated`, `UserRegistered`
- **Ağır işlemler Listener içinde queue'ya verilmeli**

```php
// ✅ İyi - Event kullanımı
class CreatePostAction
{
    public function execute(CreatePostData $data): Post
    {
        $post = Post::create($data->toArray());
        event(new PostCreated($post)); // Event fırlat
        return $post;
    }
}

// Listener'da yan etkiler
class SendPostCreatedNotification implements ShouldQueue
{
    public function handle(PostCreated $event): void
    {
        Mail::to($event->post->author)->send(new PostCreatedMail($event->post));
    }
}

// ❌ Kötü - Controller'da yan etkiler
public function store(Request $request)
{
    $post = Post::create([...]);
    Mail::to($user)->send(...); // Yan etki controller'da
    Log::info(...); // Yan etki controller'da
}
```

## Queue ve Job Best Practices

- **Mail/Notification/3rd party API = queue default**
- **Job'lar retry/backoff/timeout belirlemeli**
- **Idempotency düşünülmeli** (aynı job 2 kez çalışabilir)
- **Failed job handling** eklenmeli

```php
// ✅ İyi - Queue kullanımı
class SendNotificationJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable;

    public $tries = 3;
    public $backoff = [60, 120, 300]; // 1dk, 2dk, 5dk

    public function __construct(
        public Post $post
    ) {}

    public function handle(): void
    {
        Mail::to($this->post->author)->send(new PostPublishedMail($this->post));
    }

    public function failed(Throwable $exception): void
    {
        Log::error('Notification sending failed', [
            'post_id' => $this->post->id,
            'error' => $exception->getMessage(),
        ]);
    }
}

// ❌ Kötü - Senkron çalıştırma
Mail::to($post->author)->send(new PostPublishedMail($post)); // Request'i yavaşlatır
```

## Transaction Kullanımı

- **Birden fazla tabloya yazıyorsa transaction kullan**
- **Transaction içinde event fırlatılabilir** (commit sonrası çalışır)

```php
// ✅ İyi - Transaction kullanımı
DB::transaction(function () {
    $post = Post::create([...]);
    $post->categories()->sync([...]);
    $post->tags()->sync([...]);

    event(new PostCreated($post)); // Commit sonrası çalışır
});

// ❌ Kötü - Transaction yok
$post = Post::create([...]);
$post->categories()->sync([...]); // Hata olursa tutarsızlık
```

## Error Handling

- **Custom exception'lar domain-specific olmalı**
- **Exception'lar render method'u ile response döndürmeli**
- **API için JSON response, web için redirect**

```php
// ✅ İyi - Custom exception
class PostNotFoundException extends Exception
{
    public function render($request)
    {
        if ($request->expectsJson()) {
            return response()->json([
                'success' => false,
                'message' => 'Post not found',
            ], 404);
        }

        return redirect()->route('admin.posts.index')
            ->with('error', 'Post not found');
    }
}

// Kullanım
throw new PostNotFoundException();
```

## Logging Best Practices

- **Structured logging kullan** (context ile)
- **Log channel'ları kullan** (farklı log dosyaları için)
- **Correlation ID ekle** (request tracking için)

```php
// ✅ İyi - Structured logging
Log::info('User registered', [
    'user_id' => $user->id,
    'email' => $user->email,
    'ip' => request()->ip(),
    'correlation_id' => request()->header('X-Correlation-ID'),
]);

// ❌ Kötü - String concatenation
Log::info('User registered: ' . $user->email);
```

## Constants ve Enum Kullanımı

- **Hardcoded string'ler yerine Enum kullan**
- **Status, type, role gibi değerler için Enum kullan**

```php
// ✅ İyi - Enum kullanımı
enum PostStatus: string
{
    case DRAFT = 'draft';
    case PUBLISHED = 'published';
    case ARCHIVED = 'archived';
}

// Model'de
protected function casts(): array
{
    return [
        'status' => PostStatus::class,
    ];
}

// Kullanım
if ($post->status === PostStatus::PUBLISHED) {
    // ...
}

// ❌ Kötü - Hardcoded string
if ($post->status === 'published') {
    // ...
}
```

## Translation ve Internationalization

- **Tüm string'leri translate et**
- **Language dosyalarını kullan**

```php
// ✅ İyi - Translation kullanımı
return back()->with('message', __('Post created successfully'));

// Language dosyasında: lang/tr/messages.php
return [
    'post_created' => 'Yazı başarıyla oluşturuldu',
];

// ❌ Kötü - Hardcoded string
return back()->with('message', 'Post created successfully');
```

## Date Handling

- **Tarihleri datetime cast ile kaydet**
- **Formatlama için accessor kullan**
- **Blade'de Carbon method'ları kullan**

```php
// ✅ İyi - Date handling
// Model'de
protected function casts(): array
{
    return [
        'published_at' => 'datetime',
    ];
}

// Blade'de
{{ $post->published_at->format('d.m.Y') }}
{{ $post->published_at->diffForHumans() }}

// ❌ Kötü - String formatlama
{{ Carbon::createFromFormat('Y-d-m H-i', $post->published_at)->format('d.m.Y') }}
```

## Dependency Injection

- **Constructor injection kullan**
- **Facade kullanımından kaçın** (domain/action code'da)
- **IoC container kullan**, `new Class()` kullanma

```php
// ✅ İyi - Dependency injection
class ProductService
{
    public function __construct(
        private readonly ProductRepository $repository,
        private readonly CacheService $cache
    ) {}
}

// ❌ Kötü - Facade veya new kullanımı
class ProductService
{
    public function create($data)
    {
        $product = new Product(); // Tight coupling
        Cache::put(...); // Facade kullanımı
    }
}
```

## Chunk ve Lazy Loading

- **Büyük veri setleri için chunk kullan**
- **Memory-efficient işlemler için lazy loading kullan**

```php
// ✅ İyi - Chunk kullanımı
Post::chunk(200, function ($posts) {
    foreach ($posts as $post) {
        // İşlem
    }
});

// ✅ İyi - Lazy loading
Post::lazy()->each(function ($post) {
    // İşlem
});

// ❌ Kötü - Tüm veriyi çekme
$posts = Post::all(); // Memory problemi
foreach ($posts as $post) {
    // İşlem
}
```

## API Resource Standartları

- **Tüm API endpoint'leri Resource kullanmalı**
- **whenLoaded ile conditional loading**
- **Tutarlı response formatı**

```php
// ✅ İyi - API Resource
class PostResource extends JsonResource
{
    public function toArray($request): array
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'slug' => $this->slug,
            'category' => new PostCategoryResource($this->whenLoaded('category')),
            'created_at' => $this->created_at->toIso8601String(),
        ];
    }
}

// Kullanım
return response()->json(new PostResource($post), 201);
return response()->json(PostResource::collection($posts));
```

## Configuration Management

- **Runtime'da `env()` kullanma**, `config()` kullan
- **Tüm env değerleri config dosyalarında olmalı**
- **Default değerler config'de belirtilmeli**

```php
// ✅ İyi - Config kullanımı
// config/services.php
return [
    'api_key' => env('API_KEY'),
    'timeout' => env('API_TIMEOUT', 30), // Default değer
];

// Kullanım
$apiKey = config('services.api_key');

// ❌ Kötü - env() kullanımı
$apiKey = env('API_KEY'); // Config cache kırılır
```

## Documentation Standards

- **PHPDoc blokları kullan** (complex logic için)
- **Kod kendini açıklamalı** (anlamlı isimler)
- **Yorum satırları minimal olmalı**

```php
// ✅ İyi - Self-documenting code
public function isInStock(): bool
{
    return $this->stock > 0;
}

// ❌ Kötü - Gereksiz yorum
/**
 * Checks if product is in stock
 * @return bool Returns true if stock is greater than 0
 */
public function isInStock(): bool
{
    return $this->stock > 0; // Stock kontrolü
}
```
