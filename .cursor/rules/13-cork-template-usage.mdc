---
alwaysApply: true
---

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
