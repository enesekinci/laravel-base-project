@extends('admin.layouts.app')

@section('title', isset($id) ? 'Edit Brand' : 'Create Brand')

@push('scripts')
    <script>
        // Helper function to wait for admin API
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

        // Helper function to generate slug
        function generateSlug(text) {
            if (!text) return ''
            return text
                .toLowerCase()
                .replace(/[^a-z0-9]+/g, '-')
                .replace(/(^-|-$)/g, '')
        }

        // Helper function to handle form save
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

        // Brand Form Component
        document.addEventListener('alpine:init', () => {
            Alpine.data('brandForm', () => ({
                loading: false,
                saving: false,
                brandId: {{ $id ?? 'null' }},
                formData: {
                    name: '',
                    slug: '',
                    is_active: true,
                },
                errors: {},

                async init() {
                    await waitForAdminApi()

                    if (this.brandId) {
                        await this.loadBrand()
                    }
                },

                async loadBrand() {
                    if (!window.adminApiHelpers) {
                        console.error('adminApiHelpers is not available')
                        return
                    }

                    this.loading = true
                    try {
                        const response = await window.adminApiHelpers.get(`/brands/${this.brandId}`)
                        const brand = response.data

                        this.formData = {
                            name: brand.name || '',
                            slug: brand.slug || '',
                            is_active: brand.is_active ?? true,
                        }
                    } catch (error) {
                        console.error('Error loading brand:', error)
                        if (window.swalHelpers) {
                            window.swalHelpers.error('Marka yüklenirken bir hata oluştu')
                        }
                    } finally {
                        this.loading = false
                    }
                },

                async save() {
                    await handleFormSave(this, '/brands', this.brandId, this.formData, this.brandId ? 'Marka güncellendi' : 'Marka oluşturuldu', '/admin/brands')
                },

                generateSlug() {
                    if (!this.formData.slug || this.formData.slug === '') {
                        this.formData.slug = generateSlug(this.formData.name)
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
                <li class="breadcrumb-item"><a href="{{ route('admin.brands.index') }}">Brands</a></li>
                <li class="breadcrumb-item active" aria-current="page" x-text="brandId ? 'Edit' : 'Create'"></li>
            </ol>
        </nav>
    </div>
    <!-- /BREADCRUMB -->

    <div x-data="brandForm" x-init="init()">
        <div class="row layout-top-spacing">
            <div class="col-xl-12 col-lg-12 col-sm-12 layout-spacing">
                <div class="widget-content widget-content-area br-8 p-4">
                    <!-- Header -->
                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <h4 class="mb-0" x-text="brandId ? 'Edit Brand' : 'Create Brand'"></h4>
                        <div>
                            <a href="{{ route('admin.brands.index') }}" class="btn btn-secondary me-2">Cancel</a>
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
                                    Name
                                    <span class="text-danger">*</span>
                                </label>
                                <input type="text" x-model="formData.name" @blur="generateSlug()" class="form-control" :class="{ 'is-invalid': errors.name }" />
                                <div x-show="errors.name" class="invalid-feedback" x-text="errors.name?.[0] || errors.name"></div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">
                                    Slug
                                    <span class="text-danger">*</span>
                                </label>
                                <input type="text" x-model="formData.slug" class="form-control" :class="{ 'is-invalid': errors.slug }" />
                                <div x-show="errors.slug" class="invalid-feedback" x-text="errors.slug?.[0] || errors.slug"></div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Status</label>
                                <select x-model="formData.is_active" class="form-select">
                                    <option :value="true">Active</option>
                                    <option :value="false">Inactive</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
