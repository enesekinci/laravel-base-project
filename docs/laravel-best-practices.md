# Laravel Best Practices

Bu doküman, projede uygulanması gereken Laravel best practice'lerini ve kod standartlarını içerir. Tüm geliştiriciler bu kurallara uymalıdır.

## 📋 İçindekiler

1. [Mimari ve Sorumluluk Ayrımı](#mimari-ve-sorumluluk-ayrımı)
2. [Controller Standartları](#controller-standartları)
3. [Service ve Action Pattern](#service-ve-action-pattern)
4. [Model Standartları](#model-standartları)
5. [Validation ve FormRequest](#validation-ve-formrequest)
6. [Authorization ve Policies](#authorization-ve-policies)
7. [Event-Driven Architecture](#event-driven-architecture)
8. [Queue ve Job Kullanımı](#queue-ve-job-kullanımı)
9. [Database ve Eloquent](#database-ve-eloquent)
10. [API Development](#api-development)
11. [Error Handling](#error-handling)
12. [Logging ve Observability](#logging-ve-observability)
13. [Güvenlik](#güvenlik)
14. [Performans Optimizasyonu](#performans-optimizasyonu)
15. [Code Style ve Naming](#code-style-ve-naming)
16. [Testing](#testing)
17. [Configuration Management](#configuration-management)

---

## Mimari ve Sorumluluk Ayrımı

### Controller = HTTP Adaptörü

Controller'lar sadece HTTP isteklerini alır, validate eder, use-case'i çağırır ve response döner. **Asla business logic içermemelidir.**

```php
// ✅ İyi
public function store(StoreProductRequest $request, ProductService $service): JsonResponse
{
    $product = $service->create($request->validated());
    return response()->json(['data' => new ProductResource($product)], 201);
}

// ❌ Kötü
public function store(Request $request)
{
    $request->validate([...]);
    // 50+ satır business logic
    $product = Product::create([...]);
    // Mail gönderme, cache temizleme, log yazma...
}
```

### İş Mantığı Nerede Olmalı?

İş mantığı şu 3 yerden birinde olmalı:

1. **Action/UseCase Class** - Tek bir iş yapar, tekrar kullanılabilir
2. **Job** - Asenkron/queue işlemleri
3. **Domain Service** - Birkaç action'ı birleştiren orkestrasyon

**Önemli:** "God Service" (2000+ satırlık service sınıfları) oluşturmaktan kaçının. Her service tek bir domain'e odaklanmalıdır.

---

## Controller Standartları

### Temel Kurallar

- Controller metotları **maksimum 5-10 satır** olmalı
- Sadece HTTP işini yapmalı (request al, validate et, service çağır, response dön)
- Business logic **asla** controller'da olmamalı
- Dependency Injection kullanılmalı

```php
// ✅ İyi - İnce Controller
class ProductController extends Controller
{
    public function __construct(
        private readonly ProductService $service
    ) {}

    public function store(StoreProductRequest $request): JsonResponse
    {
        $product = $this->service->create($request->validated());
        return response()->json(new ProductResource($product), 201);
    }
}

// ❌ Kötü - Şişman Controller
public function store(Request $request)
{
    $request->validate([...]);
    // 30+ satır business logic
}
```

### Response Tipleri

- **API endpoint'leri**: `JsonResponse` döndürmeli, `Resource` kullanmalı
- **Blade view'ları**: Sadece sayfa yükleme için `View` döndürmeli

```php
// ✅ API endpoint
public function index(): JsonResponse
{
    $products = $this->service->getAll();
    return response()->json(ProductResource::collection($products));
}

// ✅ Blade view (sadece sayfa yükleme)
public function index(): View
{
    return view('admin.products.index');
}
```

---

## Service ve Action Pattern

### Service Pattern

Service'ler business logic'i orkestre eder. Her domain için bir service olmalı (ProductService, OrderService).

```php
class ProductService
{
    public function __construct(
        private readonly CreateProductAction $createAction,
        private readonly ProductRepository $repository
    ) {}

    public function createProduct(CreateProductData $data): Product
    {
        // Business logic orkestrasyonu
        return $this->createAction->execute($data);
    }
}
```

### Action Pattern

Action'lar tek bir sorumluluğa sahiptir. Karmaşık işlemler için kullanılır.

```php
class CreateProductAction
{
    public function __construct(
        private readonly ProductRepository $repository
    ) {}

    public function execute(CreateProductData $data): Product
    {
        return DB::transaction(function () use ($data) {
            $product = $this->repository->create($data->toArray());

            // İlişkili verileri oluştur
            if ($data->variations) {
                $this->createVariations($product, $data->variations);
            }

            event(new ProductCreated($product));

            return $product;
        });
    }
}
```

### Action vs Service

- **Action**: Tek bir iş yapar (CreateProduct, UpdateOrder, SendEmail)
- **Service**: Birkaç action'ı birleştirir, orkestrasyon yapar

---

## Model Standartları

### Model Yapısı

```php
class Product extends Model
{
    use HasFactory, SoftDeletes;

    // 1. Properties
    protected $fillable = ['name', 'price', 'stock'];

    protected function casts(): array
    {
        return [
            'price' => 'float', // decimal:X string döndürür, float kullan
            'is_active' => 'boolean',
            'published_at' => 'datetime',
        ];
    }

    // 2. Relationships (tip belirterek)
    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    // 3. Scopes
    public function scopeActive(Builder $query): void
    {
        $query->where('is_active', true);
    }

    // 4. Helper methods (basit logic)
    public function isInStock(): bool
    {
        return $this->stock > 0;
    }
}
```

### Model Kuralları

- İlişkileri **daima tip belirterek** tanımlayın: `public function posts(): HasMany`
- Karmaşık sorguları **scope** veya **query class** ile soyutlayın
- Model içinde sadece **basit helper method'lar** olmalı
- Karmaşık business logic **Service/Action**'da olmalı

### Fat Models, Skinny Controllers

Database sorgularını model'e taşıyın:

```php
// ✅ İyi - Model'de sorgu
class Client extends Model
{
    public function getVerifiedWithRecentOrders(): Collection
    {
        return $this->verified()
            ->with(['orders' => fn($query) => $query->recent()])
            ->get();
    }

    public function scopeVerified(Builder $query): Builder
    {
        return $query->where('is_verified', true);
    }
}

// Controller'da
public function index(): View
{
    return view('index', ['clients' => Client::getVerifiedWithRecentOrders()]);
}
```

---

## Validation ve FormRequest

### FormRequest Kullanımı

**Asla** controller içinde `$request->validate()` kullanmayın. Her endpoint için FormRequest oluşturun.

```php
// ✅ İyi
public function store(StoreProductRequest $request): JsonResponse
{
    // Validation otomatik yapıldı
}

class StoreProductRequest extends FormRequest
{
    public function authorize(): bool
    {
        return $this->user()->can('create', Product::class);
    }

    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'price' => ['required', 'numeric', 'min:0'],
            'stock' => ['required', 'integer', 'min:0'],
        ];
    }
}

// ❌ Kötü
public function store(Request $request)
{
    $request->validate([...]); // Controller'da validation
}
```

### FormRequest Organizasyonu

FormRequest'ler klasörleme ile organize edilmelidir:

```
app/Http/Requests/
├── Admin/
│   └── Products/
│       ├── StoreProductRequest.php
│       └── UpdateProductRequest.php
└── Api/
    └── Products/
        └── StoreProductRequest.php
```

---

## Authorization ve Policies

### Policy Kullanımı

Yetkilendirme **asla** controller içinde `if ($user->role === 'admin')` şeklinde yapılmamalı. Policy/Gate kullanılmalı.

```php
// ✅ İyi - Policy kullanımı
class ProductPolicy
{
    public function update(User $user, Product $product): bool
    {
        return $user->id === $product->user_id || $user->isAdmin();
    }
}

// Controller'da
public function update(UpdateProductRequest $request, Product $product): JsonResponse
{
    $this->authorize('update', $product);
    // ...
}

// ❌ Kötü - Controller'da rol kontrolü
public function update(Request $request, Product $product)
{
    if ($request->user()->role !== 'admin') {
        abort(403);
    }
}
```

### Gate Kullanımı

Model bazlı olmayan yetkilendirmeler için Gate kullanın:

```php
// AuthServiceProvider'da
Gate::define('manage-products', function (User $user) {
    return $user->hasPermission('manage-products');
});

// Controller'da
Gate::authorize('manage-products');
```

---

## Event-Driven Architecture

### Event/Listener Pattern

Yan etkiler (mail, bildirim, log, dış sistem çağrısı, audit) core use-case'i kirletmemeli. Event/Listener kullanın.

```php
// ✅ İyi - Event kullanımı
class CreateProductAction
{
    public function execute(CreateProductData $data): Product
    {
        $product = Product::create($data->toArray());

        event(new ProductCreated($product)); // Event fırlat

        return $product;
    }
}

// Listener'da yan etkiler
class SendProductCreatedNotification
{
    public function handle(ProductCreated $event): void
    {
        // Mail gönderme, bildirim, log vb.
        Mail::to($event->product->user)->send(new ProductCreatedMail($event->product));
    }
}
```

### Event Naming

Event isimleri geçmiş zaman olmalı: `ProductCreated`, `OrderCompleted`, `UserRegistered`

---

## Queue ve Job Kullanımı

### Queue Kullanımı

Ağır işler (mail, notification, 3rd party API) **mutlaka queue'ya verilmelidir**.

```php
// ✅ İyi - Queue kullanımı
class SendInvoiceJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable;

    public function __construct(
        public Order $order
    ) {}

    public function handle(): void
    {
        // Ağır işlemler
        Mail::to($this->order->user)->send(new InvoiceMail($this->order));
    }
}

// Kullanım
SendInvoiceJob::dispatch($order);

// ❌ Kötü - Senkron çalıştırma
Mail::to($order->user)->send(new InvoiceMail($order)); // Request'i yavaşlatır
```

### Job Best Practices

- **Retry/backoff/timeout** belirleyin
- **Idempotency** düşünün (aynı job 2 kez çalışabilir)
- **Failed jobs** için handling ekleyin

```php
class ProcessPaymentJob implements ShouldQueue
{
    public $tries = 3;
    public $backoff = [60, 120, 300]; // 1dk, 2dk, 5dk

    public function handle(): void
    {
        // Payment processing
    }

    public function failed(Throwable $exception): void
    {
        // Failed job handling
        Log::error('Payment processing failed', [
            'order_id' => $this->order->id,
            'error' => $exception->getMessage(),
        ]);
    }
}
```

---

## Database ve Eloquent

### N+1 Problem Önleme

**Asla** döngü içinde ilişkilere erişmeyin. Eager loading kullanın.

```php
// ❌ Kötü - N+1 problem
$products = Product::all();
foreach ($products as $product) {
    echo $product->category->name; // Her iterasyonda query
}

// ✅ İyi - Eager loading
$products = Product::with('category:id,name')->get();
foreach ($products as $product) {
    echo $product->category->name; // Tek query
}
```

### Query Optimizasyonu

```php
// ✅ Sadece ihtiyaç duyulan kolonları seç
Product::select('id', 'name', 'price')->get();

// ✅ Büyük veri setleri için chunk kullan
Product::chunk(200, function ($products) {
    foreach ($products as $product) {
        // İşlem
    }
});

// ✅ Lazy collections
Product::lazy()->each(function ($product) {
    // İşlem
});
```

### Transaction Kullanımı

Birden fazla tabloya yazıyorsanız transaction kullanın:

```php
// ✅ İyi - Transaction kullanımı
DB::transaction(function () {
    $order = Order::create([...]);
    $payment = Payment::create(['order_id' => $order->id]);
    $order->items()->createMany([...]);
});

// ❌ Kötü - Transaction yok
$order = Order::create([...]);
$payment = Payment::create(['order_id' => $order->id]); // Hata olursa tutarsızlık
```

### Pagination

**Her liste endpoint'i pagination kullanmalı:**

```php
// ✅ İyi
$products = Product::paginate(15);

// ❌ Kötü
$products = Product::all(); // Tüm kayıtları çeker
```

### Scope Kullanımı

Tekrarlayan filtreler için scope kullanın:

```php
// ✅ İyi - Scope kullanımı
public function scopeActive(Builder $query): Builder
{
    return $query->where('is_active', true);
}

// Kullanım
Product::active()->get();
Product::whereHas('category', fn($q) => $q->active())->get();
```

---

## API Development

### API Resources

API response'ları için **mutlaka Resource kullanın**:

```php
class ProductResource extends JsonResource
{
    public function toArray($request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'price' => $this->price,
            'category' => new CategoryResource($this->whenLoaded('category')),
        ];
    }
}

// Kullanım
return response()->json(new ProductResource($product));
return response()->json(ProductResource::collection($products));
```

### API Response Format

Tutarlı response formatı kullanın:

```php
// ✅ Standart format
return response()->json([
    'success' => true,
    'data' => new ProductResource($product),
    'message' => 'Product created successfully',
], 201);

// Hata durumunda
return response()->json([
    'success' => false,
    'message' => 'Validation failed',
    'errors' => $errors,
], 422);
```

### HTTP Status Codes

Doğru HTTP status code'ları kullanın:

- `200` - Success (GET, PUT, PATCH)
- `201` - Created (POST)
- `204` - No Content (DELETE)
- `400` - Bad Request
- `401` - Unauthorized
- `403` - Forbidden
- `404` - Not Found
- `422` - Validation Error
- `500` - Server Error

---

## Error Handling

### Exception Handling

Merkezi exception handling kullanın:

```php
// app/Exceptions/Handler.php
public function register(): void
{
    $this->renderable(function (Throwable $e, Request $request) {
        if ($request->expectsJson()) {
            return response()->json([
                'success' => false,
                'message' => $e->getMessage(),
                'errors' => $e->errors() ?? null,
            ], $this->isHttpException($e) ? $e->getStatusCode() : 500);
        }
    });
}
```

### Custom Exceptions

Domain-specific exception'lar oluşturun:

```php
class ProductNotFoundException extends Exception
{
    public function render($request)
    {
        return response()->json([
            'success' => false,
            'message' => 'Product not found',
        ], 404);
    }
}
```

---

## Logging ve Observability

### Structured Logging

Context ile logging yapın:

```php
// ✅ İyi - Context ile logging
Log::info('User registered', [
    'user_id' => $user->id,
    'email' => $user->email,
    'ip' => request()->ip(),
]);

// ❌ Kötü - String concatenation
Log::info('User registered: ' . $user->email);
```

### Log Channels

Farklı log channel'ları kullanın:

```php
// config/logging.php
'channels' => [
    'user_actions' => [
        'driver' => 'daily',
        'path' => storage_path('logs/user-actions.log'),
        'level' => 'info',
        'days' => 14,
    ],
];

// Kullanım
Log::channel('user_actions')->info('Action performed', $context);
```

### Correlation ID

Her request'e correlation ID ekleyin (middleware ile):

```php
// Middleware'de
$request->headers->set('X-Correlation-ID', Str::uuid());

// Log'da
Log::info('Request processed', [
    'correlation_id' => $request->header('X-Correlation-ID'),
]);
```

---

## Güvenlik

### Input Validation

**Tüm user input'ları validate edilmelidir:**

```php
// ✅ FormRequest ile validation
class StoreProductRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'price' => ['required', 'numeric', 'min:0'],
        ];
    }
}
```

### SQL Injection Önleme

**Asla** raw SQL kullanmayın. Eloquent/Query Builder kullanın:

```php
// ✅ İyi
User::where('email', $email)->first();

// ❌ Kötü
DB::select("SELECT * FROM users WHERE email = '$email'");
```

### Mass Assignment Protection

`$fillable` veya `$guarded` kullanın:

```php
protected $fillable = ['name', 'price', 'stock'];

// veya

protected $guarded = ['id', 'created_at', 'updated_at'];
```

### Rate Limiting

API endpoint'leri için rate limiting kullanın:

```php
Route::middleware('throttle:api')->group(function () {
    Route::apiResource('products', ProductController::class);
});
```

---

## Performans Optimizasyonu

### Caching

Sık kullanılan sorgular için cache kullanın:

```php
$products = Cache::remember('products:featured', 3600, function () {
    return Product::where('featured', true)->get();
});
```

### Cache Invalidation

Cache invalidation stratejisi belirleyin:

```php
// Product oluşturulduğunda cache temizle
event(new ProductCreated($product));

// Listener'da
public function handle(ProductCreated $event): void
{
    Cache::forget('products:featured');
}
```

### Index Kullanımı

Sık kullanılan sorgular için index oluşturun:

```php
// Migration'da
$table->index('email');
$table->index(['user_id', 'status']);
```

### Eager Loading

İlişkili veriler için eager loading kullanın:

```php
// ✅ İyi
Product::with('category:id,name')->get();

// ❌ Kötü
Product::all(); // Sonra category'ye erişince N+1
```

---

## Code Style ve Naming

### Type Hints

**Her zaman** type hint kullanın:

```php
// ✅ İyi
public function createProduct(string $name, float $price, int $stock): Product
{
    // ...
}

// ❌ Kötü
public function createProduct($name, $price, $stock)
{
    // ...
}
```

### Readonly Properties

Constructor'da readonly properties kullanın:

```php
public function __construct(
    private readonly ProductRepository $repository,
    private readonly CacheService $cache
) {}
```

### Naming Conventions

- **Models**: Tekil, PascalCase (`Product`, `User`)
- **Controllers**: Tekil + Controller (`ProductController`)
- **Services**: Tekil + Service (`ProductService`)
- **Actions**: Verb + Noun + Action (`CreateProductAction`)
- **Events**: Noun + Verb Past Tense (`ProductCreated`)
- **Jobs**: Verb + Noun + Job (`SendInvoiceJob`)
- **FormRequests**: Verb + Noun + Request (`StoreProductRequest`)
- **Tables**: Çoğul, snake_case (`products`, `user_profiles`)
- **Methods**: camelCase (`getUserById`)
- **Variables**: camelCase (`$orderTotal`)

### Constants ve Enum

Hardcoded string'ler yerine constant veya Enum kullanın:

```php
// ✅ İyi - Enum kullanımı
enum ProductStatus: string
{
    case DRAFT = 'draft';
    case PUBLISHED = 'published';
    case ARCHIVED = 'archived';
}

// Kullanım
if ($product->status === ProductStatus::PUBLISHED) {
    // ...
}

// ❌ Kötü - Hardcoded string
if ($product->status === 'published') {
    // ...
}
```

### Translation

String'leri translate edin:

```php
// ✅ İyi
return back()->with('message', __('Product created successfully'));

// ❌ Kötü
return back()->with('message', 'Product created successfully');
```

---

## Testing

### Test Yapısı

Pest kullanın (PHPUnit değil):

```php
use function Pest\Laravel\{actingAs, assertDatabaseHas};

it('can create a product', function () {
    $user = User::factory()->create();

    actingAs($user)
        ->post('/api/products', [
            'name' => 'Test Product',
            'price' => 99.99,
        ])
        ->assertCreated();

    assertDatabaseHas('products', [
        'name' => 'Test Product',
    ]);
});
```

### Test Coverage

- **Feature test**: Tüm endpoint'ler için
- **Unit test**: Action/Service sınıfları için (branching logic varsa)
- **Test coverage**: Minimum %80

### Test Best Practices

- Arrange-Act-Assert pattern kullanın
- Database factories kullanın
- External service'leri mock edin
- `RefreshDatabase` trait kullanın
- Event/Queue fake kullanın

---

## Configuration Management

### ENV Kullanımı

**Asla** runtime'da `env()` kullanmayın. `config()` kullanın:

```php
// ✅ İyi
// config/services.php
'api_key' => env('API_KEY'),

// Kullanım
$apiKey = config('services.api_key');

// ❌ Kötü
$apiKey = env('API_KEY'); // Config cache kırılır
```

### Config Dosyaları

Tüm environment değerleri config dosyalarında olmalı:

```php
// config/api.php
return [
    'key' => env('API_KEY'),
    'timeout' => env('API_TIMEOUT', 30),
];
```

---

## Özet Checklist

Yeni bir feature eklerken şu checklist'i takip edin:

- [ ] Controller ince (5-10 satır)
- [ ] FormRequest oluşturuldu ve kullanıldı
- [ ] Business logic Service/Action'da
- [ ] Policy/Gate ile authorization yapıldı
- [ ] N+1 problem yok (eager loading kullanıldı)
- [ ] Pagination kullanıldı (liste endpoint'leri için)
- [ ] Transaction kullanıldı (birden fazla tablo yazılıyorsa)
- [ ] Event/Listener kullanıldı (yan etkiler için)
- [ ] Queue kullanıldı (ağır işlemler için)
- [ ] API Resource kullanıldı (API endpoint'leri için)
- [ ] Test yazıldı (feature + unit)
- [ ] Type hints eklendi
- [ ] Enum/Constant kullanıldı (hardcoded string yok)
- [ ] `config()` kullanıldı (`env()` değil)

---

## Kaynaklar

- [Laravel 12 Documentation](https://laravel.com/docs/12.x)
- [Laravel Best Practices (Community)](https://github.com/alexeymezenin/laravel-best-practices)
- [Cursor Rules Documentation](.cursor/rules/)

---

**Not:** Bu doküman sürekli güncellenmektedir. Yeni best practice'ler eklendikçe buraya eklenir.

