---
alwaysApply: true
---

# CODE STYLE

- Laravel Pint ile format.
- PHP için strict types kullanma zorunlu değil ama type-hint zorunlu.
- Her yeni feature için test yazılabilir formatta üret.
- 4 space indentation.
- Opening brace aynı satırda.
- Method chaining'de her metod ayrı satırda.

```php
// ✅ İyi
$products = Product::query()
    ->where('is_active', true)
    ->with('user')
    ->orderBy('created_at', 'desc')
    ->get();

// ❌ Kötü
$products = Product::query()->where('is_active', true)->with('user')->orderBy('created_at', 'desc')->get();
```

# DO NOT

- Rastgele helper yazma, `app/Support` altında topla.
- Controller içine doğrudan 30 satır business logic koyma.
- Blade + React karıştırma, admin tarafı sadece Inertia/React.
- Raw SQL query kullanma, Eloquent/Query Builder kullan.
- N+1 problem yaratma, eager loading kullan.
