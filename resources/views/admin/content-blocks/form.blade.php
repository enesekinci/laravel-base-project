@extends('admin.layouts.app')

@section('title', isset($id) ? 'Edit Content Block' : 'Create Content Block')

@push('scripts')
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

        // Content Block Form Component
        document.addEventListener('alpine:init', () => {
            Alpine.data('contentBlockForm', () => ({
                loading: false,
                saving: false,
                contentBlockId: {{ $id ?? 'null' }},
                formData: {
                    key: '',
                    name: '',
                    type: 'json',
                    value: '',
                    is_active: true,
                },
                errors: {},

                async init() {
                    await waitForAdminApi()
                    if (this.contentBlockId) {
                        await this.loadContentBlock()
                    }
                },

                async loadContentBlock() {
                    if (!window.adminApiHelpers) return
                    this.loading = true
                    try {
                        const response = await window.adminApiHelpers.get(`/content-blocks/${this.contentBlockId}`)
                        const block = response.data
                        this.formData = {
                            key: block.key || '',
                            name: block.name || '',
                            type: block.type || 'json',
                            value: typeof block.value === 'string' ? block.value : JSON.stringify(block.value, null, 2),
                            is_active: block.is_active ?? true,
                        }
                    } catch (error) {
                        console.error('Error loading content block:', error)
                        if (window.swalHelpers) {
                            window.swalHelpers.error('İçerik bloğu yüklenirken bir hata oluştu')
                        }
                    } finally {
                        this.loading = false
                    }
                },

                async save() {
                    let value = this.formData.value
                    if (this.formData.type === 'json') {
                        try {
                            value = JSON.parse(this.formData.value)
                        } catch (e) {
                            if (window.swalHelpers) {
                                window.swalHelpers.error('Geçersiz JSON formatı')
                            }
                            this.saving = false
                            return
                        }
                    }
                    const payload = {
                        ...this.formData,
                        value,
                    }
                    try {
                        await handleFormSave(this, '/content-blocks', this.contentBlockId, payload, this.contentBlockId ? 'İçerik bloğu güncellendi' : 'İçerik bloğu oluşturuldu', '/admin/content-blocks')
                    } catch (error) {
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
                <li class="breadcrumb-item"><a href="{{ route('admin.content-blocks.index') }}">Content Blocks</a></li>
                <li class="breadcrumb-item active" aria-current="page" x-text="contentBlockId ? 'Edit' : 'Create'"></li>
            </ol>
        </nav>
    </div>
    <!-- /BREADCRUMB -->

    <div x-data="contentBlockForm" x-init="init()">
        <div class="row layout-top-spacing">
            <div class="col-xl-12 col-lg-12 col-sm-12 layout-spacing">
                <div class="widget-content widget-content-area br-8 p-4">
                    <!-- Header -->
                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <h4 class="mb-0" x-text="contentBlockId ? 'Edit Content Block' : 'Create Content Block'"></h4>
                        <div>
                            <a href="{{ route('admin.content-blocks.index') }}" class="btn btn-secondary me-2">Cancel</a>
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
                                <label class="form-label">Key <span class="text-danger">*</span></label>
                                <input type="text" x-model="formData.key" class="form-control" :class="{ 'is-invalid': errors.key }" placeholder="home.featured_categories" />
                                <small class="form-text text-muted">Örnek: home.featured_categories</small>
                                <div x-show="errors.key" class="invalid-feedback" x-text="errors.key?.[0] || errors.key"></div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Name <span class="text-danger">*</span></label>
                                <input type="text" x-model="formData.name" class="form-control" :class="{ 'is-invalid': errors.name }" />
                                <div x-show="errors.name" class="invalid-feedback" x-text="errors.name?.[0] || errors.name"></div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Type <span class="text-danger">*</span></label>
                                <select x-model="formData.type" class="form-select" :class="{ 'is-invalid': errors.type }">
                                    <option value="json">JSON</option>
                                    <option value="html">HTML</option>
                                    <option value="markdown">Markdown</option>
                                </select>
                                <div x-show="errors.type" class="invalid-feedback" x-text="errors.type?.[0] || errors.type"></div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <div class="form-check form-switch mt-4">
                                    <input class="form-check-input" type="checkbox" x-model="formData.is_active" id="is_active" />
                                    <label class="form-check-label" for="is_active">Is Active</label>
                                </div>
                            </div>
                            <div class="col-md-12 mb-3">
                                <label class="form-label">Value <span class="text-danger">*</span></label>
                                <textarea
                                    x-model="formData.value"
                                    rows="10"
                                    class="form-control font-monospace"
                                    :class="{ 'is-invalid': errors.value }"
                                    :placeholder="formData.type === 'json' ? '{\n  \"key\": \"value\"\n}' : formData.type === 'html' ? '<div>HTML content</div>' : '# Markdown content'"
                                ></textarea>
                                <small x-show="formData.type === 'json'" class="form-text text-muted">Geçerli JSON formatında girin</small>
                                <div x-show="errors.value" class="invalid-feedback" x-text="errors.value?.[0] || errors.value"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
