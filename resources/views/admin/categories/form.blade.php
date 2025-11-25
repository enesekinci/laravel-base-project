@extends('admin.layouts.app')

@section('title', isset($id) ? 'Edit Category' : 'Create Category')

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
                if (error.response?.data?.errors) {
                    context.errors = error.response.data.errors
                    const errorMessages = []
                    Object.keys(error.response.data.errors).forEach((field) => {
                        const fieldErrors = error.response.data.errors[field]
                        if (Array.isArray(fieldErrors) && fieldErrors.length > 0) {
                            fieldErrors.forEach((errorMsg) => {
                                if (errorMsg && typeof errorMsg === 'string' && errorMsg.trim().length > 0) {
                                    errorMessages.push(errorMsg.trim())
                                }
                            })
                        }
                    })
                    if (errorMessages.length > 0 && window.swalHelpers) {
                        window.swalHelpers.error(errorMessages.join('<br>'))
                    }
                } else if (window.swalHelpers) {
                    window.swalHelpers.error(error.response?.data?.message || 'Kayıt sırasında bir hata oluştu')
                }
            } finally {
                context.saving = false
            }
        }

        // Category Form Component
        document.addEventListener('alpine:init', () => {
            Alpine.data('categoryForm', () => ({
                loading: false,
                saving: false,
                categoryId: {{ $id ?? 'null' }},
                formData: {
                    name: '',
                    slug: '',
                    parent_id: '',
                    description: '',
                    sort_order: 0,
                    is_active: true,
                },
                errors: {},
                categories: [],

                async init() {
                    await waitForAdminApi()

                    if (this.categoryId) {
                        await this.loadCategory()
                    }
                    await this.loadCategories()
                },

                async loadCategory() {
                    this.loading = true
                    try {
                        const response = await window.adminApiHelpers.get(`/categories/${this.categoryId}`)
                        const category = response.data

                        this.formData = {
                            name: category.name || '',
                            slug: category.slug || '',
                            parent_id: category.parent_id || '',
                            description: category.description || '',
                            sort_order: category.sort_order || 0,
                            is_active: category.is_active ?? true,
                        }
                    } catch (error) {
                        if (window.swalHelpers) {
                            window.swalHelpers.error('Kategori yüklenirken bir hata oluştu')
                        }
                    } finally {
                        this.loading = false
                    }
                },

                async loadCategories() {
                    try {
                        const response = await window.adminApiHelpers.get('/categories', { per_page: 1000 })
                        this.categories = response.data || []
                    } catch (error) {
                        // Silently fail - categories are not critical
                    }
                },

                async save() {
                    await handleFormSave(this, '/categories', this.categoryId, this.formData, this.categoryId ? 'Kategori güncellendi' : 'Kategori oluşturuldu', '/admin/categories')
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
                <li class="breadcrumb-item"><a href="{{ route('admin.categories.index') }}">Categories</a></li>
                <li class="breadcrumb-item active" aria-current="page" x-text="categoryId ? 'Edit' : 'Create'"></li>
            </ol>
        </nav>
    </div>
    <!-- /BREADCRUMB -->

    <div x-data="categoryForm" x-init="init()">
        <div class="row layout-top-spacing">
            <div class="col-xl-12 col-lg-12 col-sm-12 layout-spacing">
                <div class="widget-content widget-content-area br-8 p-4">
                    <!-- Header -->
                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <h4 class="mb-0" x-text="categoryId ? 'Edit Category' : 'Create Category'"></h4>
                        <div>
                            <a href="{{ route('admin.categories.index') }}" class="btn btn-secondary me-2">Cancel</a>
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
                                <label class="form-label">Parent Category</label>
                                <select x-model="formData.parent_id" class="form-select">
                                    <option value="">None (Root Category)</option>
                                    <template x-for="category in categories" :key="category.id">
                                        <option :value="category.id" x-text="category.name" :disabled="category.id == categoryId"></option>
                                    </template>
                                </select>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Sort Order</label>
                                <input type="number" x-model="formData.sort_order" class="form-control" />
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Status</label>
                                <select x-model="formData.is_active" class="form-select">
                                    <option :value="true">Active</option>
                                    <option :value="false">Inactive</option>
                                </select>
                            </div>
                            <div class="col-md-12 mb-3">
                                <label class="form-label">Description</label>
                                <textarea x-model="formData.description" rows="4" class="form-control"></textarea>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
