@extends('admin.layouts.app')

@section('title', 'Siparişler')

@push('styles')
    <!-- DataTable -->
    <link rel="stylesheet" type="text/css" href="{{ asset('cork/src/plugins/src/table/datatable/datatables.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('cork/src/plugins/css/light/table/datatable/dt-global_style.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('cork/src/plugins/css/dark/table/datatable/dt-global_style.css') }}" />

    <!-- Flatpickr -->
    <link rel="stylesheet" type="text/css" href="{{ asset('cork/src/plugins/src/flatpickr/flatpickr.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('cork/src/plugins/css/light/flatpickr/custom-flatpickr.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('cork/src/plugins/css/dark/flatpickr/custom-flatpickr.css') }}" />
@endpush

@push('scripts')
    <script>
        document.addEventListener('alpine:init', () => {
            Alpine.data('orderList', () => ({
                orders: [],
                loading: false,
                filters: {
                    search: '',
                    status: '',
                    payment_status: '',
                    date_from: '',
                    date_to: '',
                },
                pagination: {
                    current_page: 1,
                    last_page: 1,
                    per_page: 20,
                    total: 0,
                },

                async init() {
                    await this.waitForAdminApi()
                    await this.loadOrders()
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

                async loadOrders(page = 1) {
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

                        const response = await window.adminApiHelpers.get('/orders', params)
                        this.orders = response.data
                        this.pagination = {
                            current_page: response.meta.current_page,
                            last_page: response.meta.last_page,
                            per_page: response.meta.per_page,
                            total: response.meta.total,
                            from: response.meta.from,
                            to: response.meta.to,
                        }
                    } catch (error) {
                        console.error('Error loading orders:', error)
                        if (window.Alpine && window.Alpine.store('toast')) {
                            window.Alpine.store('toast').error('Siparişler yüklenirken bir hata oluştu')
                        }
                    } finally {
                        this.loading = false
                    }
                },

                async applyFilters() {
                    this.pagination.current_page = 1
                    await this.loadOrders(1)
                },

                async resetFilters() {
                    this.filters = {
                        search: '',
                        status: '',
                        payment_status: '',
                        date_from: '',
                        date_to: '',
                    }
                    await this.loadOrders(1)
                },

                async changePage(page) {
                    if (page >= 1 && page <= this.pagination.last_page) {
                        await this.loadOrders(page)
                    }
                },
            }))
        })
    </script>

    <!-- Flatpickr -->
    <script src="{{ asset('cork/src/plugins/src/flatpickr/flatpickr.js') }}"></script>
    <script>
        document.addEventListener('alpine:init', () => {
            Alpine.effect(() => {
                setTimeout(() => {
                    // Date From
                    const dateFromInput = document.getElementById('date-from')
                    if (dateFromInput && !dateFromInput.flatpickr) {
                        flatpickr(dateFromInput, {
                            dateFormat: 'Y-m-d',
                            onChange: (selectedDates, dateStr) => {
                                if (window.Alpine) {
                                    const component = window.Alpine.$data(document.querySelector('[x-data="orderList"]'))
                                    if (component) {
                                        component.filters.date_from = dateStr
                                        component.applyFilters()
                                    }
                                }
                            },
                        })
                    }

                    // Date To
                    const dateToInput = document.getElementById('date-to')
                    if (dateToInput && !dateToInput.flatpickr) {
                        flatpickr(dateToInput, {
                            dateFormat: 'Y-m-d',
                            onChange: (selectedDates, dateStr) => {
                                if (window.Alpine) {
                                    const component = window.Alpine.$data(document.querySelector('[x-data="orderList"]'))
                                    if (component) {
                                        component.filters.date_to = dateStr
                                        component.applyFilters()
                                    }
                                }
                            },
                        })
                    }
                }, 300)
            })
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
                <li class="breadcrumb-item active" aria-current="page">Siparişler</li>
            </ol>
        </nav>
    </div>
    <!-- /BREADCRUMB -->

    <div x-data="orderList" x-init="init()">
        <div class="row layout-top-spacing">
            <div class="col-xl-12 col-lg-12 col-sm-12 layout-spacing">
                <div class="widget-content widget-content-area br-8 p-4">
                    <!-- Header -->
                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <h4 class="mb-0">Siparişler</h4>
                    </div>

                    <!-- Filter Bar -->
                    <div class="widget-content widget-content-area br-8 p-4 mb-4">
                        <div class="row">
                            <div class="col-md-2">
                                <label class="form-label">Ara</label>
                                <input type="text" x-model="filters.search" @input.debounce.500ms="applyFilters()" placeholder="Sipariş # veya e-posta..." class="form-control" />
                            </div>
                            <div class="col-md-2">
                                <label class="form-label">Durum</label>
                                <select x-model="filters.status" @change="applyFilters()" class="form-select" placeholder="Tüm Durumlar">
                                    <option value="">Tümü</option>
                                    <option value="pending">Beklemede</option>
                                    <option value="processing">İşleniyor</option>
                                    <option value="shipped">Kargoya Verildi</option>
                                    <option value="completed">Tamamlandı</option>
                                    <option value="cancelled">İptal Edildi</option>
                                </select>
                            </div>
                            <div class="col-md-2">
                                <label class="form-label">Ödeme Durumu</label>
                                <select x-model="filters.payment_status" @change="applyFilters()" class="form-select" placeholder="Tüm Ödeme Durumları">
                                    <option value="">Tümü</option>
                                    <option value="pending">Beklemede</option>
                                    <option value="paid">Ödendi</option>
                                    <option value="failed">Başarısız</option>
                                    <option value="refunded">İade Edildi</option>
                                </select>
                            </div>
                            <div class="col-md-2">
                                <label class="form-label">Başlangıç Tarihi</label>
                                <input type="text" id="date-from" x-model="filters.date_from" class="form-control flatpickr" placeholder="Tarih seçin" />
                            </div>
                            <div class="col-md-2">
                                <label class="form-label">Bitiş Tarihi</label>
                                <input type="text" id="date-to" x-model="filters.date_to" class="form-control flatpickr" placeholder="Tarih seçin" />
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
                                    <th>Sipariş #</th>
                                    <th>Müşteri</th>
                                    <th>Durum</th>
                                    <th>Ödeme</th>
                                    <th>Toplam</th>
                                    <th>Oluşturulma</th>
                                    <th class="no-content text-center">İşlemler</th>
                                </tr>
                            </thead>
                            <tbody>
                                <template x-for="order in orders" :key="order.id">
                                    <tr>
                                        <td>
                                            <div class="d-flex flex-column">
                                                <span class="text-truncate fw-bold" x-text="order.order_number"></span>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="d-flex flex-column">
                                                <span class="text-truncate" x-text="order.customer?.name || order.customer?.email || '-'"></span>
                                                <span class="text-truncate text-muted small" x-text="order.customer?.email || ''"></span>
                                            </div>
                                        </td>
                                        <td>
                                            <span
                                                :class="{
                                                    'badge badge-warning': order.status === 'pending',
                                                    'badge badge-info': order.status === 'processing',
                                                    'badge badge-primary': order.status === 'shipped',
                                                    'badge badge-success': order.status === 'completed',
                                                    'badge badge-danger': order.status === 'cancelled',
                                                }"
                                                x-text="order.status"
                                            ></span>
                                        </td>
                                        <td>
                                            <span
                                                :class="{
                                                    'badge badge-warning': order.payment_status === 'pending',
                                                    'badge badge-success': order.payment_status === 'paid',
                                                    'badge badge-danger': order.payment_status === 'failed' || order.payment_status === 'refunded',
                                                }"
                                                x-text="order.payment_status"
                                            ></span>
                                        </td>
                                        <td>
                                            <span class="fw-bold" x-text="`₺${order.grand_total || 0}`"></span>
                                        </td>
                                        <td>
                                            <span x-text="new Date(order.created_at).toLocaleDateString()"></span>
                                        </td>
                                        <td class="text-center">
                                            <div class="d-flex justify-content-center gap-2">
                                                <a :href="`/admin/orders/${order.id}`" class="btn btn-sm btn-icon btn-outline-primary" title="Görüntüle" data-bs-toggle="tooltip" data-bs-placement="top">
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
                                <tr x-show="orders.length === 0 && !loading">
                                    <td colspan="7" class="text-center">
                                        <p class="text-muted">Sipariş bulunamadı</p>
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
