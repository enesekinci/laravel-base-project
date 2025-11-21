@extends('layouts.app')

@section('title', 'Component Showcase')

@push('styles')
<!-- DataTable -->
<link rel="stylesheet" type="text/css" href="{{ asset('cork/src/plugins/src/table/datatable/datatables.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('cork/src/plugins/css/light/table/datatable/dt-global_style.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('cork/src/plugins/css/dark/table/datatable/dt-global_style.css') }}">

<!-- File Upload -->
<link rel="stylesheet" href="{{ asset('cork/src/plugins/src/filepond/filepond.min.css') }}">
<link rel="stylesheet" href="{{ asset('cork/src/plugins/src/filepond/FilePondPluginImagePreview.min.css') }}">
<link href="{{ asset('cork/src/plugins/css/light/filepond/custom-filepond.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('cork/src/plugins/css/dark/filepond/custom-filepond.css') }}" rel="stylesheet" type="text/css" />

<!-- Tagify -->
<link rel="stylesheet" type="text/css" href="{{ asset('cork/src/plugins/src/tagify/tagify.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('cork/src/plugins/css/light/tagify/custom-tagify.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('cork/src/plugins/css/dark/tagify/custom-tagify.css') }}">

<!-- Switches -->
<link rel="stylesheet" type="text/css" href="{{ asset('cork/src/assets/css/light/forms/switches.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('cork/src/assets/css/dark/forms/switches.css') }}">

<!-- Quill Editor -->
<link rel="stylesheet" type="text/css" href="{{ asset('cork/src/plugins/css/light/editors/quill/quill.snow.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('cork/src/plugins/css/dark/editors/quill/quill.snow.css') }}">

<!-- Ecommerce Create -->
<link rel="stylesheet" href="{{ asset('cork/src/assets/css/light/apps/ecommerce-create.css') }}">
<link rel="stylesheet" href="{{ asset('cork/src/assets/css/dark/apps/ecommerce-create.css') }}">

<!-- Tom Select -->
<link rel="stylesheet" type="text/css" href="{{ asset('cork/src/plugins/src/tomSelect/tom-select.default.min.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('cork/src/plugins/css/light/tomSelect/custom-tomSelect.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('cork/src/plugins/css/dark/tomSelect/custom-tomSelect.css') }}">

<!-- TouchSpin -->
<link rel="stylesheet" type="text/css" href="{{ asset('cork/src/plugins/src/bootstrap-touchspin/jquery.bootstrap-touchspin.min.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('cork/src/plugins/css/light/bootstrap-touchspin/custom-jquery.bootstrap-touchspin.min.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('cork/src/plugins/css/dark/bootstrap-touchspin/custom-jquery.bootstrap-touchspin.min.css') }}">

<!-- Flatpickr (Date Time Picker) -->
<link rel="stylesheet" type="text/css" href="{{ asset('cork/src/plugins/src/flatpickr/flatpickr.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('cork/src/plugins/css/light/flatpickr/custom-flatpickr.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('cork/src/plugins/css/dark/flatpickr/custom-flatpickr.css') }}">

<!-- Slider (noUiSlider) -->
<link rel="stylesheet" type="text/css" href="{{ asset('cork/src/plugins/src/noUiSlider/nouislider.min.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('cork/src/plugins/css/light/noUiSlider/custom-nouiSlider.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('cork/src/plugins/css/dark/noUiSlider/custom-nouiSlider.css') }}">

<!-- Auto Complete -->
<link rel="stylesheet" type="text/css" href="{{ asset('cork/src/plugins/src/autocomplete/css/autoComplete.02.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('cork/src/plugins/css/light/autocomplete/css/custom-autoComplete.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('cork/src/plugins/css/dark/autocomplete/css/custom-autoComplete.css') }}">
@endpush

@section('content')
<!-- BREADCRUMB -->
<div class="page-meta">
    <nav class="breadcrumb-style-one" aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Admin</a></li>
            <li class="breadcrumb-item active" aria-current="page">Component Showcase</li>
        </ol>
    </nav>
</div>
<!-- /BREADCRUMB -->

<div class="row layout-top-spacing">

    <!-- DATA TABLE SECTION -->
    <div class="col-xl-12 col-lg-12 col-sm-12 layout-spacing">
        <div class="widget-content widget-content-area br-8 p-4">
            <h4 class="mb-4">DataTable - AJAX ile Data Çekme</h4>
            <div class="table-responsive">
                <table id="component-datatable" class="table dt-table-hover" style="width:100%">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Ad</th>
                            <th>Pozisyon</th>
                            <th>Ofis</th>
                            <th>Yaş</th>
                            <th>Başlangıç Tarihi</th>
                            <th>Maaş</th>
                            <th class="no-content">İşlem</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Data AJAX ile yüklenecek -->
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- PRODUCT EDIT LAYOUT SECTION -->
    <div class="col-xl-12 col-lg-12 col-sm-12 layout-spacing">
        <div class="widget-content widget-content-area br-8 p-4">
            <h4 class="mb-4">Product Edit Layout</h4>
            
            <div class="row mb-4">
                <div class="col-xxl-9 col-xl-12 col-lg-12 col-md-12 col-sm-12">
                    <div class="widget-content widget-content-area ecommerce-create-section p-4">
                        <div class="row mb-4">
                            <div class="col-sm-12">
                                <input type="text" class="form-control" id="product-name" placeholder="Ürün Adı" value="Nike Ayakkabı Kırmızı">
                            </div>
                        </div>

                        <div class="row mb-4">
                            <div class="col-sm-12">
                                <label>Açıklama</label>
                                <div id="product-description">
                                    Perspiciatis maxime facilis velit tenetur, iste expedita in dignissimos iure aut excepturi sapiente eligendi repellat. Lorem ipsum dolor sit amet consectetur, adipisicing elit. Aut blanditiis assumenda doloremque fugiat minima tempora!
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-8">
                                <label for="product-images">Resim Yükle</label>
                                <div class="multiple-file-upload">
                                    <input type="file" 
                                        class="filepond file-upload-multiple"
                                        name="filepond"
                                        id="product-images" 
                                        multiple 
                                        data-allow-reorder="true"
                                        data-instant-upload="false"
                                        data-max-file-size="3MB"
                                        data-max-files="5">
                                </div>
                            </div>

                            <div class="col-md-4 text-center">
                                <div class="switch form-switch-custom switch-inline form-switch-primary mt-4">
                                    <input class="switch-input" type="checkbox" role="switch" id="showPublicly" checked>
                                    <label class="switch-label" for="showPublicly">Herkese göster</label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xxl-3 col-xl-12 col-lg-12 col-md-12 col-sm-12">
                    <div class="row">
                        <div class="col-xxl-12 col-xl-8 col-lg-8 col-md-7 mt-xxl-0 mt-4">
                            <div class="widget-content widget-content-area ecommerce-create-section p-4">
                                <div class="row">
                                    <div class="col-xxl-12 mb-4">
                                        <div class="switch form-switch-custom switch-inline form-switch-secondary">
                                            <input class="switch-input" type="checkbox" role="switch" id="in-stock" checked>
                                            <label class="switch-label" for="in-stock">Stokta Var</label>
                                        </div>
                                    </div>
                                    <div class="col-xxl-12 col-md-6 mb-4">
                                        <label for="proCode">Ürün Kodu</label>
                                        <input type="text" class="form-control" id="proCode" value="79WEL56A">
                                    </div>
                                    <div class="col-xxl-12 col-md-6 mb-4">
                                        <label for="proSKU">Ürün SKU</label>
                                        <input type="text" class="form-control" id="proSKU" value="QQ69SOP3D/T2">
                                    </div>
                                    <div class="col-xxl-12 col-md-6 mb-4">
                                        <label for="gender">Cinsiyet</label>
                                        <select class="form-select" id="gender">
                                            <option value="">Seçiniz...</option>
                                            <option value="men" selected>Erkek</option>
                                            <option value="women">Kadın</option>
                                            <option value="kids">Çocuk</option>
                                            <option value="unisex">Unisex</option>
                                        </select>
                                    </div>
                                    <div class="col-xxl-12 col-md-6 mb-4">
                                        <label for="category">Kategori</label>
                                        <select class="form-select" id="category">
                                            <option value="">Seçiniz...</option>
                                            <option value="electronics">Elektronik</option>
                                            <option value="clothing" selected>Giyim</option>
                                            <option value="organic">Organik</option>
                                            <option value="apperal">Giyim Eşyası</option>
                                            <option value="accessories">Aksesuar</option>
                                        </select>
                                    </div>
                                    <div class="col-xxl-12 col-lg-6 col-md-12">
                                        <label for="tags">Etiketler</label>
                                        <input id="tags" class="product-tags" value="ayakkabı, 2021 : Edition">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xxl-12 col-xl-4 col-lg-4 col-md-5 mt-4">
                            <div class="widget-content widget-content-area ecommerce-create-section p-4">
                                <div class="row">
                                    <div class="col-sm-12 mb-4">
                                        <label for="regular-price">Normal Fiyat</label>
                                        <input type="text" class="form-control" id="regular-price" value="180">
                                    </div>
                                    <div class="col-sm-12 mb-4">
                                        <label for="sale-price">İndirimli Fiyat</label>
                                        <input type="text" class="form-control" id="sale-price" value="30">
                                    </div>
                                    <div class="col-sm-12 mb-4">
                                        <div class="switch form-switch-custom switch-inline form-switch-danger">
                                            <input class="switch-input" type="checkbox" role="switch" id="pricing-includes-texes" checked>
                                            <label class="switch-label" for="pricing-includes-texes">Fiyat vergi dahil</label>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <button class="btn btn-success w-100">Değişiklikleri Kaydet</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- FORM COMPONENTS SECTION -->
    <div class="col-xl-12 col-lg-12 col-sm-12 layout-spacing">
        <div class="widget-content widget-content-area br-8 p-4">
            <h4 class="mb-4">Form Component'leri</h4>

            <!-- Input Group -->
            <div class="row mb-4">
                <div class="col-12">
                    <h5>Input Group</h5>
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon1">@</span>
                        <input type="text" class="form-control" placeholder="Kullanıcı adı" aria-label="Username" aria-describedby="basic-addon1">
                    </div>
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" placeholder="Miktar" aria-label="Recipient's username" aria-describedby="basic-addon2">
                        <span class="input-group-text" id="basic-addon2">₺</span>
                    </div>
                </div>
            </div>

            <!-- Input Mask -->
            <div class="row mb-4">
                <div class="col-md-6">
                    <h5>Input Mask</h5>
                    <div class="form-group">
                        <label for="static-mask1">Telefon (99-9999999)</label>
                        <input id="static-mask1" type="text" class="form-control" placeholder="">
                    </div>
                    <div class="form-group">
                        <label for="static-mask2">Plaka (aa-9999)</label>
                        <input id="static-mask2" type="text" class="form-control" placeholder="">
                    </div>
                </div>
            </div>

            <!-- Tom Select -->
            <div class="row mb-4">
                <div class="col-md-6">
                    <h5>Tom Select - Tagging</h5>
                    <input id="input-tags" value="awesome,neat" autocomplete="off" placeholder="Etiket ekleyin...">
                </div>
                <div class="col-md-6">
                    <h5>Tom Select - Select Box</h5>
                    <select id="select-beast" placeholder="Bir kişi seçin..." autocomplete="off">
                        <option value="">Bir kişi seçin...</option>
                        <option value="4">Thomas Edison</option>
                        <option value="1">Nikola</option>
                        <option value="3">Nikola Tesla</option>
                        <option value="5">Arnold Schwarzenegger</option>
                    </select>
                </div>
            </div>

            <!-- Tagify -->
            <div class="row mb-4">
                <div class="col-md-6">
                    <h5>Tagify - Basic</h5>
                    <input name='basic' value='tag1, tag2 autofocus'>
                </div>
            </div>

            <!-- TouchSpin -->
            <div class="row mb-4">
                <div class="col-md-6">
                    <h5>TouchSpin - Postfix</h5>
                    <input id="demo1" type="text" value="55" name="demo1">
                </div>
                <div class="col-md-6">
                    <h5>TouchSpin - Prefix</h5>
                    <input id="demo2" type="text" value="0" name="demo2" class="form-control">
                </div>
            </div>

            <!-- Maxlength -->
            <div class="row mb-4">
                <div class="col-md-6">
                    <h5>Maxlength</h5>
                    <input type="text" class="form-control" maxlength="10" placeholder="Maksimum 10 karakter">
                </div>
            </div>

            <!-- Checkbox -->
            <div class="row mb-4">
                <div class="col-12">
                    <h5>Checkbox</h5>
                    <div class="form-check form-check-primary form-check-inline">
                        <input class="form-check-input" type="checkbox" id="form-check-default">
                        <label class="form-check-label" for="form-check-default">Default</label>
                    </div>
                    <div class="form-check form-check-primary form-check-inline">
                        <input class="form-check-input" type="checkbox" id="form-check-default-checked" checked>
                        <label class="form-check-label" for="form-check-default-checked">Checked</label>
                    </div>
                    <div class="form-check form-check-primary form-check-inline">
                        <input class="form-check-input" type="checkbox" id="form-check-disabled" disabled>
                        <label class="form-check-label" for="form-check-disabled">Disabled</label>
                    </div>
                </div>
            </div>

            <!-- Radio -->
            <div class="row mb-4">
                <div class="col-12">
                    <h5>Radio</h5>
                    <div class="form-check form-check-primary form-check-inline">
                        <input class="form-check-input" type="radio" name="radio1" id="radio1" checked>
                        <label class="form-check-label" for="radio1">Seçenek 1</label>
                    </div>
                    <div class="form-check form-check-primary form-check-inline">
                        <input class="form-check-input" type="radio" name="radio1" id="radio2">
                        <label class="form-check-label" for="radio2">Seçenek 2</label>
                    </div>
                    <div class="form-check form-check-primary form-check-inline">
                        <input class="form-check-input" type="radio" name="radio1" id="radio3" disabled>
                        <label class="form-check-label" for="radio3">Disabled</label>
                    </div>
                </div>
            </div>

            <!-- Switches -->
            <div class="row mb-4">
                <div class="col-12">
                    <h5>Switches</h5>
                    <div class="form-check form-switch form-check-inline">
                        <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckDefault">
                        <label class="form-check-label" for="flexSwitchCheckDefault">Default</label>
                    </div>
                    <div class="form-check form-switch form-check-inline">
                        <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckChecked" checked>
                        <label class="form-check-label" for="flexSwitchCheckChecked">Checked</label>
                    </div>
                    <div class="form-check form-switch form-check-inline form-switch-primary">
                        <input class="form-check-input" type="checkbox" role="switch" id="form-switch-primary" checked>
                        <label class="form-check-label" for="form-switch-primary">Primary</label>
                    </div>
                    <div class="form-check form-switch form-check-inline form-switch-success">
                        <input class="form-check-input" type="checkbox" role="switch" id="form-switch-success" checked>
                        <label class="form-check-label" for="form-switch-success">Success</label>
                    </div>
                </div>
            </div>

            <!-- Quill Editor (CKEditor yerine) -->
            <div class="row mb-4">
                <div class="col-12">
                    <h5>Quill Editor (Rich Text Editor)</h5>
                    <div id="editor-container">
                        <h1>Bu bir başlık metni...</h1>
                        <br/>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla dui arcu, pellentesque id mattis sed, mattis semper erat.</p>
                    </div>
                </div>
            </div>

            <!-- Date Time Picker -->
            <div class="row mb-4">
                <div class="col-md-4">
                    <h5>Date Picker - Basic</h5>
                    <input id="basicFlatpickr" value="{{ date('Y-m-d') }}" class="form-control flatpickr flatpickr-input active" type="text" placeholder="Tarih Seçin..">
                </div>
                <div class="col-md-4">
                    <h5>Date Time Picker</h5>
                    <input id="dateTimeFlatpickr" value="{{ date('Y-m-d H:i') }}" class="form-control flatpickr flatpickr-input active" type="text" placeholder="Tarih ve Saat Seçin..">
                </div>
                <div class="col-md-4">
                    <h5>Range Calendar</h5>
                    <input id="rangeCalendarFlatpickr" class="form-control flatpickr flatpickr-input active" type="text" placeholder="Tarih Aralığı Seçin..">
                </div>
            </div>

            <!-- Slider -->
            <div class="row mb-4">
                <div class="col-md-6">
                    <h5>Slider</h5>
                    <div id="html5"></div>
                </div>
            </div>

            <!-- Auto Complete -->
            <div class="row mb-4">
                <div class="col-md-6">
                    <h5>Auto Complete</h5>
                    <input type="text" class="form-control" id="autoComplete" placeholder="Ülke kodu ara...">
                </div>
            </div>

        </div>
    </div>

    <!-- SETTINGS SECTION -->
    <div class="col-xl-12 col-lg-12 col-sm-12 layout-spacing">
        <div class="widget-content widget-content-area br-8 p-4">
            <h4 class="mb-4">Ayarlar Sayfası</h4>
            
            <div class="account-settings-container">
                <div class="account-content">
                    <div class="row mb-3">
                        <div class="col-md-12">
                            <ul class="nav nav-pills" id="animateLine" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link active" id="animated-underline-home-tab" data-bs-toggle="tab" href="#animated-underline-home" role="tab" aria-controls="animated-underline-home" aria-selected="true">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-home"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path><polyline points="9 22 9 12 15 12 15 22"></polyline></svg> Ana Sayfa
                                    </button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="animated-underline-profile-tab" data-bs-toggle="tab" href="#animated-underline-profile" role="tab" aria-controls="animated-underline-profile" aria-selected="false">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-dollar-sign"><line x1="12" y1="1" x2="12" y2="23"></line><path d="M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"></path></svg> Ödeme Detayları
                                    </button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="animated-underline-preferences-tab" data-bs-toggle="tab" href="#animated-underline-preferences" role="tab" aria-controls="animated-underline-preferences" aria-selected="false">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg> Tercihler
                                    </button>
                                </li>
                            </ul>
                        </div>
                    </div>

                    <div class="tab-content" id="animateLineContent-4">
                        <div class="tab-pane fade show active" id="animated-underline-home" role="tabpanel" aria-labelledby="animated-underline-home-tab">
                            <div class="row">
                                <div class="col-xl-12 col-lg-12 col-md-12 layout-spacing">
                                    <form class="section general-info">
                                        <div class="info">
                                            <h6 class="">Genel Bilgiler</h6>
                                            <div class="row">
                                                <div class="col-lg-11 mx-auto">
                                                    <div class="row">
                                                        <div class="col-xl-2 col-lg-12 col-md-4">
                                                            <div class="profile-image mt-4 pe-md-4">
                                                                <div class="img-uploader-content">
                                                                    <input type="file" class="filepond" name="filepond" accept="image/png, image/jpeg, image/gif"/>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-xl-10 col-lg-12 col-md-8 mt-md-0 mt-4">
                                                            <div class="form">
                                                                <div class="row">
                                                                    <div class="col-md-6">
                                                                        <div class="form-group">
                                                                            <label for="fullName">Ad Soyad</label>
                                                                            <input type="text" class="form-control mb-3" id="fullName" placeholder="Ad Soyad" value="Ahmet Yılmaz">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <div class="form-group">
                                                                            <label for="profession">Meslek</label>
                                                                            <input type="text" class="form-control mb-3" id="profession" placeholder="Meslek" value="Web Developer">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <div class="form-group">
                                                                            <label for="country">Ülke</label>
                                                                            <select class="form-select mb-3" id="country">
                                                                                <option>Tüm Ülkeler</option>
                                                                                <option selected>Türkiye</option>
                                                                                <option>ABD</option>
                                                                                <option>Almanya</option>
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <div class="form-group">
                                                                            <label for="address">Adres</label>
                                                                            <input type="text" class="form-control mb-3" id="address" placeholder="Adres" value="İstanbul">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <div class="form-group">
                                                                            <label for="phone">Telefon</label>
                                                                            <input type="text" class="form-control mb-3" id="phone" placeholder="Telefon numaranız" value="+90 555 123 4567">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <div class="form-group">
                                                                            <label for="email">E-posta</label>
                                                                            <input type="text" class="form-control mb-3" id="email" placeholder="E-posta adresiniz" value="ahmet@example.com">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-12 mt-1">
                                                                        <div class="form-check">
                                                                            <input class="form-check-input" type="checkbox" value="" id="customCheck1">
                                                                            <label class="form-check-label" for="customCheck1">Bunu varsayılan adresim yap</label>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-12 mt-1">
                                                                        <div class="form-group text-end">
                                                                            <button class="btn btn-secondary">Kaydet</button>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="animated-underline-profile" role="tabpanel" aria-labelledby="animated-underline-profile-tab">
                            <div class="row">
                                <div class="col-xl-12 col-lg-12 col-md-12 layout-spacing">
                                    <h6>Ödeme Detayları</h6>
                                    <p>Ödeme bilgileri burada gösterilecek.</p>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="animated-underline-preferences" role="tabpanel" aria-labelledby="animated-underline-preferences-tab">
                            <div class="row">
                                <div class="col-xl-12 col-lg-12 col-md-12 layout-spacing">
                                    <h6>Tercihler</h6>
                                    <p>Kullanıcı tercihleri burada gösterilecek.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection

@push('scripts')
<!-- DataTable -->
<script src="{{ asset('cork/src/plugins/src/table/datatable/datatables.js') }}"></script>
<script>
    $(document).ready(function() {
        // CSRF Token Setup for AJAX
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        // DataTable - AJAX ile data çekme
        // Not: Gerçek kullanımda API endpoint'i kullanılacak
        // Şimdilik örnek data gösteriyoruz, gerçek kullanımda serverSide: true yapılacak
        // Gerçek kullanım örneği:
        /*
        $('#component-datatable').DataTable({
            "processing": true,
            "serverSide": true,
            "ajax": {
                "url": "/api/admin/products",
                "type": "GET",
                "headers": {
                    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr('content')
                },
                "data": function(d) {
                    return {
                        search: d.search ? d.search.value : '',
                        per_page: d.length,
                        page: Math.floor(d.start / d.length) + 1
                    };
                },
                "dataSrc": function(json) {
                    if (json && json.data) {
                        return json.data;
                    }
                    return [];
                }
            },
            ...
        });
        */
        $('#component-datatable').DataTable({
            "processing": true,
            "serverSide": false, // Örnek için false, gerçek kullanımda true yapılacak
            "data": [
                { "id": 1, "name": "Tiger Nixon", "position": "System Architect", "office": "Edinburgh", "age": 61, "start_date": "2011/04/25", "salary": "$320,800" },
                { "id": 2, "name": "Garrett Winters", "position": "Accountant", "office": "Tokyo", "age": 63, "start_date": "2011/07/25", "salary": "$170,750" },
                { "id": 3, "name": "Ashton Cox", "position": "Junior Technical Author", "office": "San Francisco", "age": 66, "start_date": "2009/01/12", "salary": "$86,000" },
                { "id": 4, "name": "Cedric Kelly", "position": "Senior Javascript Developer", "office": "Edinburgh", "age": 22, "start_date": "2012/03/29", "salary": "$433,060" },
                { "id": 5, "name": "Airi Satou", "position": "Accountant", "office": "Tokyo", "age": 33, "start_date": "2008/11/28", "salary": "$162,700" }
            ],
            "columns": [
                { "data": "id" },
                { "data": "name" },
                { "data": "position" },
                { "data": "office" },
                { "data": "age" },
                { "data": "start_date" },
                { "data": "salary" },
                { "data": null, "orderable": false, "defaultContent": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x-circle table-cancel"><circle cx="12" cy="12" r="10"></circle><line x1="15" y1="9" x2="9" y2="15"></line><line x1="9" y1="9" x2="15" y2="15"></line></svg>' }
            ],
            "dom": "<'dt--top-section'<'row'<'col-12 col-sm-6 d-flex justify-content-sm-start justify-content-center'l><'col-12 col-sm-6 d-flex justify-content-sm-end justify-content-center mt-sm-0 mt-3'f>>>" +
            "<'table-responsive'tr>" +
            "<'dt--bottom-section d-sm-flex justify-content-sm-between text-center'<'dt--pages-count  mb-sm-0 mb-3'i><'dt--pagination'p>>",
            "oLanguage": {
                "oPaginate": { 
                    "sPrevious": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-left"><line x1="19" y1="12" x2="5" y2="12"></line><polyline points="12 19 5 12 12 5"></polyline></svg>', 
                    "sNext": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-right"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>' 
                },
                "sInfo": "Sayfa _PAGE_ / _PAGES_",
                "sSearch": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>',
                "sSearchPlaceholder": "Ara...",
                "sLengthMenu": "Sonuç :  _MENU_",
            },
            "stripeClasses": [],
            "lengthMenu": [7, 10, 20, 50],
            "pageLength": 10
        });
    });
</script>

<!-- File Upload -->
<script src="{{ asset('cork/src/plugins/src/filepond/filepond.min.js') }}"></script>
<script src="{{ asset('cork/src/plugins/src/filepond/FilePondPluginFileValidateType.min.js') }}"></script>
<script src="{{ asset('cork/src/plugins/src/filepond/FilePondPluginImageExifOrientation.min.js') }}"></script>
<script src="{{ asset('cork/src/plugins/src/filepond/FilePondPluginImagePreview.min.js') }}"></script>
<script src="{{ asset('cork/src/plugins/src/filepond/FilePondPluginImageCrop.min.js') }}"></script>
<script src="{{ asset('cork/src/plugins/src/filepond/FilePondPluginImageResize.min.js') }}"></script>
<script src="{{ asset('cork/src/plugins/src/filepond/FilePondPluginImageTransform.min.js') }}"></script>
<script src="{{ asset('cork/src/plugins/src/filepond/filepondPluginFileValidateSize.min.js') }}"></script>
<script>
    // File Upload
    FilePond.registerPlugin(
        FilePondPluginFileValidateType,
        FilePondPluginImageExifOrientation,
        FilePondPluginImagePreview,
        FilePondPluginImageCrop,
        FilePondPluginImageResize,
        FilePondPluginImageTransform
    );

    // Multiple file upload
    const pond = FilePond.create(document.querySelector('#product-images'), {
        allowMultiple: true,
        maxFiles: 5,
        maxFileSize: '3MB',
        instantUpload: false
    });

    // Single file upload for settings
    FilePond.create(document.querySelector('.filepond'), {
        imagePreviewHeight: 170,
        imageCropAspectRatio: '1:1',
        imageResizeTargetWidth: 200,
        imageResizeTargetHeight: 200,
        stylePanelLayout: 'compact circle',
    });
</script>

<!-- Quill Editor -->
<script src="{{ asset('cork/src/plugins/src/editors/quill/quill.js') }}"></script>
<script>
    // Quill Editor
    var quill = new Quill('#editor-container', {
        modules: {
            toolbar: [
                [{ header: [1, 2, false] }],
                ['bold', 'italic', 'underline'],
                ['image', 'code-block']
            ]
        },
        placeholder: 'İçerik yazın...',
        theme: 'snow'
    });
</script>

<!-- Tagify -->
<script src="{{ asset('cork/src/plugins/src/tagify/tagify.min.js') }}"></script>
<script>
    // Tagify - Basic
    var input = document.querySelector('input[name=basic]');
    new Tagify(input);

    // Product Tags
    var productTags = document.querySelector('#tags');
    new Tagify(productTags);
</script>

<!-- Tom Select -->
<script src="{{ asset('cork/src/plugins/src/tomSelect/tom-select.base.js') }}"></script>
<script>
    // Tom Select - Tagging
    new TomSelect("#input-tags", {
        persist: false,
        createOnBlur: true,
        create: true
    });

    // Tom Select - Select Box
    new TomSelect("#select-beast", {
        create: true,
        sortField: {
            field: "text",
            direction: "asc"
        }
    });
</script>

<!-- Input Mask -->
<script src="{{ asset('cork/src/plugins/src/input-mask/jquery.inputmask.bundle.min.js') }}"></script>
<script>
    $(document).ready(function() {
        $('#static-mask1').inputmask("99-9999999");
        $('#static-mask2').inputmask({mask: "aa-9999"});
    });
</script>

<!-- TouchSpin -->
<script src="{{ asset('cork/src/plugins/src/bootstrap-touchspin/jquery.bootstrap-touchspin.min.js') }}"></script>
<script>
    $(document).ready(function() {
        $("input[name='demo1']").TouchSpin({
            postfix: '%'
        });

        $("input[name='demo2']").TouchSpin({
            prefix: '%',
        });
    });
</script>

<!-- Flatpickr (Date Time Picker) -->
<script src="{{ asset('cork/src/plugins/src/flatpickr/flatpickr.js') }}"></script>
<script>
    // Date Picker - Basic
    var f1 = flatpickr(document.getElementById('basicFlatpickr'));

    // Date Time Picker
    var f2 = flatpickr(document.getElementById('dateTimeFlatpickr'), {
        enableTime: true,
        dateFormat: "Y-m-d H:i",
    });

    // Range Calendar
    var f3 = flatpickr(document.getElementById('rangeCalendarFlatpickr'), {
        mode: "range"
    });
</script>

<!-- Slider -->
<script src="{{ asset('cork/src/plugins/src/noUiSlider/nouislider.min.js') }}"></script>
<script src="{{ asset('cork/src/plugins/src/noUiSlider/wNumb.min.js') }}"></script>
<script>
    // Slider
    var html5Slider = document.getElementById('html5');
    if (html5Slider) {
        noUiSlider.create(html5Slider, {
            start: [20, 80],
            connect: true,
            tooltips: true,
            range: {
                'min': 0,
                'max': 100
            }
        });
    }
</script>

<!-- Auto Complete -->
<script src="{{ asset('cork/src/plugins/src/autocomplete/autoComplete.min.js') }}"></script>
<script>
    // Auto Complete
    var countries = ['Türkiye', 'ABD', 'Almanya', 'Fransa', 'İngiltere', 'İspanya', 'İtalya'];
    const autoCompleteJS = new autoComplete({
        selector: "#autoComplete",
        placeHolder: "Ülke ara...",
        data: {
            src: countries
        },
        resultsList: {
            element: (list, data) => {
                if (!data.results.length) {
                    const message = document.createElement("div");
                    message.setAttribute("class", "no_result");
                    message.innerHTML = `<span>Sonuç bulunamadı "${data.query}"</span>`;
                    list.prepend(message);
                }
            },
            noResults: true,
        },
        resultItem: {
            highlight: {
                render: true
            }
        },
        events: {
            input: {
                focus() {
                    if (autoCompleteJS.input.value.length) autoCompleteJS.start();
                },
                selection(event) {
                    const feedback = event.detail;
                    const selection = feedback.selection.value;
                    autoCompleteJS.input.value = selection;
                }
            }
        }
    });
</script>

<!-- Ecommerce Create -->
<script src="{{ asset('cork/src/assets/js/apps/ecommerce-create.js') }}"></script>
@endpush

