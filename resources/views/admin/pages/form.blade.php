@extends('admin.layouts.app')

@section('title', isset($id) ? 'Edit Page' : 'Create Page')

@push('styles')
    <!-- Quill Editor -->
    <link rel="stylesheet" type="text/css" href="{{ asset('cork/src/plugins/css/light/editors/quill/quill.snow.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('cork/src/plugins/css/dark/editors/quill/quill.snow.css') }}" />
@endpush

@push('scripts')
    <!-- Quill Editor -->
    <script src="{{ asset('cork/src/plugins/src/editors/quill/quill.js') }}"></script>
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

        // Page Form Component
        document.addEventListener('alpine:init', () => {
            Alpine.data('pageForm', () => ({
                loading: false,
                saving: false,
                pageId: {{ $id ?? 'null' }},
                formData: {
                    title: '',
                    slug: '',
                    content: '',
                    is_active: true,
                    show_in_footer: false,
                    meta_title: '',
                    meta_description: '',
                },
                errors: {},
                quillInstance: null,

                async init() {
                    await waitForAdminApi()
                    if (this.pageId) {
                        await this.loadPage()
                    }
                    this.initQuill()
                },

                async loadPage() {
                    if (!window.adminApiHelpers) return
                    this.loading = true
                    try {
                        const response = await window.adminApiHelpers.get(`/pages/${this.pageId}`)
                        const page = response.data
                        this.formData = {
                            title: page.title || '',
                            slug: page.slug || '',
                            content: page.content || '',
                            is_active: page.is_active ?? true,
                            show_in_footer: page.show_in_footer ?? false,
                            meta_title: page.meta_title || '',
                            meta_description: page.meta_description || '',
                        }
                        if (this.quillInstance) {
                            this.quillInstance.root.innerHTML = this.formData.content
                        }
                    } catch (error) {
                        console.error('Error loading page:', error)
                        if (window.swalHelpers) {
                            window.swalHelpers.error('Sayfa yüklenirken bir hata oluştu')
                        }
                    } finally {
                        this.loading = false
                    }
                },

                async save() {
                    if (this.quillInstance) {
                        this.formData.content = this.quillInstance.root.innerHTML
                    }
                    try {
                        await handleFormSave(this, '/pages', this.pageId, this.formData, this.pageId ? 'Sayfa güncellendi' : 'Sayfa oluşturuldu', '/admin/pages')
                    } catch (error) {
                        this.saving = false
                    }
                },

                generateSlug() {
                    if (!this.formData.slug || this.formData.slug === '') {
                        this.formData.slug = generateSlug(this.formData.title)
                    }
                },

                initQuill() {
                    const init = () => {
                        if (typeof Quill === 'undefined') {
                            setTimeout(init, 100)
                            return
                        }
                        const quillEditor = document.getElementById('content-editor')
                        if (!quillEditor) {
                            setTimeout(init, 100)
                            return
                        }
                        if (quillEditor.quill || this.quillInstance) {
                            if (this.quillInstance && this.formData.content && this.quillInstance.root.innerHTML !== this.formData.content) {
                                this.quillInstance.root.innerHTML = this.formData.content
                            }
                            return
                        }
                        try {
                            this.quillInstance = new Quill('#content-editor', { theme: 'snow' })
                            this.quillInstance.on('text-change', () => {
                                this.formData.content = this.quillInstance.root.innerHTML
                            })
                            if (this.formData.content) {
                                this.quillInstance.root.innerHTML = this.formData.content
                            }
                        } catch (e) {
                            console.error('Quill initialization error:', e)
                        }
                    }
                    setTimeout(init, 300)
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
                <li class="breadcrumb-item"><a href="{{ route('admin.pages.index') }}">Pages</a></li>
                <li class="breadcrumb-item active" aria-current="page" x-text="pageId ? 'Edit' : 'Create'"></li>
            </ol>
        </nav>
    </div>
    <!-- /BREADCRUMB -->

    <div x-data="pageForm" x-init="init()">
        <div class="row layout-top-spacing">
            <div class="col-xl-12 col-lg-12 col-sm-12 layout-spacing">
                <div class="widget-content widget-content-area br-8 p-4">
                    <h4 class="mb-4" x-text="pageId ? 'Edit Page' : 'Create Page'"></h4>

                    <div x-show="loading" class="text-center p-4">
                        <div class="spinner-border" role="status">
                            <span class="visually-hidden">Loading...</span>
                        </div>
                    </div>

                    <div x-show="!loading">
                        <form @submit.prevent="save()">
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="title" class="form-label">
                                        Title
                                        <span class="text-danger">*</span>
                                    </label>
                                    <input type="text" id="title" x-model="formData.title" @blur="generateSlug()" class="form-control" :class="{ 'is-invalid': errors.title }" required />
                                    <div x-show="errors.title" class="invalid-feedback" x-text="errors.title?.[0] || errors.title"></div>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="slug" class="form-label">
                                        Slug
                                        <span class="text-danger">*</span>
                                    </label>
                                    <input type="text" id="slug" x-model="formData.slug" class="form-control" :class="{ 'is-invalid': errors.slug }" required />
                                    <div x-show="errors.slug" class="invalid-feedback" x-text="errors.slug?.[0] || errors.slug"></div>
                                </div>

                                <div class="col-md-12 mb-3">
                                    <label for="content-editor" class="form-label">Content</label>
                                    <div id="content-editor" style="min-height: 300px"></div>
                                    <input type="hidden" x-model="formData.content" />
                                    <div x-show="errors.content" class="invalid-feedback d-block" x-text="errors.content?.[0] || errors.content"></div>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <div class="form-check form-switch">
                                        <input class="form-check-input" type="checkbox" id="is_active" x-model="formData.is_active" />
                                        <label class="form-check-label" for="is_active">Is Active</label>
                                    </div>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <div class="form-check form-switch">
                                        <input class="form-check-input" type="checkbox" id="show_in_footer" x-model="formData.show_in_footer" />
                                        <label class="form-check-label" for="show_in_footer">Show in Footer</label>
                                    </div>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="meta_title" class="form-label">Meta Title</label>
                                    <input type="text" id="meta_title" x-model="formData.meta_title" class="form-control" :class="{ 'is-invalid': errors.meta_title }" />
                                    <div x-show="errors.meta_title" class="invalid-feedback" x-text="errors.meta_title?.[0] || errors.meta_title"></div>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="meta_description" class="form-label">Meta Description</label>
                                    <textarea id="meta_description" x-model="formData.meta_description" class="form-control" :class="{ 'is-invalid': errors.meta_description }" rows="2"></textarea>
                                    <div x-show="errors.meta_description" class="invalid-feedback" x-text="errors.meta_description?.[0] || errors.meta_description"></div>
                                </div>
                            </div>

                            <div class="mt-4">
                                <button type="submit" class="btn btn-primary" :disabled="saving">
                                    <span x-show="!saving">Save</span>
                                    <span x-show="saving">Saving...</span>
                                </button>
                                <a href="{{ route('admin.pages.index') }}" class="btn btn-secondary ms-2">Cancel</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
