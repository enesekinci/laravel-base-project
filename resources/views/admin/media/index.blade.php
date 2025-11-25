@extends('admin.layouts.app')

@section('title', 'Media Library')

@push('styles')
    <!-- File Upload -->
    <link rel="stylesheet" href="{{ asset('cork/src/plugins/src/filepond/filepond.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('cork/src/plugins/src/filepond/FilePondPluginImagePreview.min.css') }}" />
    <link href="{{ asset('cork/src/plugins/css/light/filepond/custom-filepond.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('cork/src/plugins/css/dark/filepond/custom-filepond.css') }}" rel="stylesheet" type="text/css" />
    <style>
        .media-action-btn {
            opacity: 0.8;
        }
        .media-action-btn:hover {
            opacity: 1;
            background: rgba(255, 255, 255, 0.2) !important;
            transform: scale(1.1);
        }
        .media-action-btn svg {
            filter: drop-shadow(0 1px 2px rgba(0, 0, 0, 0.3));
        }
        .media-action-btn:hover svg {
            filter: drop-shadow(0 2px 4px rgba(0, 0, 0, 0.4));
        }
    </style>
@endpush

@push('scripts')
    <script>
        document.addEventListener('alpine:init', () => {
            Alpine.data('mediaLibrary', () => ({
                mediaFiles: [],
                loading: false,
                uploading: false,
                filters: {
                    search: '',
                    collection: '',
                },
                pagination: {
                    current_page: 1,
                    last_page: 1,
                    per_page: 24,
                    total: 0,
                },
                selectedMedia: null,
                showUploadModal: false,
                showEditModal: false,
                showFolderModal: false,
                currentFolder: null,
                folders: [],
                editingMedia: null,
                editingFilename: '',
                editingFileExtension: '',
                newFolderName: '',
                movingMedia: null,
                showMoveModal: false,

                async init() {
                    await this.waitForAdminApi()
                    await this.loadFolders()
                    await this.loadMedia()
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

                async loadMedia(page = 1) {
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

                        const response = await window.adminApiHelpers.get('/media', params)
                        this.mediaFiles = response.data
                        this.pagination = {
                            current_page: response.meta.current_page,
                            last_page: response.meta.last_page,
                            per_page: response.meta.per_page,
                            total: response.meta.total,
                            from: response.meta.from,
                            to: response.meta.to,
                        }
                    } catch (error) {
                        console.error('Error loading media:', error)
                        if (window.Alpine && window.Alpine.store('toast')) {
                            window.Alpine.store('toast').error('Medya yüklenirken bir hata oluştu')
                        }
                    } finally {
                        this.loading = false
                    }
                },

                async applyFilters() {
                    this.pagination.current_page = 1
                    await this.loadMedia(1)
                },

                async resetFilters() {
                    this.filters = {
                        search: '',
                        collection: '',
                    }
                    await this.loadMedia(1)
                },

                async changePage(page) {
                    if (page >= 1 && page <= this.pagination.last_page) {
                        await this.loadMedia(page)
                    }
                },

                async uploadFiles(event) {
                    const files = event.target.files
                    if (!files || files.length === 0) return

                    this.uploading = true

                    try {
                        const formData = new FormData()
                        for (let i = 0; i < files.length; i++) {
                            formData.append(`files[${i}]`, files[i])
                        }
                        if (this.currentFolder) {
                            formData.append('collection', this.currentFolder)
                        } else if (this.filters.collection) {
                            formData.append('collection', this.filters.collection)
                        }

                        await window.adminApiHelpers.post('/media', formData)

                        if (window.Alpine && window.Alpine.store('toast')) {
                            window.Alpine.store('toast').success('Dosyalar yüklendi')
                        }

                        // Close modal properly
                        this.closeUploadModal()

                        // Wait a bit for modal to close
                        await new Promise((resolve) => setTimeout(resolve, 300))

                        await this.loadFolders()
                        await this.loadMedia(this.pagination.current_page)
                    } catch (error) {
                        console.error('Error uploading files:', error)
                        let errorMessage = 'Dosya yüklenirken bir hata oluştu'
                        if (error.response && error.response.data) {
                            if (error.response.data.message) {
                                errorMessage = error.response.data.message
                            } else if (error.response.data.errors) {
                                const errors = Object.values(error.response.data.errors).flat()
                                errorMessage = errors.join(', ')
                            }
                        }
                        if (window.Alpine && window.Alpine.store('toast')) {
                            window.Alpine.store('toast').error(errorMessage)
                        }
                    } finally {
                        this.uploading = false
                        event.target.value = ''
                    }
                },

                async deleteItem(id) {
                    try {
                        if (window.swalHelpers) {
                            const result = await window.swalHelpers.confirm({
                                title: 'Medyayı Sil',
                                text: 'Bu medyayı silmek istediğinize emin misiniz?',
                                icon: 'warning',
                                showCancelButton: true,
                                confirmButtonText: 'Evet, Sil',
                                cancelButtonText: 'İptal',
                            })

                            console.log('Confirm result:', result)

                            if (result && result.isConfirmed) {
                                console.log('Deleting media:', id)
                                const response = await window.adminApiHelpers.delete(`/media/${id}`)
                                console.log('Delete response:', response)

                                if (window.swalHelpers) {
                                    window.swalHelpers.success('Medya silindi')
                                }
                                await this.loadFolders()
                                await this.loadMedia(this.pagination.current_page)
                            } else {
                                console.log('Delete cancelled')
                            }
                        } else if (window.Alpine && window.Alpine.store('confirm')) {
                            window.Alpine.store('confirm').show('Delete Media', 'Bu medyayı silmek istediğinize emin misiniz?', async () => {
                                try {
                                    await window.adminApiHelpers.delete(`/media/${id}`)
                                    if (window.Alpine && window.Alpine.store('toast')) {
                                        window.Alpine.store('toast').success('Medya silindi')
                                    }
                                    await this.loadMedia(this.pagination.current_page)
                                } catch (error) {
                                    console.error('Error deleting media:', error)
                                }
                            })
                        } else {
                            // Fallback: direct confirmation
                            if (confirm('Bu medyayı silmek istediğinize emin misiniz?')) {
                                try {
                                    await window.adminApiHelpers.delete(`/media/${id}`)
                                    await this.loadMedia(this.pagination.current_page)
                                } catch (error) {
                                    console.error('Error deleting media:', error)
                                }
                            }
                        }
                    } catch (error) {
                        console.error('Error in deleteItem:', error)
                        if (window.swalHelpers) {
                            window.swalHelpers.error('Medya silinirken bir hata oluştu: ' + (error.message || 'Bilinmeyen hata'))
                        }
                    }
                },

                selectMedia(media) {
                    this.selectedMedia = media
                    // If opened from another page (callback) - direct window access
                    if (window.mediaSelectCallback) {
                        window.mediaSelectCallback(media)
                        window.mediaSelectCallback = null
                    }
                    // If opened in iframe, try parent window callback
                    if (window.parent && window.parent !== window) {
                        try {
                            // Try direct access first (same origin)
                            if (window.parent.mediaSelectCallback) {
                                window.parent.mediaSelectCallback(media)
                                window.parent.mediaSelectCallback = null
                            }
                        } catch (e) {
                            // If direct access fails, use postMessage
                            window.parent.postMessage(
                                {
                                    type: 'mediaSelected',
                                    media: media,
                                },
                                window.location.origin,
                            )
                        }
                    }
                },

                openUploadModal() {
                    const modalElement = document.getElementById('uploadModal')
                    if (modalElement) {
                        if (typeof bootstrap !== 'undefined') {
                            const modal = new bootstrap.Modal(modalElement, {
                                backdrop: true,
                                keyboard: true,
                            })
                            modal.show()

                            // Update state when modal is shown
                            modalElement.addEventListener('shown.bs.modal', () => {
                                this.showUploadModal = true
                            })

                            // Update state when modal is hidden
                            const handleHidden = () => {
                                this.showUploadModal = false
                                this.forceCloseModal()
                                modalElement.removeEventListener('hidden.bs.modal', handleHidden)
                            }
                            modalElement.addEventListener('hidden.bs.modal', handleHidden, { once: true })
                        } else {
                            // Fallback if Bootstrap is not available
                            this.showUploadModal = true
                            modalElement.style.display = 'block'
                            modalElement.classList.add('show')
                            modalElement.setAttribute('aria-hidden', 'false')
                            document.body.classList.add('modal-open')
                            const backdrop = document.createElement('div')
                            backdrop.className = 'modal-backdrop fade show'
                            backdrop.id = 'uploadModalBackdrop'
                            document.body.appendChild(backdrop)
                        }
                    }
                },

                closeUploadModal() {
                    const modalElement = document.getElementById('uploadModal')
                    if (modalElement) {
                        if (typeof bootstrap !== 'undefined') {
                            const modal = bootstrap.Modal.getInstance(modalElement)
                            if (modal) {
                                modal.hide()
                            } else {
                                // Force cleanup
                                this.forceCloseModal()
                            }
                        } else {
                            // Fallback
                            this.forceCloseModal()
                        }
                    } else {
                        this.forceCloseModal()
                    }
                },

                forceCloseModal() {
                    this.showUploadModal = false
                    const modalElement = document.getElementById('uploadModal')
                    if (modalElement) {
                        modalElement.style.display = 'none'
                        modalElement.classList.remove('show')
                        modalElement.setAttribute('aria-hidden', 'true')
                        modalElement.removeAttribute('aria-modal')
                    }

                    // Remove all backdrops
                    const backdrops = document.querySelectorAll('.modal-backdrop')
                    backdrops.forEach((backdrop) => {
                        backdrop.remove()
                    })

                    // Clean up body classes
                    document.body.classList.remove('modal-open')
                    document.body.style.overflow = ''
                    document.body.style.paddingRight = ''
                },

                copyLink(media) {
                    const url = media.url
                    if (navigator.clipboard && navigator.clipboard.writeText) {
                        navigator.clipboard
                            .writeText(url)
                            .then(() => {
                                if (window.swalHelpers) {
                                    window.swalHelpers.success('Link kopyalandı')
                                } else if (window.Alpine && window.Alpine.store('toast')) {
                                    window.Alpine.store('toast').success('Link kopyalandı')
                                }
                            })
                            .catch(() => {
                                this.fallbackCopyText(url)
                            })
                    } else {
                        this.fallbackCopyText(url)
                    }
                },

                openMoveModal(media) {
                    this.movingMedia = media.id
                    this.showMoveModal = true
                    this.$nextTick(() => {
                        const modalElement = document.getElementById('moveMediaModal')
                        if (modalElement) {
                            if (typeof bootstrap !== 'undefined') {
                                const modal = new bootstrap.Modal(modalElement)
                                modal.show()
                            }
                        }
                    })
                },

                closeMoveModal() {
                    this.movingMedia = null
                    this.showMoveModal = false
                    const modalElement = document.getElementById('moveMediaModal')
                    if (modalElement) {
                        if (typeof bootstrap !== 'undefined') {
                            const modal = bootstrap.Modal.getInstance(modalElement)
                            if (modal) {
                                modal.hide()
                            }
                        }
                        // Backdrop'u temizle
                        setTimeout(() => {
                            const backdrops = document.querySelectorAll('.modal-backdrop')
                            backdrops.forEach((backdrop) => {
                                backdrop.remove()
                            })
                            document.body.classList.remove('modal-open')
                            document.body.style.overflow = ''
                            document.body.style.paddingRight = ''
                        }, 100)
                    }
                },

                async moveMediaToFolder(folderName) {
                    if (!this.movingMedia) {
                        return
                    }

                    const media = this.mediaFiles.find((m) => m.id === this.movingMedia)
                    if (!media) {
                        return
                    }

                    try {
                        await window.adminApiHelpers.put(`/media/${media.id}`, {
                            collection: folderName || null,
                        })

                        // Media listesini güncelle
                        await this.loadMedia(this.pagination.current_page)
                        await this.loadFolders()

                        this.closeMoveModal()

                        if (window.swalHelpers) {
                            window.swalHelpers.success(
                                folderName
                                    ? `Dosya "${folderName}" klasörüne taşındı`
                                    : 'Dosya klasörden çıkarıldı'
                            )
                        }
                    } catch (error) {
                        console.error('Error moving media:', error)
                        if (window.swalHelpers) {
                            window.swalHelpers.error('Dosya taşınırken bir hata oluştu')
                        }
                    }
                },

                fallbackCopyText(text) {
                    const textArea = document.createElement('textarea')
                    textArea.value = text
                    textArea.style.position = 'fixed'
                    textArea.style.left = '-999999px'
                    textArea.style.top = '-999999px'
                    document.body.appendChild(textArea)
                    textArea.focus()
                    textArea.select()
                    try {
                        document.execCommand('copy')
                        if (window.Alpine && window.Alpine.store('toast')) {
                            window.Alpine.store('toast').success('Link kopyalandı')
                        }
                    } catch (err) {
                        if (window.Alpine && window.Alpine.store('toast')) {
                            window.Alpine.store('toast').error('Link kopyalanamadı')
                        }
                    }
                    document.body.removeChild(textArea)
                },

                startEditFilename(media) {
                    this.editingMedia = media.id
                    // Uzantıyı ayır, sadece dosya adını göster
                    const filename = media.filename || ''
                    const lastDotIndex = filename.lastIndexOf('.')
                    if (lastDotIndex > 0) {
                        // Uzantı var, sadece dosya adını al
                        this.editingFilename = filename.substring(0, lastDotIndex)
                        // Uzantıyı sakla
                        this.editingFileExtension = filename.substring(lastDotIndex)
                    } else {
                        // Uzantı yok
                        this.editingFilename = filename
                        this.editingFileExtension = ''
                    }
                    this.showEditModal = true
                    const modalElement = document.getElementById('editFilenameModal')
                    if (modalElement && typeof bootstrap !== 'undefined') {
                        const modal = new bootstrap.Modal(modalElement)
                        modal.show()
                        this.$nextTick(() => {
                            const input = document.getElementById('editFilenameInput')
                            if (input) {
                                input.focus()
                                input.select()
                            }
                        })
                    }
                },

                cancelEditFilename() {
                    this.editingMedia = null
                    this.editingFilename = ''
                    this.editingFileExtension = ''
                    this.showEditModal = false
                    const modalElement = document.getElementById('editFilenameModal')
                    if (modalElement && typeof bootstrap !== 'undefined') {
                        const modal = bootstrap.Modal.getInstance(modalElement)
                        if (modal) {
                            modal.hide()
                        }
                    }
                },

                async saveFilename(media) {
                    if (!media) {
                        media = this.mediaFiles.find((m) => m.id === this.editingMedia)
                    }
                    if (!media) {
                        return
                    }

                    if (!this.editingFilename || this.editingFilename.trim() === '') {
                        if (window.swalHelpers) {
                            window.swalHelpers.error('Dosya adı boş olamaz')
                        } else if (window.Alpine && window.Alpine.store('toast')) {
                            window.Alpine.store('toast').error('Dosya adı boş olamaz')
                        }
                        return
                    }

                    try {
                        // Uzantıyı geri ekle
                        const newFilename = this.editingFilename.trim() + (this.editingFileExtension || '')
                        await window.adminApiHelpers.put(`/media/${media.id}`, {
                            filename: newFilename,
                        })
                        if (window.swalHelpers) {
                            window.swalHelpers.success('Dosya adı güncellendi')
                        } else if (window.Alpine && window.Alpine.store('toast')) {
                            window.Alpine.store('toast').success('Dosya adı güncellendi')
                        }
                        this.editingMedia = null
                        this.editingFilename = ''
                        this.editingFileExtension = ''
                        this.showEditModal = false
                        const modalElement = document.getElementById('editFilenameModal')
                        if (modalElement && typeof bootstrap !== 'undefined') {
                            const modal = bootstrap.Modal.getInstance(modalElement)
                            if (modal) {
                                modal.hide()
                            }
                        }
                        await this.loadMedia(this.pagination.current_page)
                    } catch (error) {
                        console.error('Error updating filename:', error)
                        if (window.swalHelpers) {
                            window.swalHelpers.error('Dosya adı güncellenirken bir hata oluştu')
                        } else if (window.Alpine && window.Alpine.store('toast')) {
                            window.Alpine.store('toast').error('Dosya adı güncellenirken bir hata oluştu')
                        }
                    }
                },

                async loadFolders() {
                    try {
                        // Backend'den klasörleri yükle
                        const collectionsResponse = await window.adminApiHelpers.get('/collections')
                        const collections = collectionsResponse.data?.data || []
                        
                        // Mevcut medya dosyalarından collection değerlerini al (backward compatibility)
                        const mediaResponse = await window.adminApiHelpers.get('/media', {
                            params: {
                                per_page: 1000,
                            },
                        })
                        const mediaCollections = new Set()
                        if (mediaResponse.data?.data) {
                            mediaResponse.data.data.forEach((media) => {
                                if (media.collection) {
                                    mediaCollections.add(media.collection)
                                }
                            })
                        }

                        // Backend'deki klasörler + medya dosyalarındaki collection'ları birleştir
                        const allFolders = new Set()
                        collections.forEach((collection) => {
                            allFolders.add(collection.name)
                        })
                        mediaCollections.forEach((collection) => {
                            allFolders.add(collection)
                        })

                        this.folders = Array.from(allFolders).sort()
                    } catch (error) {
                        console.error('Error loading folders:', error)
                        this.folders = []
                    }
                },

                openFolderModal() {
                    this.showFolderModal = true
                    this.$nextTick(() => {
                        const modalElement = document.getElementById('folderModal')
                        if (modalElement) {
                            if (typeof bootstrap !== 'undefined') {
                                const modal = new bootstrap.Modal(modalElement)
                                modal.show()
                            } else {
                                // Fallback: jQuery veya vanilla JS
                                $(modalElement).modal('show')
                            }
                        } else {
                            console.error('Folder modal element not found')
                        }
                    })
                },

                closeFolderModal() {
                    this.showFolderModal = false
                    this.newFolderName = ''
                    const modalElement = document.getElementById('folderModal')
                    if (modalElement) {
                        if (typeof bootstrap !== 'undefined') {
                            const modal = bootstrap.Modal.getInstance(modalElement)
                            if (modal) {
                                modal.hide()
                            } else {
                                // Modal instance yoksa yeni oluştur ve kapat
                                const newModal = new bootstrap.Modal(modalElement)
                                newModal.hide()
                            }
                        }
                        // Backdrop'u temizle
                        setTimeout(() => {
                            const backdrops = document.querySelectorAll('.modal-backdrop')
                            backdrops.forEach((backdrop) => {
                                backdrop.remove()
                            })
                            document.body.classList.remove('modal-open')
                            document.body.style.overflow = ''
                            document.body.style.paddingRight = ''
                        }, 100)
                    }
                },

                async createFolder() {
                    console.log('createFolder called', this.newFolderName)
                    if (!this.newFolderName || this.newFolderName.trim() === '') {
                        if (window.swalHelpers) {
                            window.swalHelpers.error('Klasör adı boş olamaz')
                        }
                        return
                    }

                    const folderName = this.newFolderName.trim()
                    console.log('Folder name:', folderName)
                    console.log('Current folders:', this.folders)

                    if (this.folders.includes(folderName)) {
                        if (window.swalHelpers) {
                            window.swalHelpers.error('Bu klasör zaten mevcut')
                        }
                        return
                    }

                    try {
                        // Backend'de klasör oluştur
                        const response = await window.adminApiHelpers.post('/collections', {
                            name: folderName,
                        })

                        if (response.data && response.data.data) {
                            // Klasör listesini yeniden yükle
                            await this.loadFolders()

                            // Modal'ı kapat
                            this.closeFolderModal()
                            
                            // Input'u temizle
                            this.newFolderName = ''

                            if (window.swalHelpers) {
                                window.swalHelpers.success('Klasör oluşturuldu. Klasöre tıklayarak içine girebilirsiniz.')
                            }
                        }
                    } catch (error) {
                        console.error('Error creating folder:', error)
                        if (window.swalHelpers) {
                            const errorMessage = error.response?.data?.message || 'Klasör oluşturulurken bir hata oluştu'
                            window.swalHelpers.error(errorMessage)
                        }
                    }
                },

                enterFolder(folderName) {
                    this.currentFolder = folderName
                    this.filters.collection = folderName
                    this.applyFilters()
                },

                exitFolder() {
                    this.currentFolder = null
                    this.filters.collection = ''
                    this.applyFilters()
                },

                async deleteFolder(folderName) {
                    if (!window.swalHelpers) {
                        return
                    }

                    const result = await window.swalHelpers.confirm({
                        title: 'Klasörü Sil',
                        text: `"${folderName}" klasörünü silmek istediğinize emin misiniz? Bu klasördeki dosyalar silinmeyecek, sadece klasör silinecektir.`,
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonText: 'Evet, Sil',
                        cancelButtonText: 'İptal',
                    })

                    if (result && result.isConfirmed) {
                        try {
                            // Backend'de klasörü bul ve sil
                            const collectionsResponse = await window.adminApiHelpers.get('/collections')
                            const collection = collectionsResponse.data?.data?.find((c) => c.name === folderName)

                            if (collection) {
                                await window.adminApiHelpers.delete(`/collections/${collection.id}`)
                            }

                            // Klasör listesini yeniden yükle
                            await this.loadFolders()

                            // Eğer silinen klasör içindeysek, çık
                            if (this.currentFolder === folderName) {
                                this.exitFolder()
                            }

                            if (window.swalHelpers) {
                                window.swalHelpers.success('Klasör silindi')
                            }
                        } catch (error) {
                            console.error('Error deleting folder:', error)
                            if (window.swalHelpers) {
                                window.swalHelpers.error('Klasör silinirken bir hata oluştu')
                            }
                        }
                    }
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
                <li class="breadcrumb-item"><a href="#">Content</a></li>
                <li class="breadcrumb-item active" aria-current="page">Media Library</li>
            </ol>
        </nav>
    </div>
    <!-- /BREADCRUMB -->

    <div x-data="mediaLibrary" x-init="init()">
        <div class="row layout-top-spacing">
            <div class="col-xl-12 col-lg-12 col-sm-12 layout-spacing">
                <div class="widget-content widget-content-area br-8 p-4">
                    <!-- Header -->
                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <div class="d-flex align-items-center gap-2">
                            <h4 class="mb-0">Media Library</h4>
                            <template x-if="currentFolder">
                                <div class="d-flex align-items-center gap-2">
                                    <span class="text-muted">/</span>
                                    <span class="badge bg-primary" x-text="currentFolder"></span>
                                    <button @click="exitFolder()" class="btn btn-sm btn-outline-secondary" title="Geri">
                                        <svg
                                            xmlns="http://www.w3.org/2000/svg"
                                            width="16"
                                            height="16"
                                            viewBox="0 0 24 24"
                                            fill="none"
                                            stroke="currentColor"
                                            stroke-width="2"
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                            class="feather feather-arrow-left"
                                        >
                                            <line x1="19" y1="12" x2="5" y2="12"></line>
                                            <polyline points="12 19 5 12 12 5"></polyline>
                                        </svg>
                                    </button>
                                </div>
                            </template>
                        </div>
                        <div class="d-flex gap-2">
                            <button type="button" @click="openFolderModal()" class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#folderModal">
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
                                    class="feather feather-folder"
                                    style="width: 18px; height: 18px; vertical-align: middle"
                                >
                                    <path d="M22 19a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h5l2 3h9a2 2 0 0 1 2 2z"></path>
                                </svg>
                                <span class="ms-2">Klasör</span>
                            </button>
                            <button type="button" @click="openUploadModal()" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#uploadModal">
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
                                <span class="ms-2">Upload</span>
                            </button>
                        </div>
                    </div>

                    <!-- Folders List -->
                    <div x-show="!currentFolder" class="widget-content widget-content-area br-8 p-4 mb-4">
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <h5 class="mb-0">Klasörler</h5>
                            <button @click="openFolderModal()" class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#folderModal">
                                <svg
                                    xmlns="http://www.w3.org/2000/svg"
                                    width="16"
                                    height="16"
                                    viewBox="0 0 24 24"
                                    fill="none"
                                    stroke="currentColor"
                                    stroke-width="2"
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    class="feather feather-plus"
                                >
                                    <line x1="12" y1="5" x2="12" y2="19"></line>
                                    <line x1="5" y1="12" x2="19" y2="12"></line>
                                </svg>
                                <span class="ms-1">Yeni Klasör</span>
                            </button>
                        </div>
                        <template x-if="folders.length > 0">
                            <div class="row">
                                <template x-for="folder in folders" :key="folder">
                                    <div class="col-md-3 col-sm-4 col-6 mb-2">
                                        <div class="d-flex align-items-center gap-1">
                                            <button @click="enterFolder(folder)" class="btn btn-outline-primary flex-grow-1 d-flex align-items-center justify-content-start gap-2">
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
                                                    class="feather feather-folder"
                                                >
                                                    <path d="M22 19a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h5l2 3h9a2 2 0 0 1 2 2z"></path>
                                                </svg>
                                                <span x-text="folder" class="text-truncate"></span>
                                            </button>
                                            <button @click.stop="deleteFolder(folder)" class="btn btn-sm btn-outline-danger" title="Klasörü Sil">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash-2">
                                                    <polyline points="3 6 5 6 21 6"></polyline>
                                                    <path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path>
                                                    <line x1="10" y1="11" x2="10" y2="17"></line>
                                                    <line x1="14" y1="11" x2="14" y2="17"></line>
                                                </svg>
                                            </button>
                                        </div>
                                    </div>
                                </template>
                            </div>
                        </template>
                        <template x-if="folders.length === 0">
                            <div class="text-center text-muted py-4">
                                <p class="mb-0">Henüz klasör yok. Yeni klasör oluşturmak için yukarıdaki butona tıklayın.</p>
                            </div>
                        </template>
                    </div>

                    <!-- Filter Bar -->
                    <div class="widget-content widget-content-area br-8 p-4 mb-4">
                        <div class="row">
                            <div class="col-md-5">
                                <label class="form-label">Search</label>
                                <input type="text" x-model="filters.search" @input.debounce.500ms="applyFilters()" placeholder="Filename or alt..." class="form-control" />
                            </div>
                            <div class="col-md-5">
                                <label class="form-label">Collection</label>
                                <input type="text" x-model="filters.collection" @input.debounce.500ms="applyFilters()" placeholder="Collection name..." class="form-control" />
                            </div>
                            <div class="col-md-2 d-flex align-items-end justify-content-end">
                                <button @click="resetFilters()" class="btn btn-secondary w-100">Reset Filters</button>
                            </div>
                        </div>
                    </div>

                    <!-- Folder Modal -->
                    <div class="modal fade" id="folderModal" tabindex="-1" role="dialog" aria-labelledby="folderModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="folderModalLabel">Yeni Klasör Oluştur</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" @click="closeFolderModal()" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <div class="mb-3">
                                        <label class="form-label">Klasör Adı</label>
                                        <input
                                            type="text"
                                            x-model="newFolderName"
                                            @keyup.enter="createFolder()"
                                            @keyup.escape="closeFolderModal()"
                                            class="form-control"
                                            placeholder="Klasör adı girin"
                                        />
                                        <small class="form-text text-muted">Klasör adı, dosyaların collection değeri olarak kullanılacaktır.</small>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" @click="closeFolderModal()">İptal</button>
                                    <button type="button" class="btn btn-primary" @click="createFolder()">Oluştur</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Edit Filename Modal -->
                    <div class="modal fade" id="editFilenameModal" tabindex="-1" role="dialog" aria-labelledby="editFilenameModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="editFilenameModalLabel">Dosya Adını Düzenle</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" @click="cancelEditFilename()" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <div class="mb-3">
                                        <label class="form-label">Dosya Adı</label>
                                        <div class="input-group">
                                            <input
                                                type="text"
                                                id="editFilenameInput"
                                                x-model="editingFilename"
                                                @keyup.enter="saveFilename(mediaFiles.find(m => m.id === editingMedia))"
                                                @keyup.escape="cancelEditFilename()"
                                                class="form-control"
                                                placeholder="Dosya adı"
                                            />
                                            <span class="input-group-text" x-text="editingFileExtension" x-show="editingFileExtension"></span>
                                        </div>
                                        <small class="text-muted d-block mt-1" x-show="editingFileExtension">
                                            Uzantı otomatik korunacak:
                                            <span x-text="editingFileExtension"></span>
                                        </small>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" @click="cancelEditFilename()">İptal</button>
                                    <button type="button" class="btn btn-primary" @click="saveFilename(mediaFiles.find(m => m.id === editingMedia))">Kaydet</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Upload Modal -->
                    <div class="modal fade" id="uploadModal" tabindex="-1" role="dialog" aria-labelledby="uploadModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="uploadModalLabel">Upload Files</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" @click="closeUploadModal()" aria-label="Close">
                                        <svg
                                            aria-hidden="true"
                                            xmlns="http://www.w3.org/2000/svg"
                                            width="24"
                                            height="24"
                                            viewBox="0 0 24 24"
                                            fill="none"
                                            stroke="currentColor"
                                            stroke-width="2"
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                            class="feather feather-x"
                                        >
                                            <line x1="18" y1="6" x2="6" y2="18"></line>
                                            <line x1="6" y1="6" x2="18" y2="18"></line>
                                        </svg>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <div class="mb-3">
                                        <label class="form-label">Select Files</label>
                                        <input type="file" multiple @change="uploadFiles($event)" class="form-control" :disabled="uploading" />
                                        <small class="form-text text-muted">You can select multiple files at once</small>
                                    </div>
                                    <div x-show="uploading" class="text-center py-4">
                                        <div class="spinner-border text-primary" role="status">
                                            <span class="visually-hidden">Loading...</span>
                                        </div>
                                        <p class="mt-2 text-muted">Uploading...</p>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" @click="closeUploadModal()">Close</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Grid -->
                    <div x-show="loading" class="text-center p-4">
                        <div class="spinner-border text-primary" role="status">
                            <span class="visually-hidden">Loading...</span>
                        </div>
                        <p class="mt-2 text-muted">Loading...</p>
                    </div>

                    <div x-show="!loading" class="row">
                        <template x-for="media in mediaFiles" :key="media.id">
                            <div class="col-xl-2 col-lg-3 col-md-4 col-sm-6 mb-4">
                                <div class="card h-100" :class="selectedMedia && selectedMedia.id === media.id ? 'border-primary' : ''" style="transition: all 0.2s">
                                    <div class="position-relative" style="height: 150px; overflow: hidden; background: #f5f5f5" @click="selectMedia(media)" style="cursor: pointer">
                                        <!-- Action Buttons Overlay -->
                                        <div
                                            class="position-absolute top-0 end-0 p-1 d-flex gap-1"
                                            style="z-index: 10; background: rgba(0, 0, 0, 0.3); border-radius: 0 0 0 0.25rem; backdrop-filter: blur(4px)"
                                        >
                                            <button
                                                @click.stop="startEditFilename(media)"
                                                class="btn btn-sm p-1 media-action-btn"
                                                title="Düzenle"
                                                style="
                                                    padding: 0.125rem !important;
                                                    background: transparent;
                                                    border: none;
                                                    width: 28px;
                                                    height: 28px;
                                                    display: flex;
                                                    align-items: center;
                                                    justify-content: center;
                                                    border-radius: 0.25rem;
                                                    transition: all 0.2s;
                                                "
                                            >
                                                <svg
                                                    xmlns="http://www.w3.org/2000/svg"
                                                    width="14"
                                                    height="14"
                                                    viewBox="0 0 24 24"
                                                    fill="none"
                                                    stroke="#0d6efd"
                                                    stroke-width="2"
                                                    stroke-linecap="round"
                                                    stroke-linejoin="round"
                                                    class="feather feather-edit-2"
                                                >
                                                    <path d="M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5L17 3z"></path>
                                                </svg>
                                            </button>
                                            <button
                                                @click.stop="copyLink(media)"
                                                class="btn btn-sm p-1 media-action-btn"
                                                title="Link Kopyala"
                                                style="
                                                    padding: 0.125rem !important;
                                                    background: transparent;
                                                    border: none;
                                                    width: 28px;
                                                    height: 28px;
                                                    display: flex;
                                                    align-items: center;
                                                    justify-content: center;
                                                    border-radius: 0.25rem;
                                                    transition: all 0.2s;
                                                "
                                            >
                                                <svg
                                                    xmlns="http://www.w3.org/2000/svg"
                                                    width="14"
                                                    height="14"
                                                    viewBox="0 0 24 24"
                                                    fill="none"
                                                    stroke="#0dcaf0"
                                                    stroke-width="2"
                                                    stroke-linecap="round"
                                                    stroke-linejoin="round"
                                                    class="feather feather-copy"
                                                >
                                                    <rect x="9" y="9" width="13" height="13" rx="2" ry="2"></rect>
                                                    <path d="M5 15H4a2 2 0 0 1-2-2V4a2 2 0 0 1 2-2h9a2 2 0 0 1 2 2v1"></path>
                                                </svg>
                                            </button>
                                            <button
                                                @click.stop="openMoveModal(media)"
                                                class="btn btn-sm p-1 media-action-btn"
                                                title="Taşı"
                                                style="
                                                    padding: 0.125rem !important;
                                                    background: transparent;
                                                    border: none;
                                                    width: 28px;
                                                    height: 28px;
                                                    display: flex;
                                                    align-items: center;
                                                    justify-content: center;
                                                    border-radius: 0.25rem;
                                                    transition: all 0.2s;
                                                "
                                            >
                                                <svg
                                                    xmlns="http://www.w3.org/2000/svg"
                                                    width="14"
                                                    height="14"
                                                    viewBox="0 0 24 24"
                                                    fill="none"
                                                    stroke="#ffc107"
                                                    stroke-width="2"
                                                    stroke-linecap="round"
                                                    stroke-linejoin="round"
                                                    class="feather feather-folder"
                                                >
                                                    <path d="M22 19a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h5l2 3h9a2 2 0 0 1 2 2z"></path>
                                                </svg>
                                            </button>
                                            <button
                                                @click.stop="deleteItem(media.id)"
                                                class="btn btn-sm p-1 media-action-btn"
                                                title="Sil"
                                                style="
                                                    padding: 0.125rem !important;
                                                    background: transparent;
                                                    border: none;
                                                    width: 28px;
                                                    height: 28px;
                                                    display: flex;
                                                    align-items: center;
                                                    justify-content: center;
                                                    border-radius: 0.25rem;
                                                    transition: all 0.2s;
                                                "
                                            >
                                                <svg
                                                    xmlns="http://www.w3.org/2000/svg"
                                                    width="14"
                                                    height="14"
                                                    viewBox="0 0 24 24"
                                                    fill="none"
                                                    stroke="#dc3545"
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
                                        <!-- Video -->
                                        <template
                                            x-if="
                                                (() => {
                                                    const isVideo =
                                                        (media.mime_type && media.mime_type.startsWith('video/')) ||
                                                        (media.filename &&
                                                            (media.filename.toLowerCase().endsWith('.mp4') ||
                                                                media.filename.toLowerCase().endsWith('.webm') ||
                                                                media.filename.toLowerCase().endsWith('.ogg') ||
                                                                media.filename.toLowerCase().endsWith('.mov')))
                                                    return isVideo
                                                })()
                                            "
                                        >
                                            <div style="height: 150px; width: 100%; display: flex; align-items: center; justify-content: center; background: #000">
                                                <video :src="media.url" style="max-height: 100%; max-width: 100%; width: 100%; height: 100%; object-fit: contain" preload="metadata" muted></video>
                                            </div>
                                        </template>
                                        <!-- Image -->
                                        <template
                                            x-if="
                                                (() => {
                                                    const isVideo =
                                                        (media.mime_type && media.mime_type.startsWith('video/')) ||
                                                        (media.filename &&
                                                            (media.filename.toLowerCase().endsWith('.mp4') ||
                                                                media.filename.toLowerCase().endsWith('.webm') ||
                                                                media.filename.toLowerCase().endsWith('.ogg') ||
                                                                media.filename.toLowerCase().endsWith('.mov')))
                                                    return ! isVideo
                                                })()
                                            "
                                        >
                                            <img :src="media.url" :alt="media.alt || media.filename" class="card-img-top" style="height: 150px; object-fit: cover; width: 100%" />
                                        </template>
                                    </div>
                                    <div class="card-body p-2">
                                        <p class="card-text small text-truncate mb-0" x-text="media.filename"></p>
                                    </div>
                                </div>
                            </div>
                        </template>
                        <div x-show="mediaFiles.length === 0 && !loading" class="col-12 text-center py-8">
                            <p class="text-muted">No media files found</p>
                        </div>
                    </div>

                    <!-- Pagination -->
                    <div x-show="! loading && pagination.last_page > 1" class="d-flex justify-content-between align-items-center mt-4">
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
