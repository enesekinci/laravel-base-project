# Laravel Paketleri Kullanım Kılavuzu

Bu doküman, projede kullanılan tüm Laravel paketlerinin ne işe yaradığını, ne zaman ve nasıl kullanılacağını açıklar.

## 📋 İçindekiler

1. [Larastan (Code Analysis)](#larastan)
2. [Laravel Pint (Code Formatter)](#laravel-pint)
3. [Laravel Telescope (Debugging & Monitoring)](#laravel-telescope)
4. [Laravel Horizon (Queue Monitoring)](#laravel-horizon)
5. [Laravel Pulse (Real-time Monitoring)](#laravel-pulse)
6. [Laravel Reverb (WebSocket Server)](#laravel-reverb)
7. [Laravel Scout (Full-text Search)](#laravel-scout)
8. [Laravel Socialite (Social Authentication)](#laravel-socialite)
9. [Laravel Pail (Log Viewer)](#laravel-pail)
10. [Laravel Octane (Performance Booster)](#laravel-octane)

---

## 🔍 Larastan

### Ne İşe Yarar?

Larastan, Laravel için PHPStan extension'ıdır. Statik kod analizi yaparak **test yazmadan önce** hataları bulur.

- Type safety kontrolü
- Undefined method/property tespiti
- Laravel magic method'larını anlar
- Code quality iyileştirmesi

### Ne Zaman Kullanılır?

- ✅ **Her zaman** - Development sırasında sürekli kullanılmalı
- ✅ **CI/CD pipeline** - Her commit'te otomatik çalıştırılmalı
- ✅ **Code review öncesi** - Pull request açmadan önce kontrol

### Nasıl Kullanılır?

#### Setup

```bash
# Zaten kurulu (require-dev)
composer require --dev larastan/larastan:^3.0
```

#### Konfigürasyon

`phpstan.neon` dosyası zaten mevcut:

```yaml
includes:
    - vendor/larastan/larastan/extension.neon

parameters:
    paths:
        - app/
    level: 5  # 0-10 arası (10 en sıkı)
```

#### Kullanım

```bash
# Kod analizi çalıştır
./vendor/bin/phpstan analyse

# Veya composer script ile
composer analyse

# Memory limit artır (gerekirse)
./vendor/bin/phpstan analyse --memory-limit=2G

# Baseline oluştur (eski kod için)
./vendor/bin/phpstan analyse --generate-baseline
```

#### Örnek Hatalar

```php
// ❌ Hata: Undefined method
$user = User::find(1);
$user->nonExistentMethod(); // Larastan bunu yakalar

// ✅ Düzeltilmiş
$user = User::find(1);
$user->name; // Larastan type'ı bilir
```

#### Best Practices

- Level 5 ile başla, zamanla artır
- Baseline kullan (eski kod için)
- CI/CD'de otomatik çalıştır
- Her commit öncesi kontrol et

**Dokümantasyon:** [Larastan GitHub](https://github.com/larastan/larastan)

---

## 🎨 Laravel Pint

### Ne İşe Yarar?

Laravel'in resmi code formatter'ı. PHP-CS-Fixer tabanlı, **zero configuration** code formatting.

- Otomatik code formatting
- PSR-12 standardı
- Zero configuration
- Hızlı ve güvenilir

### Ne Zaman Kullanılır?

- ✅ **Her commit öncesi** - Code formatını düzelt
- ✅ **CI/CD pipeline** - Format kontrolü
- ✅ **Code review öncesi** - Format tutarlılığı

### Nasıl Kullanılır?

#### Setup

```bash
# Zaten kurulu (require-dev)
composer require --dev laravel/pint
```

#### Kullanım

```bash
# Tüm dosyaları formatla
./vendor/bin/pint

# Veya composer script ile
composer format

# Sadece test et (değişiklik yapma)
./vendor/bin/pint --test

# Veya
composer format-test

# Belirli dosya/dizin
./vendor/bin/pint app/Http/Controllers
```

#### Konfigürasyon (Opsiyonel)

`pint.json` dosyası oluştur (genellikle gerekmez):

```json
{
    "preset": "laravel",
    "rules": {
        "no_unused_imports": true
    }
}
```

#### Best Practices

- Her commit öncesi `composer format` çalıştır
- CI/CD'de `--test` ile kontrol et
- Pre-commit hook ekle (opsiyonel)

**Dokümantasyon:** [Laravel Pint Docs](https://laravel.com/docs/12.x/pint)

---

## 🔭 Laravel Telescope

### Ne İşe Yarar?

Laravel uygulamanızın **debugging ve monitoring** aracı. Tüm request'leri, query'leri, job'ları, exception'ları izler.

- Request/Response monitoring
- Database query analizi
- Queue job tracking
- Exception tracking
- Mail/Notification tracking
- Cache operations
- Model events

### Ne Zaman Kullanılır?

- ✅ **Development** - Sürekli açık olmalı
- ✅ **Staging** - Test sırasında
- ❌ **Production** - Sadece debug için (güvenlik riski!)

### Nasıl Kullanılır?

#### Setup

```bash
# Development dependency olarak kurulu
composer require --dev laravel/telescope

# Install (production'da Redis hatası olabilir, normal)
php artisan telescope:install
php artisan migrate
```

#### Erişim

```
http://localhost/telescope
```

#### Konfigürasyon

`config/telescope.php` dosyası oluşturulur. Production'da kapat:

```php
// config/telescope.php
'enabled' => env('TELESCOPE_ENABLED', false),
```

`.env`:

```env
# Development
TELESCOPE_ENABLED=true

# Production
TELESCOPE_ENABLED=false
```

#### Kullanım Senaryoları

1. **Slow Query Tespiti:**
   - Telescope → Queries → Duration'a göre sırala
   - Yavaş query'leri bul ve optimize et

2. **Exception Debugging:**
   - Telescope → Exceptions → Exception detaylarını incele
   - Stack trace ve context'i gör

3. **Queue Job Monitoring:**
   - Telescope → Jobs → Failed job'ları bul
   - Retry ve debug et

#### Best Practices

- Development'ta her zaman açık
- Production'da **ASLA** açık tutma (güvenlik!)
- Sensitive data'yı filter'la
- Storage'ı düzenli temizle

**Dokümantasyon:** [Laravel Telescope Docs](https://laravel.com/docs/12.x/telescope)

---

## 📊 Laravel Horizon

### Ne İşe Yarar?

Redis tabanlı queue'lar için **dashboard ve monitoring** aracı. Queue job'larını görsel olarak izler ve yönetir.

- Queue dashboard
- Job monitoring
- Failed job management
- Worker management
- Throughput metrics
- Job retry yönetimi

### Ne Zaman Kullanılır?

- ✅ **Production** - Queue kullanıyorsanız mutlaka gerekli
- ✅ **Development** - Queue job'larını test ederken
- ✅ **Monitoring** - Queue performansını izlemek için

### Nasıl Kullanılır?

#### Setup

```bash
# Production dependency
composer require laravel/horizon

# Install
php artisan horizon:install
php artisan migrate
```

#### Erişim

```
http://localhost/horizon
```

#### Konfigürasyon

`config/horizon.php` dosyası oluşturulur. Environment'a göre ayarla:

```php
// config/horizon.php
'environments' => [
    'production' => [
        'supervisor-1' => [
            'connection' => 'redis',
            'queue' => ['default'],
            'balance' => 'simple',
            'processes' => 10,
            'tries' => 3,
        ],
    ],
],
```

#### Worker Başlatma

```bash
# Development
php artisan horizon

# Production (Supervisor ile)
# docker/supervisor/supervisord.conf içinde zaten var
```

#### Kullanım Senaryoları

1. **Failed Job Yönetimi:**
   - Horizon → Failed Jobs → Retry veya Delete

2. **Queue Monitoring:**
   - Horizon → Dashboard → Throughput ve wait time'ı izle

3. **Worker Scaling:**
   - `config/horizon.php` içinde worker sayısını ayarla
   - Auto-scaling yapılandır

#### Best Practices

- Production'da Supervisor ile çalıştır
- Worker sayısını CPU core'a göre ayarla
- Failed job'ları düzenli kontrol et
- Metrics'i monitoring tool'a entegre et

**Dokümantasyon:** [Laravel Horizon Docs](https://laravel.com/docs/12.x/horizon)

---

## 💓 Laravel Pulse

### Ne İşe Yarar?

Laravel uygulamanızın **real-time monitoring** aracı. Live metrics, slow requests, errors, jobs izler.

- Real-time metrics
- Slow request tracking
- Error tracking
- Job performance
- User activity
- Custom metrics

### Ne Zaman Kullanılır?

- ✅ **Production** - Canlı sistem monitoring
- ✅ **Staging** - Performance test sırasında
- ✅ **Development** - Performance profiling

### Nasıl Kullanılır?

#### Setup

```bash
# Production dependency
composer require laravel/pulse

# Install
php artisan pulse:install
php artisan migrate
```

#### Erişim

```
http://localhost/pulse
```

#### Konfigürasyon

`config/pulse.php` dosyası oluşturulur. Recording ayarları:

```php
// config/pulse.php
'recorders' => [
    \Laravel\Pulse\Recorders\SlowRequests::class => [
        'threshold' => 1000, // ms
    ],
    \Laravel\Pulse\Recorders\SlowQueries::class => [
        'threshold' => 1000, // ms
    ],
],
```

#### Custom Metrics

```php
// app/Providers/AppServiceProvider.php
use Laravel\Pulse\Facades\Pulse;

Pulse::record('custom.metric', 100);
Pulse::set('custom.counter', fn () => 42);
```

#### Kullanım Senaryoları

1. **Slow Request Tespiti:**
   - Pulse → Requests → Yavaş endpoint'leri bul

2. **Error Monitoring:**
   - Pulse → Errors → Hata trendlerini izle

3. **Performance Profiling:**
   - Pulse → Performance → Bottleneck'leri tespit et

#### Best Practices

- Production'da açık tut (hafif overhead)
- Recording threshold'ları ayarla
- Storage'ı düzenli temizle
- Custom metrics ekle

**Dokümantasyon:** [Laravel Pulse Docs](https://laravel.com/docs/12.x/pulse)

---

## 🔌 Laravel Reverb

### Ne İşe Yarar?

Laravel'in **native WebSocket server**'ı. Real-time uygulamalar için WebSocket bağlantıları sağlar.

- WebSocket server
- Real-time broadcasting
- Presence channels
- Private channels
- Laravel Echo uyumlu

### Ne Zaman Kullanılır?

- ✅ **Real-time features** - Chat, notifications, live updates
- ✅ **Broadcasting** - Event broadcasting için
- ✅ **Live dashboards** - Real-time data updates

### Nasıl Kullanılır?

#### Setup

```bash
# Production dependency
composer require laravel/reverb

# Install
php artisan reverb:install
```

#### Konfigürasyon

`.env`:

```env
REVERB_APP_ID=your-app-id
REVERB_APP_KEY=your-app-key
REVERB_APP_SECRET=your-app-secret
REVERB_HOST=localhost
REVERB_PORT=8080
REVERB_SCHEME=http
```

#### Server Başlatma

```bash
# Development
php artisan reverb:start

# Production (Supervisor ile)
# docker/supervisor/supervisord.conf içine ekle
```

#### Frontend (Laravel Echo)

```javascript
import Echo from 'laravel-echo';
import Pusher from 'pusher-js';

window.Echo = new Echo({
    broadcaster: 'reverb',
    key: import.meta.env.VITE_REVERB_APP_KEY,
    wsHost: import.meta.env.VITE_REVERB_HOST,
    wsPort: import.meta.env.VITE_REVERB_PORT,
    wssPort: import.meta.env.VITE_REVERB_PORT,
    forceTLS: (import.meta.env.VITE_REVERB_SCHEME ?? 'https') === 'https',
    enabledTransports: ['ws', 'wss'],
});
```

#### Broadcasting Örneği

```php
// Event
class OrderStatusUpdated implements ShouldBroadcast
{
    public function broadcastOn(): Channel
    {
        return new Channel('orders');
    }
}

// Controller
broadcast(new OrderStatusUpdated($order));
```

#### Kullanım Senaryoları

1. **Real-time Notifications:**
   - Kullanıcıya anlık bildirim gönder

2. **Live Chat:**
   - Mesajlaşma uygulaması

3. **Live Dashboard:**
   - Admin panel'de canlı metrikler

#### Best Practices

- Production'da Supervisor ile çalıştır
- SSL/TLS kullan (wss://)
- Rate limiting ekle
- Authentication kontrol et

**Dokümantasyon:** [Laravel Reverb Docs](https://laravel.com/docs/12.x/reverb)

---

## 🔎 Laravel Scout

### Ne İşe Yarar?

Laravel modelleri için **full-text search** çözümü. Algolia, Meilisearch, Typesense gibi search engine'lerle entegre.

- Full-text search
- Model indexing
- Search query builder
- Auto-sync
- Multiple drivers

### Ne Zaman Kullanılır?

- ✅ **Search functionality** - Ürün, kullanıcı, içerik arama
- ✅ **Large datasets** - Büyük veri setlerinde hızlı arama
- ✅ **Fuzzy search** - Benzer sonuçlar bulma

### Nasıl Kullanılır?

#### Setup

```bash
# Zaten kurulu
composer require laravel/scout
composer require meilisearch/meilisearch-php

# Install
php artisan vendor:publish --provider="Laravel\Scout\ScoutServiceProvider"
```

#### Model'e Ekle

```php
use Laravel\Scout\Searchable;

class Product extends Model
{
    use Searchable;

    public function toSearchableArray(): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'description' => $this->description,
            'price' => $this->price,
        ];
    }
}
```

#### Konfigürasyon

`.env`:

```env
SCOUT_DRIVER=meilisearch
MEILISEARCH_HOST=http://127.0.0.1:7700
MEILISEARCH_KEY=masterKey
```

#### Kullanım

```php
// Search
$products = Product::search('laptop')->get();

// Advanced search
$products = Product::search('laptop')
    ->where('price', '>', 1000)
    ->get();

// Index
Product::all()->searchable();

// Unindex
Product::all()->unsearchable();
```

#### Kullanım Senaryoları

1. **E-commerce Search:**
   - Ürün arama
   - Filtreleme
   - Sıralama

2. **Content Search:**
   - Blog yazıları
   - Dokümantasyon
   - Kullanıcı profilleri

#### Best Practices

- Index'leri düzenli sync et
- Searchable array'i optimize et
- Meilisearch kullan (ücretsiz, hızlı)
- Search result'ları cache'le

**Dokümantasyon:** [Laravel Scout Docs](https://laravel.com/docs/12.x/scout)

---

## 🔐 Laravel Socialite

### Ne İşe Yarar?

**Social authentication** için OAuth provider'ları (Google, Facebook, Twitter, GitHub, vb.) ile entegrasyon.

- OAuth authentication
- Multiple providers
- User data retrieval
- Token management

### Ne Zaman Kullanılır?

- ✅ **Social login** - "Google ile Giriş" gibi özellikler
- ✅ **User registration** - Hızlı kayıt
- ✅ **Profile sync** - Social media profil bilgileri

### Nasıl Kullanılır?

#### Setup

```bash
# Zaten kurulu
composer require laravel/socialite
```

#### Konfigürasyon

`.env`:

```env
GOOGLE_CLIENT_ID=your-client-id
GOOGLE_CLIENT_SECRET=your-client-secret
GOOGLE_REDIRECT_URI=http://localhost/auth/google/callback
```

`config/services.php`:

```php
'google' => [
    'client_id' => env('GOOGLE_CLIENT_ID'),
    'client_secret' => env('GOOGLE_CLIENT_SECRET'),
    'redirect' => env('GOOGLE_REDIRECT_URI'),
],
```

#### Route'lar

```php
// routes/web.php
Route::get('/auth/{provider}', [SocialAuthController::class, 'redirect']);
Route::get('/auth/{provider}/callback', [SocialAuthController::class, 'handleCallback']);
```

#### Controller

```php
use Laravel\Socialite\Facades\Socialite;

class SocialAuthController extends Controller
{
    public function redirect($provider)
    {
        return Socialite::driver($provider)->redirect();
    }

    public function handleCallback($provider)
    {
        $user = Socialite::driver($provider)->user();

        // User'ı bul veya oluştur
        $localUser = User::firstOrCreate(
            ['email' => $user->getEmail()],
            [
                'name' => $user->getName(),
                'provider' => $provider,
                'provider_id' => $user->getId(),
            ]
        );

        Auth::login($localUser);
        return redirect('/dashboard');
    }
}
```

#### Desteklenen Provider'lar

- Google
- Facebook
- Twitter/X
- GitHub
- GitLab
- LinkedIn
- Bitbucket
- ve daha fazlası...

#### Best Practices

- Provider credentials'ı güvenli tut
- User data validation yap
- Email verification ekle
- Error handling yap

**Dokümantasyon:** [Laravel Socialite Docs](https://laravel.com/docs/12.x/socialite)

---

## 📝 Laravel Pail

### Ne İşe Yarar?

Laravel'in **real-time log viewer**'ı. Terminal'de canlı log'ları izler.

- Real-time log viewing
- Filtering
- Color coding
- Search functionality

### Ne Zaman Kullanılır?

- ✅ **Development** - Log'ları canlı izlemek için
- ✅ **Debugging** - Hata ayıklama sırasında
- ✅ **Monitoring** - Production'da log takibi

### Nasıl Kullanılır?

#### Setup

```bash
# Zaten kurulu (require-dev)
composer require --dev laravel/pail
```

#### Kullanım

```bash
# Tüm log'ları izle
php artisan pail

# Belirli seviye
php artisan pail --level=error

# Belirli context
php artisan pail --filter="user_id:123"

# Veya composer script ile
composer dev  # pail dahil
```

#### Best Practices

- Development'ta sürekli açık tut
- Filter kullan (gürültüyü azalt)
- Production'da dikkatli kullan (performance)

**Dokümantasyon:** [Laravel Pail Docs](https://laravel.com/docs/12.x/pail)

---

## ⚡ Laravel Octane

### Ne İşe Yarar?

Laravel uygulamanızın **performance'ını artıran** application server. Swoole, RoadRunner veya FrankenPHP kullanır.

- High performance
- Persistent connections
- Concurrent request handling
- Memory optimization

### Ne Zaman Kullanılır?

- ✅ **Production** - Yüksek trafikli uygulamalar
- ✅ **API services** - Hızlı response time gereken API'ler
- ✅ **Real-time apps** - WebSocket ve long-polling

### Nasıl Kullanılır?

#### Setup

```bash
# Zaten kurulu
composer require laravel/octane

# Install (FrankenPHP)
php artisan octane:install --server=frankenphp
```

#### Konfigürasyon

`config/octane.php` - Zaten yapılandırılmış.

#### Server Başlatma

```bash
# Development
php artisan octane:start --server=frankenphp

# Production (Supervisor ile)
# docker/supervisor/supervisord.conf içinde zaten var
```

#### Best Practices

- Persistent connections kullan
- Worker sayısını optimize et
- Memory leak'leri önle
- Monitoring ekle

**Dokümantasyon:** [Laravel Octane Docs](https://laravel.com/docs/12.x/octane)

---

## 📊 Paket Karşılaştırması

| Paket | Environment | Kullanım Amacı | Gerekli mi? |
|-------|-------------|----------------|-------------|
| **Larastan** | Dev | Code analysis | ✅ Evet |
| **Pint** | Dev | Code formatting | ✅ Evet |
| **Telescope** | Dev/Staging | Debugging | ⚠️ Opsiyonel |
| **Horizon** | Production | Queue monitoring | ✅ Queue varsa |
| **Pulse** | Production | Real-time monitoring | ⚠️ Opsiyonel |
| **Reverb** | Production | WebSocket | ⚠️ WebSocket gerekiyorsa |
| **Scout** | Production | Search | ⚠️ Search gerekiyorsa |
| **Socialite** | Production | Social auth | ⚠️ Social login gerekiyorsa |
| **Pail** | Dev | Log viewer | ⚠️ Opsiyonel |
| **Octane** | Production | Performance | ✅ Production için |

---

## 🚀 Hızlı Başlangıç Checklist

### Development Setup

- [x] Larastan kurulu ve yapılandırılmış
- [x] Pint kurulu ve yapılandırılmış
- [x] Telescope kurulu (development için)
- [x] Pail kurulu (log viewing için)

### Production Setup

- [ ] Horizon kurulu ve yapılandırılmış (queue için)
- [ ] Pulse kurulu ve yapılandırılmış (monitoring için)
- [ ] Reverb kurulu (WebSocket gerekiyorsa)
- [ ] Scout yapılandırılmış (search gerekiyorsa)
- [ ] Socialite yapılandırılmış (social login gerekiyorsa)
- [x] Octane kurulu ve yapılandırılmış

### Migration & Setup

```bash
# Tüm migration'ları çalıştır
php artisan migrate

# Telescope (development)
php artisan telescope:install
php artisan migrate

# Horizon (production)
php artisan horizon:install
php artisan migrate

# Pulse (production)
php artisan pulse:install
php artisan migrate

# Reverb (production - WebSocket gerekiyorsa)
php artisan reverb:install
```

---

## 📚 Ek Kaynaklar

- [Laravel Documentation](https://laravel.com/docs/12.x)
- [Laravel Packages](https://laravel.com/docs/12.x/packages)
- [Laravel Best Practices](https://laravel.com/docs/12.x)

---

**Son Güncelleme:** 2025-01-02

