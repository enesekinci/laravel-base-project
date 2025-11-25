@extends('admin.layouts.app')

@section('title', 'Kategoriler')

@push('scripts')
    <script>
        document.addEventListener('alpine:init', () => {
            Alpine.data('categoryList', () => ({
                categories: [],
                loading: false,
                filters: {
                    search: '',
                    parent_id: '',
                    is_active: '',
                },
                pagination: {
                    current_page: 1,
                    last_page: 1,
                    per_page: 50,
                    total: 0,
                },
                allCategories: [],

                async init() {
                    await this.waitForAdminApi()
                    await this.loadRelatedData()
                    await this.loadCategories()
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
                        // Load all categories for parent filter
                        const categoriesResponse = await window.adminApiHelpers.get('/categories', { per_page: 1000 })
                        this.allCategories = categoriesResponse.data || []
                    } catch (error) {
                        console.error('Error loading related data:', error)
                    }
                },

                async loadCategories(page = 1) {
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

                        Object.keys(params).forEach((key) => {
                            if (params[key] === '' || params[key] === null) {
                                delete params[key]
                            }
                        })

                        const response = await window.adminApiHelpers.get('/categories', params)
                        this.categories = response.data
                        this.pagination = {
                            current_page: response.meta.current_page,
                            last_page: response.meta.last_page,
                            per_page: response.meta.per_page,
                            total: response.meta.total,
                            from: response.meta.from,
                            to: response.meta.to,
                        }
                    } catch (error) {
                        console.error('Error loading categories:', error)
                        if (window.Alpine && window.Alpine.store('toast')) {
                            window.Alpine.store('toast').error('Kategoriler yüklenirken bir hata oluştu')
                        }
                    } finally {
                        this.loading = false
                    }
                },

                async applyFilters() {
                    this.pagination.current_page = 1
                    await this.loadCategories(1)
                },

                async resetFilters() {
                    this.filters = {
                        search: '',
                        parent_id: '',
                        is_active: '',
                    }
                    await this.loadCategories(1)
                },

                async changePage(page) {
                    if (page >= 1 && page <= this.pagination.last_page) {
                        await this.loadCategories(page)
                    }
                },

                async deleteItem(id) {
                    if (window.Alpine && window.Alpine.store('confirm')) {
                        window.Alpine.store('confirm').show('Kategoriyi Sil', 'Bu kategoriyi silmek istediğinize emin misiniz?', async () => {
                            try {
                                await window.adminApiHelpers.delete(`/categories/${id}`)
                                if (window.Alpine && window.Alpine.store('toast')) {
                                    window.Alpine.store('toast').success('Kategori silindi')
                                }
                                await this.loadCategories(this.pagination.current_page)
                            } catch (error) {
                                console.error('Error deleting category:', error)
                            }
                        })
                    }
                },
            }))
        })
    </script>
@endpush

@section('content')
    <!-- BREADCRUMB -->
    <div class="page-meta">
        <nav class="breadcrumb-style-one" aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Admin</a></li>
                <li class="breadcrumb-item"><a href="#">E-Ticaret</a></li>
                <li class="breadcrumb-item active" aria-current="page">Kategoriler</li>
            </ol>
        </nav>
    </div>
    <!-- /BREADCRUMB -->

    <div x-data="categoryList" x-init="init()">
        <div class="row layout-top-spacing">
            <div class="col-xl-12 col-lg-12 col-sm-12 layout-spacing">
                <div class="widget-content widget-content-area br-8 p-4">
                    <!-- Header -->
                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <h4 class="mb-0">Kategoriler</h4>
                        <a href="{{ route('admin.categories.create') }}" class="btn btn-primary">
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
                            <span class="ms-2">Yeni Kategori</span>
                        </a>
                    </div>

                    <!-- Filter Bar -->
                    <div class="widget-content widget-content-area br-8 p-4 mb-4">
                        <div class="row">
                            <div class="col-md-3">
                                <label class="form-label">Ara</label>
                                <input type="text" x-model="filters.search" @input.debounce.500ms="applyFilters()" placeholder="İsim veya slug..." class="form-control" />
                            </div>
                            <div class="col-md-3">
                                <label class="form-label">Ana Kategori</label>
                                <select x-model="filters.parent_id" @change="applyFilters()" class="form-select">
                                    <option value="">Tüm Kategoriler</option>
                                    <template x-for="category in allCategories" :key="category.id">
                                        <option :value="category.id" x-text="category.name"></option>
                                    </template>
                                </select>
                            </div>
                            <div class="col-md-3">
                                <label class="form-label">Aktif Mi</label>
                                <select x-model="filters.is_active" @change="applyFilters()" class="form-select">
                                    <option value="">Tümü</option>
                                    <option value="1">Aktif</option>
                                    <option value="0">Pasif</option>
                                </select>
                            </div>
                            <div class="col-md-3 d-flex align-items-end">
                                <button @click="resetFilters()" class="btn btn-secondary w-100">Filtreleri Sıfırla</button>
                            </div>
                        </div>
                    </div>

                    <!-- Table -->
                    <div class="table-responsive" x-show="!loading">
                        <table class="table dt-table-hover" style="width: 100%">
                            <thead>
                                <tr>
                                    <th>İsim</th>
                                    <th>Slug</th>
                                    <th>Ana Kategori</th>
                                    <th>Durum</th>
                                    <th>Sıralama</th>
                                    <th class="no-content text-center">İşlemler</th>
                                </tr>
                            </thead>
                            <tbody>
                                <template x-for="category in categories" :key="category.id">
                                    <tr>
                                        <td>
                                            <div class="d-flex flex-column">
                                                <span class="text-truncate fw-bold" x-text="category.name"></span>
                                            </div>
                                        </td>
                                        <td>
                                            <span class="text-truncate" x-text="category.slug"></span>
                                        </td>
                                        <td>
                                            <span x-text="category.parent?.name || '-'"></span>
                                        </td>
                                        <td>
                                            <span :class="category.is_active ? 'badge badge-success' : 'badge badge-danger'" x-text="category.is_active ? 'Aktif' : 'Pasif'"></span>
                                        </td>
                                        <td>
                                            <span x-text="category.sort_order || 0"></span>
                                        </td>
                                        <td class="text-center">
                                            <div class="d-flex justify-content-center gap-2">
                                                <a :href="`/admin/categories/${category.id}/edit`" class="btn btn-sm btn-icon btn-outline-primary" title="Düzenle" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-toggle="tooltip" data-bs-placement="top">
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
                                                <button type="button" @click="deleteItem(category.id)" class="btn btn-sm btn-icon btn-outline-primary" title="Sil" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-toggle="tooltip" data-bs-placement="top">
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
                                <tr x-show="categories.length === 0 && !loading">
                                    <td colspan="6" class="text-center">
                                        <p class="text-muted">Kategori bulunamadı</p>
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
