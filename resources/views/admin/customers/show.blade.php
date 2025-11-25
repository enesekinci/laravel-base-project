@extends('admin.layouts.app')

@section('title', 'Customer Detail')

@push('scripts')
    <script>
        document.addEventListener('alpine:init', () => {
            Alpine.data('customerDetail', () => ({
                loading: false,
                customer: null,
                activeTab: 'info',
                orders: [],
                addresses: [],

                async init() {
                    await this.waitForAdminApi()
                    await this.loadCustomer()
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

                async loadCustomer() {
                    if (!window.adminApiHelpers) {
                        console.error('adminApiHelpers is not available')
                        return
                    }

                    this.loading = true
                    try {
                        const response = await window.adminApiHelpers.get(`/customers/{{ $id }}`)
                        this.customer = response.data
                        this.orders = response.data.orders || []
                        this.addresses = response.data.addresses || []
                    } catch (error) {
                        console.error('Error loading customer:', error)
                        if (window.Alpine && window.Alpine.store('toast')) {
                            window.Alpine.store('toast').error('Müşteri yüklenirken bir hata oluştu')
                        }
                    } finally {
                        this.loading = false
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
                <li class="breadcrumb-item"><a href="{{ route('admin.customers.index') }}">Customers</a></li>
                <li class="breadcrumb-item active" aria-current="page">Customer Detail</li>
            </ol>
        </nav>
    </div>
    <!-- /BREADCRUMB -->

    <div x-data="customerDetail" x-init="init()">
        <div class="row layout-top-spacing">
            <div class="col-xl-12 col-lg-12 col-sm-12 layout-spacing">
                <div class="widget-content widget-content-area br-8 p-4">
                    <!-- Header -->
                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <div>
                            <h4 class="mb-0">Customer Detail</h4>
                            <p x-show="customer" class="text-muted mb-0" x-text="customer?.name || customer?.email || ''"></p>
                        </div>
                        <a href="{{ route('admin.customers.index') }}" class="btn btn-secondary">
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
                                class="feather feather-arrow-left"
                                style="width: 18px; height: 18px; vertical-align: middle"
                            >
                                <line x1="19" y1="12" x2="5" y2="12"></line>
                                <polyline points="12 19 5 12 12 5"></polyline>
                            </svg>
                            <span class="ms-2">Back to Customers</span>
                        </a>
                    </div>

                    <!-- Loading -->
                    <div x-show="loading" class="text-center p-4">
                        <div class="spinner-border text-primary" role="status">
                            <span class="visually-hidden">Loading...</span>
                        </div>
                        <p class="mt-2 text-muted">Loading...</p>
                    </div>

                    <!-- Content -->
                    <div x-show="!loading && customer">
                        <!-- Tabs -->
                        <ul class="nav nav-tabs mb-4" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button
                                    class="nav-link"
                                    :class="{ 'active': activeTab === 'info' }"
                                    @click="activeTab = 'info'"
                                    type="button"
                                    role="tab"
                                >
                                    Info
                                </button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button
                                    class="nav-link"
                                    :class="{ 'active': activeTab === 'addresses' }"
                                    @click="activeTab = 'addresses'"
                                    type="button"
                                    role="tab"
                                >
                                    Addresses
                                </li>
                            <li class="nav-item" role="presentation">
                                <button
                                    class="nav-link"
                                    :class="{ 'active': activeTab === 'orders' }"
                                    @click="activeTab = 'orders'"
                                    type="button"
                                    role="tab"
                                >
                                    Orders
                                </button>
                            </li>
                        </ul>

                        <!-- Tab Content -->
                        <div class="tab-content">
                            <!-- Info Tab -->
                            <div x-show="activeTab === 'info'" class="tab-pane fade show active">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label fw-bold">Name</label>
                                            <p x-text="customer?.name || '-'"></p>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label fw-bold">Email</label>
                                            <p x-text="customer?.email || '-'"></p>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label fw-bold">Phone</label>
                                            <p x-text="customer?.phone || '-'"></p>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label fw-bold">Registered At</label>
                                            <p x-text="customer?.created_at ? new Date(customer.created_at).toLocaleString() : '-'"></p>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label fw-bold">Last Login</label>
                                            <p x-text="customer?.last_login_at ? new Date(customer.last_login_at).toLocaleString() : '-'"></p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Addresses Tab -->
                            <div x-show="activeTab === 'addresses'" class="tab-pane fade">
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>Type</th>
                                                <th>Address</th>
                                                <th>City</th>
                                                <th>Country</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <template x-for="address in addresses" :key="address.id">
                                                <tr>
                                                    <td>
                                                        <span class="badge badge-info" x-text="address.type"></span>
                                                    </td>
                                                    <td x-text="address.address_line_1 || '-'"></td>
                                                    <td x-text="address.city || '-'"></td>
                                                    <td x-text="address.country || '-'"></td>
                                                </tr>
                                            </template>
                                            <tr x-show="addresses.length === 0">
                                                <td colspan="4" class="text-center text-muted">No addresses found</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                            <!-- Orders Tab -->
                            <div x-show="activeTab === 'orders'" class="tab-pane fade">
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>Order #</th>
                                                <th>Status</th>
                                                <th>Total</th>
                                                <th>Created</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <template x-for="order in orders" :key="order.id">
                                                <tr>
                                                    <td>
                                                        <a :href="`/admin/orders/${order.id}`" class="text-primary" x-text="order.order_number"></a>
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
                                                    <td x-text="`₺${order.grand_total || 0}`"></td>
                                                    <td x-text="order.created_at ? new Date(order.created_at).toLocaleDateString() : '-'"></td>
                                                    <td>
                                                        <a :href="`/admin/orders/${order.id}`" class="btn btn-sm btn-primary">View</a>
                                                    </td>
                                                </tr>
                                            </template>
                                            <tr x-show="orders.length === 0">
                                                <td colspan="5" class="text-center text-muted">No orders found</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
