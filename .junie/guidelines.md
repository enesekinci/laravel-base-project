<laravel-boost-guidelines>
=== foundation rules ===

# Laravel Boost Guidelines

The Laravel Boost guidelines are specifically curated by Laravel maintainers for this application. These guidelines should be followed closely to enhance the user's satisfaction building Laravel applications.

## Foundational Context
This application is a Laravel application and its main Laravel ecosystems package & versions are below. You are an expert with them all. Ensure you abide by these specific packages & versions.

- php - 8.3.29
- laravel/framework (LARAVEL) - v12
- laravel/horizon (HORIZON) - v5
- laravel/octane (OCTANE) - v2
- laravel/prompts (PROMPTS) - v0
- laravel/pulse (PULSE) - v1
- laravel/reverb (REVERB) - v1
- laravel/sanctum (SANCTUM) - v4
- laravel/scout (SCOUT) - v10
- laravel/socialite (SOCIALITE) - v5
- livewire/livewire (LIVEWIRE) - v3
- larastan/larastan (LARASTAN) - v3
- laravel/dusk (DUSK) - v8
- laravel/mcp (MCP) - v0
- laravel/pint (PINT) - v1
- laravel/sail (SAIL) - v1
- laravel/telescope (TELESCOPE) - v5
- pestphp/pest (PEST) - v4
- phpunit/phpunit (PHPUNIT) - v12
- alpinejs (ALPINEJS) - v3
- prettier (PRETTIER) - v3
- tailwindcss (TAILWINDCSS) - v4

## Conventions
- You must follow all existing code conventions used in this application. When creating or editing a file, check sibling files for the correct structure, approach, naming.
- Use descriptive names for variables and methods. For example, `isRegisteredForDiscounts`, not `discount()`.
- Check for existing components to reuse before writing a new one.

## Verification Scripts
- Do not create verification scripts or tinker when tests cover that functionality and prove it works. Unit and feature tests are more important.

## Application Structure & Architecture
- Stick to existing directory structure - don't create new base folders without approval.
- Do not change the application's dependencies without approval.

## Frontend Bundling
- If the user doesn't see a frontend change reflected in the UI, it could mean they need to run `npm run build`, `npm run dev`, or `composer run dev`. Ask them.

## Replies
- Be concise in your explanations - focus on what's important rather than explaining obvious details.

## Documentation Files
- You must only create documentation files if explicitly requested by the user.


=== boost rules ===

## Laravel Boost
- Laravel Boost is an MCP server that comes with powerful tools designed specifically for this application. Use them.

## Artisan
- Use the `list-artisan-commands` tool when you need to call an Artisan command to double check the available parameters.

## URLs
- Whenever you share a project URL with the user you should use the `get-absolute-url` tool to ensure you're using the correct scheme, domain / IP, and port.

## Tinker / Debugging
- You should use the `tinker` tool when you need to execute PHP to debug code or query Eloquent models directly.
- Use the `database-query` tool when you only need to read from the database.

## Reading Browser Logs With the `browser-logs` Tool
- You can read browser logs, errors, and exceptions using the `browser-logs` tool from Boost.
- Only recent browser logs will be useful - ignore old logs.

## Searching Documentation (Critically Important)
- Boost comes with a powerful `search-docs` tool you should use before any other approaches. This tool automatically passes a list of installed packages and their versions to the remote Boost API, so it returns only version-specific documentation specific for the user's circumstance. You should pass an array of packages to filter on if you know you need docs for particular packages.
- The 'search-docs' tool is perfect for all Laravel related packages, including Laravel, Inertia, Livewire, Filament, Tailwind, Pest, Nova, Nightwatch, etc.
- You must use this tool to search for Laravel-ecosystem documentation before falling back to other approaches.
- Search the documentation before making code changes to ensure we are taking the correct approach.
- Use multiple, broad, simple, topic based queries to start. For example: `['rate limiting', 'routing rate limiting', 'routing']`.
- Do not add package names to queries - package information is already shared. For example, use `test resource table`, not `filament 4 test resource table`.

### Available Search Syntax
- You can and should pass multiple queries at once. The most relevant results will be returned first.

1. Simple Word Searches with auto-stemming - query=authentication - finds 'authenticate' and 'auth'
2. Multiple Words (AND Logic) - query=rate limit - finds knowledge containing both "rate" AND "limit"
3. Quoted Phrases (Exact Position) - query="infinite scroll" - Words must be adjacent and in that order
4. Mixed Queries - query=middleware "rate limit" - "middleware" AND exact phrase "rate limit"
5. Multiple Queries - queries=["authentication", "middleware"] - ANY of these terms


=== php rules ===

## PHP

- Always use strict typing at the head of a `.php` file: `declare(strict_types=1);`.
- Always use curly braces for control structures, even if it has one line.

### Constructors
- Use PHP 8 constructor property promotion in `__construct()`.
    - <code-snippet>public function __construct(public GitHub $github) { }</code-snippet>
- Do not allow empty `__construct()` methods with zero parameters.

### Type Declarations
- Always use explicit return type declarations for methods and functions.
- Use appropriate PHP type hints for method parameters.

<code-snippet name="Explicit Return Types and Method Params" lang="php">
protected function isAccessible(User $user, ?string $path = null): bool
{
    ...
}
</code-snippet>

## Comments
- Prefer PHPDoc blocks over comments. Never use comments within the code itself unless there is something _very_ complex going on.

## PHPDoc Blocks
- Add useful array shape type definitions for arrays when appropriate.

## Enums
- Typically, keys in an Enum should be TitleCase. For example: `FavoritePerson`, `BestLake`, `Monthly`.


=== tests rules ===

## Test Enforcement

- Every change must be programmatically tested. Write a new test or update an existing test, then run the affected tests to make sure they pass.
- Run the minimum number of tests needed to ensure code quality and speed. Use `php artisan test` with a specific filename or filter.


=== laravel/core rules ===

## Do Things the Laravel Way

- Use `php artisan make:` commands to create new files (i.e. migrations, controllers, models, etc.). You can list available Artisan commands using the `list-artisan-commands` tool.
- If you're creating a generic PHP class, use `php artisan make:class`.
- Pass `--no-interaction` to all Artisan commands to ensure they work without user input. You should also pass the correct `--options` to ensure correct behavior.

### Database
- Always use proper Eloquent relationship methods with return type hints. Prefer relationship methods over raw queries or manual joins.
- Use Eloquent models and relationships before suggesting raw database queries
- Avoid `DB::`; prefer `Model::query()`. Generate code that leverages Laravel's ORM capabilities rather than bypassing them.
- Generate code that prevents N+1 query problems by using eager loading.
- Use Laravel's query builder for very complex database operations.

### Model Creation
- When creating new models, create useful factories and seeders for them too. Ask the user if they need any other things, using `list-artisan-commands` to check the available options to `php artisan make:model`.

### APIs & Eloquent Resources
- For APIs, default to using Eloquent API Resources and API versioning unless existing API routes do not, then you should follow existing application convention.

### Controllers & Validation
- Always create Form Request classes for validation rather than inline validation in controllers. Include both validation rules and custom error messages.
- Check sibling Form Requests to see if the application uses array or string based validation rules.

### Queues
- Use queued jobs for time-consuming operations with the `ShouldQueue` interface.

### Authentication & Authorization
- Use Laravel's built-in authentication and authorization features (gates, policies, Sanctum, etc.).

### URL Generation
- When generating links to other pages, prefer named routes and the `route()` function.

### Configuration
- Use environment variables only in configuration files - never use the `env()` function directly outside of config files. Always use `config('app.name')`, not `env('APP_NAME')`.

### Testing
- When creating models for tests, use the factories for the models. Check if the factory has custom states that can be used before manually setting up the model.
- Faker: Use methods such as `$this->faker->word()` or `fake()->randomDigit()`. Follow existing conventions whether to use `$this->faker` or `fake()`.
- When creating tests, make use of `php artisan make:test [options] {name}` to create a feature test, and pass `--unit` to create a unit test. Most tests should be feature tests.

### Vite Error
- If you receive an "Illuminate\Foundation\ViteException: Unable to locate file in Vite manifest" error, you can run `npm run build` or ask the user to run `npm run dev` or `composer run dev`.


=== laravel/v12 rules ===

## Laravel 12

- Use the `search-docs` tool to get version specific documentation.
- Since Laravel 11, Laravel has a new streamlined file structure which this project uses.

### Laravel 12 Structure
- No middleware files in `app/Http/Middleware/`.
- `bootstrap/app.php` is the file to register middleware, exceptions, and routing files.
- `bootstrap/providers.php` contains application specific service providers.
- **No app\Console\Kernel.php** - use `bootstrap/app.php` or `routes/console.php` for console configuration.
- **Commands auto-register** - files in `app/Console/Commands/` are automatically available and do not require manual registration.

### Database
- When modifying a column, the migration must include all of the attributes that were previously defined on the column. Otherwise, they will be dropped and lost.
- Laravel 11 allows limiting eagerly loaded records natively, without external packages: `$query->latest()->limit(10);`.

### Models
- Casts can and likely should be set in a `casts()` method on a model rather than the `$casts` property. Follow existing conventions from other models.


=== livewire/core rules ===

## Livewire Core
- Use the `search-docs` tool to find exact version specific documentation for how to write Livewire & Livewire tests.
- Use the `php artisan make:livewire [Posts\CreatePost]` artisan command to create new components
- State should live on the server, with the UI reflecting it.
- All Livewire requests hit the Laravel backend, they're like regular HTTP requests. Always validate form data, and run authorization checks in Livewire actions.

## Livewire Best Practices
- Livewire components require a single root element.
- Use `wire:loading` and `wire:dirty` for delightful loading states.
- Add `wire:key` in loops:

    ```blade
    @foreach ($items as $item)
        <div wire:key="item-{{ $item->id }}">
            {{ $item->name }}
        </div>
    @endforeach
    ```

- Prefer lifecycle hooks like `mount()`, `updatedFoo()` for initialization and reactive side effects:

<code-snippet name="Lifecycle hook examples" lang="php">
    public function mount(User $user) { $this->user = $user; }
    public function updatedSearch() { $this->resetPage(); }
</code-snippet>


## Testing Livewire

<code-snippet name="Example Livewire component test" lang="php">
    Livewire::test(Counter::class)
        ->assertSet('count', 0)
        ->call('increment')
        ->assertSet('count', 1)
        ->assertSee(1)
        ->assertStatus(200);
</code-snippet>


    <code-snippet name="Testing a Livewire component exists within a page" lang="php">
        $this->get('/posts/create')
        ->assertSeeLivewire(CreatePost::class);
    </code-snippet>


=== livewire/v3 rules ===

## Livewire 3

### Key Changes From Livewire 2
- These things changed in Livewire 2, but may not have been updated in this application. Verify this application's setup to ensure you conform with application conventions.
    - Use `wire:model.live` for real-time updates, `wire:model` is now deferred by default.
    - Components now use the `App\Livewire` namespace (not `App\Http\Livewire`).
    - Use `$this->dispatch()` to dispatch events (not `emit` or `dispatchBrowserEvent`).
    - Use the `components.layouts.app` view as the typical layout path (not `layouts.app`).

### New Directives
- `wire:show`, `wire:transition`, `wire:cloak`, `wire:offline`, `wire:target` are available for use. Use the documentation to find usage examples.

### Alpine
- Alpine is now included with Livewire, don't manually include Alpine.js.
- Plugins included with Alpine: persist, intersect, collapse, and focus.

### Lifecycle Hooks
- You can listen for `livewire:init` to hook into Livewire initialization, and `fail.status === 419` for the page expiring:

<code-snippet name="livewire:load example" lang="js">
document.addEventListener('livewire:init', function () {
    Livewire.hook('request', ({ fail }) => {
        if (fail && fail.status === 419) {
            alert('Your session expired');
        }
    });

    Livewire.hook('message.failed', (message, component) => {
        console.error(message);
    });
});
</code-snippet>


=== pint/core rules ===

## Laravel Pint Code Formatter

- You must run `vendor/bin/pint --dirty` before finalizing changes to ensure your code matches the project's expected style.
- Do not run `vendor/bin/pint --test`, simply run `vendor/bin/pint` to fix any formatting issues.


=== pest/core rules ===

## Pest
### Testing
- If you need to verify a feature is working, write or update a Unit / Feature test.

### Pest Tests
- All tests must be written using Pest. Use `php artisan make:test --pest {name}`.
- You must not remove any tests or test files from the tests directory without approval. These are not temporary or helper files - these are core to the application.
- Tests should test all of the happy paths, failure paths, and weird paths.
- Tests live in the `tests/Feature` and `tests/Unit` directories.
- Pest tests look and behave like this:
<code-snippet name="Basic Pest Test Example" lang="php">
it('is true', function () {
    expect(true)->toBeTrue();
});
</code-snippet>

### Running Tests
- Run the minimal number of tests using an appropriate filter before finalizing code edits.
- To run all tests: `php artisan test`.
- To run all tests in a file: `php artisan test tests/Feature/ExampleTest.php`.
- To filter on a particular test name: `php artisan test --filter=testName` (recommended after making a change to a related file).
- When the tests relating to your changes are passing, ask the user if they would like to run the entire test suite to ensure everything is still passing.

### Pest Assertions
- When asserting status codes on a response, use the specific method like `assertForbidden` and `assertNotFound` instead of using `assertStatus(403)` or similar, e.g.:
<code-snippet name="Pest Example Asserting postJson Response" lang="php">
it('returns all', function () {
    $response = $this->postJson('/api/docs', []);

    $response->assertSuccessful();
});
</code-snippet>

### Mocking
- Mocking can be very helpful when appropriate.
- When mocking, you can use the `Pest\Laravel\mock` Pest function, but always import it via `use function Pest\Laravel\mock;` before using it. Alternatively, you can use `$this->mock()` if existing tests do.
- You can also create partial mocks using the same import or self method.

### Datasets
- Use datasets in Pest to simplify tests which have a lot of duplicated data. This is often the case when testing validation rules, so consider going with this solution when writing tests for validation rules.

<code-snippet name="Pest Dataset Example" lang="php">
it('has emails', function (string $email) {
    expect($email)->not->toBeEmpty();
})->with([
    'james' => 'james@laravel.com',
    'taylor' => 'taylor@laravel.com',
]);
</code-snippet>


=== pest/v4 rules ===

## Pest 4

- Pest v4 is a huge upgrade to Pest and offers: browser testing, smoke testing, visual regression testing, test sharding, and faster type coverage.
- Browser testing is incredibly powerful and useful for this project.
- Browser tests should live in `tests/Browser/`.
- Use the `search-docs` tool for detailed guidance on utilizing these features.

### Browser Testing
- You can use Laravel features like `Event::fake()`, `assertAuthenticated()`, and model factories within Pest v4 browser tests, as well as `RefreshDatabase` (when needed) to ensure a clean state for each test.
- Interact with the page (click, type, scroll, select, submit, drag-and-drop, touch gestures, etc.) when appropriate to complete the test.
- If requested, test on multiple browsers (Chrome, Firefox, Safari).
- If requested, test on different devices and viewports (like iPhone 14 Pro, tablets, or custom breakpoints).
- Switch color schemes (light/dark mode) when appropriate.
- Take screenshots or pause tests for debugging when appropriate.

### Example Tests

<code-snippet name="Pest Browser Test Example" lang="php">
it('may reset the password', function () {
    Notification::fake();

    $this->actingAs(User::factory()->create());

    $page = visit('/sign-in'); // Visit on a real browser...

    $page->assertSee('Sign In')
        ->assertNoJavascriptErrors() // or ->assertNoConsoleLogs()
        ->click('Forgot Password?')
        ->fill('email', 'nuno@laravel.com')
        ->click('Send Reset Link')
        ->assertSee('We have emailed your password reset link!')

    Notification::assertSent(ResetPassword::class);
});
</code-snippet>

<code-snippet name="Pest Smoke Testing Example" lang="php">
$pages = visit(['/', '/about', '/contact']);

$pages->assertNoJavascriptErrors()->assertNoConsoleLogs();
</code-snippet>


=== tailwindcss/core rules ===

## Tailwind Core

- Use Tailwind CSS classes to style HTML, check and use existing tailwind conventions within the project before writing your own.
- Offer to extract repeated patterns into components that match the project's conventions (i.e. Blade, JSX, Vue, etc..)
- Think through class placement, order, priority, and defaults - remove redundant classes, add classes to parent or child carefully to limit repetition, group elements logically
- You can use the `search-docs` tool to get exact examples from the official documentation when needed.

### Spacing
- When listing items, use gap utilities for spacing, don't use margins.

    <code-snippet name="Valid Flex Gap Spacing Example" lang="html">
        <div class="flex gap-8">
            <div>Superior</div>
            <div>Michigan</div>
            <div>Erie</div>
        </div>
    </code-snippet>


### Dark Mode
- If existing pages and components support dark mode, new pages and components must support dark mode in a similar way, typically using `dark:`.


=== tailwindcss/v4 rules ===

## Tailwind 4

- Always use Tailwind CSS v4 - do not use the deprecated utilities.
- `corePlugins` is not supported in Tailwind v4.
- In Tailwind v4, configuration is CSS-first using the `@theme` directive — no separate `tailwind.config.js` file is needed.
<code-snippet name="Extending Theme in CSS" lang="css">
@theme {
  --color-brand: oklch(0.72 0.11 178);
}
</code-snippet>

- In Tailwind v4, you import Tailwind using a regular CSS `@import` statement, not using the `@tailwind` directives used in v3:

<code-snippet name="Tailwind v4 Import Tailwind Diff" lang="diff">
   - @tailwind base;
   - @tailwind components;
   - @tailwind utilities;
   + @import "tailwindcss";
</code-snippet>


### Replaced Utilities
- Tailwind v4 removed deprecated utilities. Do not use the deprecated option - use the replacement.
- Opacity values are still numeric.

| Deprecated |	Replacement |
|+--|
| bg-opacity-* | bg-black/* |
| text-opacity-* | text-black/* |
| border-opacity-* | border-black/* |
| divide-opacity-* | divide-black/* |
| ring-opacity-* | ring-black/* |
| placeholder-opacity-* | placeholder-black/* |
| flex-shrink-* | shrink-* |
| flex-grow-* | grow-* |
| overflow-ellipsis | text-ellipsis |
| decoration-slice | box-decoration-slice |
| decoration-clone | box-decoration-clone |
</laravel-boost-guidelines>



# PROJECT CONTEXT

- Project: Laravel monolith with Blade templates for admin panel.
- Goal: Fast feature delivery, clean boundaries, no over-engineering.
- Admin Panel: Blade views with admin template (modern-dark-menu layout).

# STACK

- Backend: Laravel 12+, PHP 8.3, PostgreSQL (her zaman PostgreSQL kullanılacak).
- Admin Frontend: Blade templates + admin template + Pure JavaScript (jQuery/Alpine.js gerek yok, reactive işlemler için basit custom JS yazılabilir).
- Auth: Laravel Breeze (web guard).
- UI: Admin template components (DataTables, FilePond, Tom Select, Tagify, TouchSpin, Flatpickr, Quill Editor).



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



# FRONTEND CONVENTIONS

- React componentleri feature bazlı klasörlensin: `resources/js/Pages/Admin/Products/...`
- shadcn componentleri `resources/js/components/ui` altında.
- Formlarda react-hook-form + zod kullan.
- API isteklerinde axios kullan ve CSRF'i ayarla.
- Tablo, modal, drawer gibi şeyler reusable olacak.
- Component isimleri PascalCase olmalı.
- Props'ları type-safe yap (TypeScript kullan).

## CODE ORGANIZATION

- **Types**: Tüm TypeScript tipleri `resources/js/types/` klasöründe, domain bazlı dosyalarda
- **Hooks**: Custom hook'lar `resources/js/hooks/` klasöründe, `use-` prefix ile
- **Utils**: Utility fonksiyonları `resources/js/utils/` klasöründe, pure fonksiyonlar
- **Components**: Feature bazlı component'ler `resources/js/components/` klasöründe
- **Refactoring**: Detaylı refactoring kuralları için `10-react-refactoring.mdc` dosyasına bak

# REACT COMPONENT GENERATION

- Eğer React component üretiyorsan shadcn stiline göre üret.
- Form varsa react-hook-form + zod kullan.
- TypeScript kullan, any kullanma.
- Component'leri feature bazlı organize et.

```tsx
// ✅ İyi - Product Form Component
import { useForm } from 'react-hook-form';
import { zodResolver } from '@hookform/resolvers/zod';
import { z } from 'zod';
import { Button } from '@/components/ui/button';
import { Input } from '@/components/ui/input';

const productSchema = z.object({
    name: z.string().min(1, 'Ürün adı gereklidir'),
    sku: z.string().min(1, 'SKU gereklidir'),
    price: z.number().min(0, "Fiyat 0'dan büyük olmalıdır"),
});

type ProductFormData = z.infer<typeof productSchema>;

export function ProductForm({
    onSubmit,
}: {
    onSubmit: (data: ProductFormData) => void;
}) {
    const {
        register,
        handleSubmit,
        formState: { errors },
    } = useForm<ProductFormData>({
        resolver: zodResolver(productSchema),
    });

    return <form onSubmit={handleSubmit(onSubmit)}>{/* form fields */}</form>;
}
```



# DOMAIN RULES

- migrations always use unsignedBigInteger for fks.
- Foreign key'ler için index'ler ekle.
- Timestamps kullan (mümkünse).

# TASK STYLE

- Bir dosya istersem tek dosya üret.
- Yeni feature istersem migration + model + request + controller + route + react page şeklinde üretim sırası kullan.
- Migration yazarken timestamps ekle ve softDeletes ürünle ilgili tablolara ekle.
- Laravel controller üretirken ilgili FormRequest'i de üret.



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



# TESTING

- Pest kullan (projede zaten var).
- Test isimleri açıklayıcı olmalı.
- Her feature için test yazılabilir formatta üret.
- Factory'leri kullan.

```php
// ✅ İyi
it('can create a product', function () {
    $user = User::factory()->create();

    $response = $this->actingAs($user)
        ->post(route('admin.products.store'), [
            'name' => 'Test Product',
            'sku' => 'TEST-001',
            'price' => 99.99,
        ]);

    $response->assertRedirect();
    $this->assertDatabaseHas('products', [
        'name' => 'Test Product',
        'sku' => 'TEST-001',
    ]);
});
```



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



# NOTES

- Laravel 12 kullanılıyor, yeni özelliklerden faydalan.
- Inertia.js ile React kullanılıyor, frontend-backend entegrasyonuna dikkat et.
- Pest test framework'ü kullanılıyor.
- Laravel Pint code formatter kullanılıyor.
- shadcn/ui componentleri zaten kurulu, `components.json` var.
- Her zaman Türkçe yorum ve açıklama kullan.



# BLADE VIEW CONVENTIONS

- View Composer'lar veri sağlıyorsa, Blade template'lerde gereksiz boş data kontrolü YAPMA.
- View Composer zaten veriyi sağlıyor, eğer veri yoksa boş array/null gelir, bu durumda direkt foreach kullan.
- Fallback menü/veri ekleme, View Composer'ın sorumluluğundadır, Blade template'de değil.

```blade
{{-- ❌ Kötü - Gereksiz kontrol ve fallback --}}
@if(!empty($headerMenu) && is_array($headerMenu) && count($headerMenu) > 0)
    @foreach($headerMenu as $item)
        ...
    @endforeach
@else
    {{-- Fallback menü --}}
    <li><a href="/porto/dashboard.html">My Account</a></li>
@endif

{{-- ✅ İyi - Direkt foreach, View Composer zaten veriyi sağlıyor --}}
@foreach($headerMenu ?? [] as $item)
    @if($item['is_active'] ?? true)
        <li>
            <a href="{{ $item['url'] ?? '#' }}">{{ $item['name'] ?? '' }}</a>
        </li>
    @endif
@endforeach
```

- Menüler için: `@foreach($headerMenu ?? [] as $item)` şeklinde direkt foreach kullan, gereksiz `@if(!empty(...))` kontrolü yapma.
- Footer menüler için: `@foreach($footerMenu ?? [] as $item)` şeklinde direkt foreach kullan.



# CORK TEMPLATE USAGE RULES

## Genel Kural

**Admin panelindeki TÜM sayfalar, component'ler, layout'lar ve asset'ler MUTLAKA Cork template'den gelmelidir.**

- ❌ **ASLA** custom CSS/JS yazma, Cork'tan olmayan component kullanma
- ❌ **ASLA** Tailwind veya başka bir CSS framework kullanma
- ✅ **HER ZAMAN** Cork template'in asset'lerini kullan (`public/cork/` veya `cork-template/`)
- ✅ **HER ZAMAN** Cork'un component yapısını ve class'larını kullan
- ✅ **HER ZAMAN** Cork'un layout yapısını takip et

## Asset Kullanımı

### CSS Asset'leri

Tüm CSS asset'leri `public/cork/` veya `cork-template/` klasöründen gelmelidir:

```blade
{{-- ✅ İyi - Cork asset kullanımı --}}
<link href="{{ asset('cork/src/plugins/src/table/datatable/datatables.css') }}" rel="stylesheet" type="text/css">
<link href="{{ asset('cork/src/plugins/css/light/table/datatable/dt-global_style.css') }}" rel="stylesheet" type="text/css">
<link href="{{ asset('cork/src/plugins/css/dark/table/datatable/dt-global_style.css') }}" rel="stylesheet" type="text/css">

{{-- ❌ Kötü - Custom CSS veya başka framework --}}
<link href="{{ asset('css/custom.css') }}" rel="stylesheet">
<link href="https://cdn.tailwindcss.com" rel="stylesheet">
```

### JavaScript Asset'leri

Tüm JS asset'leri Cork'tan gelmelidir:

```blade
{{-- ✅ İyi - Cork JS asset kullanımı --}}
<script src="{{ asset('cork/src/plugins/src/table/datatable/datatables.js') }}"></script>
<script src="{{ asset('cork/src/plugins/src/filepond/filepond.min.js') }}"></script>

{{-- ❌ Kötü - Custom JS veya CDN --}}
<script src="{{ asset('js/custom.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/custom-library"></script>
```

## Layout Yapısı

### Ana Layout

Admin layout'u (`resources/views/admin/layouts/app.blade.php`) MUTLAKA Cork'un layout yapısını kullanmalı:

```blade
{{-- ✅ İyi - Cork layout yapısı --}}
<!DOCTYPE html>
<html lang="tr">
<head>
    {{-- Cork loader --}}
    <link href="{{ asset('cork/layouts/modern-dark-menu/css/light/loader.css') }}" rel="stylesheet">
    <script src="{{ asset('cork/layouts/modern-dark-menu/loader.js') }}"></script>
    
    {{-- Cork global styles --}}
    <link href="{{ asset('cork/src/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('cork/layouts/modern-dark-menu/css/light/plugins.css') }}" rel="stylesheet">
    <link href="{{ asset('cork/layouts/modern-dark-menu/css/dark/plugins.css') }}" rel="stylesheet">
</head>
<body class="layout-boxed">
    {{-- Cork loader --}}
    <div id="load_screen">...</div>
    
    {{-- Cork header --}}
    <div class="header-container container-xxl">
        <header class="header navbar navbar-expand-sm expand-header">...</header>
    </div>
    
    {{-- Cork sidebar --}}
    <div class="sidebar-wrapper">...</div>
    
    {{-- Cork content --}}
    <div id="content" class="main-content">...</div>
    
    {{-- Cork scripts --}}
    <script src="{{ asset('cork/src/plugins/src/global/vendors.min.js') }}"></script>
    <script src="{{ asset('cork/src/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
</body>
</html>
```

## Component Kullanımı

### DataTable

Cork'un DataTable component'ini kullan:

```blade
{{-- ✅ İyi - Cork DataTable --}}
<div class="table-responsive">
    <table id="products-table" class="table dt-table-hover" style="width:100%">
        <thead>...</thead>
        <tbody>...</tbody>
    </table>
</div>

@push('scripts')
<script src="{{ asset('cork/src/plugins/src/table/datatable/datatables.js') }}"></script>
<script>
    $('#products-table').DataTable({
        // Cork DataTable config
    });
</script>
@endpush
```

### Form Component'leri

Cork'un form component'lerini kullan:

```blade
{{-- ✅ İyi - Cork form components --}}
{{-- File Upload --}}
<input type="file" class="filepond" name="filepond">

{{-- Tom Select --}}
<select id="select-beast" class="form-select">
    <option>...</option>
</select>

{{-- Tagify --}}
<input name='tags' value='tag1, tag2'>

{{-- TouchSpin --}}
<input id="demo1" type="text" value="55" name="demo1">

{{-- Flatpickr --}}
<input id="basicFlatpickr" class="form-control flatpickr" type="text">

{{-- Quill Editor --}}
<div id="editor-container">...</div>
```

### Widget'lar ve Card'lar

Cork'un widget yapısını kullan:

```blade
{{-- ✅ İyi - Cork widget yapısı --}}
<div class="widget-content widget-content-area br-8 p-4">
    <h4 class="mb-4">Başlık</h4>
    {{-- İçerik --}}
</div>

{{-- ❌ Kötü - Custom card yapısı --}}
<div class="custom-card">
    <div class="card-header">...</div>
</div>
```

## Sayfa Yapısı

### Breadcrumb

Cork'un breadcrumb component'ini kullan:

```blade
{{-- ✅ İyi - Cork breadcrumb --}}
<div class="page-meta">
    <nav class="breadcrumb-style-one" aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Admin</a></li>
            <li class="breadcrumb-item active" aria-current="page">Products</li>
        </ol>
    </nav>
</div>
```

### Content Area

Cork'un content area yapısını kullan:

```blade
{{-- ✅ İyi - Cork content area --}}
<div class="row layout-top-spacing">
    <div class="col-xl-12 col-lg-12 col-sm-12 layout-spacing">
        <div class="widget-content widget-content-area br-8 p-4">
            {{-- İçerik --}}
        </div>
    </div>
</div>
```

## Stil Kullanımı

### Class'lar

Cork'un class'larını kullan, custom class yazma:

```blade
{{-- ✅ İyi - Cork class'ları --}}
<button class="btn btn-primary">Kaydet</button>
<div class="form-group">
    <label for="name">Ad</label>
    <input type="text" class="form-control" id="name">
</div>

{{-- ❌ Kötü - Custom class'lar --}}
<button class="custom-button">Kaydet</button>
<div class="my-custom-form-group">
    <label class="my-label">Ad</label>
    <input type="text" class="my-input">
</div>
```

### Dark Mode

Cork'un dark mode desteğini kullan:

```blade
{{-- ✅ İyi - Cork dark mode CSS'leri --}}
<link href="{{ asset('cork/src/plugins/css/light/table/datatable/dt-global_style.css') }}" rel="stylesheet">
<link href="{{ asset('cork/src/plugins/css/dark/table/datatable/dt-global_style.css') }}" rel="stylesheet">
```

## Örnek Sayfa Yapısı

Tüm admin sayfaları şu yapıda olmalı:

```blade
@extends('admin.layouts.app')

@section('title', 'Sayfa Başlığı')

@push('styles')
{{-- Cork CSS asset'leri --}}
<link href="{{ asset('cork/src/plugins/...') }}" rel="stylesheet">
@endpush

@section('content')
{{-- Breadcrumb --}}
<div class="page-meta">
    <nav class="breadcrumb-style-one" aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Admin</a></li>
            <li class="breadcrumb-item active" aria-current="page">Sayfa</li>
        </ol>
    </nav>
</div>

{{-- Content Area --}}
<div class="row layout-top-spacing">
    <div class="col-xl-12 col-lg-12 col-sm-12 layout-spacing">
        <div class="widget-content widget-content-area br-8 p-4">
            {{-- İçerik --}}
        </div>
    </div>
</div>
@endsection

@push('scripts')
{{-- Cork JS asset'leri --}}
<script src="{{ asset('cork/src/plugins/...') }}"></script>
<script>
    // Cork component initialization
</script>
@endpush
```

## Kontrol Listesi

Yeni bir admin sayfası oluştururken şunları kontrol et:

- [ ] Tüm CSS asset'leri `public/cork/` veya `cork-template/` klasöründen mi?
- [ ] Tüm JS asset'leri Cork'tan mı?
- [ ] Layout yapısı Cork'un layout yapısını mı kullanıyor?
- [ ] Component'ler Cork'un component'leri mi?
- [ ] Class'lar Cork'un class'ları mı?
- [ ] Dark mode CSS'leri eklendi mi?
- [ ] Custom CSS/JS yazılmadı mı?
- [ ] Tailwind veya başka framework kullanılmadı mı?

## Önemli Notlar

1. **Cork template'in tüm özelliklerini kullan**: DataTable, FilePond, Tom Select, Tagify, TouchSpin, Flatpickr, Quill Editor, vb.
2. **Cork'un layout yapısını takip et**: Header, Sidebar, Content area yapısı Cork'tan gelmeli
3. **Cork'un class'larını kullan**: Custom class yazma, Cork'un class'larını kullan
4. **Dark mode desteği**: Her zaman light ve dark mode CSS'lerini ekle
5. **Responsive yapı**: Cork'un responsive class'larını kullan (`col-xl-12`, `col-lg-12`, vb.)

## Referans Dosyalar

- Cork template örnekleri: `cork-template/modern-dark-menu/` klasörü
- Cork asset'leri: `public/cork/` klasörü
- Component showcase: `resources/views/admin/components.blade.php`
- Ana layout: `resources/views/admin/layouts/app.blade.php`



# COMMIT MESSAGE KURALLARI

## Commit Mesajı Dili

- Tüm commit mesajları Türkçe olmalıdır.
- AI commit özelliği kullanıldığında Türkçe mesaj üretmelidir.
- İngilizce commit mesajı yazılmamalıdır.

## Commit Mesajı Formatı

- Feature eklemeleri: `feat: ...` formatında
- Bug fix'ler: `fix: ...` formatında
- Refactoring: `refactor: ...` formatında
- Config değişiklikleri: `config: ...` formatında
- Documentation: `docs: ...` formatında
- Performance: `perf: ...` formatında

## Örnekler

- ✅ `feat: Laravel Octane entegrasyonu eklendi`
- ✅ `fix: Redis cache bağlantı sorunu düzeltildi`
- ✅ `refactor: Dockerfile yapısı optimize edildi`
- ✅ `config: PostgreSQL bağlantı ayarları güncellendi`
- ✅ `docs: API dokümantasyonu eklendi`
- ✅ `perf: Database query optimizasyonu yapıldı`
- ❌ `feat: Added Laravel Octane integration`
- ❌ `fix: Fixed Redis cache connection issue`

## Önemli Notlar

- Commit mesajları açıklayıcı olmalı, ne yapıldığını net bir şekilde belirtmeli.
- Kısa ve öz olmalı, gereksiz detaylara girilmemeli.
- Her zaman Türkçe karakterler kullanılmalı (ı, ş, ğ, ü, ö, ç).



# LARAVEL ADVANCED PATTERNS

## Action/UseCase Pattern

- **Action sınıfları tek bir sorumluluğa sahip olmalı**: `CreatePostAction`, `UpdatePageAction`
- **Action'lar transaction içinde çalışmalı** (birden fazla tablo yazılıyorsa)
- **Action'lar event fırlatmalı** (yan etkiler için)
- **Service'ler action'ları orkestre eder**, action'lar tek iş yapar

```php
// ✅ İyi - Action pattern
class CreatePostAction
{
    public function __construct(
        private readonly PostRepository $repository
    ) {}

    public function execute(CreatePostData $data): Post
    {
        return DB::transaction(function () use ($data) {
            $post = $this->repository->create($data->toArray());

            if ($data->categories) {
                $post->categories()->sync($data->categories);
            }

            event(new PostCreated($post));

            return $post;
        });
    }
}

// ❌ Kötü - Controller'da business logic
public function store(Request $request)
{
    $post = Post::create([...]);
    // 50 satır business logic
}
```

## Event-Driven Architecture

- **Yan etkiler (mail, bildirim, log, dış sistem) Event/Listener ile yapılmalı**
- **Event isimleri geçmiş zaman**: `PostCreated`, `PageUpdated`, `UserRegistered`
- **Ağır işlemler Listener içinde queue'ya verilmeli**

```php
// ✅ İyi - Event kullanımı
class CreatePostAction
{
    public function execute(CreatePostData $data): Post
    {
        $post = Post::create($data->toArray());
        event(new PostCreated($post)); // Event fırlat
        return $post;
    }
}

// Listener'da yan etkiler
class SendPostCreatedNotification implements ShouldQueue
{
    public function handle(PostCreated $event): void
    {
        Mail::to($event->post->author)->send(new PostCreatedMail($event->post));
    }
}

// ❌ Kötü - Controller'da yan etkiler
public function store(Request $request)
{
    $post = Post::create([...]);
    Mail::to($user)->send(...); // Yan etki controller'da
    Log::info(...); // Yan etki controller'da
}
```

## Queue ve Job Best Practices

- **Mail/Notification/3rd party API = queue default**
- **Job'lar retry/backoff/timeout belirlemeli**
- **Idempotency düşünülmeli** (aynı job 2 kez çalışabilir)
- **Failed job handling** eklenmeli

```php
// ✅ İyi - Queue kullanımı
class SendNotificationJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable;

    public $tries = 3;
    public $backoff = [60, 120, 300]; // 1dk, 2dk, 5dk

    public function __construct(
        public Post $post
    ) {}

    public function handle(): void
    {
        Mail::to($this->post->author)->send(new PostPublishedMail($this->post));
    }

    public function failed(Throwable $exception): void
    {
        Log::error('Notification sending failed', [
            'post_id' => $this->post->id,
            'error' => $exception->getMessage(),
        ]);
    }
}

// ❌ Kötü - Senkron çalıştırma
Mail::to($post->author)->send(new PostPublishedMail($post)); // Request'i yavaşlatır
```

## Transaction Kullanımı

- **Birden fazla tabloya yazıyorsa transaction kullan**
- **Transaction içinde event fırlatılabilir** (commit sonrası çalışır)

```php
// ✅ İyi - Transaction kullanımı
DB::transaction(function () {
    $post = Post::create([...]);
    $post->categories()->sync([...]);
    $post->tags()->sync([...]);

    event(new PostCreated($post)); // Commit sonrası çalışır
});

// ❌ Kötü - Transaction yok
$post = Post::create([...]);
$post->categories()->sync([...]); // Hata olursa tutarsızlık
```

## Error Handling

- **Custom exception'lar domain-specific olmalı**
- **Exception'lar render method'u ile response döndürmeli**
- **API için JSON response, web için redirect**

```php
// ✅ İyi - Custom exception
class PostNotFoundException extends Exception
{
    public function render($request)
    {
        if ($request->expectsJson()) {
            return response()->json([
                'success' => false,
                'message' => 'Post not found',
            ], 404);
        }

        return redirect()->route('admin.posts.index')
            ->with('error', 'Post not found');
    }
}

// Kullanım
throw new PostNotFoundException();
```

## Logging Best Practices

- **Structured logging kullan** (context ile)
- **Log channel'ları kullan** (farklı log dosyaları için)
- **Correlation ID ekle** (request tracking için)

```php
// ✅ İyi - Structured logging
Log::info('User registered', [
    'user_id' => $user->id,
    'email' => $user->email,
    'ip' => request()->ip(),
    'correlation_id' => request()->header('X-Correlation-ID'),
]);

// ❌ Kötü - String concatenation
Log::info('User registered: ' . $user->email);
```

## Constants ve Enum Kullanımı

- **Hardcoded string'ler yerine Enum kullan**
- **Status, type, role gibi değerler için Enum kullan**

```php
// ✅ İyi - Enum kullanımı
enum PostStatus: string
{
    case DRAFT = 'draft';
    case PUBLISHED = 'published';
    case ARCHIVED = 'archived';
}

// Model'de
protected function casts(): array
{
    return [
        'status' => PostStatus::class,
    ];
}

// Kullanım
if ($post->status === PostStatus::PUBLISHED) {
    // ...
}

// ❌ Kötü - Hardcoded string
if ($post->status === 'published') {
    // ...
}
```

## Translation ve Internationalization

- **Tüm string'leri translate et**
- **Language dosyalarını kullan**

```php
// ✅ İyi - Translation kullanımı
return back()->with('message', __('Post created successfully'));

// Language dosyasında: lang/tr/messages.php
return [
    'post_created' => 'Yazı başarıyla oluşturuldu',
];

// ❌ Kötü - Hardcoded string
return back()->with('message', 'Post created successfully');
```

## Date Handling

- **Tarihleri datetime cast ile kaydet**
- **Formatlama için accessor kullan**
- **Blade'de Carbon method'ları kullan**

```php
// ✅ İyi - Date handling
// Model'de
protected function casts(): array
{
    return [
        'published_at' => 'datetime',
    ];
}

// Blade'de
{{ $post->published_at->format('d.m.Y') }}
{{ $post->published_at->diffForHumans() }}

// ❌ Kötü - String formatlama
{{ Carbon::createFromFormat('Y-d-m H-i', $post->published_at)->format('d.m.Y') }}
```

## Dependency Injection

- **Constructor injection kullan**
- **Facade kullanımından kaçın** (domain/action code'da)
- **IoC container kullan**, `new Class()` kullanma

```php
// ✅ İyi - Dependency injection
class ProductService
{
    public function __construct(
        private readonly ProductRepository $repository,
        private readonly CacheService $cache
    ) {}
}

// ❌ Kötü - Facade veya new kullanımı
class ProductService
{
    public function create($data)
    {
        $product = new Product(); // Tight coupling
        Cache::put(...); // Facade kullanımı
    }
}
```

## Chunk ve Lazy Loading

- **Büyük veri setleri için chunk kullan**
- **Memory-efficient işlemler için lazy loading kullan**

```php
// ✅ İyi - Chunk kullanımı
Post::chunk(200, function ($posts) {
    foreach ($posts as $post) {
        // İşlem
    }
});

// ✅ İyi - Lazy loading
Post::lazy()->each(function ($post) {
    // İşlem
});

// ❌ Kötü - Tüm veriyi çekme
$posts = Post::all(); // Memory problemi
foreach ($posts as $post) {
    // İşlem
}
```

## API Resource Standartları

- **Tüm API endpoint'leri Resource kullanmalı**
- **whenLoaded ile conditional loading**
- **Tutarlı response formatı**

```php
// ✅ İyi - API Resource
class PostResource extends JsonResource
{
    public function toArray($request): array
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'slug' => $this->slug,
            'category' => new PostCategoryResource($this->whenLoaded('category')),
            'created_at' => $this->created_at->toIso8601String(),
        ];
    }
}

// Kullanım
return response()->json(new PostResource($post), 201);
return response()->json(PostResource::collection($posts));
```

## Configuration Management

- **Runtime'da `env()` kullanma**, `config()` kullan
- **Tüm env değerleri config dosyalarında olmalı**
- **Default değerler config'de belirtilmeli**

```php
// ✅ İyi - Config kullanımı
// config/services.php
return [
    'api_key' => env('API_KEY'),
    'timeout' => env('API_TIMEOUT', 30), // Default değer
];

// Kullanım
$apiKey = config('services.api_key');

// ❌ Kötü - env() kullanımı
$apiKey = env('API_KEY'); // Config cache kırılır
```

## Documentation Standards

- **PHPDoc blokları kullan** (complex logic için)
- **Kod kendini açıklamalı** (anlamlı isimler)
- **Yorum satırları minimal olmalı**

```php
// ✅ İyi - Self-documenting code
public function isInStock(): bool
{
    return $this->stock > 0;
}

// ❌ Kötü - Gereksiz yorum
/**
 * Checks if product is in stock
 * @return bool Returns true if stock is greater than 0
 */
public function isInStock(): bool
{
    return $this->stock > 0; // Stock kontrolü
}
```



# TEST TÜRKÇE STANDARTLARI

## Genel Kural

**Tüm test açıklamaları (`it()` fonksiyonları) Türkçe olmalıdır.**

- ✅ Test açıklamaları anlamlı ve açıklayıcı olmalıdır
- ✅ Feature, Unit ve Browser testleri dahil
- ❌ İngilizce test açıklamaları kullanılmamalıdır

## Örnekler

### ✅ İyi - Türkçe Açıklamalar

```php
it('admin için filtrelerle ürün listeler', function () {
    // test kodu
});

it('kategori oluşturur ve veritabanına kaydeder', function () {
    // test kodu
});

it('ürün detayını ilişkileriyle birlikte gösterir', function () {
    // test kodu
});

it('aktif olmayan ürünleri filtreler', function () {
    // test kodu
});
```

### ❌ Kötü - İngilizce Açıklamalar

```php
it('lists posts with filters for admin', function () {
    // test kodu
});

it('creates a category', function () {
    // test kodu
});

it('shows post detail with relations', function () {
    // test kodu
});
```

## Açıklama Formatı

Test açıklamaları şu formatta olmalıdır:

- **Özne + Fiil + Nesne**: "admin yazı listeler", "sistem kategori oluşturur"
- **Fiil + Nesne**: "yazı oluşturur", "sayfa günceller"
- **Durum belirten**: "yayınlanmış yazıları gösterir", "silinmiş kayıtları filtreler"

## Kapsam

Bu kural şu test dosyaları için geçerlidir:

- `tests/Feature/**/*.php` - Tüm Feature testleri
- `tests/Unit/**/*.php` - Tüm Unit testleri
- `tests/Browser/**/*.php` - Tüm Browser testleri

## Uygulama

Yeni test yazarken veya mevcut testleri güncellerken:

1. `it()` fonksiyonunun ilk parametresi (açıklama) Türkçe olmalıdır
2. Açıklama, testin ne yaptığını net bir şekilde ifade etmelidir
3. Gereksiz kelimeler kullanılmamalıdır
4. Teknik terimler Türkçe karşılıklarıyla yazılmalıdır (örn: "ürün" → "product" değil)

## Özel Durumlar

- API endpoint isimleri İngilizce kalabilir: `it('GET /api/posts endpoint\'i çalışır', ...)`
- Model/Class isimleri İngilizce kalabilir: `it('Post model\'i doğru şekilde kaydedilir', ...)`
- Teknik terimler Türkçeleştirilemezse İngilizce kalabilir: `it('DataTable doğru şekilde render edilir', ...)`

## Kontrol Listesi

Yeni bir test yazarken veya mevcut testi güncellerken:

- [ ] Test açıklaması Türkçe mi?
- [ ] Açıklama anlamlı ve açıklayıcı mı?
- [ ] Gereksiz kelimeler var mı?
- [ ] Teknik terimler uygun şekilde kullanılmış mı?



# LARAVEL ACTION PATTERN – DEFINITIVE RULESET

Bu doküman Action vs Service tartışmasını bitirir ve Cursor'un otomatik doğru sınıf üretmesini sağlar.

## 1️⃣ Action vs Service Karar Tablosu

| Kriter                          | Action              | Service                  |
| - | - |  |
| Temel amaç                      | Use-case / iş akışı | Ortak iş kuralı          |
| Sorumluluk                      | Orchestration       | Hesaplama / domain logic |
| Birden fazla adım               | ✅                  | ❌                       |
| Transaction açar mı             | ✅                  | ❌                       |
| Event / Job tetikler mi         | ✅                  | ❌                       |
| Birden fazla Service çağırır mı | ✅                  | ❌                       |
| Tek başına DB write yapar mı    | ✅                  | ⚠️ (tercihen hayır)      |
| Controller'dan çağrılır mı      | ✅                  | ❌                       |
| Başka Action'lardan çağrılır mı | ❌                  | ✅                       |
| HTTP bağımlılığı                | ❌                  | ❌                       |

## Net Karar Kuralları

### Action Yaz

- "Bir şey oluyor" hissi varsa
- İş adım adım ilerliyorsa
- Transaction gerekiyorsa
- Event / Notification / Job tetikleniyorsa
- Aynı işlem API + Job + Command'dan çağrılacaksa

### Service Yaz

- Hesaplama yapıyorsa
- Kurallar içeriyorsa
- Birden fazla Action tarafından kullanılıyorsa
- "Nasıl" sorusuna cevap veriyorsa

> **Kural:**  
> Action = **Ne oluyor?**  
> Service = **Nasıl oluyor?**

## Anti-Pattern Alarmı 🚨

❌ `PostService` içinde:

- create
- update
- delete
- publish
- unpublish
- notify

varsa → **Mimari çöp.**

Bunu şöyle parçala:

- CreatePostAction
- UpdatePostAction
- PublishPostAction

* SlugService
* ContentService

## 2️⃣ Action Template Şablonu

```php
<?php

declare(strict_types=1);

namespace App\Actions\{Domain};

use Illuminate\Support\Facades\DB;

final class {ActionName}Action
{
    public function __construct(
        // Service bağımlılıkları burada
    ) {}

    public function handle(array $data)
    {
        return DB::transaction(function () use ($data) {

            /**
             * ❌ Validation YOK
             * ❌ Authorization YOK
             * ❌ HTTP nesnesi YOK
             */

            // 1. Domain write
            // 2. Service çağrıları
            // 3. Event / Job / Notification
            // 4. Return
        });
    }
}
```

## 3️⃣ Action Dosya Yapısı

```
app/Actions/
├── Blog/
│   ├── CreatePostAction.php
│   ├── UpdatePostAction.php
│   └── PublishPostAction.php
├── Cms/
│   ├── CreatePageAction.php
│   └── UpdatePageAction.php
└── Media/
    ├── UploadMediaAction.php
    └── DeleteMediaAction.php
```

## 4️⃣ Naming Kuralları

### Action

- Fiil + Nesne + Action
- Tekil use-case
- Genel isim YASAK

❌ `HandleDataAction`  
❌ `ProcessSomething`  
✅ `CreatePostAction`  
✅ `PublishPostAction`

### Service

- Nesne + Service / Calculator / Resolver
- Fiil içermez

✅ `SlugService`  
✅ `ContentService`  
✅ `MediaService`

## 5️⃣ Transaction Kuralı (KIRMIZI ÇİZGİ)

- **Birden fazla write → Action transaction açar**
- **Service transaction AÇMAZ**
- **Controller transaction AÇMAZ**

```php
// ✅ İyi - Action transaction açar
class CreatePostAction
{
    public function handle(array $data): Post
    {
        return DB::transaction(function () use ($data) {
            $post = Post::create([...]);
            $post->categories()->sync([...]);
            event(new PostCreated($post));
            return $post;
        });
    }
}

// ❌ Kötü - Service transaction açmaz
class PostService
{
    public function create(array $data): Post
    {
        return DB::transaction(function () use ($data) {
            // Service transaction açmaz!
        });
    }
}
```

## 6️⃣ Event / Job Kuralı

- **Event Action'dan fırlatılır**
- **Listener / Job iş yapar**
- **Action async iş yapmaz**

```php
// ✅ İyi - Action event fırlatır
class CreatePostAction
{
    public function handle(array $data): Post
    {
        $post = Post::create([...]);
        event(new PostCreated($post)); // Event fırlat
        return $post;
    }
}

// ❌ Kötü - Service event fırlatmaz
class PostService
{
    public function create(array $data): Post
    {
        $post = Post::create([...]);
        event(new PostCreated($post)); // Service event fırlatmaz!
        return $post;
    }
}
```

## 7️⃣ Controller Kullanımı (İNCE OLACAK)

```php
// ✅ İyi - Controller Action çağırır
public function store(StorePostRequest $request, CreatePostAction $action)
{
    $post = $action->handle($request->validated());
    return new PostResource($post);
}

// ❌ Kötü - Controller Service çağırır (karmaşık iş için)
public function store(StorePostRequest $request, PostService $service)
{
    $post = $service->createWithRelations([...]); // Karmaşık iş Service'de
    return new PostResource($post);
}
```

**Controller:**

- Request alır
- Action çağırır
- Response döner
- Başka bir şey YAPMAZ

## 8️⃣ Action İçinde OLMAMASI Gerekenler

- Request / Response nesneleri
- HTTP status code
- JSON formatlama
- `Auth::user()` çağrıları (parametre olarak ver)
- Validation kuralları

## 9️⃣ Test Stratejisi

### Action Testi

- HTTP YOK
- Middleware YOK
- Event fake'lenir

```php
it('yazı oluşturur ve event fırlatır', function () {
    Event::fake();

    $action = new CreatePostAction();
    $post = $action->handle($data);

    Event::assertDispatched(PostCreated::class);
    expect($post)->toBeInstanceOf(Post::class);
});
```

### Controller Testleri

- Sadece request + response doğrular
- İş mantığı test ETMEZ

## 🔟 Over-Engineering Koruması

Aşağıdakilerden **en az 2 tanesi** doğruysa Action yaz:

- [ ] Birden fazla adım var
- [ ] Transaction gerekiyor
- [ ] Event / Job var
- [ ] Aynı iş başka yerden çağrılacak
- [ ] Controller şişiyor

**Aksi halde:**

- ❌ Action yazma
- ❌ Dosya çöplüğü oluşturma

## 1️⃣1️⃣ Nihai Kural (Özet)

- **Controller = HTTP**
- **Action = Use-case**
- **Service = Kural**
- **Model = Veri**
- **Event/Job = Side-effect**

Bu sınırlar **DELİNMEZ**.

## 1️⃣2️⃣ Son Uyarı ⚠️

Action:

- Küçük projede opsiyonel
- Orta–büyük projede zorunlu
- Yanlış kullanılırsa mimariyi BATIRIR
- Doğru kullanılırsa projeyi 5 yıl taşır



# SHOW VIEW STANDARTLARI

## Genel Kural

**Tüm admin show view dosyaları aynı yapı ve standartları kullanmalıdır.**

Show view'ları, bir model'in detay bilgilerini ve ilişkili verilerini göstermek için kullanılır.

## Standart Yapı

```blade
@extends('admin.layouts.app')

@section('title', '{Model} Detay')

@push('styles')
    {{-- Cork CSS asset'leri --}}
    <link href="{{ asset('cork/src/plugins/...') }}" rel="stylesheet" />
@endpush

@section('content')
    {{-- Breadcrumb --}}
    <div class="page-meta">
        <nav class="breadcrumb-style-one" aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Panel</a></li>
                <li class="breadcrumb-item"><a href="{{ route('admin.{module}.index') }}">{Module}</a></li>
                <li class="breadcrumb-item active" aria-current="page">Detay</li>
            </ol>
        </nav>
    </div>

    <div class="row layout-top-spacing">
        {{-- Model Bilgileri --}}
        <div class="col-xl-8 col-lg-8 col-sm-12 layout-spacing">
            <div class="widget-content widget-content-area br-8 p-4">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h4 class="mb-0">{Model} Bilgileri</h4>
                    <div>
                        <a href="{{ route('admin.{module}.edit', $model) }}" class="btn btn-primary">Düzenle</a>
                        <a href="{{ route('admin.{module}.index') }}" class="btn btn-secondary">Geri Dön</a>
                    </div>
                </div>
                {{-- Model bilgileri burada --}}
            </div>
        </div>

        {{-- İlişkili Veriler veya Ek Bilgiler --}}
        <div class="col-xl-4 col-lg-4 col-sm-12 layout-spacing">
            <div class="widget-content widget-content-area br-8 p-4">
                <h4 class="mb-4">Ek Bilgiler</h4>
                {{-- İlişkili veriler veya ek bilgiler burada --}}
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    {{-- Cork JS asset'leri --}}
    <script src="{{ asset('cork/src/plugins/...') }}"></script>
@endpush
```

## Bölümler

### 1. Breadcrumb Navigation

Her show view'da breadcrumb olmalı:

- Panel → {Module} Listesi → Detay

```blade
<div class="page-meta">
    <nav class="breadcrumb-style-one" aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Panel</a></li>
            <li class="breadcrumb-item"><a href="{{ route('admin.{module}.index') }}">{Module}</a></li>
            <li class="breadcrumb-item active" aria-current="page">Detay</li>
        </ol>
    </nav>
</div>
```

### 2. Model Bilgileri

Model bilgileri card yapısında gösterilir:

```blade
<div class="widget-content widget-content-area br-8 p-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h4 class="mb-0">{Model} Bilgileri</h4>
        <div>
            <a href="{{ route('admin.{module}.edit', $model) }}" class="btn btn-primary">Düzenle</a>
            <a href="{{ route('admin.{module}.index') }}" class="btn btn-secondary">Geri Dön</a>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <p>
                <strong>ID:</strong>
                {{ $model->id }}
            </p>
            <p>
                <strong>Ad:</strong>
                {{ $model->name }}
            </p>
        </div>
        <div class="col-md-6">
            <p>
                <strong>Durum:</strong>
                <span class="badge badge-{{ $model->is_active ? 'success' : 'danger' }}">
                    {{ $model->is_active ? 'Aktif' : 'Pasif' }}
                </span>
            </p>
            <p>
                <strong>Oluşturulma:</strong>
                {{ $model->created_at->format('d.m.Y H:i') }}
            </p>
        </div>
    </div>
</div>
```

### 3. İlişkili Veriler

İlişkili veriler (hasMany, belongsTo, manyToMany) gösterilir:

#### HasMany İlişkileri (DataTable ile)

```blade
<div class="widget-content widget-content-area br-8 p-4">
    <h4 class="mb-4">İlişkili Veriler</h4>
    <div class="table-responsive">
        <table id="related-table" class="table table-hover" style="width: 100%">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Ad</th>
                    <th>İşlemler</th>
                </tr>
            </thead>
            <tbody>
                <!-- DataTable ile doldurulacak -->
            </tbody>
        </table>
    </div>
</div>
```

#### BelongsTo İlişkileri

```blade
<div class="widget-content widget-content-area br-8 p-4">
    <h4 class="mb-4">İlişkili Veri</h4>
    <p>
        <strong>Kategori:</strong>
        <a href="{{ route('admin.categories.show', $model->category) }}">
            {{ $model->category->name }}
        </a>
    </p>
</div>
```

### 4. Action Butonları

Her show view'da şu butonlar olmalı:

- **Düzenle**: `route('admin.{module}.edit', $model)`
- **Geri Dön**: `route('admin.{module}.index')`
- **Sil**: Form ile DELETE request (isteğe bağlı)

```blade
<div class="d-flex justify-content-between align-items-center mb-4">
    <h4 class="mb-0">{Model} Bilgileri</h4>
    <div>
        <a href="{{ route('admin.{module}.edit', $model) }}" class="btn btn-primary">
            <svg>...</svg>
            Düzenle
        </a>
        <a href="{{ route('admin.{module}.index') }}" class="btn btn-secondary">
            <svg>...</svg>
            Geri Dön
        </a>
    </div>
</div>
```

## Cork Template Kullanımı

### Widget Yapısı

Tüm içerik `widget-content widget-content-area br-8 p-4` class'ları ile sarılmalı:

```blade
<div class="widget-content widget-content-area br-8 p-4">
    {{-- İçerik --}}
</div>
```

### Responsive Tasarım

- Ana içerik: `col-xl-8 col-lg-8 col-sm-12`
- Yan panel: `col-xl-4 col-lg-4 col-sm-12`
- Mobilde tek sütun: `col-sm-12`

## DataTable Kullanımı

İlişkili veriler için DataTable kullanılır:

```blade
@push('scripts')
    <script src="{{ asset('cork/src/plugins/src/table/datatable/datatables.js') }}"></script>
    <script>
        $('#related-table').DataTable({
            processing: true,
            serverSide: true,
            ajax: '{{ route('admin.{module}.related', $model) }}',
            columns: [
                { data: 'id', name: 'id' },
                { data: 'name', name: 'name' },
                { data: 'actions', name: 'actions', orderable: false, searchable: false },
            ],
        })
    </script>
@endpush
```

## Örnek: Post Show View

```blade
@extends('admin.layouts.app')

@section('title', 'Yazı Detay')

@section('content')
    <div class="page-meta">
        <nav class="breadcrumb-style-one" aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Panel</a></li>
                <li class="breadcrumb-item"><a href="{{ route('admin.posts.index') }}">Yazılar</a></li>
                <li class="breadcrumb-item active" aria-current="page">Detay</li>
            </ol>
        </nav>
    </div>

    <div class="row layout-top-spacing">
        <div class="col-xl-8 col-lg-8 col-sm-12 layout-spacing">
            <div class="widget-content widget-content-area br-8 p-4">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h4 class="mb-0">{{ $post->title }}</h4>
                    <div>
                        <a href="{{ route('admin.posts.edit', $post) }}" class="btn btn-primary">Düzenle</a>
                        <a href="{{ route('admin.posts.index') }}" class="btn btn-secondary">Geri Dön</a>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <p>
                            <strong>ID:</strong>
                            {{ $post->id }}
                        </p>
                        <p>
                            <strong>Slug:</strong>
                            {{ $post->slug }}
                        </p>
                        <p>
                            <strong>Durum:</strong>
                            <span class="badge badge-{{ $post->status === 'published' ? 'success' : 'warning' }}">
                                {{ $post->status === 'published' ? 'Yayında' : 'Taslak' }}
                            </span>
                        </p>
                    </div>
                    <div class="col-md-6">
                        <p>
                            <strong>Oluşturulma:</strong>
                            {{ $post->created_at->format('d.m.Y H:i') }}
                        </p>
                        <p>
                            <strong>Yayınlanma:</strong>
                            {{ $post->published_at ? $post->published_at->format('d.m.Y H:i') : '-' }}
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-4 col-lg-4 col-sm-12 layout-spacing">
            <div class="widget-content widget-content-area br-8 p-4">
                <h4 class="mb-4">Kategoriler</h4>
                @foreach ($post->categories as $category)
                    <p><a href="{{ route('admin.post-categories.show', $category) }}">{{ $category->name }}</a></p>
                @endforeach
            </div>
        </div>
    </div>
@endsection
```

## Kontrol Listesi

Yeni bir show view oluştururken:

- [ ] Breadcrumb navigation var mı?
- [ ] Model bilgileri card yapısında mı?
- [ ] Action butonları (Düzenle, Geri Dön) var mı?
- [ ] İlişkili veriler gösteriliyor mu?
- [ ] Cork template widget yapısı kullanılıyor mu?
- [ ] Responsive tasarım uygulanmış mı?
- [ ] DataTable kullanılıyor mu? (gerekirse)



# MODÜL BAZLI KLASÖRLEME KURALLARI

## Genel Kural

**Her modül kendi klasörü altında tüm dosyalarını içermelidir.** Modüller tamamen bağımsız olmalı ve kolayca kaldırılabilir olmalıdır.

## Modül Yapısı

Her modül şu klasör yapısına sahip olmalıdır:

```
app/
  Models/{Module}/
    Model1.php
    Model2.php
  Controllers/{Module}/
    Admin/Controller1.php
    Api/Controller1.php
  Livewire/{Module}/
    Admin/Component1.php
    Admin/Component2.php
  Services/{Module}/
    Service1.php
  Actions/{Module}/
    CreateAction.php
    UpdateAction.php
  Requests/{Module}/
    StoreRequest.php
    UpdateRequest.php
  Resources/{Module}/
    Resource1.php
  Policies/{Module}/
    Policy1.php
  Events/{Module}/
    Event1.php
  Listeners/{Module}/
    Listener1.php
  Jobs/{Module}/
    Job1.php
  Notifications/{Module}/
    Notification1.php

resources/views/
  livewire/{module}/
    admin/
      component1.blade.php
      component2.blade.php

database/migrations/
  {module}/
    2025_01_01_000000_create_table1.php
    2025_01_01_000001_create_table2.php

tests/Feature/{Module}/
    Test1.php
    Test2.php

tests/Unit/{Module}/
    Test1.php
```

## Örnek: Blog Modülü

```
app/
  Models/Blog/
    Post.php
    PostCategory.php
    PostTag.php
  Controllers/Blog/
    Admin/PostController.php
    Api/PostController.php
  Livewire/Blog/
    Admin/PostIndex.php
    Admin/PostForm.php
    Admin/PostCategoryIndex.php
    Admin/PostCategoryForm.php
  Services/Blog/
    PostService.php
    PostCategoryService.php
  Actions/Blog/
    CreatePostAction.php
    UpdatePostAction.php
    CreatePostCategoryAction.php
  Requests/Blog/
    StorePostRequest.php
    UpdatePostRequest.php
    StorePostCategoryRequest.php
  Resources/Blog/
    PostResource.php
    PostCategoryResource.php
  Policies/Blog/
    PostPolicy.php
  Events/Blog/
    PostCreated.php
    PostUpdated.php
  Listeners/Blog/
    SendPostNotification.php
  Jobs/Blog/
    PublishPostJob.php
  Notifications/Blog/
    PostPublishedNotification.php

resources/views/
  livewire/blog/
    admin/
      post-index.blade.php
      post-form.blade.php
      post-category-index.blade.php
      post-category-form.blade.php

database/migrations/
  blog/
    2025_01_01_000000_create_posts_table.php
    2025_01_01_000001_create_post_categories_table.php
    2025_01_01_000002_create_post_tags_table.php

tests/Feature/Blog/
    PostTest.php
    PostCategoryTest.php

tests/Unit/Blog/
    PostServiceTest.php
    CreatePostActionTest.php
```

## Modül İsimlendirme

- Modül isimleri **PascalCase** olmalı: `Blog`, `Cms`, `Crm`, `Settings`
- View klasörleri **küçük harf** olmalı: `blog`, `cms`, `crm`, `settings`
- Migration klasörleri **küçük harf** olmalı: `blog`, `cms`, `crm`, `settings`

## Modül Bağımlılıkları

- Modüller birbirini **direkt import etmemeli**
- Modüller arası iletişim **interface/contract** üzerinden olmalı
- Modüller arası iletişim için **Event'ler** kullanılmalı
- **Shared/Common** klasörü yok - her şey modül içinde

## Modül ServiceProvider

Her modülün ServiceProvider'ı `app/Providers/Domains/{Module}ServiceProvider.php` konumunda olmalı:

```php
<?php

namespace App\Providers\Domains;

use App\Contracts\Blog\PostRepositoryInterface;
use App\Repositories\Blog\PostRepository;
use Illuminate\Support\Facades\Event;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;

class BlogServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->bind(
            PostRepositoryInterface::class,
            PostRepository::class
        );
    }

    public function boot(): void
    {
        Gate::policy(
            \App\Models\Blog\Post::class,
            \App\Policies\Blog\PostPolicy::class
        );

        Event::listen(
            \App\Events\Blog\PostCreated::class,
            \App\Listeners\Blog\SendPostNotification::class
        );
    }
}
```

## Modül Route'ları

Route'lar merkezi route dosyalarında tanımlanmalı (`routes/web.php`, `routes/api.php`):

```php
// routes/web.php
if (config('modules.enabled.blog', true)) {
    Route::prefix('admin/blog')->middleware(['web', 'auth', 'admin'])->group(function (): void {
        Route::get('/posts', [\App\Livewire\Blog\Admin\PostIndex::class])->name('admin.blog.posts.index');
        Route::get('/posts/create', [\App\Livewire\Blog\Admin\PostForm::class])->name('admin.blog.posts.create');
        Route::get('/posts/{post}/edit', [\App\Livewire\Blog\Admin\PostForm::class])->name('admin.blog.posts.edit');
    });
}
```

## Modül Migration'ları

Migration'lar modül klasörü altında olmalı:

```
database/migrations/blog/
  2025_01_01_000000_create_posts_table.php
  2025_01_01_000001_create_post_categories_table.php
```

Migration path'leri `config/modules.php` veya özel bir service provider ile yapılandırılmalı.

## Modül Test'leri

Test'ler modül klasörü altında olmalı:

```
tests/Feature/Blog/
    PostTest.php
    PostCategoryTest.php

tests/Unit/Blog/
    PostServiceTest.php
    CreatePostActionTest.php
```

## Modül Silme

Bir modülü silmek için `php artisan module:remove {module}` komutu kullanılmalı. Bu komut:

1. Modülün tüm dosyalarını siler
2. Migration dosyası oluşturur (modül tablolarını silmek için)
3. `config/modules.php` dosyasından modülü kaldırır
4. Route'lardan modül route'larını kaldırır
5. ServiceProvider'ı siler

## Önemli Notlar

- **Her modül bağımsız olmalı**: Modüller birbirini direkt import etmemeli
- **Interface-based communication**: Modüller arası iletişim interface üzerinden olmalı
- **Event-driven**: Modüller arası iletişim için Event'ler kullanılmalı
- **Modül klasörleri sadece business logic**: Modül klasörlerinde routes.php ve Providers/ klasörü olmamalı (ServiceProvider `app/Providers/Domains/` altında)
- **Route'lar merkezi**: Route'lar `routes/web.php` ve `routes/api.php` dosyalarında tanımlanmalı



# MARYUI DOCUMENTATION REFERENCE

## Official Documentation

**ALWAYS refer to the official MaryUI documentation when working with MaryUI components:**

- **Main Docs:** https://mary-ui.com/docs
- **Installation:** https://mary-ui.com/docs/installation
- **Bootcamp:** https://mary-ui.com/bootcamp
- **Customizing:** https://mary-ui.com/docs/customizing
- **Upgrading:** https://mary-ui.com/docs/upgrading

## Key Principles

1. **MaryUI does NOT ship custom CSS** - it relies on daisyUI and Tailwind for styling
2. **Do NOT write custom CSS** for MaryUI components - use daisyUI and Tailwind classes instead
3. **Customize styles** by inline overriding daisyUI and Tailwind CSS classes
4. **For style reference** see daisyUI and Tailwind documentation
5. **Pro tip:** Stick to the defaults, avoid to tweak things. DaisyUI themes are carefully hand crafted with all UX/UI things in mind.

## Installation

### Automatic Install

```bash
composer require robsontenorio/mary
php artisan mary:install
yarn dev  # or `npm run dev`
```

### Tailwind 4 Setup (app.css)

```css
/* Tailwind */
@import 'tailwindcss';

/* daisyUI */
@plugin "daisyui" {
    themes:
        light --default,
        dark --prefersdark;
}

/* maryUI */
@source "../../vendor/robsontenorio/mary/src/View/Components/**/*.php";

/* Dark theme variant support */
@custom-variant dark (&:where(.dark, .dark *));

/* Laravel 12 defaults */
@source "../../vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php";
@source "../../storage/framework/views/*.php";
@source "../**/*.blade.php";
@source "../**/*.js";
```

### Vite Config

```javascript
import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import tailwindcss from '@tailwindcss/vite';

export default defineConfig({
    plugins: [
        laravel({...}),
        tailwindcss(),
    ],
});
```

## Component Usage

### Component Prefix

By default, MaryUI components use no prefix:

- `<x-input />`
- `<x-button />`
- `<x-card />`

If using starter kits (Breeze, Jetstream), components use `mary-` prefix:

- `<x-mary-input />`
- `<x-mary-button />`
- `<x-mary-card />`

Check `config/mary.php` for prefix configuration. Clear view cache after renaming:

```bash
php artisan view:clear
```

### Forms Components

- **Input:** `<x-input label="Name" wire:model="name" icon="o-user" />`
- **Textarea:** `<x-textarea label="Description" wire:model="description" />`
- **Select:** `<x-select label="Category" wire:model="category" :options="$categories" />`
- **Checkbox:** `<x-checkbox label="Remember me" wire:model="remember" />`
- **Toggle:** `<x-toggle label="Enable" wire:model="enabled" />`
- **Radio:** `<x-radio label="Option" wire:model="option" />`
- **Datetime:** `<x-datetime label="Date" wire:model="date" />`
- **File Upload:** `<x-file-upload label="File" wire:model="file" />`

### Layout Components

- **Main:** `<x-main>` - Main layout with sidebar and navbar
- **Nav:** `<x-nav>` - Navigation bar
- **Sidebar:** `<x-slot:sidebar>` - Sidebar slot
- **Menu:** `<x-menu>` - Menu component
- **Menu Item:** `<x-menu-item title="Dashboard" icon="o-home" link="/dashboard" />`
- **Menu Sub:** `<x-menu-sub title="Settings" icon="o-cog">...</x-menu-sub>`

### UI Components

- **Button:** `<x-button label="Save" icon="o-check" class="btn-primary" />`
- **Card:** `<x-card shadow><x-slot:title>Title</x-slot></x-card>`
- **Header:** `<x-header title="Page Title" separator progress-indicator />`
- **Badge:** `<x-badge value="New" class="badge-primary" />`
- **Alert:** `<x-alert title="Success" description="Operation completed" icon="o-check-circle" />`
- **Modal:** `<x-modal wire:model="showModal" title="Confirm">...</x-modal>`
- **Drawer:** `<x-drawer wire:model="showDrawer" title="Menu">...</x-drawer>`
- **Toast:** `<x-toast />` - Global toast notifications

### List Data Components

- **Table:** `<x-table :headers="$headers" :rows="$rows" />`
- **List Item:** `<x-list-item :item="$user" value="name" sub-value="email" />`

## Customizing

### Theme Variables (Recommended)

Use daisyUI theming system for global styles:

```css
@plugin "daisyui/theme" {
    name: 'light';
    default: true;
    prefersdark: false;
    color-scheme: light;

    /* Custom styles */
    --radius-field: 2.25rem;
}
```

### Inline Override

Any configuration or CSS provided by daisyUI or Tailwind are valid for maryUI components:

- Customize: https://daisyui.com/docs/customize
- Config: https://daisyui.com/docs/config
- Colors: https://daisyui.com/docs/colors
- Themes: https://daisyui.com/docs/themes

### Input Components Style

In maryUI v2, primary style was removed from all input components. Use defaults or add `primary` class:

```blade
{{-- Default --}}
<x-input label="Input" />
<x-select label="Select" />

{{-- Primary style (if needed) --}}
<x-input label="Input" class="input-primary" />
<x-select label="Select" class="select-primary" />
<x-checkbox label="Checkbox" class="checkbox-primary" />
```

## Upgrading from v1

### Key Changes

1. **Appearance:** Follows daisyUI's design system - more modern look
2. **Tailwind 4:** Some CSS changes required (see Tailwind 4 upgrade guide)
3. **daisyUI 5:** Small changes, check daisyUI changelog
4. **Theme Toggle:** Tailwind 4 way (see Theme Toggle section)
5. **Input Components:** Primary style removed, use defaults or add `primary` class

### Upgrade Steps

1. Upgrade to Laravel 12 (optional)
2. Install maryUI v2: `composer require robsontenorio/mary:^2.0`
3. Clear view cache: `php artisan view:clear`
4. Adjust JS dependencies (remove tailwind.config.js, postcss.config.js)
5. Update vite.config.js (add tailwindcss plugin)
6. Update app.css (Tailwind 4 setup)

## Troubleshooting

### UI Glitches

- Try removing `@tailwindcss/forms` plugin
- Check daisyUI and Tailwind versions compatibility
- Refer to MaryUI Bootcamp for examples
- Check Tailwind 4 upgrade guide if using Tailwind 4

### Icon Alignment Issues

- MaryUI handles icon alignment internally via daisyUI/Tailwind
- Do NOT add custom CSS for icon alignment
- If issues occur, check MaryUI version and daisyUI compatibility
- Use daisyUI/Tailwind classes for inline overrides if needed

### Theme Issues

- Ensure `@plugin "daisyui"` is correctly configured in app.css
- Check `data-theme` attribute is set on `<html>` or `<body>`
- Verify dark variant support: `@custom-variant dark (&:where(.dark, .dark *));`

## Complete Documentation

### Installation

This package **does not ship any custom CSS** and relies on **daisyUI and Tailwind** for out-of-box styling. You can customize most of the components' styles, by inline overriding daisyUI and Tailwind CSS classes.

Please, for further styles reference see [daisyUI](https://daisyui.com) and [Tailwind](https://tailwindcss.com).

#### Bootcamp

If you prefer a walkthrough guide, go to [maryUI Bootcamp](https://mary-ui.com/bootcamp/01) and get amazed how much you can do with minimal effort.

#### Automatic Install

After installing make sure to check the [Layout](https://mary-ui.com/docs/layout) and [Sidebar](https://mary-ui.com/docs/sidebar) docs.

```bash
composer require robsontenorio/mary
php artisan mary:install
```

Then, start the dev server.

```bash
yarn dev   # or `npm run dev`
```

**You are done!**

#### Renaming Components

If for some reason you need to rename maryUI components using a custom prefix, publish the config file.

```bash
php artisan vendor:publish --tag mary.config
```

```php
return [
    /**
     * Default is empty.
     *    'prefix' => ''
     *              <x-button />
     *              <x-card />
     *
     * Renaming all components:
     *    'prefix' => 'mary-'
     *               <x-mary-button />
     *               <x-mary-card />
     */
    'prefix' => ''
];
```

Make sure to clear view cache after renaming.

```bash
php artisan view:clear
```

#### Starter Kits

If you are facing some UI glitches, try to remove `@tailwindcss/forms` plugin.

For existing projects that uses **starter kits** (Breeze, Jetstream and FluxUI), the installer will publish `config/mary.php` with a global prefix on maryUI components to avoid name collision.

So, you need to use components like this: `x-mary-button`, `x-mary-card`, `x-mary-icon` ...

The maryUI components provides a great DX that probably you may want to use its components instead.

**Breeze:**

```blade
<div>
    <x-input-label for="name" :value="__('Name')" />
    <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
    <x-input-error :messages="$errors->get('name')" class="mt-2" />
</div>
```

**Jetstream:**

```blade
<div>
    <x-label for="name" value="{{ __('Name') }}" />
    <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
</div>
```

**maryUI:**

```blade
<x-mary-input label="Name" wire:model="name" />
```

Still not convinced?

Go to the [Bootcamp](https://mary-ui.com/bootcamp/01) and get amazed how much you can do with minimal effort, from the ground with no starter kits.

### Input Component

#### Basic Usage

```blade
<x-input label="Name" wire:model="name" placeholder="Your name" icon="o-user" hint="Your full name" />
<x-input label="Right icon" wire:model="address" icon-right="o-map-pin" />
<x-input label="Clearable" wire:model="name" placeholder="Clearable field" clearable />
<x-input label="Prefix & Suffix" wire:model="name" prefix="www" suffix=".com" />
<x-input label="Inline label" wire:model="name" placeholder="Hey, inline..." inline />
```

#### States

```blade
<x-input label="Disabled" value="It is disabled" disabled />
<x-input label="Read only" value="Read only" readonly />
```

#### Popover

```blade
<x-input label="Name" wire:model="name" popover="Hey" />
<x-input label="Name" wire:model="name" popover="Hello" popover-icon="o-information-circle" />
```

#### Password Component

All above attributes will work with the password component.

```blade
<x-password label="Toggle" hint="It toggles visibility" wire:model="password" clearable />
<x-password label="Right toggle" wire:model="password" right />
<x-password label="Custom icons" wire:model="password" password-icon="o-lock-closed" password-visible-icon="o-lock-open" />
<x-password label="Without toggle" wire:model="password" only-password inline />
```

#### Currency

For currency input, you need to include the currency library in your `<head>`:

```blade
{{-- Currency --}}
<script type="text/javascript" src="https://cdn.jsdelivr.net/gh/robsontenorio/mary@0.44.2/libs/currency/currency.js"></script>
```

```blade
<x-input label="Default money" wire:model="money1" prefix="USD" money />
{{-- Notice that `locale` accepts any valid locale --}}
<x-input label="Custom money" wire:model="money2" prefix="R$" locale="pt-BR" money />
```

#### Slots

You can prepend or append elements to the input:

```blade
<x-input label="Prepend a select">
    <x-slot:prepend>
        {{-- Add `join-item` to all prepended elements --}}
        <x-select icon="o-user" :options="$users" class="join-item bg-base-200" />
    </x-slot>
</x-input>

<x-input label="Append a button">
    <x-slot:append>
        {{-- Add `join-item` to all appended elements --}}
        <x-button label="I am a button" class="join-item btn-primary" />
    </x-slot>
</x-input>
```

### Component Documentation Links

**Note:** All component documentation is available at `https://mary-ui.com/docs/components/{component-name}`

#### Forms Components

- **Input:** See Input Component section above

**Note:** See detailed documentation for Form, Select, Checkbox, Toggle and Textarea below.

##### Form

**Basic Usage:**

```blade
<x-form wire:submit="save">
    <x-input label="Name" wire:model="name" />
    <x-input label="Email" wire:model="email" />
    <x-slot:actions>
        <x-button label="Cancel" @click="$wire.showModal = false" />
        <x-button label="Save" type="submit" class="btn-primary" />
    </x-slot>
</x-form>
```

**No Separator:**

```blade
<x-form wire:submit="save" no-separator>
    <x-input label="Name" wire:model="name" />
    <x-slot:actions>
        <x-button label="Save" type="submit" class="btn-primary" />
    </x-slot>
</x-form>
```

**With Separator:**

```blade
<x-form wire:submit="save" separator>
    <x-input label="Name" wire:model="name" />
    <x-slot:actions>
        <x-button label="Save" type="submit" class="btn-primary" />
    </x-slot>
</x-form>
```

##### Select

This component is intended to be used as a simple native HTML value selection. It renders nice on all devices.

If you need a rich selection value interface or async search check the **Choices** component.

**Basic Usage:**

By default, it will look up for:

- `$object->id` for option value.
- `$object->name` for option display label.

```blade
<x-select label="Master user" wire:model="selectedUser" :options="$users" icon="o-user" />
<x-select label="Right icon" wire:model="selectedUser" :options="$users" icon-right="o-user" />
<x-select label="Prefix" wire:model="selectedUser" :options="$users" prefix="Hey" hint="Hey ho!" />
<x-select label="Inline label" wire:model="selectedUser" icon="o-user" :options="$users" inline />
```

**Alternative Attributes:**

Just set `option-value` and `option-label` representing the desired targets.

```blade
<x-select label="Alternative" wire:model="selectedUser2" :options="$users" option-value="custom_key" option-label="other_name" />
```

**Placeholder:**

```blade
<x-select label="Users" wire:model="selectedUser2" :options="$users" placeholder="Select a user" placeholder-value="0" {{-- Set a value for placeholder. Default is `null` --}} />
```

**States:**

Notice that browser standards does not support "readonly".

```blade
<x-select label="Disabled" :options="$users" wire:model="selectedUser" disabled />
```

**Disabled Options:**

```php
@php
$users = [
    ['id' => 1, 'name' => 'Joe'],
    ['id' => 2,'name' => 'Mary','disabled' => true] // <-- this
];
@endphp

<x-select label="Disabled options" :options="$users" wire:model="selectedUser3" />
```

**Group:**

This component uses the native HTML grouped select.

```php
@php
$grouped = [
    'Admins' => [
        ['id' => 1, 'name' => 'Mary'],
        ['id' => 2, 'name' => 'Giovanna'],
        ['id' => 3, 'name' => 'Marina']
    ],
    'Users' => [
        ['id' => 4, 'name' => 'John'],
        ['id' => 5, 'name' => 'Doe'],
        ['id' => 6, 'name' => 'Jane']
    ],
];
@endphp

<x-select-group label="Group Select" :options="$grouped" wire:model="selectedUser" />
```

**Slots:**

You can **append or prepend** anything like this. Make sure to use appropriated css round class on left or right.

```blade
<x-select label="Slots" :options="$users" single>
    <x-slot:prepend>
        {{-- Add `join-item` to all prepended elements --}}
        <x-button icon="o-trash" class="join-item" />
    </x-slot>
    <x-slot:append>
        {{-- Add `join-item` to all appended elements --}}
        <x-button label="Create" icon="o-plus" class="join-item btn-primary" />
    </x-slot>
</x-select>
```

##### Checkbox

**Basic Usage:**

```blade
<x-checkbox label="Left" wire:model="item1" />
<x-checkbox label="Left" wire:model="item1" hint="You agree with terms" />
<x-checkbox label="Right" wire:model="item2" right />
<x-checkbox label="Right" wire:model="item2" hint="You agree with terms" right />
```

**Custom Label Slot:**

```blade
<x-checkbox wire:model="item4" class="self-start">
    <x-slot:label>
        This is
        <br />
        a very
        <br />
        long line.
    </x-slot>
</x-checkbox>
```

##### Toggle

**Basic Usage:**

```blade
<x-toggle label="Enable notifications" wire:model="notifications" />
<x-toggle label="Right" wire:model="enabled" right />
<x-toggle label="With hint" wire:model="enabled" hint="Enable this feature" />
```

**States:**

```blade
<x-toggle label="Disabled" wire:model="enabled" disabled />
<x-toggle label="Checked disabled" wire:model="enabled" checked disabled />
```

##### Textarea

**Basic Usage:**

```blade
<x-textarea label="Description" wire:model="description" />
<x-textarea label="With hint" wire:model="description" hint="Enter a detailed description" />
<x-textarea label="Inline label" wire:model="description" inline />
```

**States:**

```blade
<x-textarea label="Disabled" value="It is disabled" disabled />
<x-textarea label="Read only" value="Read only" readonly />
```

**Rows:**

```blade
<x-textarea label="Custom rows" wire:model="description" rows="10" />
```

##### Group

If you need a classic radio check the **Radio** component.

**Default attributes:**

By default, it will look up for:

- `$object->id` for option value.
- `$object->name` for option display label.

```blade
<x-group label="Select one" wire:model="selectedUser" :options="$users" hint="Pick one" />
```

**Alternative attributes:**

Just set `option-value` and `option-label` representing the desired targets.

```blade
<x-group label="Select one" :options="$users" wire:model="selectedUser2" option-value="custom_key" option-label="other_name" class="[&:checked]:!btn-primary btn-sm" />
```

**Disable options:**

You can disable options by setting the `disabled` attribute.

```php
@php
$users = [
    ['id' => 1, 'name' => 'John'],
    ['id' => 2, 'name' => 'Doe'],
    ['id' => 3, 'name' => 'Mary', 'disabled' => true], // <-- This
    ['id' => 4, 'name' => 'Kate'],
];
@endphp

<x-group label="Select one" wire:model="selectedUser3" :options="$users" />
```

##### Radio

Alternatively check the **Group** component.

**Default attributes:**

By default, it will look up for:

- `$object->id` for option value.
- `$object->name` for option display label.

```blade
<x-radio label="Select one" wire:model="user1" :options="$users" />
<x-radio label="Select one inline" wire:model="user2" :options="$users" inline />
```

**Hint:**

```php
@php
$users = [
    ['id' => 1 , 'name' => 'Administrator', 'hint' => 'Can do anything.' ],
    ['id' => 2 , 'name' => 'Editor', 'hint' => 'Can not delete.' ],
];
@endphp

<x-radio label="Select one option" wire:model="user3" :options="$users" />
<x-radio label="Select one option" wire:model="user4" :options="$users" inline />
```

**Alternative attributes:**

Just set `option-value` and `option-label` representing the desired targets.

```php
@php
$users = [
    ['custom_key' => 's134' , 'other_name' => 'Mary', 'my_hint' => 'I am Mary' ],
    ['custom_key' => 'f782' , 'other_name' => 'Joe', 'my_hint' => 'I am Joe' ],
];
@endphp

<x-radio
    label="Select one"
    :options="$users"
    wire:model="user5"
    option-value="custom_key"
    option-label="other_name"
    option-hint="my_hint"
/>
```

**Disable options:**

You can disable options by setting the `disabled` attribute.

```php
@php
$users = [
    ['id' => 1, 'name' => 'John'],
    ['id' => 2, 'name' => 'Doe'],
    ['id' => 3, 'name' => 'Mary', 'disabled' => true],
    ['id' => 4, 'name' => 'Kate'],
];
@endphp

<x-radio label="Select one" :options="$users" wire:model="user6" />
```

##### Color Picker

This component uses the native OS color picker.

```blade
<x-colorpicker wire:model="color1" label="Pick a color" hint="A nice color" />
<x-colorpicker wire:model="color2" label="Icon" icon="o-swatch" />
<x-colorpicker wire:model="color3" label="Suffix" suffix="Hex code" />
<x-colorpicker wire:model="color4" label="Color" placeholder="Inline example" inline />
```

- **Choices:** https://mary-ui.com/docs/components/choices

##### Date Time

**Native HTML:**

If you have no constraints regarding dates' selection, just stick with this approach, which renders nice natively on all devices and covers most of the use cases.

For advanced date picker see the **Date Picker** component.

```blade
<x-datetime label="My date" wire:model="myDate" />
{{-- Notice `type="datetime-local"` --}}
<x-datetime label="Date + Time" wire:model="myDate" type="datetime-local" />
{{-- Notice `type="time"` --}}
<x-datetime label="Time" wire:model="myDate" icon="o-calendar" type="time" inline />
```

##### File Upload

This component is powered by Livewire's file upload, including all features like file size and type validation. Please, **first check Livewire docs** to proper setup file uploads before using this component.

For multiple image upload see **Image Library** component.

**Single file:**

Livewire itself triggers real time validation for single file upload.

```blade
<x-file wire:model="file" label="Receipt" hint="Only PDF" accept="application/pdf" />
```

You can use validation rule from Laravel.

```php
#[Rule('required|max:10')]
public $file;
```

**Multiple files:**

Livewire itself **does not** trigger real time validation for multiple file upload, like single file upload. So, remember to call `$this->validate()` before saving the files.

```blade
<x-file wire:model="photos" label="Documents" multiple />
```

Here is a validation trick for multiple file upload.

```php
#[Rule(['photos' => 'required'])] // A separated rule to make it required
#[Rule(['photos.*' => 'image|max:100'])] // Notice `*` syntax for validate each file
public array $photos = [];
```

**Image preview:**

It only works for single image. For multiple image upload see **Image Library** component.

Use a html `img` as placeholder with the CSS that works best for you. In the following example we use fallback urls to cover scenarios like create or update.

**Click** on image to change it.

```blade
<x-file wire:model="photo" accept="image/png, image/jpeg">
    <img src="{{ $user->avatar ?? '/empty-user.jpg' }}" class="h-40 rounded-lg" />
</x-file>
```

**Image Crop:**

It only works for single image. For multiple image upload see **Image Library** component.

First, add **Cropper.js** library.

```blade
<head>
    ...
    {{-- Cropper.js --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.6.1/cropper.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.6.1/cropper.min.css" />
</head>
```

Now you can use the `crop-after-change` property.

```blade
<x-file wire:model="photo2" accept="image/png" crop-after-change>
    <img src="{{ $user->avatar ?? '/empty-user.jpg' }}" class="h-40 rounded-lg" />
</x-file>
```

You can set or override any **Cropper.js** option.

```php
@php
$config = ['guides' => false];
@endphp

<x-file ... :crop-config="$config">
    ...
</x-file>
```

**Labels:**

Here are all default labels.

```blade
<x-file ... change-text="Change" crop-text="Crop" crop-title-text="Crop image" crop-cancel-text="Cancel" crop-save-text="Crop">...</x-file>
```

##### Image Library

This component manages **multiple image upload** and is powered by Livewire's file upload, including all its features like file validations. It also handles **automatic** storage persistence on **local** and **S3** disks.

For simple use cases, prefer using the **File** component.

**Example:**

```blade
<x-image-library wire:model="files" {{-- Temprary files --}} wire:library="library" {{-- Library metadata property --}} :preview="$library" {{-- Preview control --}} label="Product images" hint="Max 100Kb" />
```

**Setup:**

First, add Cropper.js and Sortable.js.

```blade
<head>
    ...
    {{-- Cropper.js --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.6.1/cropper.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.6.1/cropper.min.css" />

    {{-- Sortable.js --}}
    <script src="https://cdn.jsdelivr.net/npm/sortablejs@1.15.1/Sortable.min.js"></script>
</head>
```

Add a new `json` column on your migration files to represent the image library metadata.

```php
// Users table migration
$table->json('library')->nullable();
```

Cast that column as `AsCollection`.

```php
// User model
protected $casts = [
    ...
    'library' => AsCollection::class,
];
```

**Example:**

The following example considers that you named it as `library` and you are **editing an existing user**.

```php
use Livewire\WithFileUploads;
use Mary\Traits\WithMediaSync;
use Illuminate\Support\Collection;

class extends Component
{
    // Add these Traits
    use WithFileUploads, WithMediaSync;

    // Temporary files
    #[Rule(['files.*' => 'image|max:1024'])]
    public array $files = [];

    // Library metadata (optional validation)
    #[Rule('required')]
    public Collection $library;

    // Editing this user
    public User $user;

    public function mount(): void
    {
        // Load existing library metadata from your model
        $this->library = $this->user->library;

        // Or ... an empty collection if this component creates a user
        // $this->library = new Collection()
    }

    public function save(): void
    {
        // Your stuff ...

        // Sync files and updates library metadata
        $this->syncMedia($this->user);

        // Or ... first create the user, if this component creates a user
        // $user = User::create([...]);
        // $this->syncMedia($user);
    }
}
```

**S3 storage:**

Make sure to proper configure **CDN CORS** on your S3 provider, by listing your local and production environment addresses. Otherwise, cropper won't work.

**Sync options:**

If you are using default variable names described on "Setup" and "Example" topics above, **you are good to go**. Otherwise, here are all options for syncing media on storage.

```php
$this->syncMedia(
    model: $this->user, // A model that has an image library
    library: 'library', // The library metadata property on component
    files: 'files', // Temp files property on component
    storage_subpath: '', // Sub path on storage. Ex: '/users'
    model_field: 'library', // The model column that represents the library metadata
    visibility: 'public' // Visibility on storage
    disk: 'public' // Storage disk. Also works with 's3'
);
```

**Labels:**

Here are all default labels.

```blade
<x-image-library ... change-text="Change" crop-text="Crop" remove-text="Remove" crop-title-text="Crop image" crop-cancel-text="Cancel" crop-save-text="Crop" add-files-text="Add images" />
```

**Cropper settings:**

You can set or override any Cropper.js option.

```php
@php
$config = ['guides' => false];
@endphp

<x-image-library ... :crop-config="$config" />
```

Once **Cropper.js** does not offer an easy way to customize its CSS, just inspect browser console to hack the CSS that works best for you. We are using the following on this page.

```css
.cropper-point {
    width: 10px !important;
    height: 10px !important;
}
```

##### Range Slider

Range slider is used to select a value by sliding a handle.

The following examples uses `.live` to make sure you see the changes.

**Basic:**

```blade
<x-range wire:model.live.debounce="level" label="Select a level" hint="Greater than 10." />
```

```php
#[Rule('required|gt:10')]
public int $level = 10;
```

**Step & Range:**

You can also set the range limits with `min` and `max` attributes. Use the `step` attribute to control the increased value when sliding.

```blade
<x-range wire:model.live.debounce="level2" min="20" max="80" step="10" label="Select a level" hint="Greater than 30." class="range-primary range-xs" />
```

```php
#[Rule('required|gt:30')]
public int $level2 = 30;
```

##### Tags

This component allows to enter any kind of text, without any preset or autocompletion values. It will automatically add the text as a tag when you hit enter.

For complex multiple inputs or preset values see **Choices** component, that also supports online and offline search.

```blade
<x-tags label="Tags" wire:model="tags" icon="o-home" hint="Hit enter" clearable />
```

```php
public array $tags = ['tech', 'gaming', 'art'];
```

#### List Data Components

##### List Item

By default, this will look up for:

- `$object->name` as the main value.
- `$object->avatar` as the picture url.

```blade
@foreach ($users as $user)
    <x-list-item :item="$user" sub-value="username" link="/docs/installation" />
@endforeach
```

**Alternative attributes:**

```blade
{{-- Notice `city.name`. It supports nested properties --}}
<x-list-item :item="$user1" value="other_name" sub-value="city.name" avatar="other_avatar" />
```

**No separator & no hover:**

```blade
<x-list-item :item="$user" no-separator no-hover />
```

**Slots:**

```blade
<x-list-item :item="$user1">
    <x-slot:avatar>
        <x-badge value="top user" class="badge-primary badge-soft" />
    </x-slot>
    <x-slot:value>Custom value</x-slot>
    <x-slot:sub-value>Custom sub-value</x-slot>
    <x-slot:actions>
        <x-button icon="o-trash" class="btn-sm" wire:click="delete(1)" spinner />
    </x-slot>
</x-list-item>
```

##### Table

**Basic Usage:**

```blade
@php
    $headers = [
        ['key' => 'id', 'label' => '#'],
        ['key' => 'name', 'label' => 'Name'],
        ['key' => 'email', 'label' => 'Email'],
    ];

    $rows = [
        ['id' => 1, 'name' => 'John', 'email' => 'john@example.com'],
        ['id' => 2, 'name' => 'Jane', 'email' => 'jane@example.com'],
    ];
@endphp

<x-table :headers="$headers" :rows="$rows" />
```

**With Actions:**

```blade
@php
$headers = [
    ['key' => 'id', 'label' => '#'],
    ['key' => 'name', 'label' => 'Name'],
    ['key' => 'actions', 'label' => 'Actions'],
];

$rows = [
    ['id' => 1, 'name' => 'John'],
    ['id' => 2, 'name' => 'Jane'],
];
@endphp

<x-table :headers="$headers" :rows="$rows">
    <x-slot:actions="{ $row }">
        <x-button label="Edit" @click="$wire.edit({{ $row['id'] }})" />
    </x-slot>
</x-table>
```

**Sortable:**

```blade
@php
    $headers = [
        ['key' => 'id', 'label' => '#', 'sortable' => true],
        ['key' => 'name', 'label' => 'Name', 'sortable' => true],
    ];
@endphp

<x-table :headers="$headers" :rows="$rows" />
```

#### Menus Components

##### Menu

**Basic Usage:**

```blade
<x-menu>
    <x-menu-item title="Dashboard" icon="o-home" link="/dashboard" />
    <x-menu-item title="Users" icon="o-users" link="/users" />
    <x-menu-item title="Settings" icon="o-cog" link="/settings" />
</x-menu>
```

**With Submenu:**

```blade
<x-menu>
    <x-menu-item title="Dashboard" icon="o-home" link="/dashboard" />
    <x-menu-sub title="Settings" icon="o-cog">
        <x-menu-item title="Profile" link="/settings/profile" />
        <x-menu-item title="Security" link="/settings/security" />
    </x-menu-sub>
</x-menu>
```

**Active State:**

```blade
<x-menu>
    <x-menu-item title="Dashboard" icon="o-home" link="/dashboard" active />
    <x-menu-item title="Users" icon="o-users" link="/users" />
</x-menu>
```

##### Dropdown

Dropdowns plays nice with the **Menu** component. Under the hood It uses the Alpine's anchor plugin to control the position.

Take a look at **Select** for value selection.

**Basic:**

```blade
<x-dropdown>
    <x-menu-item title="Archive" icon="o-archive-box" />
    <x-menu-item title="Remove" icon="o-trash" />
    <x-menu-item title="Restore" icon="o-arrow-path" />
</x-dropdown>
```

**Custom Trigger:**

```blade
<x-dropdown>
    <x-slot:trigger>
        <x-button icon="o-bell" class="btn-circle" />
    </x-slot>
    <x-menu-item title="Archive" />
    <x-menu-item title="Move" />
</x-dropdown>
```

**Right alignment:**

```blade
{{-- Use `right` if dropdown is on right side of screen --}}
<x-dropdown label="Hello" class="btn-warning" right>
    <x-menu-item title="It should align correctly on right side" />
    <x-menu-item title="Yes!" />
</x-dropdown>
```

**Click propagation:**

By default, any click closes the dropdown. Just use `@click.stop` or `wire:click.stop` to prevent this behavior.

```blade
<x-dropdown label="Settings">
    {{-- By default any click closes dropdown --}}
    <x-menu-item title="Close after click" />
    <x-menu-separator />
    {{-- Use `@click.STOP` to stop event propagation --}}
    <x-menu-item title="Keep open after click" @click.stop="alert('Keep open')" />
    {{-- Or `wire:click.stop` --}}
    <x-menu-item title="Call wire:click" wire:click.stop="delete" />
    <x-menu-separator />
    <x-menu-item @click.stop="">
        <x-checkbox label="Hard mode" hint="Make things harder" />
    </x-menu-item>
    <x-menu-item @click.stop="">
        <x-checkbox label="Transparent checkout" hint="Make things easier" />
    </x-menu-item>
</x-dropdown>
```

**Spinner:**

```blade
<x-dropdown label="Settings">
    <x-menu-item title="Spinner" wire:click.stop="delete2" spinner="delete2" />
    <x-menu-item title="Spinner" wire:click.stop="delete3" spinner="delete3" icon="o-trash" />
</x-dropdown>
```

**No anchor:**

By default, this component works with Alpine's anchor plugin. If you don't want to use it, just add `no-x-anchor` to the dropdown to manually control the position.

```blade
<x-dropdown label="Default" no-x-anchor>
    <x-menu-item title="Hey" />
    <x-menu-item title="How are you?" />
</x-dropdown>

<x-dropdown label="Top" no-x-anchor top>
    <x-menu-item title="Hey" />
    <x-menu-item title="How are you?" />
</x-dropdown>

<x-dropdown label="Right" no-x-anchor right>
    <x-menu-item title="Hey" />
    <x-menu-item title="It should align correctly on right side?" />
</x-dropdown>
```

**Scroll height:**

You can add the `scroll` property to allow scrolling and control the height with `max-height`.

```blade
<x-dropdown label="Default">
    @foreach ($array as $item)
        <x-menu-item title="Dropdown Item {{ $item }}" />
    @endforeach
</x-dropdown>

<x-dropdown label="Scroll" scroll>
    @foreach ($array as $item)
        <x-menu-item title="Dropdown Item {{ $item }}" />
    @endforeach
</x-dropdown>

<x-dropdown label="Custom Scroll" scroll max-height="max-h-64">
    @foreach ($array as $item)
        <x-menu-item title="Dropdown Item {{ $item }}" />
    @endforeach
</x-dropdown>
```

#### Dialogs Components

**Note:** See detailed documentation for Modal and Toast below.

**Basic Usage:**

```blade
<x-modal wire:model="myModal1" title="Hey" class="backdrop-blur">
    Press `ESC`, click outside or click `CANCEL` to close.
    <x-slot:actions>
        <x-button label="Cancel" @click="$wire.myModal1 = false" />
    </x-slot>
</x-modal>

<x-button label="Open" @click="$wire.myModal1 = true" />
```

**Livewire Property:**

```php
public bool $myModal1 = false;
```

**Complex Modal with Form:**

```blade
<x-modal wire:model="myModal2" title="Hello" subtitle="Livewire example">
    <x-form no-separator>
        <x-input label="Name" icon="o-user" placeholder="The full name" />
        <x-input label="Email" icon="o-envelope" placeholder="The e-mail" />
        {{-- Notice we are using now the `actions` slot from `x-form`, not from modal --}}
        <x-slot:actions>
            <x-button label="Cancel" @click="$wire.myModal2 = false" />
            <x-button label="Confirm" class="btn-primary" />
        </x-slot>
    </x-form>
</x-modal>
```

**Persistent Modal:**

Add the `persistent` attribute to prevent modal close on click outside or when pressing `ESC` key.

```blade
<x-modal wire:model="myModal3" title="Payment confirmation" persistent separator>
    <div class="flex justify-between">
        Please, wait ...
        <x-loading class="loading-infinity" />
    </div>
    <x-slot:actions>
        <x-button label="Cancel" @click="$wire.myModal3 = false" />
    </x-slot>
</x-modal>
```

**Styling:**

Remember to add `box-class` custom classes on Tailwind **safelist**.

```blade
<x-modal wire:model="myModal4" class="backdrop-blur" box-class="bg-warning/30 border w-64">Hello!</x-modal>
```

**Disable Focus Trap:**

By default the focus trap is enabled, but you can disable it by adding the `without-trap-focus` attribute.

```blade
<x-modal without-trap-focus ... />
```

**Events:**

You can listen to the `open` and `close` events to perform actions when the modal is opened or closed.

```blade
<x-modal @close="$wire.someMethod()" @open="$wire.otherMethod()" ... />
```

##### Toast

**Usage:**

Place **toast tag** anywhere on the main layout.

```blade
<body>
    ...
    <x-toast />
</body>
```

Import the `Toast` trait and call the `$this->toast(...)` method.

```php
use Mary\Traits\Toast;

class MyComponent extends Component
{
    // Use this trait
    use Toast;

    public function save()
    {
        // Do your stuff here ...

        // Toast
        $this->toast(
            type: 'success',
            title: 'It is done!',
            description: null, // optional (text)
            position: 'toast-top toast-end', // optional (daisyUI classes)
            icon: 'o-information-circle', // Optional (any icon)
            css: 'alert-info', // Optional (daisyUI classes)
            timeout: 3000, // optional (ms)
            redirectTo: null // optional (uri)
        );

        // Shortcuts
        $this->success(...);
        $this->error(...);
        $this->warning(...);
        $this->info(...);
    }
}
```

For convenience this component flashes the following messages to make testing easier.

```php
session()->flash('mary.toast.title', $title);
session()->flash('mary.toast.description', $description);
```

**Example:**

The shortcuts are branded with default colors and icons.

```blade
<x-button label="Default" class="btn-success" wire:click="save" spinner />
<x-button label="Quick" class="btn-error" wire:click="save2" spinner />
<x-button label="Save and redirect" class="btn-warning" wire:click="save3" spinner />
<x-button label="Custom Progress" class="btn-success" wire:click="save5" spinner />
```

```php
public function save()
{
    // Your stuff here ...

    // Toast
    $this->success('We are done, check it out');
}

public function save2()
{
    // Your stuff here ...

    // Toast
    $this->error(
        'It will last just 1 second ...',
        timeout: 1000,
        position: 'toast-bottom toast-start'
    );
}

public function save3()
{
    // Your stuff here ...

    // Toast
    $this->warning(
        'It is working with redirect',
        'You were redirected to another url ...',
        redirectTo: '/docs/components/form'
    );
}

public function save5()
{
    // Your stuff here ...

    // Toast
    $this->success(
        'Custom progress class',
        progressClass: 'progress-error'
    );
}
```

**Default Position:**

The default position is `toast-top toast-end`. You can change it by passing the `position` parameter.

```blade
<body>
    ...
    <x-toast position="toast-top toast-center" />
</body>
```

**Custom Style:**

You can use any daisyUI/Tailwind classes. It also supports HTML.

```blade
<x-button label="Like" wire:click="save4" icon="o-heart" spinner />
```

```php
public function save4()
{
    // Your stuff here ...

    // Toast
    $this->warning(
        'Wishlist <u>updated</u>',
        'You will <strong>love it :)</strong>',
        position: 'bottom-end',
        icon: 'o-heart',
        css: 'bg-pink-500 text-base-100'
    );
}
```

**Using an Exception:**

The previous approach uses a Trait and works only inside Livewire components. If you are trying to trigger a toast from outside a Livewire context, you can use the `ToastException` to do so.

```php
use Mary\Exceptions\ToastException;

public function notALivewireMethod()
{
    throw ToastException::error('Your operation could not complete');

    // Shortcuts with the same API from Toast trait
    throw ToastException::success(...);
    throw ToastException::error(...);
    throw ToastException::warning(...);
    throw ToastException::info(...);
}
```

If you want to disable preventDefault call, you can chain the `permitDefault()` method on your exception.

```php
use Mary\Exceptions\ToastException;

public function notALivewireMethod()
{
    throw ToastException::info('Do not prevent default on client side')->permitDefault();
}
```

##### Drawer

**Basic Usage:**

```blade
<x-drawer wire:model="showDrawer" title="Menu" class="drawer-end">
    <p>Drawer content here</p>
    <x-slot:actions>
        <x-button label="Close" @click="$wire.showDrawer = false" />
    </x-slot>
</x-drawer>

<x-button label="Open Drawer" @click="$wire.showDrawer = true" />
```

**Livewire Property:**

```php
public bool $showDrawer = false;
```

**Positions:**

```blade
{{-- Left (default) --}}
<x-drawer wire:model="showDrawer" title="Menu" />

{{-- Right --}}
<x-drawer wire:model="showDrawer" title="Menu" class="drawer-end" />

{{-- Top --}}
<x-drawer wire:model="showDrawer" title="Menu" class="drawer-top" />

{{-- Bottom --}}
<x-drawer wire:model="showDrawer" title="Menu" class="drawer-bottom" />
```

#### UI Components

**Note:** See detailed documentation for Alert, Button and Card below.

**Basic Usage:**

```blade
<x-alert title="You have 10 messages" icon="o-exclamation-triangle" />
<x-alert title="Hey!" description="Ho!" icon="o-home" class="alert-warning" />
<x-alert icon="o-exclamation-triangle" class="alert-success">
    I am using the
    <strong>default slot.</strong>
</x-alert>
```

**With Actions:**

```blade
<x-alert title="With actions" description="Hi" icon="o-envelope" class="alert-info">
    <x-slot:actions>
        <x-button label="See" />
    </x-slot>
</x-alert>
```

**Soft and Outlined:**

```blade
<x-alert title="I am soft" icon="o-exclamation-triangle" class="alert-info alert-soft" />
<x-alert title="I am outlined" icon="o-exclamation-triangle" class="alert-info alert-outline" />
```

**Dismissible:**

```blade
<x-alert title="Dismissible" description="Click the close icon" icon="o-exclamation-triangle" dismissible />
```

##### Avatar

**Basic Usage:**

```blade
<x-avatar :image="$user->avatar" alt="My image" />
{{-- Manipulate avatar imagem with CSS classes --}}
<x-avatar :image="$user->avatar" class="!w-14 !rounded-lg" />
{{-- Title --}}
<x-avatar :image="$user->avatar" :title="$user->username" />
{{-- Subtitle --}}
<x-avatar :image="$user->avatar" :title="$user->username" :subtitle="$user->name" class="!w-10" />
{{-- Placeholder --}}
<x-avatar placeholder="RT" title="Robson Tenório" subtitle="@robsontenorio" class="!w-10" />
```

**Slots:**

```blade
<x-avatar :image="$user->avatar" class="!w-22">
    <x-slot:title class="text-3xl !font-bold pl-2">
        {{ $user->username }}
    </x-slot>
    <x-slot:subtitle class="grid gap-1 mt-2 pl-2 text-xs">
        <x-icon name="o-paper-airplane" label="12 posts" />
        <x-icon name="o-chat-bubble-left" label="45 comments" />
    </x-slot>
</x-avatar>
```

##### Breadcrumbs

This component uses `ul` and `li` HTML tags. Make sure you have an extra rule to not override them on your custom CSS.

**Default:**

On small screens, it automatically hides all intermediate items.

```php
@php
$breadcrumbs = [
    ['label' => 'Home'],
    ['label' => 'Documents'],
    ['label' => 'Add document'],
];
@endphp

<x-breadcrumbs :items="$breadcrumbs" />
```

**Custom separator, icons & links:**

```php
@php
$breadcrumbs = [
    [
        'link' => '#default',
        'icon' => 's-home',
    ],
    [
        'label' => 'Documents',
        'link' => '/docs/components/breadcrumbs',
        'icon' => 'o-document',
    ],
    [
        'label' => 'Add document',
        'icon' => 'o-plus',
    ],
];
@endphp

<x-breadcrumbs :items="$breadcrumbs" separator="o-slash" />
```

**Tooltip & customization:**

```php
@php
$breadcrumbs = [
    [
        'label' => 'Home',
        'icon' => 'm-home',
        'tooltip-left' => 'Tooltips are supported!',
    ],
    [
        'label' => 'Documents',
        'link' => '/docs/components/breadcrumbs',
        'tooltip' => 'Default position is top!',
    ],
    [
        'label' => 'Edit document',
        'tooltip-bottom' => 'Positions are changable!',
    ],
    [
        'label' => '# 42',
        'tooltip-right' => 'And one from the right',
    ],
];
@endphp

<x-breadcrumbs
    :items="$breadcrumbs"
    separator="m-minus"
    separator-class="text-warning"
    class="bg-base-300 p-3 rounded-box"
    icon-class="text-warning"
    link-item-class="text-sm font-bold"
/>
```

##### Button

**Basic Usage:**

```blade
{{-- DEFAULT --}}
<x-button label="Hi!" />

{{-- COLOR AND STYLE --}}
<x-button label="Hi!" class="btn-primary" />
<x-button label="How" class="btn-warning" />
<x-button label="Are" class="btn-success" />
<x-button label="You?" class="btn-error btn-sm btn-soft" />

{{-- SLOT --}}
<x-button class="btn-primary btn-dash">With default slot 😃</x-button>

{{-- CIRCLE --}}
<x-button icon="o-user" class="btn-circle" />
<x-button icon="o-user" class="btn-circle btn-outline" />

{{-- SQUARE --}}
<x-button icon="o-user" class="btn-circle btn-ghost" />
<x-button icon="o-user" class="btn-square" />
```

**Icons:**

```blade
<x-button label="Hello" icon="o-check" />
<x-button label="There" icon-right="o-x-circle" />
```

**Tooltips:**

Tooltips are disabled on small screens.

```blade
<x-button label="Up" tooltip="Mary" />
<x-button label="Bottom" tooltip-bottom="Joe" />
<x-button label="Left" tooltip-left="Marina" />
<x-button label="Right" tooltip-right="Amanda" />
```

**Badges:**

```blade
<x-button label="Hello" badge="12" />
<x-button label="There" badge="8" badge-classes="badge-warning" />
```

**Responsive:**

On small screens the label is hidden. Icon and badge are kept.

```blade
<x-button label="There" icon="o-home" badge="12" responsive />
<x-button label="There" icon="o-check" responsive />
```

**Links:**

You can make a button act as a link by placing a `link` property. You can use all the options described above for ordinary buttons.

```blade
{{-- It uses `wire:navigate` --}}
<x-button label="Go to installation" link="/docs/installation" class="btn-ghost" />

{{-- Notice `no-wire-navigate` --}}
<x-button label="Go to demos" link="/docs/demos" no-wire-navigate class="btn-ghost" />

{{-- Notice `external` for external links --}}
<x-button label="Google" link="https://google.com" external icon="o-link" tooltip="Go away!" />
```

**Spinners:**

```blade
{{-- It automatically targets to self `wire:click` action --}}
<x-button label="Self target" wire:click="save" icon-right="o-lock-closed" spinner />

<x-form wire:submit="save2">
    <x-input placeholder="Name" />
    <x-slot:actions>
        {{-- No target spinner --}}
        <x-button label="No target" />

        {{-- Target is `save2` --}}
        <x-button label="Custom target" type="submit" class="btn-primary" spinner="save2" />
    </x-slot>
</x-form>
```

##### Badges

**Basic Usage:**

```blade
<x-badge value="New" />
<x-badge value="5" class="badge-primary" />
<x-badge value="99+" class="badge-error" />
```

**Sizes:**

```blade
<x-badge value="New" class="badge-sm" />
<x-badge value="New" />
<x-badge value="New" class="badge-lg" />
```

**Colors:**

```blade
<x-badge value="Primary" class="badge-primary" />
<x-badge value="Secondary" class="badge-secondary" />
<x-badge value="Success" class="badge-success" />
<x-badge value="Error" class="badge-error" />
<x-badge value="Warning" class="badge-warning" />
<x-badge value="Info" class="badge-info" />
```

**Outline:**

```blade
<x-badge value="New" class="badge-outline badge-primary" />
```

**Ghost:**

```blade
<x-badge value="New" class="badge-ghost" />
```

##### Card

**Basics:**

```blade
<x-card title="Your stats" subtitle="Our findings about you" shadow separator>I have title, subtitle and separator.</x-card>

<x-card title="Nice things">
    I am using slots here.

    <x-slot:figure>
        <img src="https://picsum.photos/500/200" />
    </x-slot>

    <x-slot:menu>
        <x-button icon="o-share" class="btn-circle btn-sm" />
        <x-icon name="o-heart" class="cursor-pointer" />
    </x-slot>

    <x-slot:actions separator>
        <x-button label="Ok" class="btn-primary" />
    </x-slot>
</x-card>
```

**Progress Indicator:**

This feature only works when you have in place `title` and `separator` attributes.

```blade
{{-- Notice `progress-indicator` --}}
<x-card title="Your stats" subtitle="Always triggers" separator progress-indicator>
    <x-button label="Save" wire:click="save" />
</x-card>

{{-- Notice `progress-indicator` target --}}
<x-card title="Your stats" subtitle="Only triggers with `save2`" separator progress-indicator="save2">
    <x-button label="Save2" wire:click="save2" />
</x-card>
```

**Styling:**

```blade
{{-- Notice `progress-indicator` --}}
<x-card title="Style" separator class="p-2 bg-warning/40" body-class="p-2 bg-info">Hey!</x-card>
```

##### Carousel

**Basic:**

It supports swipe gestures on mobile.

```php
@php
$slides = [
    ['image' => '/photos/photo-1494253109108-2e30c049369b.jpg'],
    ['image' => '/photos/photo-1565098772267-60af42b81ef2.jpg'],
    ['image' => '/photos/photo-1559703248-dcaaec9fab78.jpg'],
    ['image' => '/photos/photo-1572635148818-ef6fd45eb394.jpg'],
];
@endphp

<x-carousel :slides="$slides" />
```

**No indicators:**

```blade
<x-carousel :slides="$slides" without-indicators />
```

**No arrows:**

```blade
{{-- Notice you can also override some wrapper CSS classes. --}}
<x-carousel :slides="$slides" without-arrows class="!h-32 !rounded-none" />
```

**Autoplay:**

```blade
<x-carousel :slides="$slides" autoplay class="!h-32" />
```

You can change interval by passing the `interval` attribute.

```blade
{{-- Default interval is 2000 milliseconds. --}}
<x-carousel ... autoplay interval="3000" />
```

**Full:**

Play around removing some attributes. The only required attribute is `image`.

```php
@php
$slides = [
    [
        'image' => '/photos/photo-1559703248-dcaaec9fab78.jpg',
        'title' => 'Frontend developers',
        'description' => 'We love last week frameworks.',
        'url' => '/docs/installation',
        'urlText' => 'Get started',
    ],
    [
        'image' => '/photos/photo-1565098772267-60af42b81ef2.jpg',
        'title' => 'Full stack developers',
        'description' => 'Where burnout is just a fancy term for Tuesday.',
    ],
    [
        'image' => '/photos/photo-1494253109108-2e30c049369b.jpg',
        'url' => '/docs/installation',
        'urlText' => 'Let`s go!',
    ],
    [
        'image' => '/photos/photo-1572635148818-ef6fd45eb394.jpg',
        'url' => '/docs/installation',
    ],
];
@endphp

<x-carousel :slides="$slides" />
```

**Custom slot:**

By using the special blade directive `@scope` you have access to the current item from loop. Notice also you have access to the Laravel's `$loop` variable.

```php
@php
$slides = [
    [
        'image' => '/photos/photo-1559703248-dcaaec9fab78.jpg',
        'title' => 'Frontend developers',
    ],
    [
        'image' => '/photos/photo-1565098772267-60af42b81ef2.jpg',
        'title' => 'Full stack developers',
    ],
    [
        'image' => '/photos/photo-1494253109108-2e30c049369b.jpg',
        'title' => 'Hey!',
    ],
];
@endphp

<x-carousel :slides="$slides">
    @scope('content', $slide)
        <div class="mt-16 bg-red-500 font-bold text-white rounded p-2 w-fit mx-auto">
            {{ $slide['title'] }} - {{ $loop->index }}
        </div>
    @endscope
</x-carousel>
```

##### Collapse

This component can be used for showing and hiding content. It can be used standalone or wrapped into the "Accordion" component.

**Basic:**

```blade
<x-collapse separator>
    <x-slot:heading>Hello</x-slot>
    <x-slot:content>You!</x-slot>
</x-collapse>
```

**Livewire:**

```blade
<x-collapse wire:model="show" separator class="bg-base-200">
    <x-slot:heading>Hey</x-slot>
    <x-slot:content>There!</x-slot>
</x-collapse>
```

**Style and alternative icon:**

```blade
<x-collapse collapse-plus-minus>
    <x-slot:heading class="bg-warning/20">How ...</x-slot>
    <x-slot:content class="bg-primary/10">
        <div class="mt-5">Are you?</div>
    </x-slot>
</x-collapse>
```

**No icon:**

```blade
<x-collapse no-icon>
    <x-slot:heading>How ...</x-slot>
    <x-slot:content>Are you ?</x-slot>
</x-collapse>
```

**Accordion:**

You can group multiple `x-collapse` by wrapping it on a `x-accordion` component.

```blade
<x-accordion wire:model="group">
    <x-collapse name="group1">
        <x-slot:heading>Group 1</x-slot>
        <x-slot:content>Hello 1</x-slot>
    </x-collapse>
    <x-collapse name="group2">
        <x-slot:heading>Group 2</x-slot>
        <x-slot:content>Hello 2</x-slot>
    </x-collapse>
    <x-collapse name="group3">
        <x-slot:heading>Group 3</x-slot>
        <x-slot:content>Hello 3</x-slot>
    </x-collapse>
</x-accordion>
```

```php
public string $group = 'group1';
```

##### Header

**Basic Usage:**

```blade
<x-header title="Page Title" />
<x-header title="Page Title" subtitle="Page subtitle" />
<x-header title="Page Title" separator />
```

**With Progress Indicator:**

```blade
<x-header title="Page Title" separator progress-indicator />
<x-header title="Page Title" separator progress-indicator="save" />
```

**With Actions:**

```blade
<x-header title="Page Title" separator>
    <x-slot:actions>
        <x-button label="Save" wire:click="save" />
    </x-slot>
</x-header>
```

##### Icon

**Basic Usage:**

```blade
<x-icon name="o-home" />
<x-icon name="o-user" class="w-6 h-6" />
<x-icon name="o-cog" class="text-primary" />
```

**Sizes:**

```blade
<x-icon name="o-home" class="w-4 h-4" />
<x-icon name="o-home" class="w-6 h-6" />
<x-icon name="o-home" class="w-8 h-8" />
```

**Colors:**

```blade
<x-icon name="o-home" class="text-primary" />
<x-icon name="o-home" class="text-secondary" />
<x-icon name="o-home" class="text-success" />
<x-icon name="o-home" class="text-error" />
```

##### Kbd

Kbd is used to display keyboard shortcuts.

```blade
<x-kbd>A</x-kbd>
<x-kbd class="kbd-lg">B</x-kbd>
<x-kbd class="kbd-xl">C</x-kbd>
```

```blade
Press
<x-kbd>⌘</x-kbd>
<x-kbd>P</x-kbd>
to pay.
```

##### Pin

**Default:**

```blade
<x-pin wire:model="pin1" size="3" />
```

**Numeric:**

The `numeric` property modifies the behavior to accept only numbers.

```blade
<x-pin wire:model="pin2" size="4" numeric />
```

**Security:**

You can use any compatible `text-secure` HTML symbol.

```blade
<x-pin wire:model="pin1" size="3" hide />
<x-pin wire:model="pin1" size="3" hide hide-type="circle" />
<x-pin wire:model="pin1" size="3" hide hide-type="square" />
```

**Events:**

The `@completed` and `@incomplete` events are triggered respectively when the pin is completed or is incomplete.

```blade
<x-pin wire:model="pin3" size="5" @completed="$wire.show = true" @incomplete="$wire.show = false" />

<template x-if="$wire.show">
    <x-alert icon="o-check-circle" class="mt-5">
        You have typed :
        <span x-text="$wire.pin3"></span>
    </x-alert>
</template>
```

**Spacing:**

You can remove the gap between the pins by using the `no-gap` property.

```blade
<x-pin wire:model="pin3" size="5" no-gap />
```

##### Popover

This component uses the the built-in Alpine's anchor plugin.

**Basic:**

```blade
<x-popover>
    <x-slot:trigger>
        <x-avatar :image="$user->avatar" :title="$user->username" />
    </x-slot>
    <x-slot:content>
        From: {{ $user->city->name }}
        <br />
        Email: {{ $user->email }}
    </x-slot>
</x-popover>
```

**Position and Offset:**

As this component uses Alpine's anchor plugin, you can use same parameters described on its docs for `offset` and `position`.

```blade
<x-popover position="top-start" offset="20">
    <x-slot:trigger>
        <x-button label="Hey" />
    </x-slot>
    <x-slot:content>How are you?</x-slot>
</x-popover>
```

**Styling:**

```blade
<x-popover>
    <x-slot:trigger class="bg-base-200 p-2 rounded-lg">
        {{ $user->username }}
    </x-slot>
    <x-slot:content class="border border-warning !w-40 text-sm">
        <x-avatar :image="$user->avatar" />
        {{ $user->bio }}
    </x-slot>
</x-popover>
```

##### Progress

**Basic Usage:**

```blade
<x-progress value="50" />
<x-progress value="75" class="progress-primary" />
<x-progress value="100" class="progress-success" />
```

**Colors:**

```blade
<x-progress value="50" class="progress-primary" />
<x-progress value="50" class="progress-secondary" />
<x-progress value="50" class="progress-success" />
<x-progress value="50" class="progress-error" />
<x-progress value="50" class="progress-warning" />
<x-progress value="50" class="progress-info" />
```

**Sizes:**

```blade
<x-progress value="50" class="progress-xs" />
<x-progress value="50" class="progress-sm" />
<x-progress value="50" />
<x-progress value="50" class="progress-lg" />
```

**With Label:**

```blade
<x-progress value="50" label="50%" />
<x-progress value="75" label="75%" class="progress-primary" />
```

##### Rating

**Example:**

It controls the rating based on a integer number. For "not rated" set its model value as "0".

```blade
{{-- Not rated --}}
{{-- public int $ranking0 = 0; --}}
<x-rating wire:model="ranking0" />

<x-rating wire:model="ranking1" class="bg-warning" total="8" />
<x-rating wire:model="ranking2" class="!mask-circle" />
<x-rating wire:model="ranking3" class="!mask-diamond bg-accent" />
<x-rating wire:model="ranking4" class="!mask-heart bg-secondary rating-xl" />
```

##### Spotlight

This component implements a global search feature triggered by a customizable shortcut. **It does not index your site**, so you need to implement by yourself a global search function.

**Usage:**

Place the **spotlight tag** somewhere on the main layout.

```blade
<body>
    ...
    <x-spotlight />
</body>
```

Create a `App\Support\Spotlight` class with a `search` method that returns the result.

```php
namespace App\Support;

class Spotlight
{
    public function search(Request $request)
    {
        // Do your search logic here
        // IMPORTANT: apply any security concern here
    }
}
```

Make sure each item from your collection contains the following keys.

```php
[
    'name' => 'Mary', // Any string
    'description' => 'Software Engineer', // Any string
    'link' => '/users/1', // Any valid route
    'avatar' => 'http://...' // Any image url
]
```

Instead of `avatar` you can use any pre-rendered blade `icon`.

```php
[
    // ...
    'icon' => Blade::render("<x-icon name='o-bolt' />")
]
```

**You are done!**

**Manual activation:**

You can trigger the Spotlight component by dispatching a `mary-search-open` event. Probably you want to put this search button inside a navbar. In this case place an empty `x-data` as describe below.

```blade
{{-- Place an empty `x-data` on body --}}
<body ... x-data>
    ...
    <nav>
        {{-- Notice `@click.stop` --}}
        <x-button label="Search" @click.stop="$dispatch('mary-search-open')" />
    </nav>
    <main>
        {{ $slot }}
    </main>
    <x-spotlight />
</body>
```

**Security:**

As maryUI exposes a **public route** to make Spotlight work, remember to apply any security concern **directly on your search method**.

**Example:**

You can organize your search however you want. Don't be restricted exclusively to the approach shown in this example. But, here an example that mixes "users" and "app actions".

```php
namespace App\Support;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Blade;

class Spotlight
{
    public function search(Request $request)
    {
        // Example of security concern
        // Guests can not search
        if (!auth()->user()) {
            return [];
        }

        return collect()
            ->merge($this->actions($request->search))
            ->merge($this->users($request->search));
    }

    // Database search
    public function users(string $search = '')
    {
        return User::query()
            ->where('name', 'like', "%$search%")
            ->take(5)
            ->get()
            ->map(function (User $user) {
                return [
                    'avatar' => $user->profile_picture,
                    'name' => $user->name,
                    'description' => $user->email,
                    'link' => "/users/{$user->id}"
                ];
            });
    }

    // Static search, but it could come from a database
    public function actions(string $search = '')
    {
        $icon = Blade::render("<x-icon name='o-bolt' class='w-11 h-11 p-2 bg-warning/10 rounded-full' />");

        return collect([
            [
                'name' => 'Create user',
                'description' => 'Create a new user',
                'icon' => $icon,
                'link' => '/users/create'
            ],
            [
                // More ...
            ]
        ])->filter(fn (array $item) => str($item['name'] . $item['description'])->contains($search, true));
    }
}
```

**Options:**

You can change the `shortcut` with any combination supported by Livewire.

```blade
<x-spotlight shortcut="meta.slash" search-text="Find docs, app actions or users" no-results-text="Ops! Nothing here." url="/custom/search/url/here" />
```

**Changing the search class:**

If for some reason you want to change the search class, publish the config file.

```bash
php artisan vendor:publish --tag mary.config
```

```php
// ...
'components' => [
    'spotlight' => [
        'class' => 'App\\Support\\Spotlight'
    ]
]
```

**Slots:**

Add anything you want and dispatch a `mary-search` event with an extra query string.

You can do it in many ways. But, in this example we built it with Alpine.

```blade
<x-spotlight>
    <div
        x-data="{ query: { withUsers: true, withActions: true } }"
        x-init="
            $watch('query', (value) =>
                $dispatch('mary-search', new URLSearchParams(value).toString()),
            )
        "
        class="flex gap-8 p-3"
    >
        <x-checkbox label="Users" x-model="query.withUsers" />
        <x-checkbox label="Actions" x-model="query.withActions" />
    </div>
</x-spotlight>
```

Then, adjust your `search` method to handle those new request parameters.

```php
class Spotlight
{
    public function search(Request $request)
    {
        // Do your logic here
    }
}
```

##### Statistic

```blade
<x-stat title="Messages" value="44" icon="o-envelope" tooltip="Hello" color="text-primary" />

<x-stat title="Sales" description="This month" value="22.124" icon="o-arrow-trending-up" tooltip-bottom="There" />

<x-stat title="Lost" description="This month" value="34" icon="o-arrow-trending-down" tooltip-left="Ops!" />

<x-stat title="Sales" description="This month" value="22.124" icon="o-arrow-trending-down" class="text-orange-500" color="text-pink-500" tooltip-right="Gosh!" />
```

##### Steps

Alternately check the **Timeline** component.

**Example:**

This component uses `ul` and `li` HTML tags. Make sure you have an extra rule to not override them on your custom CSS.

```blade
<x-steps wire:model="step" class="border-y border-base-content/10 my-5 py-5">
    <x-step step="1" text="Register">Register step</x-step>
    <x-step step="2" text="Payment">Payment step</x-step>
    <x-step step="3" text="Receive Product" class="bg-warning/20">Receive Product</x-step>
</x-steps>

{{-- Create some methods to increase/decrease the model to match the step number --}}
{{-- You could use Alpine with `$wire` here --}}
<x-button label="Previous" wire:click="prev" />
<x-button label="Next" wire:click="next" />
```

```php
// Step model
public int $step = 2;
```

**Customizing:**

Remember that if you are using deeper CSS classes than `steps-xxxx` provided by daisyUI you must configure the Tailwind **safelist**.

Steps color and content.

```blade
<x-steps wire:model="example" steps-color="step-primary">
    <x-step step="1" text="A" />
    <x-step step="2" text="B" icon="o-user" />
    <x-step step="3" text="C" data-content="✓" />
</x-steps>
```

You can modify the stepper style itself using the `stepper-classes` attribute.

```blade
<x-steps wire:model="example" stepper-classes="w-full p-5 bg-base-200">
    <x-step step="1" text="A" />
    <x-step step="2" text="B" />
    <x-step step="3" text="C" />
</x-steps>
```

##### Swap

This component allows you to swap between two states (`true` / `false`) using two elements with animations.

If you have multiple `x-swap` on the same page make sure to set different ids.

**Default:**

```blade
<x-swap wire:model="swap1" />
```

```php
public bool $swap1 = false;
```

**Text content:**

When providing the `true` or `false` attributes, the icons will be ignored.

```blade
<x-swap wire:model="swap2" true="ON" false="OFF" />
```

```php
public bool $swap2 = true;
```

**Custom icons + size:**

```blade
<x-swap true-icon="o-speaker-wave" false-icon="o-speaker-x-mark" icon-size="h-8 w-8" />
```

**Animations:**

It supports daisy-ui's swap animations.

If you have multiple `x-swap` on the same page make sure to set different ids.

```blade
<x-swap id="fade" />
<x-swap id="flip" class="swap-flip" />
<x-swap id="rotate" class="swap-rotate" />
```

**Custom content:**

It is possible to provide completely custom content. Please, note that the width will always be the width of the larger content.

```blade
<x-swap wire:model="swap3" id="custom">
    <x-slot:true class="bg-warning rounded p-2">Custom true</x-slot>
    <x-slot:false class="bg-secondary text-white p-2">Custom false</x-slot>
</x-swap>
```

**Before and after:**

You can add content before and after the content as well.

```blade
<x-swap id="slots" wire:model.live="swap4" class="flex gap-3">
    <x-slot:before class="text-primary">BEFORE</x-slot>
    <x-slot:after class="text-error">AFTER</x-slot>
</x-swap>
```

##### Timeline

Alternately check the **Steps** component.

**Basic:**

```blade
{{-- Cut top edge with `first` --}}
<x-timeline-item title="Register" first />

<x-timeline-item title="Payment" subtitle="10/23/2023" />

<x-timeline-item title="Analysis" subtitle="10/23/2023" description="Just checking" />

{{-- Notice `pending` --}}
<x-timeline-item title="Prepare" pending description="Prepare to ship" />

{{-- Cut bottom edge with `last` --}}
<x-timeline-item title="Shipment" pending last description="It is shiped :)" />
```

**Icons:**

```blade
<x-timeline-item title="Order placed" first icon="o-map-pin" />
<x-timeline-item title="Payment confirmed" icon="o-credit-card" />
<x-timeline-item title="Shipped" icon="o-paper-airplane" />
<x-timeline-item title="Delivered" pending last icon="o-gift" />
```

**Customize:**

```blade
<x-timeline-item title="Order placed" first connector-active-class="border-s-success" bullet-active-class="bg-success" />

<x-timeline-item title="Delivered" pending connector-pending-class="border-s-error" bullet-pending-class="bg-error" />
```

##### Tabs

**Usage:**

```blade
<x-tabs wire:model="selectedTab">
    <x-tab name="users-tab" label="Users" icon="o-users">
        <div>Users</div>
    </x-tab>
    <x-tab name="tricks-tab" label="Tricks" icon="o-sparkles">
        <div>Tricks</div>
    </x-tab>
    <x-tab name="musics-tab" label="Musics" icon="o-musical-note">
        <div>Musics</div>
    </x-tab>
</x-tabs>

<x-button label="Change to Musics" @click="$wire.selectedTab = 'musics-tab'" />
```

**Slots:**

```blade
<x-tabs wire:model="myTab">
    <x-tab name="users-tab">
        <x-slot:label>
            Users
            <x-badge value="3" class="badge-primary badge-sm" />
        </x-slot>
        <div>Users</div>
    </x-tab>
    <x-tab name="tricks-tab" label="Tricks">
        <div>Tricks</div>
    </x-tab>
    <x-tab name="musics-tab" label="Musics">
        <div>Musics</div>
    </x-tab>
</x-tabs>
```

**Disabled State:**

```blade
<x-tabs wire:model="someTab">
    <x-tab name="users-tab" label="Users">
        <div>Users</div>
    </x-tab>
    <x-tab name="tricks-tab" label="Tricks">
        <div>Tricks</div>
    </x-tab>
    <x-tab name="musics-tab" label="Musics">
        <div>Musics</div>
    </x-tab>
    <x-tab name="stars-tab" label="Stars" disabled>
        <div>Stars</div>
    </x-tab>
</x-tabs>
```

**Hidden State:**

```blade
<x-tabs wire:model="someTab">
    <x-tab name="users-tab" label="Users">
        <div>Users</div>
    </x-tab>
    <x-tab name="tricks-tab" label="Tricks" hidden>
        <div>Tricks</div>
    </x-tab>
    <x-tab name="musics-tab" label="Musics">
        <div>Musics</div>
    </x-tab>
</x-tabs>
```

**Customisation:**

Remember to add these custom classes on Tailwind **safelist**.

```blade
<x-tabs wire:model="tabSelected" active-class="bg-primary rounded !text-white" label-class="font-semibold" label-div-class="bg-primary/5 rounded w-fit p-2">
    <x-tab name="users-tab" label="Users">
        <div>All</div>
    </x-tab>
    <x-tab name="tricks-tab" label="Tricks">
        <div>Tricks</div>
    </x-tab>
    <x-tab name="musics-tab" label="Musics">
        <div>Musics</div>
    </x-tab>
</x-tabs>
```

##### Theme Toggle

This component toggles between light/dark themes and includes an automatic persistent state.

It is not expected to have more than one **x-theme-toggle** on the same page. Make sure to **refresh the page** while toying around with the theme toggle.

**Setup:**

Make sure your `app.css` has this settings.

```css
/* Tailwind */
@import 'tailwindcss';

/* daisyUI */
@plugin "daisyui" {
    themes:
        light --default,
        dark --prefersdark;
}

/* Dark theme variant support */
@custom-variant dark (&:where(.dark, .dark *));
```

**Example:**

```blade
<x-theme-toggle />
<x-theme-toggle class="btn btn-circle" />
<x-theme-toggle class="btn btn-circle btn-ghost" />
<x-theme-toggle class="btn" @theme-changed="console.log($event.detail)" />
```

**Manual activation:**

You can toggle theme from anywhere by dispatching a `mary-toggle-theme` event.

```blade
<x-button label="Theme" icon="o-swatch" @click="$dispatch('mary-toggle-theme')" />
```

In this case place a hidden instance of `x-theme-toggle` on same layout file.

```blade
<body>
    {{-- Main content --}}
    <main>
        {{ $slot }}
    </main>

    {{-- Side menu --}}
    <x-menu>
        <x-menu-item title="Theme" icon="o-swatch" @click="$dispatch('mary-toggle-theme')" />
    </x-menu>

    {{-- Theme toggle --}}
    <x-theme-toggle class="hidden" />
</body>
```

**Custom theme toggle:**

It is not expected to have more than one **x-theme-toggle** on the same page. Make sure to **refresh the page** while toying around with the theme toggle.

By default, this component uses the standard "light" and "dark" themes shipped with **daisyUI**. But, you can customize them by passing the theme names.

First, you need to set this additional themes at `app.css` as described on daisyUI docs.

```css
@plugin "daisyui" {
    themes:
        light --default,
        dark --prefersdark,
        retro,
        aqua;
}
```

Then, set the theme names on `x-theme-toggle` component.

```blade
<x-theme-toggle darkTheme="aqua" lightTheme="retro" />
```

#### Third-party Components

**Note:** These components require additional third-party libraries. Refer to official documentation for installation and setup: https://mary-ui.com/docs/components/{component-name}

##### Choices

Advanced select component with search, async loading, and multiple selection support. Use this when you need a rich selection interface beyond the basic Select component.

This component is intended to be used to build complex selection interfaces for single and multiple values. It also supports **search** on frontend or server, when dealing with large lists.

**Pro tip:** Most of time you just need a simple **Select** component, which renders nice natively on all devices.

**Selection:**

By default, it will look up for:

- `$object->id` for option value.
- `$object->name` for option display label.
- `$object->avatar` for avatar picture.

**Basic Usage:**

```blade
{{-- Notice `single` --}}
<x-choices label="Single" wire:model="user_id" :options="$users" single clearable />

{{-- public array $users_multi_ids = []; --}}
<x-choices label="Multiple" wire:model="users_multi_ids" :options="$users" clearable />

{{-- Custom options --}}
<x-choices
    label="Custom options"
    wire:model="user_custom_id"
    :options="$users"
    option-label="username"
    option-sub-label="city.name"
    option-avatar="other_avatar"
    icon="o-users"
    height="max-h-96"
    {{-- Default is `max-h-64` --}}
    hint="It has custom options"
    single
/>
```

**Select All:**

This option only works for **multiple and non-searchable** exclusively.

```blade
{{-- Notice `allow-all` --}}
<x-choices label="Multiple" wire:model="users_all_ids" :options="$users" allow-all />

<x-choices label="Multiple" wire:model="users_all2_ids" :options="$users" allow-all allow-all-text="Select all stuff" remove-all-text="Delete all things" />
```

**Compact mode:**

This option only works for **multiple and non-searchable** exclusively.

```blade
{{-- Notice `compact` --}}
<x-choices label="Compact" wire:model="users_compact_ids" :options="$users" compact />

<x-choices label="Compact label" wire:model="users_compact2_ids" :options="$users" compact compact-text="stuff chosen" />
```

You can combine `allow-all` and `compact`:

```blade
<x-choices label="Select All + Compact" wire:model="users_all_compact_ids" :options="$users" compact allow-all />
```

**Searchable (frontend):**

If you judge you don't have a huge list of items, you can make it searchable offline on **"frontend side"**. But, **if you have a huge list** it is a better idea to make it searchable on **"server side"**, otherwise you can face some slow down on frontend.

```blade
{{-- Notice `searchable` --}}
{{-- Notice this is a different component, but with same API --}}
<x-choices-offline label="Single (frontend)" wire:model="user_searchable_offline_id" :options="$users" placeholder="Search ..." single clearable searchable />

<x-choices-offline label="Multiple (frontend)" wire:model="users_multi_searchable_offline_ids" :options="$users" placeholder="Search ..." clearable searchable />
```

**Searchable (server):**

When dealing with large options list use `searchable` parameter. By default, it calls `search()` method to get fresh options from **"server side"** while typing. You can change the method's name by using `search-function` parameter.

```blade
{{-- Notice `searchable` + `single` --}}
<x-choices label="Searchable + Single" wire:model="user_searchable_id" :options="$usersSearchable" placeholder="Search ..." single searchable />

{{-- Notice custom `search-function` --}}
<x-choices
    label="Searchable + Multiple"
    wire:model="users_multi_searchable_ids"
    :options="$usersMultiSearchable"
    placeholder="Search ..."
    search-function="searchMulti"
    no-result-text="Ops! Nothing here ..."
    no-progress
    searchable
/>
```

You must also consider displaying pre-selected items on list, when it **first renders** and **while searching**. There are many approaches to make it work, but here is an example for **single search** using **Volt**:

```php
// Selected option
public ?int $user_searchable_id = null;

// Options list
public Collection $usersSearchable;

public function mount()
{
    // Fill options when component first renders
    $this->search();
}

// Also called as you type
public function search(string $value = '')
{
    // Besides the search results, you must include on demand selected option
    $selectedOption = User::where('id', $this->user_searchable_id)->get();

    $this->usersSearchable = User::query()
        ->where('name', 'like', "%$value%")
        ->take(5)
        ->orderBy('name')
        ->get()
        ->merge($selectedOption); // <-- Adds selected option
}
```

Sometimes you don't want to hit a datasource on **every keystroke**. So, you can make use of `debounce` to control over how often a network request is sent.

Another approach is to use `min-chars` attribute to avoid hit **search method** itself until you have typed such amount of chars.

```blade
{{-- Notice `min-chars` and `debounce` --}}
<x-choices
    label="Searchable + Single + Debounce + Min chars"
    wire:model="user_searchable_min_chars_id"
    :options="$usersSearchableMinChars"
    search-function="searchMinChars"
    debounce="300ms"
    {{-- Default is `250ms` --}}
    min-chars="2"
    {{-- Default is `0` --}}
    hint="Type at least 2 chars"
    single
    searchable
/>
```

You can pass any extra arbitrary search parameters like this:

```blade
{{-- Notice `search-function` with extra arbitrary parameters --}}
<x-choices label="Extra parameters" wire:model="user_id" :options="$users" search-function="searchExtra(123, 'thing')" searchable />
```

```php
public function search(string $value = '', int $extra1 = 0, string $extra2 = '')
{
    // The first parameter is the default and comes from the search input.
}
```

**Slots:**

You have full control on rendering items by using the `@scope('item', $object)` special blade directive. It injects the current `$object` from the loop's context and achieves the same behavior that you would expect from the Vue/React scoped slots.

You can customize the list item and selected item slot. **Searchable (online) works with blade syntax**.

```blade
<x-choices label="Slots (online)" wire:model="user_custom_slot_id" :options="$users" single>
    {{-- Item slot --}}
    @scope('item', $user)
        <x-list-item :item="$user" sub-value="bio">
            <x-slot:avatar>
                <x-icon name="o-user" class="bg-primary/10 p-2 w-9 h-9 rounded-full" />
            </x-slot>
            <x-slot:actions>
                <x-badge :value="$user->username" class="badge-soft badge-primary badge-sm" />
            </x-slot>
        </x-list-item>
    @endscope

    {{-- Selection slot --}}
    @scope('selection', $user)
        {{ $user->name }} ({{ $user->username }})
    @endscope
</x-choices>
```

You can **append or prepend** anything like this. Make sure to use appropriated css round class on left or right.

```blade
<x-choices label="Slots" wire:model="user_custom_slot_id" :options="$users" single>
    <x-slot:prepend>
        {{-- Add `join-item` to all prepended elements --}}
        <x-button icon="o-trash" class="join-item" />
    </x-slot>
    <x-slot:append>
        {{-- Add `join-item` to all appended elements --}}
        <x-button label="Create" icon="o-plus" class="join-item btn-primary" />
    </x-slot>
</x-choices>
```

**Note about large numbers:**

This component uses the options `id` values to handle selection. It tries to determine if these values are a `int` or `string`.

But, due to Javascript limitation with large numbers like these below, it will break.

```php
public array $options = [
    [
        'id' => 264454000038134081, # <-- Javascript won't handle this number
        'name' => 'Test 1',
    ],
    [
        'id' => '264454000038134082', # <-- It is good!
        'name' => 'Test 2',
    ],
];
```

As workaround, define the `id` as a string and use **values-as-string** attribute instead.

```blade
<x-choices ... values-as-string />
<x-choices-offline ... values-as-string />
```

**Events:**

You can catch component events just like described on Livewire docs. In this case the component will trigger the `@change-selection` and it will contain the selected items keys.

The payload contains a **single key** or an **array of keys**, depending on how you set the component. Because it is a custom event, you must access the key(s) via the `detail.value` property on the event.

```blade
<x-choices ... @change-selection="console.log($event.detail.value)" />
<x-choices-offline ... @change-selection="console.log($event.detail.value)" />
```

**Documentation:** https://mary-ui.com/docs/components/choices

##### Calendar

This component is a wrapper around **Vanilla Calendar**. We have simplified its API to make it act as a **readonly calendar** for easily displaying events.

**Pro tip:** If you need an input for date selection stick with **DateTime** or **DatePicker** component.

**Install:**

```blade
<head>
    ...
    {{-- Vanilla Calendar --}}
    <script src="https://cdn.jsdelivr.net/npm/vanilla-calendar-pro@2.9.6/build/vanilla-calendar.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/vanilla-calendar-pro@2.9.6/build/vanilla-calendar.min.css" rel="stylesheet" />
</head>
```

**Note:** In the following examples we use dynamic dates to keep this example updated to current month. Remember to configure **Tailwind safelist** when working with dynamic CSS classes.

**Single month:**

```blade
@php
    $events = [
        [
            'label' => 'Day off',
            'description' => 'Playing <u>tennis.</u>',
            'css' => '!bg-amber-200',
            'date' => now()
                ->startOfMonth()
                ->addDays(3),
        ],
        [
            'label' => 'Event at same day',
            'description' => 'Hey there!',
            'css' => '!bg-amber-200',
            'date' => now()
                ->startOfMonth()
                ->addDays(3),
        ],
        [
            'label' => 'Laracon',
            'description' => 'Let`s go!',
            'css' => '!bg-blue-200',
            'range' => [
                now()
                    ->startOfMonth()
                    ->addDays(13),
                now()
                    ->startOfMonth()
                    ->addDays(15),
            ],
        ],
    ];
@endphp

<x-calendar :events="$events" />

{{-- Shortcuts config to `locale`, `sunday-start` and weekend-highlight --}}
<x-calendar locale="pt-BR" weekend-highlight sunday-start />
```

**Multiple months:**

```blade
@php
    $events = [
        [
            'label' => 'Business Travel',
            'description' => 'Series A founding',
            'css' => '!bg-red-200',
            'range' => [
                now()
                    ->startOfMonth()
                    ->addDays(12),
                now()
                    ->startOfMonth()
                    ->addDays(19),
            ],
        ],
    ];
@endphp

<x-calendar :events="$events" months="3" />
```

**Documentation:** https://mary-ui.com/docs/components/calendar

##### Chart

This component is a wrapper around **Chart.js**. So, it accepts any valid configuration described on its docs.

**Pro tip:** If you need a simple progress bar see the **Progress** component.

**Install:**

```blade
<head>
    ...
    {{-- Chart.js --}}
    <script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.0/dist/chart.umd.min.js"></script>
</head>
```

**Usage:**

Check all available options in the **Chart.js** docs.

```blade
<div class="grid gap-5">
    <x-button label="Randomize" wire:click="randomize" class="btn-primary" spinner />
    <x-button label="Switch" wire:click="switch" spinner />
</div>

<x-chart wire:model="myChart" />
```

```php
public array $myChart = [
    'type' => 'pie',
    'data' => [
        'labels' => ['Mary', 'Joe', 'Ana'],
        'datasets' => [
            [
                'label' => '# of Votes',
                'data' => [12, 19, 3],
            ]
        ]
    ],
];

public function randomize()
{
    Arr::set($this->myChart, 'data.datasets.0.data', [fake()->randomNumber(2), fake()->randomNumber(2), fake()->randomNumber(2)]);
}

public function switch()
{
    $type = $this->myChart['type'] == 'bar' ? 'pie' : 'bar';
    Arr::set($this->myChart, 'type', $type);
}
```

**Documentation:** https://mary-ui.com/docs/components/chart

##### Code

This component is a wrapper around **Ace Editor**. It is intended to be used on simple use cases, so do not expect a full featured code editor.

**Note:** Why not Monaco Editor? It's heavier and requires a more complex setup.

**Setup:**

```blade
<head>
    ...
    {{-- Ace Editor --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/ace/1.39.1/ace.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/ace/1.39.1/ext-language_tools.min.js"></script>
</head>
```

**Example:**

Ace Editor provides built-in support for common languages, including basic autocomplete and linting. It also includes a built-in search feature. Click inside the editor and hit `Cmd/Ctrl` + `F`.

```blade
<x-code wire:model="example1" label="Editor" hint="Javascript language." />
```

**Settings:**

```blade
<x-code wire:model="example2" language="properties" height="150px" line-height="3" print-margin="true" />
```

You can find the full list of supported languages and themes on the **Ace Editor demo page**. Just inspect the HTML of the dropdown menus to explore the available options.

**Themes:**

This component supports automatic theme switching. Try toggling the theme at the top of this page to see it in action.

```blade
<x-code wire:model="example3" dark-theme="cobalt" light-theme="dreamweaver" language="php" />
```

**Documentation:** https://mary-ui.com/docs/components/code

##### Date Picker

This component is a wrapper around **flatpickr**, for more details refer to its docs.

**Pro tip:** For native date time selection see **Date Time** component.

**Install:**

```blade
<head>
    ...
    {{-- Flatpickr --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css" />
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
</head>
```

**Usage:**

See all `$config` options at **flatpickr's docs**.

```blade
@php
    $config1 = ['altFormat' => 'd/m/Y'];
    $config2 = ['mode' => 'range'];
@endphp

<x-datepicker label="Date" wire:model="myDate1" icon="o-calendar" hint="Hi!" />
<x-datepicker label="Alt" wire:model="myDate2" icon="o-calendar" :config="$config1" />
<x-datepicker label="Range" wire:model="myDate3" icon="o-calendar" :config="$config2" inline />
```

**Localization and global settings:**

First add extra locale packages, then set up a global flatpickr object. See more at **flatpickr's docs**.

```blade
<head>
    ...
    {{-- Flatpickr --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css" />
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>

    {{-- It will not apply locale yet --}}
    <script src="https://npmcdn.com/flatpickr/dist/l10n/fr.js"></script>
    <script src="https://npmcdn.com/flatpickr/dist/l10n/pt.js"></script>
    <script src="https://npmcdn.com/flatpickr/dist/l10n/ru.js"></script>

    {{-- You need to set here the default locale or any global flatpickr settings --}}
    <script>
        flatpickr.localize(flatpickr.l10ns.fr)
    </script>
</head>
```

**Per component:**

Just add extra locale packages as described above, but **don't apply** global locale config. Instead, set locale on component config object.

```blade
@php
    $config1 = ['locale' => 'pt'];
    $config2 = ['locale' => 'fr'];
@endphp

<x-datepicker label="Portuguese" wire:model="myDate1" icon="o-calendar" :config="$config1" />
<x-datepicker label="French" wire:model="myDate1" icon="o-calendar" :config="$config2" />
```

**Plugins:**

Here is a example for `monthSelectPlugin`. Please, refer to flatpickr's docs for more plugins and how about to install them.

```blade
<head>
    ...
    {{-- MonthSelectPlugin --}}
    <script src="https://unpkg.com/flatpickr/dist/plugins/monthSelect/index.js"></script>
    <link href="https://unpkg.com/flatpickr/dist/plugins/monthSelect/style.css" rel="stylesheet" />
</head>
```

```blade
@php
    $config1 = [
        'plugins' => [
            [
                'monthSelectPlugin' => [
                    'dateFormat' =>
                        'm.y',
                    'altFormat' =>
                        'F Y',
                ],
            ],
        ],
    ];
@endphp

<x-datepicker label="Month" wire:model="myDate5" icon="o-calendar" :config="$config1" />
```

**Disable dates:**

Here is a example for `disable`. Please, refer to flatpickr's docs for **more examples**.

```blade
@php
    $config1 = [
        // An array of dates
        'disable' => [now()->addDays(1), now()->addDays(2), now()->addDays(3)],
    ];
@endphp

<x-datepicker label="Date" wire:model="myDate6" icon="o-calendar" :config="$config1" />
```

**Documentation:** https://mary-ui.com/docs/components/datepicker

##### Diff

This component is a wrapper around **diff2html** with a simpler API to quickly show diff between two strings.

**Install:**

```blade
<head>
    ...
    {{-- DIFF2HTML --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/11.8.0/styles/xcode.min.css" />
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/diff2html@3.4.48/bundles/css/diff2html.min.css" />
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/diff2html@3.4.48/bundles/js/diff2html-ui.min.js"></script>
</head>
```

**Examples:**

```blade
@php
    $old = '{"age": 24, "name": "Mary"}';
    $new = '{"age": 27, "name": "Marian"}';
@endphp

{{-- The `file-name` determines highlight language --}}
<x-diff :old="$old" :new="$new" file-name="extra.json" />
```

**Documentation:** https://mary-ui.com/docs/components/diff

##### Image Gallery

This component is a wrapper around **PhotoSwipe** to easily display a nice image gallery. It supports swipe gestures on mobile devices.

**Pro tip:** This a good option to display images from **Image Library** component.

**Setup:**

```blade
<head>
    ...
    {{-- PhotoSwipe --}}
    <script src="https://cdn.jsdelivr.net/npm/photoswipe@5.4.3/dist/umd/photoswipe.umd.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/photoswipe@5.4.3/dist/umd/photoswipe-lightbox.umd.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/photoswipe@5.4.3/dist/photoswipe.min.css" rel="stylesheet" />
</head>
```

**Basic:**

By default, the height of previews will be equal to the original images heights. Use some CSS to set max height.

```blade
@php
    $images = [
        '/photos/photo-1559703248-dcaaec9fab78.jpg',
        '/photos/photo-1572635148818-ef6fd45eb394.jpg',
        '/photos/photo-1565098772267-60af42b81ef2.jpg',
        '/photos/photo-1494253109108-2e30c049369b.jpg',
        '/photos/photo-1550258987-190a2d41a8ba.jpg',
    ];
@endphp

<x-image-gallery :images="$images" class="h-40 rounded-box" />
```

**Documentation:** https://mary-ui.com/docs/components/image-gallery

##### Markdown Editor

This component is a wrapper around **EasyMDE**. It **automatically** uploads images to **local** or **S3** disks.

**Pro tip:** Also see the **Rich Text Editor** component.

**Setup:**

```blade
<head>
    ...
    {{-- Make sure you have this --}}
    <meta name="csrf-token" content="{{ csrf_token() }}" />

    {{-- EasyMDE --}}
    <link rel="stylesheet" href="https://unpkg.com/easymde/dist/easymde.min.css" />
    <script src="https://unpkg.com/easymde/dist/easymde.min.js"></script>
</head>
```

If you are using the **local disk** remember to run this:

```bash
php artisan storage:link
```

**Example:**

For security reasons, uploads only works for **authenticated users**. On all examples we already have a random user logged in.

```blade
<x-markdown wire:model="text" label="Blog post" />
```

**Upload settings:**

By default, this component automatically uploads images to **local public disk** into **"markdown/"** folder. You can change it like this.

```blade
<x-markdown ... disk="s3" folder="super/cool/images" />
```

**Customizing:**

You can add or override any setting provided by **EasyMDE**. Check its docs for more.

```blade
@php
    $config = [
        'spellChecker' => true,
        'toolbar' => ['heading', 'bold', 'italic', '|', 'upload-image', 'preview'],
        'maxHeight' => '200px',
    ];
@endphp

<x-markdown wire:model="text2" :config="$config" />
```

**Preview style:**

Remember that Tailwind get rid of the basic styles of `H1, H2, H3` ... So, you need to put it back on your `app.css` to make the **preview** and **side-by-side** buttons work nice.

We have applied these style on this demo. Feel free to change it.

```css
.EasyMDEContainer h1 {
    @apply text-4xl font-bold mb-5;
}

.EasyMDEContainer h2 {
    @apply text-2xl font-bold mb-3;
}

.EasyMDEContainer h3 {
    @apply text-lg font-bold mb-3;
}
```

**Dark mode:**

By default, the EasyMDE does not support natively the dark mode. If you want to support dark mode, here is a example. Feel free to change it.

**Note:** Please, make sure you have configured the dark mode through the **Theme Toggle** component.

```css
.EasyMDEContainer .CodeMirror {
    @apply bg-base-100 text-base-content;
}

.EasyMDEContainer .CodeMirror-cursor {
    @apply border border-b-base-100;
}

.EasyMDEContainer .editor-toolbar > button:hover,
.EasyMDEContainer .editor-toolbar > .active {
    @apply bg-base-100 text-base-content;
}
```

**Documentation:** https://mary-ui.com/docs/components/markdown

##### Rich Text Editor

This component is a wrapper around **TinyMCE**. It **automatically** uploads images and files to **local** or **S3** disks.

**Pro tip:** Also see the **Markdown Editor** component.

**Setup:**

Create an account on TinyMCE site and replace `YOUR-KEY-HERE` on url below. If you don't want to rely on cloud setup, just download TinyMCE SDK and self-host the source code.

Also remember to add your local and production addresses on the allowed domains list.

```blade
<head>
    ...
    {{-- Make sure you have this --}}
    <meta name="csrf-token" content="{{ csrf_token() }}" />

    {{-- TinyMCE --}}
    <script src="https://cdn.tiny.cloud/1/YOUR-KEY-HERE/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
</head>
```

If you are using the **local disk** remember to run this:

```bash
php artisan storage:link
```

**Example:**

For security reasons, images and files uploads only works for **authenticated users**. On all examples we already have a random user logged in.

```blade
<x-editor wire:model="text" label="Description" hint="The full product description" />
```

**Upload settings:**

By default, this component automatically uploads images and files to **local public disk** into **"editor/"** folder. You can change it like this.

```blade
<x-editor ... disk="s3" folder="super/cool/images" />
```

**Customizing:**

You can add or override any setting provided by **TinyMCE**. Check its docs for more.

```blade
@php
    $config = [
        'plugins' => 'autoresize',
        'min_height' => 150,
        'max_height' => 250,
        'statusbar' => false,
        'toolbar' => 'undo redo | quickimage quicktable',
        'quickbars_selection_toolbar' => 'bold italic link',
    ];
@endphp

<x-editor wire:model="text2" :config="$config" />
```

**Dark mode:**

Unfortunately, TinyMCE does not support dark mode toggle on the fly. But, if you refresh the page the editor will respect the user's preference.

**Note:** Please, make sure you have configured the dark mode through the **Theme Toggle** component.

**Documentation:** https://mary-ui.com/docs/components/editor

##### Signature

This component is a wrapper around **signature_pad**, for more details refer to its docs.

**Setup:**

```blade
<head>
    ...
    {{-- Signature Pad --}}
    <script src="https://cdn.jsdelivr.net/npm/signature_pad@4.2.0/dist/signature_pad.umd.min.js"></script>
</head>
```

**Usage:**

It just extracts the signature as a **base64 string** after the end of each stroke.

```blade
<x-signature wire:model="signature1" hint="Please, sign it." />
```

So, you can display it later as a regular image.

```blade
<img src="{{ $signature2 }}" class="bg-pink-100 h-24 rounded-lg" />
```

**Customize:**

```blade
{{-- Do not set the `width`. It is always 100% --}}
<x-signature wire:model="signature3" clear-text="Delete it!" height="100" class="border-4 !bg-info/10" />
```

If you want to set the `width` use an outer div.

```blade
<div class="w-44">
    <x-signature ... />
</div>
```

You can set any configuration describe at **signature_pad** docs.

```blade
<x-signature wire:model="signature4" :config="['penColor' => 'red']" />
```

**Documentation:** https://mary-ui.com/docs/components/signature

#### Main Sections

- **Installation:** https://mary-ui.com/docs/installation
- **Layout:** https://mary-ui.com/docs/layout
- **Sidebar:** https://mary-ui.com/docs/sidebar
- **Customizing:** https://mary-ui.com/docs/customizing
- **Upgrading:** https://mary-ui.com/docs/upgrading
- **Bootcamp:** https://mary-ui.com/bootcamp

## Important Notes

1. **No Custom CSS:** MaryUI does NOT ship custom CSS - rely on daisyUI/Tailwind
2. **Stick to Defaults:** DaisyUI themes are carefully crafted - avoid unnecessary tweaks
3. **Inline Override:** Use daisyUI/Tailwind classes for customization
4. **Version Compatibility:** Ensure MaryUI v2, daisyUI 5, Tailwind CSS 4 compatibility
5. **View Cache:** Always clear view cache after component prefix changes: `php artisan view:clear`


<laravel-boost-guidelines>
=== foundation rules ===

# Laravel Boost Guidelines

The Laravel Boost guidelines are specifically curated by Laravel maintainers for this application. These guidelines should be followed closely to enhance the user's satisfaction building Laravel applications.

## Foundational Context
This application is a Laravel application and its main Laravel ecosystems package & versions are below. You are an expert with them all. Ensure you abide by these specific packages & versions.

- php - 8.3.29
- laravel/framework (LARAVEL) - v12
- laravel/horizon (HORIZON) - v5
- laravel/octane (OCTANE) - v2
- laravel/prompts (PROMPTS) - v0
- laravel/pulse (PULSE) - v1
- laravel/reverb (REVERB) - v1
- laravel/sanctum (SANCTUM) - v4
- laravel/scout (SCOUT) - v10
- laravel/socialite (SOCIALITE) - v5
- livewire/livewire (LIVEWIRE) - v3
- larastan/larastan (LARASTAN) - v3
- laravel/dusk (DUSK) - v8
- laravel/mcp (MCP) - v0
- laravel/pint (PINT) - v1
- laravel/sail (SAIL) - v1
- laravel/telescope (TELESCOPE) - v5
- pestphp/pest (PEST) - v4
- phpunit/phpunit (PHPUNIT) - v12
- alpinejs (ALPINEJS) - v3
- prettier (PRETTIER) - v3
- tailwindcss (TAILWINDCSS) - v4

## Conventions
- You must follow all existing code conventions used in this application. When creating or editing a file, check sibling files for the correct structure, approach, naming.
- Use descriptive names for variables and methods. For example, `isRegisteredForDiscounts`, not `discount()`.
- Check for existing components to reuse before writing a new one.

## Verification Scripts
- Do not create verification scripts or tinker when tests cover that functionality and prove it works. Unit and feature tests are more important.

## Application Structure & Architecture
- Stick to existing directory structure - don't create new base folders without approval.
- Do not change the application's dependencies without approval.

## Frontend Bundling
- If the user doesn't see a frontend change reflected in the UI, it could mean they need to run `npm run build`, `npm run dev`, or `composer run dev`. Ask them.

## Replies
- Be concise in your explanations - focus on what's important rather than explaining obvious details.

## Documentation Files
- You must only create documentation files if explicitly requested by the user.


=== boost rules ===

## Laravel Boost
- Laravel Boost is an MCP server that comes with powerful tools designed specifically for this application. Use them.

## Artisan
- Use the `list-artisan-commands` tool when you need to call an Artisan command to double check the available parameters.

## URLs
- Whenever you share a project URL with the user you should use the `get-absolute-url` tool to ensure you're using the correct scheme, domain / IP, and port.

## Tinker / Debugging
- You should use the `tinker` tool when you need to execute PHP to debug code or query Eloquent models directly.
- Use the `database-query` tool when you only need to read from the database.

## Reading Browser Logs With the `browser-logs` Tool
- You can read browser logs, errors, and exceptions using the `browser-logs` tool from Boost.
- Only recent browser logs will be useful - ignore old logs.

## Searching Documentation (Critically Important)
- Boost comes with a powerful `search-docs` tool you should use before any other approaches. This tool automatically passes a list of installed packages and their versions to the remote Boost API, so it returns only version-specific documentation specific for the user's circumstance. You should pass an array of packages to filter on if you know you need docs for particular packages.
- The 'search-docs' tool is perfect for all Laravel related packages, including Laravel, Inertia, Livewire, Filament, Tailwind, Pest, Nova, Nightwatch, etc.
- You must use this tool to search for Laravel-ecosystem documentation before falling back to other approaches.
- Search the documentation before making code changes to ensure we are taking the correct approach.
- Use multiple, broad, simple, topic based queries to start. For example: `['rate limiting', 'routing rate limiting', 'routing']`.
- Do not add package names to queries - package information is already shared. For example, use `test resource table`, not `filament 4 test resource table`.

### Available Search Syntax
- You can and should pass multiple queries at once. The most relevant results will be returned first.

1. Simple Word Searches with auto-stemming - query=authentication - finds 'authenticate' and 'auth'
2. Multiple Words (AND Logic) - query=rate limit - finds knowledge containing both "rate" AND "limit"
3. Quoted Phrases (Exact Position) - query="infinite scroll" - Words must be adjacent and in that order
4. Mixed Queries - query=middleware "rate limit" - "middleware" AND exact phrase "rate limit"
5. Multiple Queries - queries=["authentication", "middleware"] - ANY of these terms


=== php rules ===

## PHP

- Always use strict typing at the head of a `.php` file: `declare(strict_types=1);`.
- Always use curly braces for control structures, even if it has one line.

### Constructors
- Use PHP 8 constructor property promotion in `__construct()`.
    - <code-snippet>public function __construct(public GitHub $github) { }</code-snippet>
- Do not allow empty `__construct()` methods with zero parameters.

### Type Declarations
- Always use explicit return type declarations for methods and functions.
- Use appropriate PHP type hints for method parameters.

<code-snippet name="Explicit Return Types and Method Params" lang="php">
protected function isAccessible(User $user, ?string $path = null): bool
{
    ...
}
</code-snippet>

## Comments
- Prefer PHPDoc blocks over comments. Never use comments within the code itself unless there is something _very_ complex going on.

## PHPDoc Blocks
- Add useful array shape type definitions for arrays when appropriate.

## Enums
- Typically, keys in an Enum should be TitleCase. For example: `FavoritePerson`, `BestLake`, `Monthly`.


=== tests rules ===

## Test Enforcement

- Every change must be programmatically tested. Write a new test or update an existing test, then run the affected tests to make sure they pass.
- Run the minimum number of tests needed to ensure code quality and speed. Use `php artisan test` with a specific filename or filter.


=== laravel/core rules ===

## Do Things the Laravel Way

- Use `php artisan make:` commands to create new files (i.e. migrations, controllers, models, etc.). You can list available Artisan commands using the `list-artisan-commands` tool.
- If you're creating a generic PHP class, use `php artisan make:class`.
- Pass `--no-interaction` to all Artisan commands to ensure they work without user input. You should also pass the correct `--options` to ensure correct behavior.

### Database
- Always use proper Eloquent relationship methods with return type hints. Prefer relationship methods over raw queries or manual joins.
- Use Eloquent models and relationships before suggesting raw database queries
- Avoid `DB::`; prefer `Model::query()`. Generate code that leverages Laravel's ORM capabilities rather than bypassing them.
- Generate code that prevents N+1 query problems by using eager loading.
- Use Laravel's query builder for very complex database operations.

### Model Creation
- When creating new models, create useful factories and seeders for them too. Ask the user if they need any other things, using `list-artisan-commands` to check the available options to `php artisan make:model`.

### APIs & Eloquent Resources
- For APIs, default to using Eloquent API Resources and API versioning unless existing API routes do not, then you should follow existing application convention.

### Controllers & Validation
- Always create Form Request classes for validation rather than inline validation in controllers. Include both validation rules and custom error messages.
- Check sibling Form Requests to see if the application uses array or string based validation rules.

### Queues
- Use queued jobs for time-consuming operations with the `ShouldQueue` interface.

### Authentication & Authorization
- Use Laravel's built-in authentication and authorization features (gates, policies, Sanctum, etc.).

### URL Generation
- When generating links to other pages, prefer named routes and the `route()` function.

### Configuration
- Use environment variables only in configuration files - never use the `env()` function directly outside of config files. Always use `config('app.name')`, not `env('APP_NAME')`.

### Testing
- When creating models for tests, use the factories for the models. Check if the factory has custom states that can be used before manually setting up the model.
- Faker: Use methods such as `$this->faker->word()` or `fake()->randomDigit()`. Follow existing conventions whether to use `$this->faker` or `fake()`.
- When creating tests, make use of `php artisan make:test [options] {name}` to create a feature test, and pass `--unit` to create a unit test. Most tests should be feature tests.

### Vite Error
- If you receive an "Illuminate\Foundation\ViteException: Unable to locate file in Vite manifest" error, you can run `npm run build` or ask the user to run `npm run dev` or `composer run dev`.


=== laravel/v12 rules ===

## Laravel 12

- Use the `search-docs` tool to get version specific documentation.
- Since Laravel 11, Laravel has a new streamlined file structure which this project uses.

### Laravel 12 Structure
- No middleware files in `app/Http/Middleware/`.
- `bootstrap/app.php` is the file to register middleware, exceptions, and routing files.
- `bootstrap/providers.php` contains application specific service providers.
- **No app\Console\Kernel.php** - use `bootstrap/app.php` or `routes/console.php` for console configuration.
- **Commands auto-register** - files in `app/Console/Commands/` are automatically available and do not require manual registration.

### Database
- When modifying a column, the migration must include all of the attributes that were previously defined on the column. Otherwise, they will be dropped and lost.
- Laravel 11 allows limiting eagerly loaded records natively, without external packages: `$query->latest()->limit(10);`.

### Models
- Casts can and likely should be set in a `casts()` method on a model rather than the `$casts` property. Follow existing conventions from other models.


=== livewire/core rules ===

## Livewire Core
- Use the `search-docs` tool to find exact version specific documentation for how to write Livewire & Livewire tests.
- Use the `php artisan make:livewire [Posts\CreatePost]` artisan command to create new components
- State should live on the server, with the UI reflecting it.
- All Livewire requests hit the Laravel backend, they're like regular HTTP requests. Always validate form data, and run authorization checks in Livewire actions.

## Livewire Best Practices
- Livewire components require a single root element.
- Use `wire:loading` and `wire:dirty` for delightful loading states.
- Add `wire:key` in loops:

    ```blade
    @foreach ($items as $item)
        <div wire:key="item-{{ $item->id }}">
            {{ $item->name }}
        </div>
    @endforeach
    ```

- Prefer lifecycle hooks like `mount()`, `updatedFoo()` for initialization and reactive side effects:

<code-snippet name="Lifecycle hook examples" lang="php">
    public function mount(User $user) { $this->user = $user; }
    public function updatedSearch() { $this->resetPage(); }
</code-snippet>


## Testing Livewire

<code-snippet name="Example Livewire component test" lang="php">
    Livewire::test(Counter::class)
        ->assertSet('count', 0)
        ->call('increment')
        ->assertSet('count', 1)
        ->assertSee(1)
        ->assertStatus(200);
</code-snippet>


    <code-snippet name="Testing a Livewire component exists within a page" lang="php">
        $this->get('/posts/create')
        ->assertSeeLivewire(CreatePost::class);
    </code-snippet>


=== livewire/v3 rules ===

## Livewire 3

### Key Changes From Livewire 2
- These things changed in Livewire 2, but may not have been updated in this application. Verify this application's setup to ensure you conform with application conventions.
    - Use `wire:model.live` for real-time updates, `wire:model` is now deferred by default.
    - Components now use the `App\Livewire` namespace (not `App\Http\Livewire`).
    - Use `$this->dispatch()` to dispatch events (not `emit` or `dispatchBrowserEvent`).
    - Use the `components.layouts.app` view as the typical layout path (not `layouts.app`).

### New Directives
- `wire:show`, `wire:transition`, `wire:cloak`, `wire:offline`, `wire:target` are available for use. Use the documentation to find usage examples.

### Alpine
- Alpine is now included with Livewire, don't manually include Alpine.js.
- Plugins included with Alpine: persist, intersect, collapse, and focus.

### Lifecycle Hooks
- You can listen for `livewire:init` to hook into Livewire initialization, and `fail.status === 419` for the page expiring:

<code-snippet name="livewire:load example" lang="js">
document.addEventListener('livewire:init', function () {
    Livewire.hook('request', ({ fail }) => {
        if (fail && fail.status === 419) {
            alert('Your session expired');
        }
    });

    Livewire.hook('message.failed', (message, component) => {
        console.error(message);
    });
});
</code-snippet>


=== pint/core rules ===

## Laravel Pint Code Formatter

- You must run `vendor/bin/pint --dirty` before finalizing changes to ensure your code matches the project's expected style.
- Do not run `vendor/bin/pint --test`, simply run `vendor/bin/pint` to fix any formatting issues.


=== pest/core rules ===

## Pest
### Testing
- If you need to verify a feature is working, write or update a Unit / Feature test.

### Pest Tests
- All tests must be written using Pest. Use `php artisan make:test --pest {name}`.
- You must not remove any tests or test files from the tests directory without approval. These are not temporary or helper files - these are core to the application.
- Tests should test all of the happy paths, failure paths, and weird paths.
- Tests live in the `tests/Feature` and `tests/Unit` directories.
- Pest tests look and behave like this:
<code-snippet name="Basic Pest Test Example" lang="php">
it('is true', function () {
    expect(true)->toBeTrue();
});
</code-snippet>

### Running Tests
- Run the minimal number of tests using an appropriate filter before finalizing code edits.
- To run all tests: `php artisan test`.
- To run all tests in a file: `php artisan test tests/Feature/ExampleTest.php`.
- To filter on a particular test name: `php artisan test --filter=testName` (recommended after making a change to a related file).
- When the tests relating to your changes are passing, ask the user if they would like to run the entire test suite to ensure everything is still passing.

### Pest Assertions
- When asserting status codes on a response, use the specific method like `assertForbidden` and `assertNotFound` instead of using `assertStatus(403)` or similar, e.g.:
<code-snippet name="Pest Example Asserting postJson Response" lang="php">
it('returns all', function () {
    $response = $this->postJson('/api/docs', []);

    $response->assertSuccessful();
});
</code-snippet>

### Mocking
- Mocking can be very helpful when appropriate.
- When mocking, you can use the `Pest\Laravel\mock` Pest function, but always import it via `use function Pest\Laravel\mock;` before using it. Alternatively, you can use `$this->mock()` if existing tests do.
- You can also create partial mocks using the same import or self method.

### Datasets
- Use datasets in Pest to simplify tests which have a lot of duplicated data. This is often the case when testing validation rules, so consider going with this solution when writing tests for validation rules.

<code-snippet name="Pest Dataset Example" lang="php">
it('has emails', function (string $email) {
    expect($email)->not->toBeEmpty();
})->with([
    'james' => 'james@laravel.com',
    'taylor' => 'taylor@laravel.com',
]);
</code-snippet>


=== pest/v4 rules ===

## Pest 4

- Pest v4 is a huge upgrade to Pest and offers: browser testing, smoke testing, visual regression testing, test sharding, and faster type coverage.
- Browser testing is incredibly powerful and useful for this project.
- Browser tests should live in `tests/Browser/`.
- Use the `search-docs` tool for detailed guidance on utilizing these features.

### Browser Testing
- You can use Laravel features like `Event::fake()`, `assertAuthenticated()`, and model factories within Pest v4 browser tests, as well as `RefreshDatabase` (when needed) to ensure a clean state for each test.
- Interact with the page (click, type, scroll, select, submit, drag-and-drop, touch gestures, etc.) when appropriate to complete the test.
- If requested, test on multiple browsers (Chrome, Firefox, Safari).
- If requested, test on different devices and viewports (like iPhone 14 Pro, tablets, or custom breakpoints).
- Switch color schemes (light/dark mode) when appropriate.
- Take screenshots or pause tests for debugging when appropriate.

### Example Tests

<code-snippet name="Pest Browser Test Example" lang="php">
it('may reset the password', function () {
    Notification::fake();

    $this->actingAs(User::factory()->create());

    $page = visit('/sign-in'); // Visit on a real browser...

    $page->assertSee('Sign In')
        ->assertNoJavascriptErrors() // or ->assertNoConsoleLogs()
        ->click('Forgot Password?')
        ->fill('email', 'nuno@laravel.com')
        ->click('Send Reset Link')
        ->assertSee('We have emailed your password reset link!')

    Notification::assertSent(ResetPassword::class);
});
</code-snippet>

<code-snippet name="Pest Smoke Testing Example" lang="php">
$pages = visit(['/', '/about', '/contact']);

$pages->assertNoJavascriptErrors()->assertNoConsoleLogs();
</code-snippet>


=== tailwindcss/core rules ===

## Tailwind Core

- Use Tailwind CSS classes to style HTML, check and use existing tailwind conventions within the project before writing your own.
- Offer to extract repeated patterns into components that match the project's conventions (i.e. Blade, JSX, Vue, etc..)
- Think through class placement, order, priority, and defaults - remove redundant classes, add classes to parent or child carefully to limit repetition, group elements logically
- You can use the `search-docs` tool to get exact examples from the official documentation when needed.

### Spacing
- When listing items, use gap utilities for spacing, don't use margins.

    <code-snippet name="Valid Flex Gap Spacing Example" lang="html">
        <div class="flex gap-8">
            <div>Superior</div>
            <div>Michigan</div>
            <div>Erie</div>
        </div>
    </code-snippet>


### Dark Mode
- If existing pages and components support dark mode, new pages and components must support dark mode in a similar way, typically using `dark:`.


=== tailwindcss/v4 rules ===

## Tailwind 4

- Always use Tailwind CSS v4 - do not use the deprecated utilities.
- `corePlugins` is not supported in Tailwind v4.
- In Tailwind v4, configuration is CSS-first using the `@theme` directive — no separate `tailwind.config.js` file is needed.
<code-snippet name="Extending Theme in CSS" lang="css">
@theme {
  --color-brand: oklch(0.72 0.11 178);
}
</code-snippet>

- In Tailwind v4, you import Tailwind using a regular CSS `@import` statement, not using the `@tailwind` directives used in v3:

<code-snippet name="Tailwind v4 Import Tailwind Diff" lang="diff">
   - @tailwind base;
   - @tailwind components;
   - @tailwind utilities;
   + @import "tailwindcss";
</code-snippet>


### Replaced Utilities
- Tailwind v4 removed deprecated utilities. Do not use the deprecated option - use the replacement.
- Opacity values are still numeric.

| Deprecated |	Replacement |
|+--|
| bg-opacity-* | bg-black/* |
| text-opacity-* | text-black/* |
| border-opacity-* | border-black/* |
| divide-opacity-* | divide-black/* |
| ring-opacity-* | ring-black/* |
| placeholder-opacity-* | placeholder-black/* |
| flex-shrink-* | shrink-* |
| flex-grow-* | grow-* |
| overflow-ellipsis | text-ellipsis |
| decoration-slice | box-decoration-slice |
| decoration-clone | box-decoration-clone |
</laravel-boost-guidelines>
