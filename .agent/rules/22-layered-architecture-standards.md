---
alwaysApply: true
---

# LAYERED ARCHITECTURE STANDARDS

Bu kurallar, projenin sürdürülebilirliği, test edilebilirliği ve okunabilirliği için **ZORUNLUDUR**.

## 1. Mimari Prensipler
Proje, katı bir katmanlı mimari izlemelidir. Veri akışı şu şekilde olmalıdır:
`Route/Controller/Livewire` -> `DTO` -> `Service` -> `Repository` -> `Model/Database`

- **Controller/Livewire**: Sadece gelen isteği karşılar, validasyon yapar, veriyi DTO'ya çevirir ve Servis'e iletir. Asla iş mantığı içermez.
- **Service**: İş kurallarını (Business Logic) uygular. Repository'leri kullanır.
- **Repository**: Veritabanı sorgularını soyutlar. Eloquent veya Query Builder sadece burada kullanılır.
- **Model**: Sadece veritabanı şemasını ve ilişkilerini temsil eder. İş mantığı içermez.

## 2. DTO (Data Transfer Object) Zorunluluğu
Katmanlar arasında "array" fırlatmak **YASAKTIR**.
- Veri taşıma nesneleri (DTO) kullanılmalıdır.
- Native PHP `readonly class` özellikleri tercih edilmelidir.
- Her metodun giriş ve çıkış tipleri net olmalıdır.

```php
// ✅ DOĞRU: DTO Kullanımı
readonly class CreateUserData
{
    public function __construct(
        public string $name,
        public string $email,
    ) {}
}

// ❌ YANLIŞ: Array kullanımı
function createUser(array $data) { ... }
```

## 3. Service Katmanı
- Tüm iş mantığı Service sınıflarında olmalıdır.
- Senaryoya dayalı (UseCase) işlemler için Action sınıfları da kullanılabilir ancak genel işler için Service tercih edilir.
- Servisler Controller veya Livewire bileşenlerine Dependency Injection (Constructor Injection) ile dahil edilmelidir.

## 4. Repository Pattern
- Veritabanı erişimi Repository sınıfları üzerinden yapılmalıdır.
- Her Repository için bir **Interface** tanımlanmalı ve Service bu Interface'e bağımlı olmalıdır (Dependency Inversion).
- `User::where(...)`, `Post::create(...)` gibi kodlar SADECE Repository içinde bulunabilir.

```php
// ✅ DOĞRU
class UserRepository implements UserRepositoryInterface {
    public function findByEmail(string $email): ?User {
        return User::where('email', $email)->first();
    }
}
```

## 5. ZORUNLU Unit Testler
Yazılan **HER** kod parçası (Service, Repository, DTO vb.) için mutlaka test yazılmalıdır.
- Test yazılmadan kod tamamlanmış sayılmaz.
- `Pest` framework'ü kullanılmalıdır.
- Happy path (başarılı senaryo) ve Edge case (hata senaryoları) test edilmelidir.

```php
// ✅ ZORUNLU TEST FORMATI
it('can create a user', function () {
    $repository = new UserRepository();
    $user = $repository->create(new CreateUserData(...));
    expect($user)->toBeInstanceOf(User::class);
});
```

## 6. Fat Controller/Component Yasağı
- Controller veya Livewire Component dosyaları 100-150 satırı geçmemelidir.
- Eğer geçiyorsa, iş mantığı Service'e veya Action'a taşınmalıdır.
