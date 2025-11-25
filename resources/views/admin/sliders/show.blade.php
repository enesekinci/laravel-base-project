@extends('admin.layouts.app')

@section('title', 'Slider Detail')

@push('styles')
    <!-- File Upload -->
    <link rel="stylesheet" href="{{ asset('cork/src/plugins/src/filepond/filepond.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('cork/src/plugins/src/filepond/FilePondPluginImagePreview.min.css') }}" />
    <link href="{{ asset('cork/src/plugins/css/light/filepond/custom-filepond.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('cork/src/plugins/css/dark/filepond/custom-filepond.css') }}" rel="stylesheet" type="text/css" />
@endpush

@push('scripts')
    <script>
        document.addEventListener('alpine:init', () => {
            Alpine.data('sliderDetail', () => ({
                loading: false,
                slider: null,
                items: [],
                showAddModal: false,
                editingItem: null,
                formData: {
                    title: '',
                    subtitle: '',
                    button_text: '',
                    button_url: '',
                    link_url: '',
                    media_file_id: '',
                    sort_order: 0,
                    is_active: true,
                    meta: {},
                },
                errors: {},

                async init() {
                    await this.waitForAdminApi()
                    await this.loadSlider()
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

                async loadSlider() {
                    if (!window.adminApiHelpers) {
                        console.error('adminApiHelpers is not available')
                        return
                    }

                    this.loading = true
                    try {
                        const response = await window.adminApiHelpers.get(`/sliders/{{ $id }}`)
                        this.slider = response.data
                        this.items = response.data.items || []
                    } catch (error) {
                        console.error('Error loading slider:', error)
                        if (window.Alpine && window.Alpine.store('toast')) {
                            window.Alpine.store('toast').error('Slider yüklenirken bir hata oluştu')
                        }
                    } finally {
                        this.loading = false
                    }
                },

                openAddModal() {
                    this.editingItem = null
                    this.formData = {
                        title: '',
                        subtitle: '',
                        button_text: '',
                        button_url: '',
                        link_url: '',
                        media_file_id: '',
                        sort_order: 0,
                        is_active: true,
                        meta: {},
                    }
                    this.errors = {}
                    this.showAddModal = true
                },

                async saveItem() {
                    this.errors = {}
                    try {
                        if (this.editingItem) {
                            await window.adminApiHelpers.put(`/slider-items/${this.editingItem.id}`, this.formData)
                            if (window.Alpine && window.Alpine.store('toast')) {
                                window.Alpine.store('toast').success('Slider öğesi güncellendi')
                            }
                        } else {
                            await window.adminApiHelpers.post(`/sliders/{{ $id }}/items`, this.formData)
                            if (window.Alpine && window.Alpine.store('toast')) {
                                window.Alpine.store('toast').success('Slider öğesi eklendi')
                            }
                        }
                        this.showAddModal = false
                        await this.loadSlider()
                    } catch (error) {
                        if (error.response?.data?.errors) {
                            this.errors = error.response.data.errors
                        } else {
                            if (window.Alpine && window.Alpine.store('toast')) {
                                window.Alpine.store('toast').error('Bir hata oluştu')
                            }
                        }
                    }
                },

                editItem(item) {
                    this.editingItem = item
                    this.formData = {
                        title: item.title || '',
                        subtitle: item.subtitle || '',
                        button_text: item.button_text || '',
                        button_url: item.button_url || '',
                        link_url: item.link_url || '',
                        media_file_id: item.media_file_id || '',
                        sort_order: item.sort_order || 0,
                        is_active: item.is_active,
                        meta: item.meta || {},
                    }
                    this.errors = {}
                    this.showAddModal = true
                },

                async deleteItem(id) {
                    if (window.Alpine && window.Alpine.store('confirm')) {
                        window.Alpine.store('confirm').show('Delete Slider Item', 'Bu slider öğesini silmek istediğinize emin misiniz?', async () => {
                            try {
                                await window.adminApiHelpers.delete(`/slider-items/${id}`)
                                if (window.Alpine && window.Alpine.store('toast')) {
                                    window.Alpine.store('toast').success('Slider öğesi silindi')
                                }
                                await this.loadSlider()
                            } catch (error) {
                                console.error('Error deleting slider item:', error)
                            }
                        })
                    }
                },

                openMediaPicker() {
                    window.mediaSelectCallback = (media) => {
                        this.formData.media_file_id = media.id
                    }
                    window.open('/admin/media?select=true', 'MediaPicker', 'width=1200,height=800')
                },
            }))
        })
    </script>

    <!-- File Upload -->
    <script src="{{ asset('cork/src/plugins/src/filepond/filepond.min.js') }}"></script>
    <script src="{{ asset('cork/src/plugins/src/filepond/FilePondPluginFileValidateType.min.js') }}"></script>
    <script src="{{ asset('cork/src/plugins/src/filepond/FilePondPluginImageExifOrientation.min.js') }}"></script>
    <script src="{{ asset('cork/src/plugins/src/filepond/FilePondPluginImagePreview.min.js') }}"></script>
@endpush

@section('content')
    <!-- BREADCRUMB -->
    <div class="page-meta">
        <nav class="breadcrumb-style-one" aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Admin</a></li>
                <li class="breadcrumb-item"><a href="{{ route('admin.sliders.index') }}">Sliders</a></li>
                <li class="breadcrumb-item active" aria-current="page">Slider Detail</li>
            </ol>
        </nav>
    </div>
    <!-- /BREADCRUMB -->

    <div x-data="sliderDetail" x-init="init()">
        <div class="row layout-top-spacing">
            <div class="col-xl-12 col-lg-12 col-sm-12 layout-spacing">
                <div class="widget-content widget-content-area br-8 p-4">
                    <!-- Header -->
                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <div>
                            <h4 class="mb-0">Slider Detail</h4>
                            <p x-show="slider" class="text-muted mb-0" x-text="slider?.name || ''"></p>
                        </div>
                        <div>
                            <button @click="openAddModal()" class="btn btn-primary me-2">
                                <svg
                                    xmlns="http://www.w3.org/2000/svg"
                                    width="24"
                                    height="24"
                                    viewBox="0 0 24 24"
                                    fill="none"
                                    stroke="currentColor"
                                    stroke-width="2"
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    class="feather feather-plus"
                                    style="width: 18px; height: 18px; vertical-align: middle"
                                >
                                    <line x1="12" y1="5" x2="12" y2="19"></line>
                                    <line x1="5" y1="12" x2="19" y2="12"></line>
                                </svg>
                                <span class="ms-2">Add Item</span>
                            </button>
                            <a href="{{ route('admin.sliders.index') }}" class="btn btn-secondary">
                                <svg
                                    xmlns="http://www.w3.org/2000/svg"
                                    width="24"
                                    height="24"
                                    viewBox="0 0 24 24"
                                    fill="none"
                                    stroke="currentColor"
                                    stroke-width="2"
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    class="feather feather-arrow-left"
                                    style="width: 18px; height: 18px; vertical-align: middle"
                                >
                                    <line x1="19" y1="12" x2="5" y2="12"></line>
                                    <polyline points="12 19 5 12 12 5"></polyline>
                                </svg>
                                <span class="ms-2">Back</span>
                            </a>
                        </div>
                    </div>

                    <!-- Loading -->
                    <div x-show="loading" class="text-center p-4">
                        <div class="spinner-border text-primary" role="status">
                            <span class="visually-hidden">Loading...</span>
                        </div>
                        <p class="mt-2 text-muted">Loading...</p>
                    </div>

                    <!-- Slider Info -->
                    <div x-show="!loading && slider" class="mb-4">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label class="form-label fw-bold">Name</label>
                                    <p x-text="slider?.name || '-'"></p>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label class="form-label fw-bold">Code</label>
                                    <p x-text="slider?.code || '-'"></p>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label class="form-label fw-bold">Status</label>
                                    <p>
                                        <span :class="slider?.is_active ? 'badge badge-success' : 'badge badge-danger'" x-text="slider?.is_active ? 'Active' : 'Inactive'"></span>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Items Table -->
                    <div x-show="!loading && slider" class="table-responsive">
                        <table class="table dt-table-hover" style="width: 100%">
                            <thead>
                                <tr>
                                    <th>Image</th>
                                    <th>Title</th>
                                    <th>Subtitle</th>
                                    <th>Button Text</th>
                                    <th>Sort Order</th>
                                    <th>Status</th>
                                    <th class="no-content text-center">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <template x-for="item in items" :key="item.id">
                                    <tr>
                                        <td>
                                            <img
                                                :src="item.media?.url || '/placeholder-image.png'"
                                                :alt="item.title"
                                                style="width: 60px; height: 60px; object-fit: cover; border-radius: 4px"
                                            />
                                        </td>
                                        <td>
                                            <span class="fw-bold" x-text="item.title || '-'"></span>
                                        </td>
                                        <td>
                                            <span x-text="item.subtitle || '-'"></span>
                                        </td>
                                        <td>
                                            <span x-text="item.button_text || '-'"></span>
                                        </td>
                                        <td>
                                            <span x-text="item.sort_order || 0"></span>
                                        </td>
                                        <td>
                                            <span :class="item.is_active ? 'badge badge-success' : 'badge badge-danger'" x-text="item.is_active ? 'Active' : 'Inactive'"></span>
                                        </td>
                                        <td class="text-center">
                                            <div class="dropdown">
                                                <a
                                                    class="dropdown-toggle"
                                                    href="#"
                                                    role="button"
                                                    :id="`dropdownMenuLink${item.id}`"
                                                    data-bs-toggle="dropdown"
                                                    aria-haspopup="true"
                                                    aria-expanded="true"
                                                >
                                                    <svg
                                                        xmlns="http://www.w3.org/2000/svg"
                                                        width="24"
                                                        height="24"
                                                        viewBox="0 0 24 24"
                                                        fill="none"
                                                        stroke="currentColor"
                                                        stroke-width="2"
                                                        stroke-linecap="round"
                                                        stroke-linejoin="round"
                                                        class="feather feather-more-horizontal"
                                                    >
                                                        <circle cx="12" cy="12" r="1"></circle>
                                                        <circle cx="19" cy="12" r="1"></circle>
                                                        <circle cx="5" cy="12" r="1"></circle>
                                                    </svg>
                                                </a>
                                                <div class="dropdown-menu" :aria-labelledby="`dropdownMenuLink${item.id}`">
                                                    <a class="dropdown-item" href="javascript:void(0);" @click="editItem(item)">
                                                        <svg
                                                            xmlns="http://www.w3.org/2000/svg"
                                                            width="24"
                                                            height="24"
                                                            viewBox="0 0 24 24"
                                                            fill="none"
                                                            stroke="currentColor"
                                                            stroke-width="2"
                                                            stroke-linecap="round"
                                                            stroke-linejoin="round"
                                                            class="feather feather-edit"
                                                            style="width: 16px; height: 16px; vertical-align: middle; margin-right: 8px"
                                                        >
                                                            <path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path>
                                                            <path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path>
                                                        </svg>
                                                        Edit
                                                    </a>
                                                    <a class="dropdown-item text-danger" href="javascript:void(0);" @click="deleteItem(item.id)">
                                                        <svg
                                                            xmlns="http://www.w3.org/2000/svg"
                                                            width="24"
                                                            height="24"
                                                            viewBox="0 0 24 24"
                                                            fill="none"
                                                            stroke="currentColor"
                                                            stroke-width="2"
                                                            stroke-linecap="round"
                                                            stroke-linejoin="round"
                                                            class="feather feather-trash-2"
                                                            style="width: 16px; height: 16px; vertical-align: middle; margin-right: 8px"
                                                        >
                                                            <polyline points="3 6 5 6 21 6"></polyline>
                                                            <path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path>
                                                            <line x1="10" y1="11" x2="10" y2="17"></line>
                                                            <line x1="14" y1="11" x2="14" y2="17"></line>
                                                        </svg>
                                                        Delete
                                                    </a>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                </template>
                                <tr x-show="items.length === 0">
                                    <td colspan="7" class="text-center text-muted">No items found</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <!-- Add/Edit Modal -->
                    <div
                        x-show="showAddModal"
                        class="modal fade"
                        style="display: none; z-index: 9999"
                        tabindex="-1"
                        @click.away="showAddModal = false"
                    >
                        <div class="modal-dialog modal-dialog-centered modal-lg">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" x-text="editingItem ? 'Edit Slider Item' : 'Add Slider Item'"></h5>
                                    <button type="button" class="btn-close" @click="showAddModal = false" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <div class="row">
                                        <div class="col-md-6 mb-3">
                                            <label class="form-label">Title</label>
                                            <input type="text" x-model="formData.title" class="form-control" :class="{ 'is-invalid': errors.title }" />
                                            <div x-show="errors.title" class="invalid-feedback" x-text="errors.title?.[0]"></div>
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label class="form-label">Subtitle</label>
                                            <input type="text" x-model="formData.subtitle" class="form-control" :class="{ 'is-invalid': errors.subtitle }" />
                                            <div x-show="errors.subtitle" class="invalid-feedback" x-text="errors.subtitle?.[0]"></div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6 mb-3">
                                            <label class="form-label">Button Text</label>
                                            <input type="text" x-model="formData.button_text" class="form-control" :class="{ 'is-invalid': errors.button_text }" />
                                            <div x-show="errors.button_text" class="invalid-feedback" x-text="errors.button_text?.[0]"></div>
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label class="form-label">Button URL</label>
                                            <input type="text" x-model="formData.button_url" class="form-control" :class="{ 'is-invalid': errors.button_url }" />
                                            <div x-show="errors.button_url" class="invalid-feedback" x-text="errors.button_url?.[0]"></div>
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Link URL</label>
                                        <input type="text" x-model="formData.link_url" class="form-control" :class="{ 'is-invalid': errors.link_url }" />
                                        <div x-show="errors.link_url" class="invalid-feedback" x-text="errors.link_url?.[0]"></div>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Image</label>
                                        <div class="d-flex align-items-center gap-2">
                                            <button type="button" @click="openMediaPicker()" class="btn btn-secondary">Select Image</button>
                                            <span x-show="formData.media_file_id" class="text-muted">Image selected (ID: <span x-text="formData.media_file_id"></span>)</span>
                                        </div>
                                        <div x-show="errors.media_file_id" class="invalid-feedback d-block" x-text="errors.media_file_id?.[0]"></div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6 mb-3">
                                            <label class="form-label">Sort Order</label>
                                            <input type="number" x-model="formData.sort_order" class="form-control" :class="{ 'is-invalid': errors.sort_order }" />
                                            <div x-show="errors.sort_order" class="invalid-feedback" x-text="errors.sort_order?.[0]"></div>
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <div class="form-check form-switch mt-4">
                                                <input class="form-check-input" type="checkbox" x-model="formData.is_active" id="is_active" />
                                                <label class="form-check-label" for="is_active">Is Active</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" @click="showAddModal = false">Cancel</button>
                                    <button type="button" class="btn btn-primary" @click="saveItem()">Save</button>
                                </div>
                            </div>
                        </div>
                        <div class="modal-backdrop fade show" @click="showAddModal = false"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
