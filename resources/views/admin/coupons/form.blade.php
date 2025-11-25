@extends('admin.layouts.app')

@section('title', isset($id) ? 'Edit Coupon' : 'Create Coupon')

@push('styles')
    <!-- Flatpickr -->
    <link rel="stylesheet" type="text/css" href="{{ asset('cork/src/plugins/src/flatpickr/flatpickr.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('cork/src/plugins/css/light/flatpickr/custom-flatpickr.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('cork/src/plugins/css/dark/flatpickr/custom-flatpickr.css') }}" />
@endpush

@push('scripts')
    <!-- Flatpickr -->
    <script src="{{ asset('cork/src/plugins/src/flatpickr/flatpickr.js') }}"></script>
    <script>
        // Helper functions
        async function waitForAdminApi() {
            let attempts = 0
            while ((!window.adminApiHelpers || !window.adminApiHelpersLoaded) && attempts < 50) {
                await new Promise((resolve) => setTimeout(resolve, 100))
                attempts++
            }
            if (!window.adminApiHelpers) {
                console.error('adminApiHelpers is not available')
                if (window.swalHelpers) {
                    window.swalHelpers.error('Admin API helpers yüklenemedi. Sayfayı yenileyin.')
                }
                throw new Error('Admin API helpers not loaded')
            }
        }

        async function handleFormSave(context, endpoint, entityId, formData, successMessage, redirectUrl) {
            context.saving = true
            context.errors = {}
            try {
                const url = entityId ? `${endpoint}/${entityId}` : endpoint
                const method = entityId ? 'put' : 'post'
                await window.adminApiHelpers[method](url, formData)
                if (window.swalHelpers) {
                    window.swalHelpers.success(successMessage)
                }
                // Wait for toast to show before redirect
                setTimeout(() => {
                window.location.href = redirectUrl
                }, 1500)
            } catch (error) {
                if (error.response && error.response.data && error.response.data.errors) {
                    context.errors = error.response.data.errors
                    // Show validation errors with SweetAlert2
                    const errorMessages = []
                    Object.keys(error.response.data.errors).forEach((field) => {
                        const fieldErrors = error.response.data.errors[field]
                        if (Array.isArray(fieldErrors) && fieldErrors.length > 0) {
                            fieldErrors.forEach((errorMsg) => {
                                if (errorMsg && typeof errorMsg === 'string' && errorMsg.trim().length > 0) {
                                    errorMessages.push(errorMsg)
                                }
                            })
                        }
                    })
                    if (errorMessages.length > 0 && window.swalHelpers) {
                        window.swalHelpers.error(errorMessages.join('<br>'))
                    }
                } else {
                    if (window.swalHelpers) {
                        window.swalHelpers.error('Kayıt sırasında bir hata oluştu')
                    }
                }
            } finally {
                context.saving = false
            }
        }

        // Coupon Form Component
        document.addEventListener('alpine:init', () => {
            Alpine.data('couponForm', () => ({
                loading: false,
                saving: false,
                couponId: {{ $id ?? 'null' }},
                formData: {
                    code: '',
                    type: 'percent',
                    value: '',
                    start_date: '',
                    end_date: '',
                    usage_limit: '',
                    per_user_limit: '',
                    min_order_total: '',
                    is_active: true,
                },
                errors: {},

                async init() {
                    await waitForAdminApi()
                    if (this.couponId) {
                        await this.loadCoupon()
                    }
                    this.initFlatpickr()
                },

                async loadCoupon() {
                    if (!window.adminApiHelpers) return
                    this.loading = true
                    try {
                        const response = await window.adminApiHelpers.get(`/coupons/${this.couponId}`)
                        const coupon = response.data
                        this.formData = {
                            code: coupon.code || '',
                            type: coupon.type || 'percent',
                            value: coupon.value || '',
                            start_date: coupon.start_date || '',
                            end_date: coupon.end_date || '',
                            usage_limit: coupon.usage_limit || '',
                            per_user_limit: coupon.per_user_limit || '',
                            min_order_total: coupon.min_order_total || '',
                            is_active: coupon.is_active ?? true,
                        }
                    } catch (error) {
                        console.error('Error loading coupon:', error)
                        if (window.swalHelpers) {
                            window.swalHelpers.error('Kupon yüklenirken bir hata oluştu')
                        }
                    } finally {
                        this.loading = false
                    }
                },

                async save() {
                    try {
                        await handleFormSave(this, '/coupons', this.couponId, this.formData, this.couponId ? 'Kupon güncellendi' : 'Kupon oluşturuldu', '/admin/coupons')
                    } catch (error) {
                        this.saving = false
                    }
                },

                initFlatpickr() {
                    setTimeout(() => {
                        const startDateInput = document.getElementById('start_date')
                        if (startDateInput && !startDateInput.flatpickr) {
                            flatpickr(startDateInput, {
                                dateFormat: 'Y-m-d',
                                onChange: (selectedDates, dateStr) => {
                                    this.formData.start_date = dateStr
                                },
                            })
                        }
                        const endDateInput = document.getElementById('end_date')
                        if (endDateInput && !endDateInput.flatpickr) {
                            flatpickr(endDateInput, {
                                dateFormat: 'Y-m-d',
                                onChange: (selectedDates, dateStr) => {
                                    this.formData.end_date = dateStr
                                },
                            })
                        }
                    }, 300)
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
                <li class="breadcrumb-item"><a href="{{ route('admin.coupons.index') }}">Coupons</a></li>
                <li class="breadcrumb-item active" aria-current="page" x-text="couponId ? 'Edit' : 'Create'"></li>
            </ol>
        </nav>
    </div>
    <!-- /BREADCRUMB -->

    <div x-data="couponForm" x-init="init()">
        <div class="row layout-top-spacing">
            <div class="col-xl-12 col-lg-12 col-sm-12 layout-spacing">
                <div class="widget-content widget-content-area br-8 p-4">
                    <!-- Header -->
                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <h4 class="mb-0" x-text="couponId ? 'Edit Coupon' : 'Create Coupon'"></h4>
                        <div>
                            <a href="{{ route('admin.coupons.index') }}" class="btn btn-secondary me-2">Cancel</a>
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
                                <label class="form-label">
                                    Code
                                    <span class="text-danger">*</span>
                                </label>
                                <input type="text" x-model="formData.code" class="form-control" :class="{ 'is-invalid': errors.code }" />
                                <div x-show="errors.code" class="invalid-feedback" x-text="errors.code?.[0] || errors.code"></div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">
                                    Type
                                    <span class="text-danger">*</span>
                                </label>
                                <select x-model="formData.type" class="form-select" :class="{ 'is-invalid': errors.type }">
                                    <option value="percent">Percent</option>
                                    <option value="fixed">Fixed</option>
                                    <option value="free_shipping">Free Shipping</option>
                                </select>
                                <div x-show="errors.type" class="invalid-feedback" x-text="errors.type?.[0] || errors.type"></div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">
                                    Value
                                    <span class="text-danger">*</span>
                                </label>
                                <input type="number" step="0.01" x-model="formData.value" class="form-control" :class="{ 'is-invalid': errors.value }" />
                                <div x-show="errors.value" class="invalid-feedback" x-text="errors.value?.[0] || errors.value"></div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Start Date</label>
                                <input type="text" id="start_date" x-model="formData.start_date" class="form-control flatpickr" placeholder="Select date" />
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">End Date</label>
                                <input type="text" id="end_date" x-model="formData.end_date" class="form-control flatpickr" placeholder="Select date" />
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Usage Limit</label>
                                <input type="number" x-model="formData.usage_limit" class="form-control" />
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Per User Limit</label>
                                <input type="number" x-model="formData.per_user_limit" class="form-control" />
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Min Order Total</label>
                                <input type="number" step="0.01" x-model="formData.min_order_total" class="form-control" />
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
