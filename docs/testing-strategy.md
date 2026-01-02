# Test Stratejisi ve Best Practices

## Genel Yaklaşım

Bu projede test stratejisi üç katmanlıdır:

1. **Unit Tests**: Domain/Service logic testleri
2. **Feature Tests**: HTTP endpoint testleri (API ve Web)
3. **E2E Tests (Dusk)**: Browser-based kritik user journey testleri

## Sanctum API Test Pratikleri

API endpoint'leri için `Sanctum::actingAs` kullanarak token/cookie ile uğraşmadan test yapılır:

```php
use Laravel\Sanctum\Sanctum;
use App\Models\User;

it('returns current user', function () {
    $user = User::factory()->create();
    Sanctum::actingAs($user);

    $this->getJson('/api/v1/auth/me')
        ->assertOk()
        ->assertJsonPath('id', $user->id);
});
```

**Kurallar:**

- API endpoint yazdıysan Sanctum testi zorunlu
- `Sanctum::actingAs($user)` kullan, token/cookie ile uğraşma
- JSON response'ları `getJson`, `postJson` ile test et

## Session Web Test Pratikleri

Web route'ları (Livewire/Blade) için `actingAs` ile web guard kullan:

```php
it('shows admin page when logged in', function () {
    $user = User::factory()->admin()->create();
    $this->actingAs($user, 'web');

    $this->get('/admin/dashboard')->assertOk();
});
```

**Kurallar:**

- Livewire ekran yazdıysan web session testi zorunlu
- `$this->actingAs($user, 'web')` kullan
- Admin sayfaları için `User::factory()->admin()->create()` kullan

## Dusk Browser Test Pratikleri

Browser test'lerinde `loginAs` kullanarak UI ile uğraşmadan test yap:

```php
use App\Models\User;
use Laravel\Dusk\Browser;

$admin = User::factory()->admin()->create();

$this->browse(function (Browser $browser) use ($admin) {
    $browser->loginAs($admin, 'web')
        ->visit('/admin/dashboard')
        ->assertPathIs('/admin/dashboard');
});
```

**Kurallar:**

- Dusk gerekiyorsa en az 1 smoke test zorunlu
- `$browser->loginAs($user, 'web')` kullan, form doldurma yok
- Kritik user journey'ler için Dusk kullan
- Livewire ekran yazdıysan Dusk smoke testi zorunlu

## Test Yazma Kuralları

### Her Feature İçin Test Zorunlu

- Yeni feature eklediysen test ekle
- Test eklemeden feature yok
- Refactor yapıyorsan mevcut testleri güncelle

### Test Kategorileri

**Unit Tests:**

- Service sınıfları
- Action sınıfları
- Domain logic
- Utility fonksiyonları

**Feature Tests:**

- HTTP endpoints (API ve Web)
- Route'lar
- Middleware
- Controller logic

**E2E Tests (Dusk):**

- Kritik user journey'ler
- Login flow
- Admin dashboard
- Önemli form submission'ları

## Agent Policy Kuralları (Kırmızı Çizgiler)

### PR Açmadan Önce

- **Lokalde `composer ci` çalıştırılmalı**
- `composer ci` kırmızıysa PR WIP açılabilir ama "READY" değil
- Tüm kontroller yeşil olmalı (lint, security, test, test:e2e)

### Test Zorunlulukları

- **Test eklemeden feature yok**: Her feature için test zorunlu
- **Dusk gerekiyorsa**: En az 1 smoke test zorunlu
- **API endpoint yazdıysan**: Sanctum testi zorunlu
- **Livewire ekran yazdıysan**: Web session + Dusk smoke zorunlu
- **Admin middleware değiştiyse**: SmokeTest güncellenmeden PR yok

### PR Boyutu

- **300 satır diff üstü yok**: Parçala, küçük PR'lar
- Büyük değişiklikler birden fazla PR'da yapılmalı
- Her PR tek bir sorumluluğa sahip olmalı

### Test Yapısı

- Test açıklamaları Türkçe olmalı
- Test isimleri açıklayıcı olmalı
- Her test tek bir şeyi test etmeli
- Test'ler bağımsız çalışmalı (her test kendi verisini oluşturmalı)

## CI/CD Pipeline

### Required Checks

PR merge edilebilmesi için şu check'lerin hepsi yeşil olmalı:

1. **lint-static-security**: Pint + PHPStan + Composer audit
2. **unit-feature**: Unit + Feature testleri
3. **e2e-dusk**: Dusk browser testleri
4. **secret-scan**: Gitleaks secret leak taraması

### Lokal Test

PR açmadan önce lokal ortamda:

```bash
composer ci
```

Bu komut tüm kontrolleri çalıştırır:

- Lint (Pint + PHPStan)
- Security (Composer audit)
- Test (Unit + Feature)
- Test:E2E (Dusk)

## Örnek Test Senaryoları

### API Endpoint Testi

```php
it('returns current user for sanctum auth', function () {
    $user = User::factory()->create();
    Sanctum::actingAs($user);

    $this->getJson('/api/v1/auth/me')
        ->assertOk()
        ->assertJsonPath('id', $user->id);
});
```

### Web Route Testi

```php
it('shows admin page when logged in', function () {
    $user = User::factory()->admin()->create();
    $this->actingAs($user, 'web');

    $this->get('/admin/dashboard')->assertOk();
});
```

### Dusk Browser Testi

```php
public function test_admin_dashboard_loads_for_admin(): void
{
    $admin = User::factory()->admin()->create();

    $this->browse(function (Browser $browser) use ($admin) {
        $browser->loginAs($admin, 'web')
            ->visit('/admin/dashboard')
            ->assertPathIs('/admin/dashboard')
            ->assertPresent('body');
    });
}
```

## Test Veritabanı

- CI'da PostgreSQL 17 kullanılır
- Her test kendi verisini oluşturur (RefreshDatabase trait)
- Test'ler arasında veri paylaşımı yok
- Factory'ler kullanılmalı, manuel veri oluşturma yok

## Best Practices

1. **Test Isolation**: Her test bağımsız çalışmalı
2. **Factory Usage**: Model oluşturmak için factory kullan
3. **Clear Assertions**: Assertion'lar açıklayıcı olmalı
4. **Test Names**: Test isimleri ne test ettiğini açıklamalı
5. **Turkish Descriptions**: Test açıklamaları Türkçe olmalı
6. **One Thing Per Test**: Her test tek bir şeyi test etmeli
