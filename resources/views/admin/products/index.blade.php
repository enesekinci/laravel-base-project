@extends('admin.layouts.app')

@section('title', 'Ürünler')

@push('styles')
    <!-- DataTable -->
    <link rel="stylesheet" type="text/css" href="{{ asset('cork/src/plugins/src/table/datatable/datatables.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('cork/src/plugins/css/light/table/datatable/dt-global_style.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('cork/src/plugins/css/dark/table/datatable/dt-global_style.css') }}" />
@endpush

@push('scripts')
    <script>
        document.addEventListener('alpine:init', () => {
            Alpine.data('productList', () => ({
                products: [],
                loading: false,
                filters: {
                    search: '',
                    category_id: '',
                    brand_id: '',
                    is_active: '',
                    in_stock: '',
                },
                pagination: {
                    current_page: 1,
                    last_page: 1,
                    per_page: 20,
                    total: 0,
                },
                categories: [],
                brands: [],

                async init() {
                    // Wait for adminApiHelpers to be available
                    await this.waitForAdminApi()
                    await this.loadRelatedData()
                    await this.loadProducts()
                },

                async waitForAdminApi() {
                    let attempts = 0
                    while ((!window.adminApiHelpers || !window.adminApiHelpersLoaded) && attempts < 50) {
                        await new Promise((resolve) => setTimeout(resolve, 100))
                        attempts++
                    }
                    if (!window.adminApiHelpers) {
                        console.error('adminApiHelpers is not available')
                        if (window.Alpine && window.Alpine.store('toast')) {
                            window.Alpine.store('toast').error('Admin API helpers yüklenemedi. Sayfayı yenileyin.')
                        }
                        throw new Error('Admin API helpers not loaded')
                    }
                },

                async loadRelatedData() {
                    if (!window.adminApiHelpers) {
                        return
                    }
                    try {
                        // Load categories (tree)
                        const categoriesResponse = await window.adminApiHelpers.get('/categories', { tree: 1 })
                        this.categories = categoriesResponse.data || []

                        // Load brands
                        const brandsResponse = await window.adminApiHelpers.get('/brands')
                        this.brands = brandsResponse.data || []
                    } catch (error) {
                        console.error('Error loading related data:', error)
                    }
                },

                async loadProducts(page = 1) {
                    if (!window.adminApiHelpers) {
                        console.error('adminApiHelpers is not available')
                        return
                    }

                    this.loading = true
                    try {
                        const params = {
                            page,
                            per_page: this.pagination.per_page,
                            ...this.filters,
                        }

                        // Remove empty filters
                        Object.keys(params).forEach((key) => {
                            if (params[key] === '' || params[key] === null) {
                                delete params[key]
                            }
                        })

                        const response = await window.adminApiHelpers.get('/products', params)
                        this.products = response.data
                        this.pagination = {
                            current_page: response.meta.current_page,
                            last_page: response.meta.last_page,
                            per_page: response.meta.per_page,
                            total: response.meta.total,
                            from: response.meta.from,
                            to: response.meta.to,
                        }
                    } catch (error) {
                        console.error('Error loading products:', error)
                        if (window.Alpine && window.Alpine.store('toast')) {
                            window.Alpine.store('toast').error('Ürünler yüklenirken bir hata oluştu')
                        }
                    } finally {
                        this.loading = false
                        // Initialize tooltips after loading
                        this.$nextTick(() => {
                            const tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
                            tooltipTriggerList.map(function (tooltipTriggerEl) {
                                return new bootstrap.Tooltip(tooltipTriggerEl)
                            })
                        })
                    }
                },

                async applyFilters() {
                    this.pagination.current_page = 1
                    await this.loadProducts(1)
                },

                async resetFilters() {
                    this.filters = {
                        search: '',
                        category_id: '',
                        brand_id: '',
                        is_active: '',
                        in_stock: '',
                    }
                    await this.loadProducts(1)
                },

                async changePage(page) {
                    if (page >= 1 && page <= this.pagination.last_page) {
                        await this.loadProducts(page)
                    }
                },

                async deleteItem(id) {
                    if (window.Alpine && window.Alpine.store('confirm')) {
                        window.Alpine.store('confirm').show('Ürünü Sil', 'Bu ürünü silmek istediğinize emin misiniz?', async () => {
                            try {
                                await window.adminApiHelpers.delete(`/products/${id}`)
                                if (window.Alpine && window.Alpine.store('toast')) {
                                    window.Alpine.store('toast').success('Ürün silindi')
                                }
                                await this.loadProducts(this.pagination.current_page)
                            } catch (error) {
                                console.error('Error deleting product:', error)
                            }
                        })
                    }
                },

                async restoreItem(id) {
                    try {
                        await window.adminApiHelpers.post(`/products/${id}/restore`)
                        if (window.Alpine && window.Alpine.store('toast')) {
                            window.Alpine.store('toast').success('Ürün geri yüklendi')
                        }
                        await this.loadProducts(this.pagination.current_page)
                    } catch (error) {
                        console.error('Error restoring product:', error)
                    }
                },

                async toggleActive(id) {
                    try {
                        await window.adminApiHelpers.post(`/products/${id}/toggle-active`)
                        if (window.Alpine && window.Alpine.store('toast')) {
                            window.Alpine.store('toast').success('Ürün durumu güncellendi')
                        }
                        await this.loadProducts(this.pagination.current_page)
                    } catch (error) {
                        console.error('Error toggling active:', error)
                    }
                },
            }))
        })
    </script>

    <!-- Tom Select -->
    <script src="{{ asset('cork/src/plugins/src/tomSelect/tom-select.base.js') }}"></script>
@endpush

@section('content')
    <!-- BREADCRUMB -->
    <div class="page-meta">
        <nav class="breadcrumb-style-one" aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Admin</a></li>
                <li class="breadcrumb-item"><a href="#">E-Ticaret</a></li>
                <li class="breadcrumb-item active" aria-current="page">Ürünler</li>
            </ol>
        </nav>
    </div>
    <!-- /BREADCRUMB -->

    <div x-data="productList" x-init="init()">
        <div class="row layout-top-spacing">
            <div class="col-xl-12 col-lg-12 col-sm-12 layout-spacing">
                <div class="widget-content widget-content-area br-8 p-4">
                    <!-- Header -->
                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <h4 class="mb-0">Ürünler</h4>
                        <a href="{{ route('admin.products.create') }}" class="btn btn-primary">
                            <svg
                                xmlns="http://www.w3.org/2000/svg"
                                width="24"
                                height="24"
                                viewBox="0 0 24 24"
                                fill="none"
                                stroke="currentColor"
                                stroke-width="2"
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                class="feather feather-plus"
                                style="width: 18px; height: 18px; vertical-align: middle"
                            >
                                <line x1="12" y1="5" x2="12" y2="19"></line>
                                <line x1="5" y1="12" x2="19" y2="12"></line>
                            </svg>
                            <span class="ms-2">Yeni Ürün</span>
                        </a>
                    </div>

                    <!-- Filter Bar -->
                    <div class="widget-content widget-content-area br-8 p-4 mb-4">
                        <div class="row">
                            <div class="col-md-2">
                                <label class="form-label">Ara</label>
                                <input type="text" x-model="filters.search" @input.debounce.500ms="applyFilters()" placeholder="İsim veya SKU..." class="form-control" />
                            </div>
                            <div class="col-md-2">
                                <label class="form-label">Kategori</label>
                                <select x-model="filters.category_id" @change="applyFilters()" class="form-select" placeholder="Tüm Kategoriler">
                                    <option value="">Tüm Kategoriler</option>
                                    <template x-for="category in categories" :key="category.id">
                                        <option :value="category.id" x-text="category.name"></option>
                                    </template>
                                </select>
                            </div>
                            <div class="col-md-2">
                                <label class="form-label">Marka</label>
                                <select x-model="filters.brand_id" @change="applyFilters()" class="form-select" placeholder="Tüm Markalar">
                                    <option value="">Tüm Markalar</option>
                                    <template x-for="brand in brands" :key="brand.id">
                                        <option :value="brand.id" x-text="brand.name"></option>
                                    </template>
                                </select>
                            </div>
                            <div class="col-md-2">
                                <label class="form-label">Aktif Mi</label>
                                <select x-model="filters.is_active" @change="applyFilters()" class="form-select">
                                    <option value="">Tümü</option>
                                    <option value="1">Aktif</option>
                                    <option value="0">Pasif</option>
                                </select>
                            </div>
                            <div class="col-md-2">
                                <label class="form-label">Stokta Var</label>
                                <select x-model="filters.in_stock" @change="applyFilters()" class="form-select">
                                    <option value="">Tümü</option>
                                    <option value="1">Stokta Var</option>
                                    <option value="0">Stokta Yok</option>
                                </select>
                            </div>
                            <div class="col-md-2 d-flex align-items-end">
                                <button @click="resetFilters()" class="btn btn-secondary w-100">Filtreleri Sıfırla</button>
                            </div>
                        </div>
                    </div>

                    <!-- Table -->
                    <div class="table-responsive" x-show="!loading">
                        <table class="table dt-table-hover" style="width: 100%">
                            <thead>
                                <tr>
                                    <th>Resim</th>
                                    <th>İsim</th>
                                    <th>SKU</th>
                                    <th>Fiyat</th>
                                    <th>Stok</th>
                                    <th>Durum</th>
                                    <th>Oluşturulma</th>
                                    <th class="no-content text-center">İşlemler</th>
                                </tr>
                            </thead>
                            <tbody>
                                <template x-for="product in products" :key="product.id">
                                    <tr>
                                        <td>
                                            <div class="avatar">
                                                <img
                                                    :src="product.images && product.images[0] ? product.images[0].url : '/placeholder-image.png'"
                                                    :alt="product.name"
                                                    style="width: 64px; height: 64px; object-fit: cover; border-radius: 8px"
                                                />
                                            </div>
                                        </td>
                                        <td>
                                            <div class="d-flex flex-column">
                                                <span class="text-truncate fw-bold" x-text="product.name"></span>
                                            </div>
                                        </td>
                                        <td>
                                            <span class="text-truncate" x-text="product.sku"></span>
                                        </td>
                                        <td>
                                            <span x-text="`₺${product.price}`"></span>
                                        </td>
                                        <td>
                                            <span x-text="product.quantity || 0"></span>
                                        </td>
                                        <td>
                                            <div class="d-flex align-items-center gap-2">
                                                <template x-if="product.is_active">
                                                    <span class="badge badge-success d-flex align-items-center gap-1">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-check-circle">
                                                            <path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path>
                                                            <polyline points="22 4 12 14.01 9 11.01"></polyline>
                                                        </svg>
                                                        <span>Aktif</span>
                                                    </span>
                                                </template>
                                                <template x-if="!product.is_active">
                                                    <span class="badge badge-danger d-flex align-items-center gap-1">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x-circle">
                                                            <circle cx="12" cy="12" r="10"></circle>
                                                            <line x1="15" y1="9" x2="9" y2="15"></line>
                                                            <line x1="9" y1="9" x2="15" y2="15"></line>
                                                        </svg>
                                                        <span>Pasif</span>
                                                    </span>
                                                </template>
                                            </div>
                                        </td>
                                        <td>
                                            <span x-text="new Date(product.created_at).toLocaleDateString()"></span>
                                        </td>
                                        <td class="text-center">
                                            <div class="d-flex justify-content-center gap-2">
                                                <a :href="`/admin/products/${product.id}/edit`" class="btn btn-sm btn-icon btn-outline-primary" title="Düzenle" data-bs-toggle="tooltip" data-bs-placement="top">
                                                    <svg
                                                        xmlns="http://www.w3.org/2000/svg"
                                                        width="18"
                                                        height="18"
                                                        viewBox="0 0 24 24"
                                                        fill="none"
                                                        stroke="currentColor"
                                                        stroke-width="2"
                                                        stroke-linecap="round"
                                                        stroke-linejoin="round"
                                                        class="feather feather-edit"
                                                    >
                                                        <path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path>
                                                        <path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path>
                                                    </svg>
                                                </a>
                                                <button type="button" @click="toggleActive(product.id)" class="btn btn-sm btn-icon" :class="product.is_active ? 'btn-outline-warning' : 'btn-outline-success'" :title="product.is_active ? 'Pasif Yap' : 'Aktif Yap'" data-bs-toggle="tooltip" data-bs-placement="top">
                                                    <template x-if="product.is_active">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-eye-off">
                                                            <path d="M17.94 17.94A10.07 10.07 0 0 1 12 20c-7 0-11-8-11-8a18.45 18.45 0 0 1 5.06-5.94M9.9 4.24A9.12 9.12 0 0 1 12 4c7 0 11 8 11 8a18.5 18.5 0 0 1-2.16 3.19m-6.72-1.07a3 3 0 1 1-4.24-4.24"></path>
                                                            <line x1="1" y1="1" x2="23" y2="23"></line>
                                                        </svg>
                                                    </template>
                                                    <template x-if="!product.is_active">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-eye">
                                                            <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path>
                                                            <circle cx="12" cy="12" r="3"></circle>
                                                        </svg>
                                                    </template>
                                                </button>
                                                <button type="button" @click="deleteItem(product.id)" class="btn btn-sm btn-icon btn-outline-primary" title="Sil" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-toggle="tooltip" data-bs-placement="top">
                                                    <svg
                                                        xmlns="http://www.w3.org/2000/svg"
                                                        width="18"
                                                        height="18"
                                                        viewBox="0 0 24 24"
                                                        fill="none"
                                                        stroke="currentColor"
                                                        stroke-width="2"
                                                        stroke-linecap="round"
                                                        stroke-linejoin="round"
                                                        class="feather feather-trash-2"
                                                    >
                                                        <polyline points="3 6 5 6 21 6"></polyline>
                                                        <path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path>
                                                        <line x1="10" y1="11" x2="10" y2="17"></line>
                                                        <line x1="14" y1="11" x2="14" y2="17"></line>
                                                    </svg>
                                                </button>
                                            </div>
                                        </td>
                                    </tr>
                                </template>
                                <tr x-show="products.length === 0 && !loading">
                                    <td colspan="8" class="text-center">
                                        <p class="text-muted">Ürün bulunamadı</p>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <!-- Loading -->
                    <div x-show="loading" class="text-center p-4">
                        <div class="spinner-border text-primary" role="status">
                            <span class="visually-hidden">Yükleniyor...</span>
                        </div>
                        <p class="mt-2 text-muted">Yükleniyor...</p>
                    </div>

                    <!-- Pagination -->
                    <div x-show="! loading && pagination.last_page > 1" class="d-flex justify-content-between align-items-center mt-4">
                        <div class="text-muted">
                            <span x-text="pagination.from"></span>
                            -
                            <span x-text="pagination.to"></span>
                            /
                            <span x-text="pagination.total"></span>
                            sonuç gösteriliyor
                        </div>
                        <nav>
                            <ul class="pagination mb-0">
                                <li class="page-item" :class="{ 'disabled': pagination.current_page <= 1 }">
                                    <a class="page-link" href="javascript:void(0);" @click="changePage(pagination.current_page - 1)">Önceki</a>
                                </li>
                                <template x-for="page in Array.from({ length: pagination.last_page }, (_, i) => i + 1)" :key="page">
                                    <li class="page-item" :class="{ 'active': page === pagination.current_page }">
                                        <a class="page-link" href="javascript:void(0);" @click="changePage(page)" x-text="page"></a>
                                    </li>
                                </template>
                                <li class="page-item" :class="{ 'disabled': pagination.current_page >= pagination.last_page }">
                                    <a class="page-link" href="javascript:void(0);" @click="changePage(pagination.current_page + 1)">Sonraki</a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
