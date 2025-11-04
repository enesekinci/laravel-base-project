---
alwaysApply: true
---

# SECURITY

- CSRF protection her zaman aktif olmalı.
- XSS koruması için input validation.
- SQL injection'dan korunmak için Eloquent/Query Builder kullan.
- Mass assignment protection kullan (`$fillable` veya `$guarded`).
- Password hashing Laravel'in kendi sistemini kullan.
- Rate limiting kullan.

# PERFORMANCE

- Cache kullan (Redis/Memcached).
- Queue kullan (uzun süren işlemler için).
- Database query'leri optimize et, N+1 problem'den kaçın.
- Eager loading kullan (`with()`, `load()`).

```php
// ✅ İyi
$products = Product::with('category:id,name')
    ->select('id', 'name', 'price', 'category_id')
    ->where('status', 'published')
    ->get();

// ❌ Kötü
$products = Product::all();
foreach ($products as $product) {
    echo $product->category->name; // N+1 problem
}
```
