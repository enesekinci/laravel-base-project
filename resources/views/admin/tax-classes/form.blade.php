@extends('admin.layouts.app')

@section('title', isset($id) ? 'Edit Tax Class' : 'Create Tax Class')

@push('scripts')
    <script>
        document.addEventListener('alpine:init', () => {
            Alpine.data('taxClassForm', () => ({
                loading: false,
                saving: false,
                taxClassId: {{ $id ?? 'null' }},
                formData: {
                    name: '',
                    rate: '',
                },
                errors: {},

                async init() {
                    await this.waitForAdminApi()

                    if (this.taxClassId) {
                        await this.loadTaxClass()
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

                async loadTaxClass() {
                    if (!window.adminApiHelpers) {
                        console.error('adminApiHelpers is not available')
                        return
                    }

                    this.loading = true
                    try {
                        const response = await window.adminApiHelpers.get(`/tax-classes/${this.taxClassId}`)
                        const taxClass = response.data

                        this.formData = {
                            name: taxClass.name || '',
                            rate: taxClass.rate || '',
                        }
                    } catch (error) {
                        console.error('Error loading tax class:', error)
                        if (window.Alpine && window.Alpine.store('toast')) {
                            window.Alpine.store('toast').error('Vergi sınıfı yüklenirken bir hata oluştu')
                        }
                    } finally {
                        this.loading = false
                    }
                },

                async save() {
                    this.saving = true
                    this.errors = {}

                    try {
                        const url = this.taxClassId ? `/tax-classes/${this.taxClassId}` : '/tax-classes'
                        const method = this.taxClassId ? 'put' : 'post'

                        await window.adminApiHelpers[method](url, this.formData)

                        if (window.Alpine && window.Alpine.store('toast')) {
                            window.Alpine.store('toast').success(this.taxClassId ? 'Vergi sınıfı güncellendi' : 'Vergi sınıfı oluşturuldu')
                        }

                        // Wait for toast to show before redirect
                        setTimeout(() => {
                        window.location.href = '/admin/tax-classes'
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
                <li class="breadcrumb-item"><a href="{{ route('admin.tax-classes.index') }}">Tax Classes</a></li>
                <li class="breadcrumb-item active" aria-current="page" x-text="taxClassId ? 'Edit' : 'Create'"></li>
            </ol>
        </nav>
    </div>
    <!-- /BREADCRUMB -->

    <div x-data="taxClassForm" x-init="init()">
        <div class="row layout-top-spacing">
            <div class="col-xl-12 col-lg-12 col-sm-12 layout-spacing">
                <div class="widget-content widget-content-area br-8 p-4">
                    <!-- Header -->
                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <h4 class="mb-0" x-text="taxClassId ? 'Edit Tax Class' : 'Create Tax Class'"></h4>
                        <div>
                            <a href="{{ route('admin.tax-classes.index') }}" class="btn btn-secondary me-2">Cancel</a>
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
                                <label class="form-label">Rate (%) <span class="text-danger">*</span></label>
                                <input type="number" step="0.01" x-model="formData.rate" class="form-control" :class="{ 'is-invalid': errors.rate }" />
                                <div x-show="errors.rate" class="invalid-feedback" x-text="errors.rate?.[0] || errors.rate"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
