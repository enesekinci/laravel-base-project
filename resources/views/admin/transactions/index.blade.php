@extends('admin.layouts.app')

@section('title', 'Transactions')

@push('scripts')
    <script>
        document.addEventListener('alpine:init', () => {
            Alpine.data('transactionList', () => ({
                transactions: [],
                loading: false,
                filters: {
                    search: '',
                    type: '',
                    status: '',
                },
                pagination: {
                    current_page: 1,
                    last_page: 1,
                    per_page: 50,
                    total: 0,
                },

                async init() {
                    await this.waitForAdminApi()
                    await this.loadTransactions()
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

                async loadTransactions(page = 1) {
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

                        const response = await window.adminApiHelpers.get('/transactions', params)
                        this.transactions = response.data
                        this.pagination = {
                            current_page: response.meta.current_page,
                            last_page: response.meta.last_page,
                            per_page: response.meta.per_page,
                            total: response.meta.total,
                            from: response.meta.from,
                            to: response.meta.to,
                        }
                    } catch (error) {
                        console.error('Error loading transactions:', error)
                        if (window.Alpine && window.Alpine.store('toast')) {
                            window.Alpine.store('toast').error('İşlemler yüklenirken bir hata oluştu')
                        }
                    } finally {
                        this.loading = false
                    }
                },

                async applyFilters() {
                    this.pagination.current_page = 1
                    await this.loadTransactions(1)
                },

                async resetFilters() {
                    this.filters = {
                        search: '',
                        type: '',
                        status: '',
                    }
                    await this.loadTransactions(1)
                },

                async changePage(page) {
                    if (page >= 1 && page <= this.pagination.last_page) {
                        await this.loadTransactions(page)
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
                <li class="breadcrumb-item active" aria-current="page">Transactions</li>
            </ol>
        </nav>
    </div>
    <!-- /BREADCRUMB -->

    <div x-data="transactionList" x-init="init()">
        <div class="row layout-top-spacing">
            <div class="col-xl-12 col-lg-12 col-sm-12 layout-spacing">
                <div class="widget-content widget-content-area br-8 p-4">
                    <!-- Header -->
                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <h4 class="mb-0">Transactions</h4>
                    </div>

                    <!-- Filter Bar -->
                    <div class="widget-content widget-content-area br-8 p-4 mb-4">
                        <div class="row">
                            <div class="col-md-3">
                                <label class="form-label">Search</label>
                                <input type="text" x-model="filters.search" @input.debounce.500ms="applyFilters()" placeholder="Transaction ID or order number..." class="form-control" />
                            </div>
                            <div class="col-md-3">
                                <label class="form-label">Type</label>
                                <select x-model="filters.type" @change="applyFilters()" class="form-select" placeholder="All">
                                    <option value="">All</option>
                                    <option value="payment">Payment</option>
                                    <option value="refund">Refund</option>
                                </select>
                            </div>
                            <div class="col-md-3">
                                <label class="form-label">Status</label>
                                <select x-model="filters.status" @change="applyFilters()" class="form-select" placeholder="All">
                                    <option value="">All</option>
                                    <option value="pending">Pending</option>
                                    <option value="completed">Completed</option>
                                    <option value="failed">Failed</option>
                                </select>
                            </div>
                            <div class="col-md-3 d-flex align-items-end">
                                <button @click="resetFilters()" class="btn btn-secondary w-100">Reset Filters</button>
                            </div>
                        </div>
                    </div>

                    <!-- Table -->
                    <div class="table-responsive" x-show="!loading">
                        <table class="table dt-table-hover" style="width: 100%">
                            <thead>
                                <tr>
                                    <th>Transaction ID</th>
                                    <th>Order</th>
                                    <th>Type</th>
                                    <th>Amount</th>
                                    <th>Status</th>
                                    <th>Created</th>
                                </tr>
                            </thead>
                            <tbody>
                                <template x-for="transaction in transactions" :key="transaction.id">
                                    <tr>
                                        <td>
                                            <div class="d-flex flex-column">
                                                <span class="text-truncate fw-bold" x-text="transaction.transaction_id || transaction.id"></span>
                                            </div>
                                        </td>
                                        <td>
                                            <a :href="`/admin/orders/${transaction.order_id}`" class="text-primary" x-text="`Order #${transaction.order?.order_number || transaction.order_id}`"></a>
                                        </td>
                                        <td>
                                            <span class="badge badge-info" x-text="transaction.type"></span>
                                        </td>
                                        <td>
                                            <span
                                                class="fw-bold"
                                                :class="transaction.type === 'refund' ? 'text-danger' : 'text-success'"
                                                x-text="`${transaction.type === 'refund' ? '-' : '+'}₺${transaction.amount || 0}`"
                                            ></span>
                                        </td>
                                        <td>
                                            <span
                                                :class="{
                                                    'badge badge-warning': transaction.status === 'pending',
                                                    'badge badge-success': transaction.status === 'completed',
                                                    'badge badge-danger': transaction.status === 'failed',
                                                }"
                                                x-text="transaction.status"
                                            ></span>
                                        </td>
                                        <td>
                                            <span x-text="
                                                transaction.created_at
                                                    ? new Date(transaction.created_at).toLocaleDateString()
                                                    : '-'
                                            "></span>
                                        </td>
                                    </tr>
                                </template>
                                <tr x-show="transactions.length === 0 && !loading">
                                    <td colspan="6" class="text-center">
                                        <p class="text-muted">No transactions found</p>
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
