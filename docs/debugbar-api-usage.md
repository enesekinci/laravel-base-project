# Debugbar API Kullanımı

Laravel Debugbar API route'larında da kullanılabilir, ancak bazı önemli farklılıklar vardır.

## 🔍 Nasıl Çalışır?

### Web Route'ları (HTML Response)

- Debugbar HTML response'a **inject edilir** (sayfanın altında görünür)
- JavaScript ile interaktif debug arayüzü

### API Route'ları (JSON Response)

- Debugbar **JSON response'a inject edilmez** (response'u bozmamak için)
- Request'ler **storage'a kaydedilir**
- Web arayüzünden (`/_debugbar`) görüntülenebilir

## ⚙️ Yapılandırma

### Config: `config/debugbar.php`

```php
'except' => [
    'telescope*',
    'horizon*',
    '_boost/browser-logs',
    // 'api/*', // Kaldırıldı - API route'larında da çalışacak
],

'capture_ajax' => true, // API request'lerini yakala
'storage' => [
    'enabled' => true, // Storage aktif (API request'leri için gerekli)
    'open' => null, // localhost only (güvenlik)
],
```

## 📊 API Request'lerini Görüntüleme

### 1. Storage Web Arayüzü

```
http://localhost/_debugbar/open
```

Bu sayfada:

- Tüm API request'leri listelenir
- Her request'in detayları görüntülenebilir
- Query'ler, log'lar, exception'lar görülebilir

### 2. Chrome Extension (Clockwork)

Debugbar Clockwork integration'ı kullanarak Chrome extension ile görüntüleyebilirsiniz:

```php
// config/debugbar.php
'clockwork' => env('DEBUGBAR_CLOCKWORK', true),
```

Chrome'da Clockwork extension'ı yükleyin ve API request'lerini görüntüleyin.

## 🎯 Kullanım Senaryoları

### 1. API Endpoint Debugging

```php
// routes/api.php
Route::get('/users', function () {
    // Debugbar bu request'i yakalar
    $users = User::all();
    return response()->json($users);
});
```

**Görüntüleme:**

1. API endpoint'ini çağır: `GET /api/users`
2. `http://localhost/_debugbar/open` adresine git
3. Son request'i seç ve detayları gör

### 2. AJAX Request Debugging

Frontend'den gelen AJAX request'leri de yakalanır:

```javascript
// Frontend
fetch('/api/users')
    .then((response) => response.json())
    .then((data) => console.log(data))
```

**Görüntüleme:**

- `http://localhost/_debugbar/open` adresinden AJAX request'ini görüntüle

### 3. API Response Headers

Debugbar API response'larına bazı header'lar ekler (opsiyonel):

```php
// config/debugbar.php
'add_ajax_timing' => true, // Server-Timing header ekle
```

Chrome DevTools → Network → Headers → Server-Timing

## ⚠️ Önemli Notlar

### 1. JSON Response Bozulmaz

Debugbar API response'larına HTML inject **etmez**. JSON response temiz kalır:

```json
{
    "data": [...],
    "status": "success"
}
```

### 2. Storage Güvenliği

Production'da storage'ı **mutlaka kapatın**:

```php
// config/debugbar.php
'storage' => [
    'enabled' => env('DEBUGBAR_STORAGE_ENABLED', false), // Production'da false
    'open' => false, // Production'da mutlaka false
],
```

### 3. Performance

Storage kullanımı hafif bir overhead yaratır. Development'ta sorun değil, production'da kapatın.

## 🔧 Best Practices

### Development

```php
// config/debugbar.php
'enabled' => env('DEBUGBAR_ENABLED', null), // APP_DEBUG'a göre
'capture_ajax' => true,
'storage' => [
    'enabled' => true,
    'open' => null, // localhost only
],
```

### Production

```php
// config/debugbar.php
'enabled' => false, // Mutlaka false
'storage' => [
    'enabled' => false,
    'open' => false,
],
```

## 📝 Örnek Kullanım

### API Controller

```php
// app/Http/Controllers/Api/UserController.php
class UserController extends Controller
{
    public function index()
    {
        // Debugbar bu request'i yakalar
        \Debugbar::info('Fetching users');

        $users = User::with('posts')->get();

        \Debugbar::addMessage('Found ' . $users->count() . ' users', 'info');

        return response()->json($users);
    }
}
```

### Storage'dan Görüntüleme

1. API endpoint'ini çağır: `GET /api/users`
2. `http://localhost/_debugbar/open` adresine git
3. Request'i seç
4. Detayları gör:
    - Queries (kaç query, süreleri)
    - Log messages
    - Memory usage
    - Route info
    - Request/Response data

## 🚀 Alternatif: Telescope

API debugging için Telescope da kullanılabilir:

```
http://localhost/telescope/requests
```

Telescope daha detaylı ve production-ready bir çözümdür.

---

**Son Güncelleme:** 2025-01-02
