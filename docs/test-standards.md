# Test Standartları ve Browser Test (E2E) Kapısı

Bu doküman, Cursor'un "kod yazdı ama ürünü bozdu" problemini bitirmek ve feature geliştirirken adım adım doğru ilerleme standardı koymak için hazırlanmıştır.

## 0) TL;DR (Kırmızı Çizgiler)

- Cursor tek seferde "büyük iş" yapmayacak. Use-case bazlı ilerleyecek.
- Her feature bitince **3 kapı** koşacak:
  1. Statik analiz (phpstan/pint)
  2. HTTP/Feature test (phpunit/pest)
  3. Browser smoke (Dusk)
- "Ekrana giremiyorum" sınıfı bug = **Browser smoke test eksikliği**. Servis/unit test buna yetmez.

---

## 1) Cursor Feature Geliştirirken Nasıl Hareket Edecek?

### 1.1 Feature'i use-case'e böl (Action mindset)

- Tek PR = tek use-case
- "Checkout" tek PR olmaz. Parçala:
  - CartAddAction + CartRemoveAction
  - CheckoutStartAction
  - CheckoutCompleteAction

**Kural:** Aynı PR'da hem auth, hem checkout, hem UI refactor yok.

---

### 1.2 Görev Akışı (Cursor SOP)

#### A) Önce sınırları çiz

1. Route / endpoint / sayfa
2. Yetki (policy / middleware)
3. Veri modeli ve DB değişikliği var mı?
4. Side-effect var mı? (event/job/mail)

Cursor'a yapacağı işin sınırını net koy:
- "Controller inceltilip Action'a taşınacak"
- "Yeni migration eklenecek"
- "1 feature test + 1 browser smoke test eklenecek"

#### B) Uygulama sırası (Katman sırası KESİN)

1. Migration / Model / Relationship (varsa)
2. Action / Service (iş mantığı)
3. Controller (ince)
4. Blade/Vue/JS (UI)
5. Tests (feature + browser)
6. Son refactor (gerekirse)

**Kural:** UI önce yazılmaz. UI en son bağlanır.

#### C) Definition of Done (DoD)

Bir feature "bitti" sayılmaz, şunlar yoksa:

- [ ] En az 1 Feature test (HTTP seviyesi)
- [ ] En az 1 Browser smoke test (Dusk)
- [ ] `phpstan` / `pint` geçiyor
- [ ] `php artisan test` geçiyor
- [ ] Browser smoke: login + hedef sayfa erişimi kırılmıyor

---

### 1.3 Cursor'a verilecek zorunlu prompt kuralı

Cursor her değişiklikte şunu yapmak zorunda:
- "Bu değişiklik hangi testleri kırabilir?"
- "Hangi smoke senaryosunu ekledim/güncelledim?"

**Kural:** Yeni ekran / route / auth akışı = smoke test update zorunlu.

---

### 1.4 Anti-Pattern List (Cursor yaparsa REJECT)

- Controller'da business logic
- Devasa `*Service` (20+ method)
- UI'da try-catch ile hatayı yutma
- Migration + refactor + yeni feature aynı PR
- Test yazmadan "çalışıyor" demek

---

## 2) Test Kapısı Mimarisi (3 Katman)

### 2.1 Katman 1: Statik Analiz (anında fail)

- `composer pint`
- `composer phpstan` (Larastan)

Amaç: Cursor'un tip hatası, null kullanımı, yanlış ilişki vs saçmalıklarını erken yakalamak.

---

### 2.2 Katman 2: Feature/HTTP Testleri (Laravel)

Amaç: Route + middleware + controller akışını doğrulamak.

Örnekler:
- login redirect doğru mu?
- admin route 403 mü?
- cart add 302/200 mü?

---

### 2.3 Katman 3: Browser Smoke Testleri (E2E)

Amaç: "Ekrana giremiyorum", redirect loop, asset patlaması, session/csrf hatalarını yakalamak.

Minimum smoke senaryolar:
1. Home açılıyor
2. Login açılıyor
3. Login → Dashboard erişiliyor
4. Ürün liste → ürün detaya giriliyor
5. Sepete ekle → cart sayfası açılıyor
6. Checkout sayfası açılıyor (ödeme mock)

Bu senaryolar kırılırsa sistem "çalışmıyor" kabul edilir.

---

## 3) Laravel Dusk (Browser Test) – Kurulum + Çalıştırma

### 3.1 Kurulum

```bash
composer require --dev laravel/dusk
php artisan dusk:install
```

`.env.dusk.local` oluştur:

- `APP_URL` doğru olmalı (CI'da farklı olabilir)
- `DB` test database olmalı
- `QUEUE_CONNECTION=sync` önerilir (smoke için)

Örnek `.env.dusk.local`:

```env
APP_ENV=dusk
APP_DEBUG=true
APP_URL=http://127.0.0.1:8000

DB_CONNECTION=pgsql
DB_DATABASE=app_test
DB_USERNAME=postgres
DB_PASSWORD=postgres

CACHE_DRIVER=array
SESSION_DRIVER=file
QUEUE_CONNECTION=sync
MAIL_MAILER=log
```

### 3.2 Çalıştırma komutları

**Local:**
```bash
php artisan serve --port=8000
php artisan dusk
```

**Sadece smoke grubu:**
```bash
php artisan dusk --group=smoke
```

**Composer script:**
```bash
composer test-smoke
```

### 3.3 Dusk'ta Stabilite Kuralları (Flaky test istemiyorum)

- `waitFor()` kullan (element bekle)
- UI transition/JS için `pause()` yerine `waitFor*` tercih et
- Her testte net assert:
  - `assertPathIs()`
  - `assertSee()`
  - `assertAuthenticated()`

---

## 4) Dusk Smoke Test Örnekleri

### 4.1 Smoke: Home + Login sayfası

`tests/Browser/Smoke/HomeAndLoginTest.php`

```php
<?php

declare(strict_types=1);

namespace Tests\Browser\Smoke;

use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

/**
 * @group smoke
 */
final class HomeAndLoginTest extends DuskTestCase
{
    public function test_home_page_opens(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/')
                ->assertPresent('body');
        });
    }

    public function test_login_page_opens(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/login')
                ->assertPresent('form');
        });
    }
}
```

### 4.2 Smoke: Login -> Dashboard erişimi

`tests/Browser/Smoke/AuthSmokeTest.php`

```php
<?php

declare(strict_types=1);

namespace Tests\Browser\Smoke;

use App\Models\User;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

/**
 * @group smoke
 */
final class AuthSmokeTest extends DuskTestCase
{
    public function test_login_and_access_dashboard(): void
    {
        $user = User::factory()->create([
            'email' => 'test@example.com',
            'password' => bcrypt('password'),
            'is_admin' => true,
        ]);

        $this->browse(function (Browser $browser) use ($user) {
            $browser->visit('/login')
                ->type('email', $user->email)
                ->type('password', 'password')
                ->press('Giriş Yap')
                ->waitForLocation('/admin/dashboard', 5)
                ->assertPathIs('/admin/dashboard');
        });
    }
}
```

**Not:** password factory default'u değilse, user oluştururken hash'li password set et.

---

## 5) UI'ya Dusk Selector Standardı (Zorunlu)

Dusk click hedeflerini sınıf/ID ile kovalamak kırılgan. Selector standardı koy:

**Blade örneği:**
```blade
<button dusk="add-to-cart-{{ $product->id }}">
  Sepete Ekle
</button>
```

**Kural:** Smoke testte tıklanan her kritik elementte `dusk="..."` olacak.

---

## 6) CI / GitHub Actions Kapısı (Zorunlu Sıra)

CI pipeline sırası:

1. `composer install`
2. `npm ci && npm run build` (Vite)
3. `php artisan migrate --force` (test DB)
4. `composer pint`
5. `composer phpstan`
6. `composer test` (Feature/Unit tests)
7. `composer test-smoke` (Dusk smoke tests)

**Kural:** 7 adımın biri kırılırsa merge yok.

GitHub Actions workflow dosyası: `.github/workflows/ci.yml`

---

## 7) "Ekrana giremiyorum" Kriz Checklist'i (Hızlı Debug)

- Redirect loop var mı? (login <-> dashboard)
- Session cookie domain/samesite doğru mu?
- CSRF token mismatch var mı?
- Vite manifest var mı? `public/build/manifest.json`
- `storage/logs/laravel.log` 500 veriyor mu?
- `config:cache` / `route:cache` patlatıyor mu?
- Test DB migration drift var mı?

Bu checklisti smoke testler otomatik yakalamalı.

---

## 8) Cursor için Net Talimat (Bunu her feature prompt'una ekle)

Bu değişiklik için:

1. 1 Feature test ekle/güncelle
2. 1 Dusk smoke test ekle/güncelle
3. UI'da tıklanan elementlere `dusk="..."` attribute ekle
4. Testleri koştur ve çıktılarını kontrol et
5. Test kırıyorsa fixlemeden bitmiş sayma

---

## 9) Minimum Smoke Suite (Proje şartı)

Aşağıdaki smoke testler proje için minimumdur:

- [x] Home opens
- [x] Login opens
- [x] Login -> Dashboard
- [ ] Product list opens
- [ ] Add to cart -> cart shows item
- [ ] Checkout page opens (payment mock)

Bu set kırılırsa "site çalışıyor" denmez.

---

## 10) Test Komutları

### Composer Scripts

```bash
# Tüm testler (Feature + Unit)
composer test

# Sadece smoke testler
composer test-smoke

# Tüm testler (Feature + Unit + Smoke)
composer test-all

# Code formatting
composer format

# Static analysis
composer analyse
```

### Artisan Komutları

```bash
# Tüm Dusk testleri
php artisan dusk

# Sadece smoke grubu
php artisan dusk --group=smoke

# Belirli bir test dosyası
php artisan dusk tests/Browser/Smoke/HomeAndLoginTest.php
```

---

## Son Söz (Net)

Vibe coding = hız.
Test kapısı yoksa = kumar.

Bu doküman uygulanırsa:

- Cursor saçmalasa bile CI durdurur
- "Ekrana giremiyorum" bug'ı prod'a gidemez
- Her feature test edilmiş olarak gelir

