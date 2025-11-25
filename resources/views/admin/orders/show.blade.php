@extends('admin.layouts.app')

@section('title', 'Order Detail')

@push('scripts')
    <script>
        document.addEventListener('alpine:init', () => {
            Alpine.data('orderDetail', () => ({
                loading: false,
                order: null,
                activeTab: 'overview',
                refundAmount: '',
                refunding: false,

                async init() {
                    await this.waitForAdminApi()
                    await this.loadOrder()
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

                async loadOrder() {
                    if (!window.adminApiHelpers) {
                        console.error('adminApiHelpers is not available')
                        return
                    }

                    this.loading = true
                    try {
                        const response = await window.adminApiHelpers.get(`/orders/{{ $id }}`)
                        this.order = response.data
                    } catch (error) {
                        console.error('Error loading order:', error)
                        if (window.Alpine && window.Alpine.store('toast')) {
                            window.Alpine.store('toast').error('Sipariş yüklenirken bir hata oluştu')
                        }
                    } finally {
                        this.loading = false
                    }
                },

                async updateStatus(status) {
                    if (!window.adminApiHelpers) {
                        console.error('adminApiHelpers is not available')
                        return
                    }

                    try {
                        await window.adminApiHelpers.put(`/orders/{{ $id }}/status`, { status })
                        if (window.Alpine && window.Alpine.store('toast')) {
                            window.Alpine.store('toast').success('Sipariş durumu güncellendi')
                        }
                        await this.loadOrder()
                    } catch (error) {
                        console.error('Error updating status:', error)
                    }
                },

                async processRefund() {
                    if (!window.adminApiHelpers) {
                        console.error('adminApiHelpers is not available')
                        return
                    }

                    if (!this.refundAmount || parseFloat(this.refundAmount) <= 0) {
                        if (window.Alpine && window.Alpine.store('toast')) {
                            window.Alpine.store('toast').error('Geçerli bir tutar girin')
                        }
                        return
                    }

                    this.refunding = true
                    try {
                        await window.adminApiHelpers.post(`/orders/{{ $id }}/refund`, {
                            amount: parseFloat(this.refundAmount),
                        })
                        if (window.Alpine && window.Alpine.store('toast')) {
                            window.Alpine.store('toast').success('İade işlemi başlatıldı')
                        }
                        this.refundAmount = ''
                        await this.loadOrder()
                    } catch (error) {
                        console.error('Error processing refund:', error)
                    } finally {
                        this.refunding = false
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
                <li class="breadcrumb-item"><a href="{{ route('admin.orders.index') }}">Orders</a></li>
                <li class="breadcrumb-item active" aria-current="page">Order Detail</li>
            </ol>
        </nav>
    </div>
    <!-- /BREADCRUMB -->

    <div x-data="orderDetail" x-init="init()">
        <div class="row layout-top-spacing">
            <div class="col-xl-12 col-lg-12 col-sm-12 layout-spacing">
                <div class="widget-content widget-content-area br-8 p-4">
                    <!-- Header -->
                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <div>
                            <h4 class="mb-0">Order Detail</h4>
                            <p x-show="order" class="text-muted mb-0" x-text="`Order #${order?.order_number || ''}`"></p>
                        </div>
                        <a href="{{ route('admin.orders.index') }}" class="btn btn-secondary">
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
                            <span class="ms-2">Back to Orders</span>
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
                    <div x-show="!loading && order">
                        <!-- Tabs -->
                        <ul class="nav nav-tabs mb-4" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" :class="{ 'active': activeTab === 'overview' }" @click="activeTab = 'overview'" type="button" role="tab">
                                    Overview
                                </button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" :class="{ 'active': activeTab === 'items' }" @click="activeTab = 'items'" type="button" role="tab">
                                    Items
                                </button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" :class="{ 'active': activeTab === 'transactions' }" @click="activeTab = 'transactions'" type="button" role="tab">
                                    Transactions
                                </button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" :class="{ 'active': activeTab === 'addresses' }" @click="activeTab = 'addresses'" type="button" role="tab">
                                    Addresses
                                </button>
                            </li>
                        </ul>

                        <!-- Tab Content -->
                        <div class="tab-content">
                            <!-- Overview Tab -->
                            <div x-show="activeTab === 'overview'" class="tab-pane fade show active">
                                <div class="row mb-4">
                                    <div class="col-md-6">
                                        <h5 class="mb-3">Status</h5>
                                        <div class="mb-3">
                                            <span class="text-muted">Order Status:</span>
                                            <span
                                                :class="{
                                                    'badge badge-warning': order.status === 'pending',
                                                    'badge badge-info': order.status === 'processing',
                                                    'badge badge-primary': order.status === 'shipped',
                                                    'badge badge-success': order.status === 'completed',
                                                    'badge badge-danger': order.status === 'cancelled',
                                                }"
                                                class="ms-2"
                                                x-text="order.status"
                                            ></span>
                                        </div>
                                        <div class="mb-3">
                                            <span class="text-muted">Payment Status:</span>
                                            <span
                                                :class="{
                                                    'badge badge-warning': order.payment_status === 'pending',
                                                    'badge badge-success': order.payment_status === 'paid',
                                                    'badge badge-danger': order.payment_status === 'failed' || order.payment_status === 'refunded',
                                                }"
                                                class="ms-2"
                                                x-text="order.payment_status"
                                            ></span>
                                        </div>
                                        <div class="mt-4">
                                            <button @click="updateStatus('processing')" class="btn btn-info btn-sm w-100 mb-2">Mark as Processing</button>
                                            <button @click="updateStatus('shipped')" class="btn btn-primary btn-sm w-100 mb-2">Mark as Shipped</button>
                                            <button @click="updateStatus('completed')" class="btn btn-success btn-sm w-100 mb-2">Mark as Completed</button>
                                            <button @click="updateStatus('cancelled')" class="btn btn-danger btn-sm w-100">Cancel Order</button>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <h5 class="mb-3">Totals</h5>
                                        <div class="mb-2 d-flex justify-content-between">
                                            <span class="text-muted">Subtotal:</span>
                                            <span class="fw-bold" x-text="`₺${order.subtotal || 0}`"></span>
                                        </div>
                                        <div class="mb-2 d-flex justify-content-between">
                                            <span class="text-muted">Discount:</span>
                                            <span class="fw-bold" x-text="`₺${order.discount || 0}`"></span>
                                        </div>
                                        <div class="mb-2 d-flex justify-content-between">
                                            <span class="text-muted">Shipping:</span>
                                            <span class="fw-bold" x-text="`₺${order.shipping_total || 0}`"></span>
                                        </div>
                                        <div class="mb-2 d-flex justify-content-between border-top pt-2">
                                            <span class="fw-bold">Grand Total:</span>
                                            <span class="fw-bold fs-5" x-text="`₺${order.grand_total || 0}`"></span>
                                        </div>
                                    </div>
                                </div>

                                <!-- Refund Section -->
                                <div class="border-top pt-4">
                                    <h5 class="mb-3">Refund</h5>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <input
                                                type="number"
                                                step="0.01"
                                                x-model="refundAmount"
                                                placeholder="Refund amount"
                                                class="form-control"
                                            />
                                        </div>
                                        <div class="col-md-6">
                                            <button @click="processRefund()" :disabled="refunding" class="btn btn-danger w-100">
                                                <span x-show="!refunding">Process Refund</span>
                                                <span x-show="refunding">Processing...</span>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Items Tab -->
                            <div x-show="activeTab === 'items'" class="tab-pane fade">
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>Product</th>
                                                <th>SKU</th>
                                                <th>Quantity</th>
                                                <th>Price</th>
                                                <th>Total</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <template x-for="item in order.items || []" :key="item.id">
                                                <tr>
                                                    <td>
                                                        <span class="fw-bold" x-text="item.product_name"></span>
                                                    </td>
                                                    <td x-text="item.sku || '-'"></td>
                                                    <td x-text="item.quantity"></td>
                                                    <td x-text="`₺${item.price || 0}`"></td>
                                                    <td>
                                                        <span class="fw-bold" x-text="`₺${item.total || 0}`"></span>
                                                    </td>
                                                </tr>
                                            </template>
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                            <!-- Transactions Tab -->
                            <div x-show="activeTab === 'transactions'" class="tab-pane fade">
                                <div class="text-center py-8 text-muted">
                                    <p>Transactions will be displayed here</p>
                                </div>
                            </div>

                            <!-- Addresses Tab -->
                            <div x-show="activeTab === 'addresses'" class="tab-pane fade">
                                <div class="row">
                                    <div class="col-md-6">
                                        <h5 class="mb-3">Billing Address</h5>
                                        <div x-show="order.billing_address" class="text-muted">
                                            <p x-text="order.billing_address.name"></p>
                                            <p x-text="order.billing_address.address_line_1"></p>
                                            <p x-text="order.billing_address.city"></p>
                                            <p x-text="order.billing_address.postal_code"></p>
                                        </div>
                                        <p x-show="!order.billing_address" class="text-muted">No billing address</p>
                                    </div>
                                    <div class="col-md-6">
                                        <h5 class="mb-3">Shipping Address</h5>
                                        <div x-show="order.shipping_address" class="text-muted">
                                            <p x-text="order.shipping_address.name"></p>
                                            <p x-text="order.shipping_address.address_line_1"></p>
                                            <p x-text="order.shipping_address.city"></p>
                                            <p x-text="order.shipping_address.postal_code"></p>
                                        </div>
                                        <p x-show="!order.shipping_address" class="text-muted">No shipping address</p>
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
