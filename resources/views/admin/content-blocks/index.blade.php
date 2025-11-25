@extends('admin.layouts.app')

@section('title', 'Content Blocks')

@push('scripts')
    <script>
        document.addEventListener('alpine:init', () => {
            Alpine.data('contentBlockList', () => ({
                contentBlocks: [],
                loading: false,
                filters: {
                    search: '',
                    type: '',
                },
                pagination: {
                    current_page: 1,
                    last_page: 1,
                    per_page: 50,
                    total: 0,
                },

                async init() {
                    await this.waitForAdminApi()
                    await this.loadContentBlocks()
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

                async loadContentBlocks(page = 1) {
                    if (!window.adminApiHelpers) {
                        console.error('adminApiHelpers is not available')
                        return
                    }

                    this.loading = true
                    try {
                        const params = {
                            page,
                            per_page: this.pagination.per_page,
                            ...this.filters,
                        }

                        Object.keys(params).forEach((key) => {
                            if (params[key] === '' || params[key] === null) {
                                delete params[key]
                            }
                        })

                        const response = await window.adminApiHelpers.get('/content-blocks', params)
                        this.contentBlocks = response.data
                        this.pagination = {
                            current_page: response.meta.current_page,
                            last_page: response.meta.last_page,
                            per_page: response.meta.per_page,
                            total: response.meta.total,
                            from: response.meta.from,
                            to: response.meta.to,
                        }
                    } catch (error) {
                        console.error('Error loading content blocks:', error)
                        if (window.Alpine && window.Alpine.store('toast')) {
                            window.Alpine.store('toast').error('İçerik blokları yüklenirken bir hata oluştu')
                        }
                    } finally {
                        this.loading = false
                    }
                },

                async applyFilters() {
                    this.pagination.current_page = 1
                    await this.loadContentBlocks(1)
                },

                async resetFilters() {
                    this.filters = {
                        search: '',
                        type: '',
                    }
                    await this.loadContentBlocks(1)
                },

                async changePage(page) {
                    if (page >= 1 && page <= this.pagination.last_page) {
                        await this.loadContentBlocks(page)
                    }
                },

                async deleteItem(id) {
                    if (window.Alpine && window.Alpine.store('confirm')) {
                        window.Alpine.store('confirm').show('Delete Content Block', 'Bu içerik bloğunu silmek istediğinize emin misiniz?', async () => {
                            try {
                                await window.adminApiHelpers.delete(`/content-blocks/${id}`)
                                if (window.Alpine && window.Alpine.store('toast')) {
                                    window.Alpine.store('toast').success('İçerik bloğu silindi')
                                }
                                await this.loadContentBlocks(this.pagination.current_page)
                            } catch (error) {
                                console.error('Error deleting content block:', error)
                            }
                        })
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
                <li class="breadcrumb-item"><a href="#">Content</a></li>
                <li class="breadcrumb-item active" aria-current="page">Content Blocks</li>
            </ol>
        </nav>
    </div>
    <!-- /BREADCRUMB -->

    <div x-data="contentBlockList" x-init="init()">
        <div class="row layout-top-spacing">
            <div class="col-xl-12 col-lg-12 col-sm-12 layout-spacing">
                <div class="widget-content widget-content-area br-8 p-4">
                    <!-- Header -->
                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <div>
                            <h4 class="mb-0">Content Blocks</h4>
                            <button class="btn btn-sm btn-outline-info mt-2" type="button" data-bs-toggle="collapse" data-bs-target="#contentBlocksReadme" aria-expanded="false" aria-controls="contentBlocksReadme">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-info">
                                    <circle cx="12" cy="12" r="10"></circle>
                                    <line x1="12" y1="16" x2="12" y2="12"></line>
                                    <line x1="12" y1="8" x2="12.01" y2="8"></line>
                                </svg>
                                <span class="ms-1">Nasıl Kullanılır?</span>
                            </button>
                        </div>
                        <a href="{{ route('admin.content-blocks.create') }}" class="btn btn-primary">
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
                            <span class="ms-2">New Content Block</span>
                        </a>
                    </div>

                    <!-- Readme Collapse -->
                    <div class="collapse mb-4" id="contentBlocksReadme">
                        <div class="card card-body">
                            <h5>Content Blocks Nasıl Kullanılır?</h5>
                            <p>Content Blocks, sitenizin farklı bölümlerinde kullanabileceğiniz yeniden kullanılabilir içerik parçalarıdır.</p>
                            <h6>Kullanım Senaryoları:</h6>
                            <ul>
                                <li><strong>Sayfa içerikleri:</strong> Ana sayfa, hakkımızda, iletişim gibi sayfalarda dinamik içerik</li>
                                <li><strong>Widget'lar:</strong> Sidebar, footer gibi bölümlerde tekrar eden içerikler</li>
                                <li><strong>Banner'lar:</strong> Promosyon banner'ları, duyurular</li>
                                <li><strong>HTML/Blade kodları:</strong> Özel HTML veya Blade template'leri</li>
                            </ul>
                            <h6>Blade Template'de Kullanım:</h6>
                            <pre class="bg-light p-3 rounded"><code>@@contentblock('home_hero_section')

@@contentblock('home_hero_section', '&lt;div&gt;Varsayılan içerik&lt;/div&gt;')</code></pre>
                            <p class="mb-0"><small class="text-muted">Daha fazla bilgi için: <a href="{{ route('admin.content-blocks.index') }}/README.md" target="_blank">README.md</a></small></p>
                        </div>
                    </div>

                    <!-- Filter Bar -->
                    <div class="widget-content widget-content-area br-8 p-4 mb-4">
                        <div class="row">
                            <div class="col-md-4">
                                <label class="form-label">Search</label>
                                <input type="text" x-model="filters.search" @input.debounce.500ms="applyFilters()" placeholder="Name or key..." class="form-control" />
                            </div>
                            <div class="col-md-4">
                                <label class="form-label">Type</label>
                                <select x-model="filters.type" @change="applyFilters()" class="form-select" placeholder="All">
                                    <option value="">All</option>
                                    <option value="json">JSON</option>
                                    <option value="html">HTML</option>
                                    <option value="markdown">Markdown</option>
                                </select>
                            </div>
                            <div class="col-md-4 d-flex align-items-end">
                                <button @click="resetFilters()" class="btn btn-secondary w-100">Reset Filters</button>
                            </div>
                        </div>
                    </div>

                    <!-- Table -->
                    <div class="table-responsive" x-show="!loading">
                        <table class="table dt-table-hover" style="width: 100%">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Key</th>
                                    <th>Type</th>
                                    <th class="no-content text-center">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <template x-for="block in contentBlocks" :key="block.id">
                                    <tr>
                                        <td>
                                            <div class="d-flex flex-column">
                                                <span class="text-truncate fw-bold" x-text="block.name"></span>
                                            </div>
                                        </td>
                                        <td>
                                            <span class="text-truncate" x-text="block.key"></span>
                                        </td>
                                        <td>
                                            <span class="badge badge-info" x-text="block.type || 'json'"></span>
                                        </td>
                                        <td class="text-center">
                                            <div class="d-flex justify-content-center gap-2">
                                                <a
                                                    :href="`/admin/content-blocks/${block.id}/edit`"
                                                    class="btn btn-sm btn-icon btn-outline-primary"
                                                    title="Edit"
                                                >
                                                    <svg
                                                        xmlns="http://www.w3.org/2000/svg"
                                                        width="18"
                                                        height="18"
                                                        viewBox="0 0 24 24"
                                                        fill="none"
                                                        stroke="currentColor"
                                                        stroke-width="2"
                                                        stroke-linecap="round"
                                                        stroke-linejoin="round"
                                                        class="feather feather-edit"
                                                    >
                                                        <path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path>
                                                        <path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path>
                                                    </svg>
                                                </a>
                                                <button
                                                    type="button"
                                                    @click="deleteItem(block.id)"
                                                    class="btn btn-sm btn-icon btn-outline-danger"
                                                    title="Delete"
                                                >
                                                        <svg
                                                            xmlns="http://www.w3.org/2000/svg"
                                                        width="18"
                                                        height="18"
                                                            viewBox="0 0 24 24"
                                                            fill="none"
                                                            stroke="currentColor"
                                                            stroke-width="2"
                                                            stroke-linecap="round"
                                                            stroke-linejoin="round"
                                                            class="feather feather-trash-2"
                                                        >
                                                            <polyline points="3 6 5 6 21 6"></polyline>
                                                            <path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path>
                                                            <line x1="10" y1="11" x2="10" y2="17"></line>
                                                            <line x1="14" y1="11" x2="14" y2="17"></line>
                                                        </svg>
                                                </button>
                                            </div>
                                        </td>
                                    </tr>
                                </template>
                                <tr x-show="contentBlocks.length === 0 && !loading">
                                    <td colspan="4" class="text-center">
                                        <p class="text-muted">No content blocks found</p>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <!-- Loading -->
                    <div x-show="loading" class="text-center p-4">
                        <div class="spinner-border text-primary" role="status">
                            <span class="visually-hidden">Loading...</span>
                        </div>
                        <p class="mt-2 text-muted">Loading...</p>
                    </div>

                    <!-- Pagination -->
                    <div x-show="!loading && pagination.last_page > 1" class="d-flex justify-content-between align-items-center mt-4">
                        <div class="text-muted">
                            Showing
                            <span x-text="pagination.from"></span>
                            to
                            <span x-text="pagination.to"></span>
                            of
                            <span x-text="pagination.total"></span>
                            results
                        </div>
                        <nav>
                            <ul class="pagination mb-0">
                                <li class="page-item" :class="{ 'disabled': pagination.current_page <= 1 }">
                                    <a class="page-link" href="javascript:void(0);" @click="changePage(pagination.current_page - 1)">Previous</a>
                                </li>
                                <template x-for="page in Array.from({ length: pagination.last_page }, (_, i) => i + 1)" :key="page">
                                    <li class="page-item" :class="{ 'active': page === pagination.current_page }">
                                        <a class="page-link" href="javascript:void(0);" @click="changePage(page)" x-text="page"></a>
                                    </li>
                                </template>
                                <li class="page-item" :class="{ 'disabled': pagination.current_page >= pagination.last_page }">
                                    <a class="page-link" href="javascript:void(0);" @click="changePage(pagination.current_page + 1)">Next</a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
