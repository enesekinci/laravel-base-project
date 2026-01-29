---
alwaysApply: true
---

# BACKEND CONVENTIONS

- Controllers sadece HTTP işini yapsın. İş kuralları Service / Action sınıflarında olsun: `app/Actions`, `app/Services`.
- Request validation daima FormRequest ile.
- Response'lar JSON'da resource veya DTO stili olsun. api/\* için Resource kullan.
- Model içinde sorgu şişirmeyin, Query Builder/Scopes kullanın.
- Controller metodları maksimum 5-10 satır olmalı.
- Dependency Injection kullan, container'a bağımlı olma.

```php
// ✅ İyi
public function store(StoreProductRequest $request, ProductService $service)
{
    $product = $service->create($request->validated());
    return Inertia::render('Admin/Products/Show', ['product' => $product]);
}

// ❌ Kötü
public function store(Request $request)
{
    $request->validate([...]);
    $product = Product::create([...]);
    // ... 50 satır business logic
}
```

# NAMING CONVENTIONS

- Controller isimleri tekil + "Controller" (örn: `PostController`, `PageController`).
- Model isimleri tekil (örn: `User`, `Post`, `Page`).
- Service isimleri tekil + "Service" (örn: `PostService`, `PageService`).
- Form Request isimleri: `Store{Model}Request`, `Update{Model}Request`.
- Event isimleri geçmiş zaman (örn: `PostCreated`, `PageUpdated`).
- Job isimleri açıklayıcı + "Job" (örn: `SendEmailJob`, `ProcessNotificationJob`).
