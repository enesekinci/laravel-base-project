---
name: CI/CD ve Güvenlik Setup
overview: Laravel 12 + PostgreSQL 17 + Livewire 3 + MaryUI stack için tam CI/CD pipeline. Frontend build zorunlu, PostgreSQL 17 üzerinde test, Sanctum/Session test pratikleri, Dusk loginAs kullanımı ve agent policy kuralları.
todos:
  - id: update-composer-scripts
    content: "composer.json'da scripts güncelleme: lint (pint + phpstan), test (stop-on-failure), test:e2e, security, ci script'lerini ekle (parallel test yok)"
    status: completed
  - id: add-admin-factory-state
    content: "database/factories/UserFactory.php'ye admin() state ekle: is_admin => true"
    status: completed
  - id: create-ci-env-files
    content: ".env.ci ve .env.dusk.ci dosyalarını oluştur: PostgreSQL 17, Sanctum stateful domains, Session domain, MAIL_MAILER=log, BROADCAST_CONNECTION=log"
    status: completed
  - id: rewrite-ci-workflow
    content: ".github/workflows/ci.yml dosyasını tamamen yeniden yaz: PostgreSQL 17, frontend build zorunlu (npm ci + npm run build), 4 paralel job (lint-static-security, unit-feature, e2e-dusk, secret-scan)"
    status: completed
  - id: create-dusk-smoke-tests
    content: "tests/Browser/SmokeTest.php oluştur: loginAs kullanarak admin dashboard testleri, public pages testleri"
    status: completed
  - id: create-sanctum-feature-tests
    content: "tests/Feature/Api/MeTest.php ve tests/Feature/Api/LogoutTest.php oluştur: Sanctum::actingAs kullanarak /api/v1/auth/me ve /api/v1/auth/logout testleri"
    status: completed
  - id: create-pr-template
    content: ".github/pull_request_template.md oluştur: Agent PR formatı için standart template"
    status: completed
  - id: create-testing-docs
    content: "docs/testing-strategy.md oluştur: Sanctum/Session test pratikleri, Dusk loginAs kullanımı, agent policy kuralları (composer ci zorunlu, test eklemeden feature yok, 300 satır diff limiti)"
    status: completed
---

# CI/CD ve Güvenlik Setup Planı

## Hedef Mimari

```javascript
Agent Branch → Commit → PR → CI Checks (PG17 + Frontend Build) → Merge (sadece yeşil ise)
```

**Stack:**

- Laravel 12
- PostgreSQL 17 (test DB)
- Sanctum (API auth) - `/api/v1/auth/me`, `/api/v1/auth/logout`
- Session (Web auth) - `/admin/dashboard`
- Livewire 3 + Blade + MaryUI
- Vite/Tailwind (4 entry point: app.css, app.js, admin/init.js, storefront/init.js)

**GitHub Branch Protection:**

- main branch protected
- Push to main yasak
- PR merge için required checks: `lint-static-security`, `unit-feature`, `e2e-dusk`, `secret-scan`
- Branches up to date zorunlu

## 1. Composer Scripts Güncelleme

**Dosya:** `composer.json`Mevcut scripts'leri güncelleyip yeni script'ler ekleyeceğiz:

- `lint`: Pint test + PHPStan (memory limit 1G)
- `test`: Tüm testler (Unit + Feature, stop-on-failure, parallel yok)
- `test:e2e`: Dusk browser testleri (stop-on-failure)
- `security`: Composer audit
- `ci`: Tüm kontrolleri çalıştır (lint + security + test + test:e2e)

**Değişiklikler:**

- Mevcut `test`, `format-test`, `analyse` script'lerini yeni yapıya uyarlayacağız
- `lint`, `test`, `test:e2e`, `security`, `ci` script'lerini ekleyeceğiz
- Parallel test yok (stabilite için)

## 2. UserFactory Admin State

**Dosya:** `database/factories/UserFactory.php`Admin kullanıcı oluşturmak için factory state ekleyeceğiz:

```php
public function admin(): static
{
    return $this->state(fn (array $attributes) => [
        'is_admin' => true,
    ]);
}
```

**Kullanım:**

```php
$admin = User::factory()->admin()->create();
```



## 3. CI Environment Dosyaları

**Dosyalar:**

- `.env.ci` (genel test ve lint için)
- `.env.dusk.ci` (Dusk browser testleri için)

**Özellikler:**

- PostgreSQL 17 bağlantı ayarları
- Sanctum stateful domains: `127.0.0.1,localhost`
- Session domain: `127.0.0.1`
- Testing environment ayarları
- Dusk için özel session driver (file)
- `MAIL_MAILER=log` (CI'da mail patlamasın)
- `BROADCAST_CONNECTION=log` (CI'da broadcast patlamasın)

## 4. GitHub Actions CI Workflow

**Dosya:** `.github/workflows/ci.yml`Mevcut workflow'u tamamen yeniden yazacağız. PostgreSQL 17 + Frontend Build zorunlu:

### Job 1: `lint-static-security`

- PostgreSQL 17 service
- Node.js 20 + npm cache
- Composer dependencies install
- **npm ci + npm run build** (frontend build zorunlu - 4 entry point)
- Pint format kontrolü
- PHPStan static analysis
- Composer audit (security)

### Job 2: `unit-feature` (Job 1'e bağımlı)

- PostgreSQL 17 service
- Node.js 20 + npm cache
- Composer dependencies install
- **npm ci + npm run build** (frontend build zorunlu)
- `.env.ci` kullanımı
- `migrate:fresh` (temiz DB)
- Unit + Feature testleri (stop-on-failure)

### Job 3: `e2e-dusk` (Job 2'ye bağımlı)

- PostgreSQL 17 service
- Node.js 20 + npm cache
- Composer dependencies install
- **npm ci + npm run build** (frontend build zorunlu)
- Chrome setup
- `.env.dusk.ci` kullanımı
- Laravel server başlatma (127.0.0.1:8000)
- ChromeDriver install
- Dusk browser testleri
- Failure durumunda screenshot/console/log artifact upload

### Job 4: `secret-scan` (paralel)

- Gitleaks ile secret leak taraması

**Özellikler:**

- Concurrency control (aynı branch'te çalışan eski workflow'ları iptal eder)
- PostgreSQL 17 kullanımı (SQLite değil)
- Frontend build zorunlu (her job'da - 4 entry point için)
- Cache kullanımı (composer + npm dependencies)
- Artifact upload (Dusk failure durumunda)
- Health check'ler (PostgreSQL service)

**Job İsimleri (Branch Protection için):**

- `lint-static-security`
- `unit-feature`
- `e2e-dusk`
- `secret-scan`

## 5. Dusk Smoke Tests

**Dosya:** `tests/Browser/SmokeTest.php`Dusk test'lerinde `loginAs` kullanarak UI ile uğraşmadan test yapacağız:

```php
public function test_admin_dashboard_loads_for_admin(): void
{
    $admin = \App\Models\User::factory()->admin()->create();

    $this->browse(function (Browser $browser) use ($admin) {
        $browser->loginAs($admin, 'web')
            ->visit('/admin/dashboard')
            ->assertPathIs('/admin/dashboard')
            ->assertPresent('body');
    });
}
```

**Test Senaryoları:**

- Public pages load (`/`, `/login`)
- Admin dashboard requires auth (redirect to login)
- Admin dashboard loads for admin user (loginAs kullanarak)

## 6. Sanctum Feature Tests

**Dosyalar:**

- `tests/Feature/Api/MeTest.php`
- `tests/Feature/Api/LogoutTest.php`

Sanctum test'lerinde `Sanctum::actingAs` kullanarak token/cookie ile uğraşmadan test yapacağız:

```php
it('returns current user for sanctum auth', function () {
    $user = User::factory()->create();
    Sanctum::actingAs($user);

    $this->getJson('/api/v1/auth/me')
        ->assertOk()
        ->assertJsonPath('id', $user->id);
});
```

**Test Senaryoları:**

- `/api/v1/auth/me` - Authenticated user bilgisi döner
- `/api/v1/auth/logout` - Logout başarılı

## 7. PR Template

**Dosya:** `.github/pull_request_template.md`Agent'ın PR açarken doldurması gereken standart format:

- What (Ne yapıldı)
- Why (Neden yapıldı)
- How (Nasıl yapıldı)
- Tests (Hangi testler eklendi/güncellendi)
- Risk / Rollback (Risk analizi ve geri alma planı)

## 8. Test Stratejisi Dokümantasyonu

**Dosya:** `docs/testing-strategy.md` (yeni)Test stratejisi ve best practice'ler:

### Sanctum API Test Pratikleri

```php
use Laravel\Sanctum\Sanctum;
use App\Models\User;

it('returns current user', function () {
    $user = User::factory()->create();
    Sanctum::actingAs($user);

    $this->getJson('/api/v1/auth/me')->assertOk()->assertJsonPath('id', $user->id);
});
```



### Session Web Test Pratikleri

```php
it('shows admin page when logged in', function () {
    $user = User::factory()->admin()->create();
    $this->actingAs($user, 'web');

    $this->get('/admin/dashboard')->assertOk();
});
```



### Dusk Browser Test Pratikleri

```php
$admin = User::factory()->admin()->create();

$this->browse(function (Browser $browser) use ($admin) {
    $browser->loginAs($admin, 'web')
        ->visit('/admin/dashboard')
        ->assertPathIs('/admin/dashboard');
});
```



### Agent Policy Kuralları (Kırmızı Çizgiler)

- **PR açmadan önce lokalde:** `composer ci` çalıştırılmalı
- **composer ci kırmızıysa:** PR WIP açılabilir ama "READY" değil
- **Test eklemeden feature yok:** Her feature için test zorunlu
- **Dusk gerekiyorsa:** En az 1 smoke test zorunlu
- **300 satır diff üstü yok:** Parçala, küçük PR'lar
- **API endpoint yazdıysan:** Sanctum testi zorunlu
- **Livewire ekran yazdıysan:** Web session + Dusk smoke zorunlu
- **Admin middleware değiştiyse:** SmokeTest güncellenmeden PR yok

## Dosya Değişiklikleri

1. **`composer.json`**: Scripts güncelleme (lint, test, test:e2e, security, ci)
2. **`database/factories/UserFactory.php`**: Admin state ekleme
3. **`.env.ci`**: Yeni dosya (PostgreSQL 17, Sanctum, Session, Mail/Broadcast ayarları)
4. **`.env.dusk.ci`**: Yeni dosya (Dusk için özel env)
5. **`.github/workflows/ci.yml`**: Tamamen yeniden yazma (PostgreSQL 17, frontend build, 4 job)
6. **`tests/Browser/SmokeTest.php`**: Yeni dosya (loginAs kullanarak)
7. **`tests/Feature/Api/MeTest.php`**: Yeni dosya (Sanctum::actingAs)
8. **`tests/Feature/Api/LogoutTest.php`**: Yeni dosya (Sanctum::actingAs)
9. **`.github/pull_request_template.md`**: Yeni dosya
10. **`docs/testing-strategy.md`**: Yeni dosya (Sanctum/Session/Dusk pratikleri, agent policy)

## Notlar

- PostgreSQL 17 kullanılacak (SQLite değil)
- Frontend build her job'da zorunlu (npm run build - 4 entry point için)
- Parallel test yok (stabilite için)