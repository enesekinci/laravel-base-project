---
alwaysApply: true
---

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
