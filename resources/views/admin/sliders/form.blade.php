@extends('admin.layouts.app')

@section('title', isset($id) ? 'Edit Slider' : 'Create Slider')

@push('scripts')
    <script>
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
                setTimeout(() => {
                    window.location.href = redirectUrl
                }, 1500)
            } catch (error) {
                if (error.response && error.response.data && error.response.data.errors) {
                    context.errors = error.response.data.errors
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

        document.addEventListener('alpine:init', () => {
            Alpine.data('sliderForm', () => ({
                loading: false,
                saving: false,
                sliderId: {{ $id ?? 'null' }},
                formData: {
                    name: '',
                    code: '',
                    is_active: true,
                    sort_order: 0,
                },
                errors: {},

                async init() {
                    await waitForAdminApi()
                    if (this.sliderId) {
                        await this.loadSlider()
                    }
                },

                async loadSlider() {
                    if (!window.adminApiHelpers) {
                        console.error('adminApiHelpers is not available')
                        return
                    }

                    this.loading = true
                    try {
                        const response = await window.adminApiHelpers.get(`/sliders/${this.sliderId}`)
                        const slider = response.data?.data || response.data || {}

                        this.formData = {
                            name: slider.name || '',
                            code: slider.code || '',
                            is_active: slider.is_active ?? true,
                            sort_order: slider.sort_order || 0,
                        }
                    } catch (error) {
                        console.error('Error loading slider:', error)
                        if (window.swalHelpers) {
                            window.swalHelpers.error('Slider yüklenirken bir hata oluştu')
                        }
                    } finally {
                        this.loading = false
                    }
                },

                async save() {
                    await handleFormSave(
                        this,
                        '/sliders',
                        this.sliderId,
                        this.formData,
                        this.sliderId ? 'Slider güncellendi' : 'Slider oluşturuldu',
                        '/admin/sliders'
                    )
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
                <li class="breadcrumb-item"><a href="{{ route('admin.sliders.index') }}">Sliders</a></li>
                <li class="breadcrumb-item active" aria-current="page" x-text="sliderId ? 'Edit' : 'Create'"></li>
            </ol>
        </nav>
    </div>
    <!-- /BREADCRUMB -->

    <div x-data="sliderForm" x-init="init()">
        <div class="row layout-top-spacing">
            <div class="col-xl-12 col-lg-12 col-sm-12 layout-spacing">
                <div class="widget-content widget-content-area br-8 p-4">
                    <!-- Header -->
                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <h4 class="mb-0" x-text="sliderId ? 'Edit Slider' : 'Create Slider'"></h4>
                        <div>
                            <a href="{{ route('admin.sliders.index') }}" class="btn btn-secondary me-2">Cancel</a>
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
                                <input type="text" x-model="formData.name" class="form-control" :class="{ 'is-invalid': errors.name }" />
                                <div x-show="errors.name" class="invalid-feedback" x-text="errors.name?.[0] || errors.name"></div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">
                                    Code
                                    <span class="text-danger">*</span>
                                </label>
                                <input type="text" x-model="formData.code" class="form-control" :class="{ 'is-invalid': errors.code }" placeholder="home_main" />
                                <small class="form-text text-muted">Unique code for this slider (e.g., home_main)</small>
                                <div x-show="errors.code" class="invalid-feedback" x-text="errors.code?.[0] || errors.code"></div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Sort Order</label>
                                <input type="number" x-model="formData.sort_order" class="form-control" :class="{ 'is-invalid': errors.sort_order }" min="0" />
                                <div x-show="errors.sort_order" class="invalid-feedback" x-text="errors.sort_order?.[0] || errors.sort_order"></div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Status</label>
                                <div class="form-check form-switch">
                                    <input class="form-check-input" type="checkbox" x-model="formData.is_active" id="is_active" />
                                    <label class="form-check-label" for="is_active">Active</label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

