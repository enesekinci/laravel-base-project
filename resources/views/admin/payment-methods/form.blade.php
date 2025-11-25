@extends('admin.layouts.app')

@section('title', isset($id) ? 'Edit Payment Method' : 'Create Payment Method')

@push('scripts')
    <script>
        document.addEventListener('alpine:init', () => {
            Alpine.data('paymentMethodForm', () => ({
                loading: false,
                saving: false,
                paymentMethodId: {{ $id ?? 'null' }},
                formData: {
                    name: '',
                    code: '',
                    type: 'online',
                    is_active: true,
                },
                errors: {},

                async init() {
                    await this.waitForAdminApi()

                    if (this.paymentMethodId) {
                        await this.loadPaymentMethod()
                    }
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

                async loadPaymentMethod() {
                    if (!window.adminApiHelpers) {
                        console.error('adminApiHelpers is not available')
                        return
                    }

                    this.loading = true
                    try {
                        const response = await window.adminApiHelpers.get(`/payment-methods/${this.paymentMethodId}`)
                        const method = response.data

                        this.formData = {
                            name: method.name || '',
                            code: method.code || '',
                            type: method.type || 'online',
                            is_active: method.is_active ?? true,
                        }
                    } catch (error) {
                        console.error('Error loading payment method:', error)
                        if (window.Alpine && window.Alpine.store('toast')) {
                            window.Alpine.store('toast').error('Ödeme yöntemi yüklenirken bir hata oluştu')
                        }
                    } finally {
                        this.loading = false
                    }
                },

                async save() {
                    this.saving = true
                    this.errors = {}

                    try {
                        const url = this.paymentMethodId ? `/payment-methods/${this.paymentMethodId}` : '/payment-methods'
                        const method = this.paymentMethodId ? 'put' : 'post'

                        await window.adminApiHelpers[method](url, this.formData)

                        if (window.Alpine && window.Alpine.store('toast')) {
                            window.Alpine.store('toast').success(this.paymentMethodId ? 'Ödeme yöntemi güncellendi' : 'Ödeme yöntemi oluşturuldu')
                        }

                        // Wait for toast to show before redirect
                        setTimeout(() => {
                        window.location.href = '/admin/payment-methods'
                        }, 1500)
                    } catch (error) {
                        if (error.response && error.response.data && error.response.data.errors) {
                            this.errors = error.response.data.errors
                        } else {
                            if (window.Alpine && window.Alpine.store('toast')) {
                                window.Alpine.store('toast').error('Kayıt sırasında bir hata oluştu')
                            }
                        }
                    } finally {
                        this.saving = false
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
                <li class="breadcrumb-item"><a href="{{ route('admin.payment-methods.index') }}">Payment Methods</a></li>
                <li class="breadcrumb-item active" aria-current="page" x-text="paymentMethodId ? 'Edit' : 'Create'"></li>
            </ol>
        </nav>
    </div>
    <!-- /BREADCRUMB -->

    <div x-data="paymentMethodForm" x-init="init()">
        <div class="row layout-top-spacing">
            <div class="col-xl-12 col-lg-12 col-sm-12 layout-spacing">
                <div class="widget-content widget-content-area br-8 p-4">
                    <!-- Header -->
                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <h4 class="mb-0" x-text="paymentMethodId ? 'Edit Payment Method' : 'Create Payment Method'"></h4>
                        <div>
                            <a href="{{ route('admin.payment-methods.index') }}" class="btn btn-secondary me-2">Cancel</a>
                            <button @click="save()" :disabled="saving" class="btn btn-primary">
                                <span x-show="!saving">Save</span>
                                <span x-show="saving">Saving...</span>
                            </button>
                        </div>
                    </div>

                    <!-- Loading -->
                    <div x-show="loading" class="text-center p-4">
                        <div class="spinner-border text-primary" role="status">
                            <span class="visually-hidden">Loading...</span>
                        </div>
                        <p class="mt-2 text-muted">Loading...</p>
                    </div>

                    <!-- Form -->
                    <div x-show="!loading">
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Name <span class="text-danger">*</span></label>
                                <input type="text" x-model="formData.name" class="form-control" :class="{ 'is-invalid': errors.name }" />
                                <div x-show="errors.name" class="invalid-feedback" x-text="errors.name?.[0] || errors.name"></div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Code <span class="text-danger">*</span></label>
                                <input type="text" x-model="formData.code" class="form-control" :class="{ 'is-invalid': errors.code }" />
                                <div x-show="errors.code" class="invalid-feedback" x-text="errors.code?.[0] || errors.code"></div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Type <span class="text-danger">*</span></label>
                                <select x-model="formData.type" class="form-select" :class="{ 'is-invalid': errors.type }">
                                    <option value="online">Online</option>
                                    <option value="offline">Offline</option>
                                </select>
                                <div x-show="errors.type" class="invalid-feedback" x-text="errors.type?.[0] || errors.type"></div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <div class="form-check form-switch mt-4">
                                    <input class="form-check-input" type="checkbox" x-model="formData.is_active" id="is_active" />
                                    <label class="form-check-label" for="is_active">Is Active</label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
