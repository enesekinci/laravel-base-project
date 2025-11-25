@extends('admin.layouts.app')

@section('title', isset($id) ? 'Edit Post' : 'Create Post')

@push('styles')
    <!-- Quill Editor -->
    <link rel="stylesheet" type="text/css" href="{{ asset('cork/src/plugins/css/light/editors/quill/quill.snow.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('cork/src/plugins/css/dark/editors/quill/quill.snow.css') }}" />
    <!-- Flatpickr -->
    <link rel="stylesheet" type="text/css" href="{{ asset('cork/src/plugins/src/flatpickr/flatpickr.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('cork/src/plugins/css/light/flatpickr/custom-flatpickr.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('cork/src/plugins/css/dark/flatpickr/custom-flatpickr.css') }}" />
@endpush

@push('scripts')
    <!-- Quill Editor -->
    <script src="{{ asset('cork/src/plugins/src/editors/quill/quill.js') }}"></script>
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

        // Post Form Component
        document.addEventListener('alpine:init', () => {
            Alpine.data('postForm', () => ({
                loading: false,
                saving: false,
                postId: {{ $id ?? 'null' }},
                formData: {
                    title: '',
                    slug: '',
                    excerpt: '',
                    content: '',
                    status: 'draft',
                    published_at: '',
                    category_ids: [],
                    tag_ids: [],
                    cover_media_id: '',
                },
                errors: {},
                categories: [],
                tags: [],
                quillInstance: null,

                async init() {
                    await waitForAdminApi()
                    if (this.postId) {
                        await this.loadPost()
                    }
                    await this.loadRelatedData()
                    this.initQuill()
                    this.initFlatpickr()
                },

                async loadPost() {
                    if (!window.adminApiHelpers) return
                    this.loading = true
                    try {
                        const response = await window.adminApiHelpers.get(`/posts/${this.postId}`)
                        const post = response.data
                        this.formData = {
                            title: post.title || '',
                            slug: post.slug || '',
                            excerpt: post.excerpt || '',
                            content: post.content || '',
                            status: post.status || 'draft',
                            published_at: post.published_at || '',
                            category_ids: post.categories?.map((c) => c.id) || [],
                            tag_ids: post.tags?.map((t) => t.id) || [],
                            cover_media_id: post.cover_media_id || '',
                        }
                        if (this.quillInstance) {
                            this.quillInstance.root.innerHTML = this.formData.content
                        }
                    } catch (error) {
                        console.error('Error loading post:', error)
                        if (window.swalHelpers) {
                            window.swalHelpers.error('Blog yazısı yüklenirken bir hata oluştu')
                        }
                    } finally {
                        this.loading = false
                    }
                },

                async loadRelatedData() {
                    if (!window.adminApiHelpers) return
                    try {
                        const [categoriesResponse, tagsResponse] = await Promise.all([
                            window.adminApiHelpers.get('/post-categories', { per_page: 1000 }),
                            window.adminApiHelpers.get('/post-tags', { per_page: 1000 }),
                        ])
                        this.categories = categoriesResponse.data || []
                        this.tags = tagsResponse.data || []
                    } catch (error) {
                        console.error('Error loading related data:', error)
                    }
                },

                async save() {
                    if (this.quillInstance) {
                        this.formData.content = this.quillInstance.root.innerHTML
                    }
                    try {
                        await handleFormSave(this, '/posts', this.postId, this.formData, this.postId ? 'Blog yazısı güncellendi' : 'Blog yazısı oluşturuldu', '/admin/posts')
                    } catch (error) {
                        this.saving = false
                    }
                },

                generateSlug() {
                    if (!this.formData.slug || this.formData.slug === '') {
                        this.formData.slug = generateSlug(this.formData.title)
                    }
                },

                openMediaPicker() {
                    // Set callback for media selection
                    window.mediaSelectCallback = (media) => {
                        this.formData.cover_media_id = media.id
                        // Close modal after selection
                        const modal = bootstrap.Modal.getInstance(document.getElementById('mediaPickerModal'))
                        if (modal) {
                            modal.hide()
                        }
                    }
                    // Show modal
                    const modalElement = document.getElementById('mediaPickerModal')
                    if (modalElement) {
                        const modal = new bootstrap.Modal(modalElement)
                        modal.show()
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

                initFlatpickr() {
                    setTimeout(() => {
                        const publishedAtInput = document.getElementById('published_at')
                        if (publishedAtInput && !publishedAtInput.flatpickr) {
                            flatpickr(publishedAtInput, {
                                dateFormat: 'Y-m-d H:i',
                                enableTime: true,
                                onChange: (selectedDates, dateStr) => {
                                    this.formData.published_at = dateStr
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
                <li class="breadcrumb-item"><a href="{{ route('admin.posts.index') }}">Blog Posts</a></li>
                <li class="breadcrumb-item active" aria-current="page" x-text="postId ? 'Edit' : 'Create'"></li>
            </ol>
        </nav>
    </div>
    <!-- /BREADCRUMB -->

    <div x-data="postForm" x-init="init()">
        <div class="row layout-top-spacing">
            <div class="col-xl-12 col-lg-12 col-sm-12 layout-spacing">
                <div class="widget-content widget-content-area br-8 p-4">
                    <!-- Header -->
                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <h4 class="mb-0" x-text="postId ? 'Edit Post' : 'Create Post'"></h4>
                        <div>
                            <a href="{{ route('admin.posts.index') }}" class="btn btn-secondary me-2">Cancel</a>
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
                                    Title
                                    <span class="text-danger">*</span>
                                </label>
                                <input type="text" x-model="formData.title" @blur="generateSlug()" class="form-control" :class="{ 'is-invalid': errors.title }" />
                                <div x-show="errors.title" class="invalid-feedback" x-text="errors.title?.[0] || errors.title"></div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">
                                    Slug
                                    <span class="text-danger">*</span>
                                </label>
                                <input type="text" x-model="formData.slug" class="form-control" :class="{ 'is-invalid': errors.slug }" />
                                <div x-show="errors.slug" class="invalid-feedback" x-text="errors.slug?.[0] || errors.slug"></div>
                            </div>
                            <div class="col-md-12 mb-3">
                                <label class="form-label">Excerpt</label>
                                <textarea x-model="formData.excerpt" rows="3" class="form-control"></textarea>
                            </div>
                            <div class="col-md-12 mb-3">
                                <label class="form-label">Content</label>
                                <div id="content-editor" style="height: 300px"></div>
                                <div x-show="errors.content" class="invalid-feedback d-block" x-text="errors.content?.[0] || errors.content"></div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Status</label>
                                <select x-model="formData.status" class="form-select">
                                    <option value="draft">Draft</option>
                                    <option value="published">Published</option>
                                </select>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Published At</label>
                                <input type="text" id="published_at" x-model="formData.published_at" class="form-control flatpickr" placeholder="Select date and time" />
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Categories</label>
                                <select x-model="formData.category_ids" multiple class="form-select">
                                    <template x-for="category in categories" :key="category.id">
                                        <option :value="category.id" x-text="category.name"></option>
                                    </template>
                                </select>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Tags</label>
                                <select x-model="formData.tag_ids" multiple class="form-select">
                                    <template x-for="tag in tags" :key="tag.id">
                                        <option :value="tag.id" x-text="tag.name"></option>
                                    </template>
                                </select>
                            </div>
                            <div class="col-md-12 mb-3">
                                <label class="form-label">Cover Image</label>
                                <div class="d-flex align-items-center gap-2">
                                    <button type="button" @click="openMediaPicker()" class="btn btn-secondary">Select Image</button>
                                    <span x-show="formData.cover_media_id" class="text-muted">
                                        Image selected (ID:
                                        <span x-text="formData.cover_media_id"></span>
                                        )
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Media Picker Modal -->
        <div class="modal fade" id="mediaPickerModal" tabindex="-1" role="dialog" aria-labelledby="mediaPickerModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-xl" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="mediaPickerModalLabel">Select Media</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                            <svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x">
                                <line x1="18" y1="6" x2="6" y2="18"></line>
                                <line x1="6" y1="6" x2="18" y2="18"></line>
                            </svg>
                        </button>
                    </div>
                    <div class="modal-body" style="min-height: 500px;">
                        <iframe src="/admin/media?select=true" style="width: 100%; height: 600px; border: none;" id="mediaPickerIframe"></iframe>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
