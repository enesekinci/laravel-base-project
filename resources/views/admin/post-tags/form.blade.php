@extends('admin.layouts.app')

@section('title', isset($id) ? 'Edit Tag' : 'Create Tag')

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

        function generateSlug(text) {
            if (!text) return ''
            return text
                .toLowerCase()
                .replace(/[^a-z0-9]+/g, '-')
                .replace(/(^-|-$)/g, '')
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

        // Post Tag Form Component
        document.addEventListener('alpine:init', () => {
            Alpine.data('postTagForm', () => ({
                loading: false,
                saving: false,
                tagId: {{ $id ?? 'null' }},
                formData: {
                    name: '',
                    slug: '',
                },
                errors: {},

                async init() {
                    await waitForAdminApi()
                    if (this.tagId) {
                        await this.loadTag()
                    }
                },

                async loadTag() {
                    if (!window.adminApiHelpers) return
                    this.loading = true
                    try {
                        const response = await window.adminApiHelpers.get(`/post-tags/${this.tagId}`)
                        const tag = response.data
                        this.formData = {
                            name: tag.name || '',
                            slug: tag.slug || '',
                        }
                    } catch (error) {
                        console.error('Error loading tag:', error)
                        if (window.swalHelpers) {
                            window.swalHelpers.error('Blog etiketi yüklenirken bir hata oluştu')
                        }
                    } finally {
                        this.loading = false
                    }
                },

                async save() {
                    try {
                        await handleFormSave(this, '/post-tags', this.tagId, this.formData, this.tagId ? 'Blog etiketi güncellendi' : 'Blog etiketi oluşturuldu', '/admin/post-tags')
                    } catch (error) {
                        this.saving = false
                    }
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
                <li class="breadcrumb-item"><a href="{{ route('admin.post-tags.index') }}">Blog Tags</a></li>
                <li class="breadcrumb-item active" aria-current="page" x-text="tagId ? 'Edit' : 'Create'"></li>
            </ol>
        </nav>
    </div>
    <!-- /BREADCRUMB -->

    <div x-data="postTagForm" x-init="init()">
        <div class="row layout-top-spacing">
            <div class="col-xl-12 col-lg-12 col-sm-12 layout-spacing">
                <div class="widget-content widget-content-area br-8 p-4">
                    <!-- Header -->
                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <h4 class="mb-0" x-text="tagId ? 'Edit Tag' : 'Create Tag'"></h4>
                        <div>
                            <a href="{{ route('admin.post-tags.index') }}" class="btn btn-secondary me-2">Cancel</a>
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
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
