@extends('admin.layouts.app')

@section('title', 'Customers')

@push('scripts')
    <script>
        document.addEventListener('alpine:init', () => {
            Alpine.data('customerList', () => ({
                customers: [],
                loading: false,
                filters: {
                    search: '',
                },
                pagination: {
                    current_page: 1,
                    last_page: 1,
                    per_page: 50,
                    total: 0,
                },

                async init() {
                    await this.waitForAdminApi()
                    await this.loadCustomers()
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

                async loadCustomers(page = 1) {
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

                        const response = await window.adminApiHelpers.get('/customers', params)
                        this.customers = response.data
                        this.pagination = {
                            current_page: response.meta.current_page,
                            last_page: response.meta.last_page,
                            per_page: response.meta.per_page,
                            total: response.meta.total,
                            from: response.meta.from,
                            to: response.meta.to,
                        }
                    } catch (error) {
                        console.error('Error loading customers:', error)
                        if (window.Alpine && window.Alpine.store('toast')) {
                            window.Alpine.store('toast').error('Müşteriler yüklenirken bir hata oluştu')
                        }
                    } finally {
                        this.loading = false
                    }
                },

                async applyFilters() {
                    this.pagination.current_page = 1
                    await this.loadCustomers(1)
                },

                async resetFilters() {
                    this.filters = { search: '' }
                    await this.loadCustomers(1)
                },

                async changePage(page) {
                    if (page >= 1 && page <= this.pagination.last_page) {
                        await this.loadCustomers(page)
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
                <li class="breadcrumb-item"><a href="#">Sales</a></li>
                <li class="breadcrumb-item active" aria-current="page">Customers</li>
            </ol>
        </nav>
    </div>
    <!-- /BREADCRUMB -->

    <div x-data="customerList" x-init="init()">
        <div class="row layout-top-spacing">
            <div class="col-xl-12 col-lg-12 col-sm-12 layout-spacing">
                <div class="widget-content widget-content-area br-8 p-4">
                    <!-- Header -->
                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <h4 class="mb-0">Customers</h4>
                    </div>

                    <!-- Filter Bar -->
                    <div class="widget-content widget-content-area br-8 p-4 mb-4">
                        <div class="row">
                            <div class="col-md-10">
                                <label class="form-label">Search</label>
                                <input type="text" x-model="filters.search" @input.debounce.500ms="applyFilters()" placeholder="Name, email or phone..." class="form-control" />
                            </div>
                            <div class="col-md-2 d-flex align-items-end">
                                <button @click="resetFilters()" class="btn btn-secondary w-100">Reset Filters</button>
                            </div>
                        </div>
                    </div>

                    <!-- Table -->
                    <div class="table-responsive" x-show="!loading">
                        <table class="table dt-table-hover" style="width: 100%">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Registered At</th>
                                    <th class="no-content text-center">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <template x-for="customer in customers" :key="customer.id">
                                    <tr>
                                        <td>
                                            <div class="d-flex flex-column">
                                                <span class="text-truncate fw-bold" x-text="customer.name || '-'"></span>
                                            </div>
                                        </td>
                                        <td>
                                            <span class="text-truncate" x-text="customer.email"></span>
                                        </td>
                                        <td>
                                            <span x-text="customer.phone || '-'"></span>
                                        </td>
                                        <td>
                                            <span x-text="customer.created_at ? new Date(customer.created_at).toLocaleDateString() : '-'"></span>
                                        </td>
                                        <td class="text-center">
                                            <div class="d-flex justify-content-center gap-2">
                                                <a
                                                    :href="`/admin/customers/${customer.id}`"
                                                    class="btn btn-sm btn-icon btn-outline-primary"
                                                    title="View"
                                                >
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
                                                        class="feather feather-eye"
                                                    >
                                                        <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path>
                                                        <circle cx="12" cy="12" r="3"></circle>
                                                    </svg>
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
                                </template>
                                <tr x-show="customers.length === 0 && !loading">
                                    <td colspan="5" class="text-center">
                                        <p class="text-muted">No customers found</p>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <!-- Loading -->
                    <div x-show="loading" class="text-center p-4">
                        <div class="spinner-border text-primary" role="status">
                            <span class="visually-hidden">Loading...</span>
                        </div>
                        <p class="mt-2 text-muted">Loading...</p>
                    </div>

                    <!-- Pagination -->
                    <div x-show="! loading && pagination.last_page > 1" class="d-flex justify-content-between align-items-center mt-4">
                        <div class="text-muted">
                            Showing
                            <span x-text="pagination.from"></span>
                            to
                            <span x-text="pagination.to"></span>
                            of
                            <span x-text="pagination.total"></span>
                            results
                        </div>
                        <nav>
                            <ul class="pagination mb-0">
                                <li class="page-item" :class="{ 'disabled': pagination.current_page <= 1 }">
                                    <a class="page-link" href="javascript:void(0);" @click="changePage(pagination.current_page - 1)">Previous</a>
                                </li>
                                <template x-for="page in Array.from({ length: pagination.last_page }, (_, i) => i + 1)" :key="page">
                                    <li class="page-item" :class="{ 'active': page === pagination.current_page }">
                                        <a class="page-link" href="javascript:void(0);" @click="changePage(page)" x-text="page"></a>
                                    </li>
                                </template>
                                <li class="page-item" :class="{ 'disabled': pagination.current_page >= pagination.last_page }">
                                    <a class="page-link" href="javascript:void(0);" @click="changePage(pagination.current_page + 1)">Next</a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
