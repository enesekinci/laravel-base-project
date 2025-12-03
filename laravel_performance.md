# laravel-base – Production Ready Skeleton

Bu doküman, tüm Laravel projeleri için kullanılacak **ortak iskelet**’in (laravel-base) teknik gereksinimlerini tanımlar.  
Amaç: **Octane + FrankenPHP + PostgreSQL + Redis** kullanan, performanslı, güvenli ve bakımı kolay bir temel oluşturmak.

---

## 1. Hedefler

- Yüksek performans:
  - PHP 8.3+
  - Opcache açık ve düzgün ayarlı
  - Octane + FrankenPHP worker yapısı
  - Redis ile cache & queue
- Güvenli varsayılanlar:
  - `APP_DEBUG=false` prod’da
  - Güvenli cookie ve header ayarları
  - Rate limiting hazır
- İzlenebilirlik:
  - Slow request & slow query log’ları
  - Health check endpoint’leri
- DB hijyeni:
  - PostgreSQL için temel index & bakım alışkanlıkları
  - Scheduler ile log/çöp temizleme + raporlama komutları

---

## 2. Tech Stack

**Runtime / Server**

- PHP: **8.3+**
- Server: **FrankenPHP** (worker mode)
- Laravel: son LTS
- Laravel Octane:
  - Driver: `frankenphp` veya `swoole` kullanılmayacaksa sadece FrankenPHP worker’ları
- Web katmanı:
  - Caddy/FrankenPHP reverse proxy
  - (Opsiyonel) Cloudflare / CDN önünde

**Infra**

- Database: **PostgreSQL**
- Cache & Queue: **Redis**
- Queue worker’lar: Laravel queue worker + (opsiyonel) Horizon
- Log ve monitoring: 
  - Monolog (daily files)
  - (Opsiyonel) New Relic / Sentry / Bugsnag entegrasyonu

---

## 3. PHP / Opcache / JIT Ayarları

### 3.1. Opcache (Zorunlu)

`php.ini` veya FrankenPHP config’inde:

```ini
opcache.enable=1
opcache.enable_cli=1
opcache.memory_consumption=256
opcache.interned_strings_buffer=32
opcache.max_accelerated_files=20000
opcache.validate_timestamps=0
opcache.revalidate_freq=0


Amaç:

Kod dosyaları her request’te tekrar parse edilmesin.

Büyük projeler için yeterli file/pool limiti olsun.

3.2. JIT (Just-In-Time) Ayarları

Bu proje web API / panel amaçlı. Yani IO/DB ağırlıklı.
Bu durumda JIT:

Büyük mucize getirmez.

Bazen segfault / garip bug riskini artırır.

Varsayılan: JIT kapalı kalsın.

opcache.jit=0
opcache.jit_buffer_size=0


Eğer ileride CPU-heavy işler (raporlama, sayısal hesap, image processing) için ayrı CLI scriptleri yazılırsa, sadece CLI için JIT açılabilir:
  
; CLI için alternatif
opcache.jit_buffer_size=64M
opcache.jit=1255


4. FrankenPHP + Octane Konfigürasyonu
4.1. Worker Ayarları

Worker sayısı: CPU core sayısı kadar (ör: 8 core → 6–8 worker).

Her worker için maksimum request sayısı: memory leak’i sınırlamak için:

.env:

OCTANE_MAX_REQUESTS=1000
OCTANE_WORKERS=auto
OCTANE_TASK_WORKERS=auto
OCTANE_WATCH=false


4.2. State Leak Önlemleri

Request’e göre değişen hiçbir şey singleton olmamalı (current user, request, locale vs.).

Octane ile uyumlu olmayan paketler prod’da kullanılmamalı.

Octane::booted içinde ağır servisler preload edilebilir:

// App/Providers/AppServiceProvider.php boot içinde veya OctaneServiceProvider
Octane::booted(function () {
    app()->make(\App\Services\SomeHeavyService::class);
});

5. Laravel Uygulama Varsayılanları
5.1. Config / Route / View Cache

Prod deploy sonrası otomatik çalıştırılacak komutlar:

php artisan config:cache
php artisan route:cache
php artisan view:cache
php artisan event:cache
php artisan optimize

Cursor’a not:

Deploy pipeline’ına bu komutları ekleyen bir script/template hazırla. Local ortamda config:clear, route:clear kullanılacak.

5.2. Logging Varsayılanları

APP_DEBUG=false
LOG_CHANNEL=stack
LOG_LEVEL=warning

config/logging.php:

stack içine:

daily

(opsiyonel) slack / external logger

daily için log rotasyonu 14 gün (veya projeye göre).

6. Paketler ve Kod Kalitesi
6.1. PHP / Laravel Kalite Paketleri

Zorunlu paketler:

laravel/pint → code style

nunomaduro/larastan → static analysis

(Opsiyonel) barryvdh/laravel-ide-helper → IDE completion

Test aracı: pestphp/pest veya phpunit default

Cursor’a görev:

composer.json içine bu paketleri ekle.

pint.json ve basit phpstan.neon.dist oluştur.

Makefile veya composer script’lerine:

composer lint

composer analyse

composer test
komutlarını ekle.

6.2. Response Cache (opsiyonel ama tavsiye)

Okunma-heavy, yazma-low endpoint’ler (landing, blog, statik listeler) için:

spatie/laravel-responsecache kurulacak.

Config hazır olacak ama default’ta kapalı.

Belirli route gruplarında middleware ile açılacak.

7. Güvenlik Varsayılanları
7.1. Env

APP_ENV=production
APP_DEBUG=false
SESSION_SECURE_COOKIE=true
SESSION_HTTP_ONLY=true
SESSION_SAME_SITE=lax


7.2. Middleware

Rate limiting:

API için default rate limit middleware (Laravel throttle) kullanılacak.

app/Providers/RouteServiceProvider içinde API limit tanımı.

CORS:

config/cors.php üretim için daraltılacak (izin verilen origin’ler specific domain’ler).

Security Headers:

Basit bir SecurityHeadersMiddleware yazılacak:

X-Frame-Options: DENY

X-Content-Type-Options: nosniff

Referrer-Policy: strict-origin-when-cross-origin

X-XSS-Protection: 1; mode=block

(Opsiyonel) Content-Security-Policy basic template

Cursor’a görev:

SecurityHeadersMiddleware oluştur.

app/Http/Kernel.php içine global middleware olarak ekle.

8. Monitoring & Performance Logging
8.1. Response Time Middleware

Tüm projelerde kullanılmak üzere, yavaş response’ları loglayan middleware:

Header: X-Response-Time: {ms}

500ms üstü request’leri info veya warning log’la.

Cursor’a görev:

App\Http\Middleware\ResponseTimerMiddleware oluştur.

Kernel‘de global middleware olarak ekle.

8.2. Slow Query Takibi (DB tarafı)

PostgreSQL’de pg_stat_statements extension önerilecek.

Laravel tarafında ileride kullanılmak üzere bir db:slow-queries-report komutu için template hazırlanacak (şu an sadece skeleton).

Cursor’a görev:

app/Console/Commands/SlowQueriesReport.php komut skeleton’u oluştur.

Şimdilik sadece info log’a “TODO: implement pg_stat_statements read” yazsın.

9. Scheduler (Cron) Altyapısı

app/Console/Kernel.php içine default scheduler iskeleti:

Günlük işler:

Eski log tablolarını temizleme (ileride doldurulacak)

Soft delete edilen kayıtları X gün sonra hard delete etme (opsiyonel)

Saatlik işler:

db:slow-queries-report (ileri implementasyon için placeholder)

Her dakika:

Queue worker / horizon zaten supervisor veya systemd ile koşacak, scheduler’dan değil.

Cursor’a görev:

Kernel::schedule içine yorum satırlarıyla birlikte standart bir plan ekle (cron placeholder’lar).

Ör.:

$schedule->command('db:slow-queries-report')->hourly()->withoutOverlapping();

10. Database (PostgreSQL) Konvansiyonları

Varsayılan:

Primary key: bigint (bigIncrements)

Tüm timestamp alanları: UTC ($casts / app/timezone vs.)

Migration kuralları:

Sık filtrelenecek alanlara mutlaka index:

user_id, school_id, status, created_at, foreign key alanlar

Uygulama tarafında:

N+1 koruması:

Model::preventLazyLoading() LOCAL / STAGE ortamında aktif edilebilir.

Soft deletes kullanılan tablolarda indexler deleted_at’i de kapsayacak şekilde tasarlanmalı.

Cursor’a görev:

AppServiceProvider içinde LOCAL/STAGE environment’ta:

Model::preventLazyLoading();

Model::preventSilentlyDiscardingAttributes();
ekle.

11. Local vs Production Farkları

Local:

APP_DEBUG=true

Model::preventLazyLoading açık

Telescope / Debugbar (varsa) açık

Production:

APP_DEBUG=false

config:cache, route:cache, view:cache zorunlu

Telescope / Debugbar tamamen devre dışı

Response cache, CDN, gzip/brotli aktif

12. Yapılacaklar (Cursor için Özet Checklist)

composer.json:

laravel/pint, nunomaduro/larastan, (opsiyonel) barryvdh/laravel-ide-helper, test paketi

scripts içine lint, analyse, test ekle

config ve .env.example:

Prod için güvenli default’lar (debug off, session secure, same-site, log level)

Middleware’ler:

ResponseTimerMiddleware

SecurityHeadersMiddleware

AppServiceProvider:

Local/Stage için Model::preventLazyLoading() ayarları

Console/Kernel:

Scheduler placeholder’ları (slow query report vs.)

Octane/FrankenPHP:

.env ile OCTANE_MAX_REQUESTS, OCTANE_WORKERS default’ları

Dokümantasyon:

Bu dosyayı docs/laravel-base.md olarak projeye ekle.

Bu iskelet, her yeni proje için kopyalanacak ve gerekiyorsa proje bazlı override’lar eklenecektir.