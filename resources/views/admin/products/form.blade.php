@extends('admin.layouts.app')

@section('title')
    {{ isset($id) ? 'Edit Product' : 'Create Product' }}
@endsection

@push('styles')
    <!-- Quill Editor -->
    <link rel="stylesheet" type="text/css" href="{{ asset('cork/src/plugins/css/light/editors/quill/quill.snow.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('cork/src/plugins/css/dark/editors/quill/quill.snow.css') }}" />
    <!-- Flatpickr -->
    <link rel="stylesheet" type="text/css" href="{{ asset('cork/src/plugins/src/flatpickr/flatpickr.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('cork/src/plugins/css/light/flatpickr/custom-flatpickr.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('cork/src/plugins/css/dark/flatpickr/custom-flatpickr.css') }}" />
    <!-- Tagify -->
    <link rel="stylesheet" type="text/css" href="{{ asset('cork/src/plugins/src/tagify/tagify.css') }}" />
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
    <!-- Quill Editor -->
    <script src="{{ asset('cork/src/plugins/src/editors/quill/quill.js') }}"></script>
    <!-- Flatpickr -->
    <script src="{{ asset('cork/src/plugins/src/flatpickr/flatpickr.js') }}"></script>
    <!-- Tagify -->
    <script src="{{ asset('cork/src/plugins/src/tagify/tagify.min.js') }}"></script>
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

        // Product Form Component
        document.addEventListener('alpine:init', () => {
            Alpine.data('productForm', () => ({
                loading: false,
                saving: false,
                productId: {{ $id ?? 'null' }},
                formData: {
                    name: '',
                    slug: '',
                    sku: '',
                    description: '',
                    short_description: '',
                    price: '',
                    special_price: '',
                    special_price_type: 'fixed',
                    special_price_start: '',
                    special_price_end: '',
                    tax_class_id: '',
                    manage_stock: true,
                    quantity: 0,
                    in_stock: true,
                    is_active: true,
                    brand_id: '',
                    category_ids: [],
                    tag_ids: [],
                    attribute_ids: [],
                    option_ids: [],
                    image_ids: [],
                },
                errors: {},
                activeTab: 'general',
                categories: [],
                brands: [],
                tags: [],
                attributes: [],
                options: [],
                taxClasses: [],
                mediaFiles: [],
                selectedImages: [], // Store image objects with id and url
                tagifyInstance: null,
                quillInstance: null,
                categoriesTomSelect: null,

                async init() {
                    await waitForAdminApi()

                    if (this.productId) {
                        await this.loadProduct()
                    }
                    await this.loadRelatedData()

                    // Initialize editors after data is loaded
                    setTimeout(() => {
                        if (this.activeTab === 'general') {
                            this.initQuill()
                        }
                    }, 500)

                    this.initFlatpickr()
                },

                async loadProduct() {
                    this.loading = true
                    try {
                        const response = await window.adminApiHelpers.get(`/products/${this.productId}`)
                        const product = response.data

                        this.formData = {
                            name: product.name || '',
                            slug: product.slug || '',
                            sku: product.sku || '',
                            description: product.description || '',
                            short_description: product.short_description || '',
                            price: product.price || '',
                            special_price: product.special_price || '',
                            special_price_type: product.special_price_type || 'fixed',
                            special_price_start: product.special_price_start || '',
                            special_price_end: product.special_price_end || '',
                            tax_class_id: product.tax_class_id || '',
                            manage_stock: product.manage_stock ?? true,
                            quantity: product.quantity || 0,
                            in_stock: product.in_stock ?? true,
                            is_active: product.is_active ?? true,
                            brand_id: product.brand_id || '',
                            category_ids: product.categories?.map((c) => c.id) || [],
                            tag_ids: product.tags?.map((t) => t.id) || [],
                            attribute_ids: product.attributes?.map((a) => a.id) || [],
                            option_ids: product.options?.map((o) => o.id) || [],
                            image_ids: product.images?.map((i) => i.id) || [],
                        }

                        // Load selected images with URLs
                        if (this.formData.image_ids.length > 0) {
                            await this.loadSelectedImages()
                        }

                        this.updateEditors()

                        // Update Tom Select with selected categories after a short delay
                        setTimeout(() => {
                            if (this.categoriesTomSelect && this.formData.category_ids.length > 0) {
                                this.categoriesTomSelect.setValue(this.formData.category_ids)
                            }
                        }, 500)
                    } catch (error) {
                        if (window.swalHelpers) {
                            window.swalHelpers.error('Ürün yüklenirken bir hata oluştu')
                        }
                    } finally {
                        this.loading = false
                    }
                },

                async loadRelatedData() {
                    try {
                        const [categoriesResponse, brandsResponse, attributesResponse, optionsResponse, taxClassesResponse] = await Promise.all([
                            window.adminApiHelpers.get('/categories', { tree: 1, per_page: 1000 }).catch((err) => {
                                console.error('Error loading categories:', err)
                                return { data: [] }
                            }),
                            window.adminApiHelpers.get('/brands', { per_page: 1000 }).catch((err) => {
                                console.error('Error loading brands:', err)
                                return { data: [] }
                            }),
                            window.adminApiHelpers.get('/attributes', { per_page: 1000 }).catch((err) => {
                                console.error('Error loading attributes:', err)
                                return { data: [] }
                            }),
                            window.adminApiHelpers.get('/options', { per_page: 1000 }).catch((err) => {
                                console.error('Error loading options:', err)
                                return { data: [] }
                            }),
                            window.adminApiHelpers.get('/tax-classes', { per_page: 1000 }).catch((err) => {
                                console.error('Error loading tax classes:', err)
                                return { data: [] }
                            }),
                        ])

                        // Tags endpoint might not exist yet, try to load it separately
                        let tagsResponse = { data: [] }
                        try {
                            tagsResponse = await window.adminApiHelpers.get('/tags', { per_page: 1000 })
                        } catch (e) {
                            console.error('Error loading tags:', e)
                            // Tags endpoint not available, continue with empty array
                        }

                        this.categories = categoriesResponse.data || []
                        this.brands = brandsResponse.data || []
                        this.tags = tagsResponse.data || []
                        this.attributes = attributesResponse.data || []
                        this.options = optionsResponse.data || []
                        this.taxClasses = taxClassesResponse.data || []

                        // Log loaded data for debugging
                        console.log('Loaded related data:', {
                            categories: this.categories.length,
                            brands: this.brands.length,
                            tags: this.tags.length,
                            attributes: this.attributes.length,
                            options: this.options.length,
                            taxClasses: this.taxClasses.length,
                        })

                        this.initTagify()
                        this.initCategoriesTomSelect()
                    } catch (error) {
                        console.error('Error in loadRelatedData:', error)
                        if (window.swalHelpers) {
                            window.swalHelpers.error('İlişkili veriler yüklenirken bir hata oluştu. Lütfen sayfayı yenileyin.')
                        }
                    }
                },

                async save() {
                    this.saving = true
                    this.errors = {}

                    // Get content from Quill editor
                    if (this.quillInstance) {
                        this.formData.description = this.quillInstance.root.innerHTML
                    }

                    // Auto-generate slug if empty
                    if (!this.formData.slug || this.formData.slug.trim() === '') {
                        this.formData.slug = generateSlug(this.formData.name)
                    }

                    // Prepare payload - convert strings to proper types
                    const payload = {
                        name: this.formData.name ? this.formData.name.trim() : '',
                        slug: this.formData.slug ? this.formData.slug.trim() : '',
                        sku: this.formData.sku ? this.formData.sku.trim() : null,
                        description: this.formData.description || null,
                        short_description: this.formData.short_description || null,
                        // Convert price to number
                        price: this.formData.price === '' ? null : parseFloat(this.formData.price) || 0,
                        special_price: this.formData.special_price === '' ? null : this.formData.special_price ? parseFloat(this.formData.special_price) : null,
                        special_price_type: this.formData.special_price_type || 'fixed',
                        special_price_start: this.formData.special_price_start || null,
                        special_price_end: this.formData.special_price_end || null,
                        // Convert boolean strings to actual booleans
                        is_active: this.formData.is_active === true || this.formData.is_active === 'true' || this.formData.is_active === 1,
                        in_stock: this.formData.in_stock === true || this.formData.in_stock === 'true' || this.formData.in_stock === 1,
                        manage_stock: this.formData.manage_stock === true || this.formData.manage_stock === 'true' || this.formData.manage_stock === 1,
                        // Convert quantity to integer
                        quantity: parseInt(this.formData.quantity) || 0,
                        // Convert IDs to integers or null
                        brand_id: this.formData.brand_id === '' ? null : this.formData.brand_id ? parseInt(this.formData.brand_id) : null,
                        tax_class_id: this.formData.tax_class_id === '' ? null : this.formData.tax_class_id ? parseInt(this.formData.tax_class_id) : null,
                        // Ensure arrays are arrays
                        category_ids: Array.isArray(this.formData.category_ids) ? this.formData.category_ids.map((id) => parseInt(id)).filter((id) => !isNaN(id)) : [],
                        tag_ids: Array.isArray(this.formData.tag_ids) ? this.formData.tag_ids.map((id) => parseInt(id)).filter((id) => !isNaN(id)) : [],
                        attribute_ids: Array.isArray(this.formData.attribute_ids) ? this.formData.attribute_ids.map((id) => parseInt(id)).filter((id) => !isNaN(id)) : [],
                        option_ids: Array.isArray(this.formData.option_ids) ? this.formData.option_ids.map((id) => parseInt(id)).filter((id) => !isNaN(id)) : [],
                        image_ids: Array.isArray(this.formData.image_ids) ? this.formData.image_ids.map((id) => parseInt(id)).filter((id) => !isNaN(id)) : [],
                    }

                    try {
                        const url = this.productId ? `/products/${this.productId}` : '/products'
                        const method = this.productId ? 'put' : 'post'

                        const response = await window.adminApiHelpers[method](url, payload)

                        // Success message with SweetAlert2
                        if (window.swalHelpers) {
                            window.swalHelpers.success(this.productId ? 'Ürün başarıyla güncellendi' : 'Ürün başarıyla oluşturuldu')
                        }

                        // Redirect to edit page if creating new
                        if (!this.productId && response.data) {
                            setTimeout(() => {
                                window.location.href = `/admin/products/${response.data.id}/edit`
                            }, 1500)
                        } else {
                            setTimeout(() => {
                                window.location.href = '/admin/products'
                            }, 1500)
                        }
                    } catch (error) {
                        if (error.response?.data?.errors) {
                            this.errors = error.response.data.errors
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
                        } else if (error.response?.data?.message && window.swalHelpers) {
                            window.swalHelpers.error(error.response.data.message)
                        } else if (window.swalHelpers) {
                            window.swalHelpers.error('Kayıt sırasında bir hata oluştu')
                        }
                    } finally {
                        this.saving = false
                    }
                },

                generateSlug() {
                    if (!this.formData.slug || this.formData.slug === '') {
                        this.formData.slug = generateSlug(this.formData.name)
                    }
                },

                openMediaPicker() {
                    // Set callback for media selection
                    window.mediaSelectCallback = (media) => {
                        if (!this.formData.image_ids.includes(media.id)) {
                            this.formData.image_ids.push(media.id)
                            // Add to selectedImages with URL and mime_type
                            this.selectedImages.push({
                                id: media.id,
                                url: media.url,
                                mime_type: media.mime_type || '',
                            })
                        }
                        // Close modal after selection
                        const modal = bootstrap.Modal.getInstance(document.getElementById('mediaPickerModal'))
                        if (modal) {
                            modal.hide()
                        }
                    }

                    // Listen for postMessage from iframe (if still using iframe)
                    const messageHandler = (event) => {
                        if (event.data && event.data.type === 'mediaSelected') {
                            const media = event.data.media
                            if (media && !this.formData.image_ids.includes(media.id)) {
                                this.formData.image_ids.push(media.id)
                                // Add to selectedImages with URL and mime_type
                                this.selectedImages.push({
                                    id: media.id,
                                    url: media.url,
                                    mime_type: media.mime_type || '',
                                })
                            }
                            // Close modal after selection
                            const modal = bootstrap.Modal.getInstance(document.getElementById('mediaPickerModal'))
                            if (modal) {
                                modal.hide()
                            }
                            // Remove listener after use
                            window.removeEventListener('message', messageHandler)
                        }
                    }
                    window.addEventListener('message', messageHandler)

                    // Show modal
                    const modalElement = document.getElementById('mediaPickerModal')
                    if (modalElement) {
                        const modal = new bootstrap.Modal(modalElement)
                        modal.show()

                        // Clean up listener when modal is closed
                        modalElement.addEventListener(
                            'hidden.bs.modal',
                            () => {
                                window.removeEventListener('message', messageHandler)
                            },
                            { once: true },
                        )
                    }
                },

                async loadSelectedImages() {
                    if (this.formData.image_ids.length === 0) {
                        this.selectedImages = []
                        return
                    }

                    try {
                        // Load all selected images in parallel
                        const promises = this.formData.image_ids.map((id) => window.adminApiHelpers.get(`/media/${id}`))
                        const responses = await Promise.all(promises)
                        this.selectedImages = responses.map((response) => ({
                            id: response.data.id,
                            url: response.data.url,
                            mime_type: response.data.mime_type || '',
                        }))
                    } catch (error) {
                        console.error('Error loading selected images:', error)
                        // Fallback: try to construct URL from ID
                        this.selectedImages = this.formData.image_ids.map((id) => ({
                            id: id,
                            url: `/storage/media/${id}`, // Fallback URL
                        }))
                    }
                },

                removeImage(imageId) {
                    this.formData.image_ids = this.formData.image_ids.filter((id) => id !== imageId)
                    this.selectedImages = this.selectedImages.filter((img) => img.id !== imageId)
                },

                updateEditors() {
                    // Update Quill editor if exists
                    if (this.quillInstance) {
                        this.quillInstance.root.innerHTML = this.formData.description || ''
                    }

                    // Update Tagify if already initialized
                    if (this.tagifyInstance && this.tags.length > 0) {
                        setTimeout(() => {
                            const selectedTags = this.tags.filter((t) => this.formData.tag_ids.includes(t.id)).map((t) => ({ id: t.id, value: t.name }))

                            if (selectedTags.length > 0) {
                                this.tagifyInstance.removeAllTags()
                                this.tagifyInstance.addTags(selectedTags)
                            }
                        }, 300)
                    }
                },

                initQuill() {
                    const init = () => {
                        if (typeof Quill === 'undefined') {
                            setTimeout(init, 100)
                            return
                        }

                        const quillEditor = document.getElementById('description-editor')
                        if (!quillEditor) {
                            setTimeout(init, 100)
                            return
                        }

                        // Check if already initialized
                        if (quillEditor.quill || this.quillInstance) {
                            if (this.quillInstance && this.formData.description && this.quillInstance.root.innerHTML !== this.formData.description) {
                                this.quillInstance.root.innerHTML = this.formData.description
                            }
                            return
                        }

                        try {
                            this.quillInstance = new Quill('#description-editor', {
                                theme: 'snow',
                            })

                            this.quillInstance.on('text-change', () => {
                                this.formData.description = this.quillInstance.root.innerHTML
                            })

                            if (this.formData.description) {
                                this.quillInstance.root.innerHTML = this.formData.description
                            }
                        } catch (e) {
                            // Quill initialization failed, continue without it
                        }
                    }

                    setTimeout(init, 300)
                },

                initTagify() {
                    const init = () => {
                        if (typeof Tagify === 'undefined') {
                            setTimeout(init, 100)
                            return
                        }

                        const tagInput = document.getElementById('tags-input')
                        if (!tagInput) {
                            setTimeout(init, 100)
                            return
                        }

                        // Check if already initialized
                        if (tagInput.tagify || this.tagifyInstance) {
                            return
                        }

                        try {
                            const initialTags = this.tags.filter((t) => this.formData.tag_ids.includes(t.id)).map((t) => ({ id: t.id, value: t.name }))

                            this.tagifyInstance = new Tagify(tagInput, {
                                placeholder: 'Add tags...',
                                whitelist: this.tags.map((t) => ({ id: t.id, value: t.name })),
                                dropdown: {
                                    enabled: 1,
                                    maxItems: 20,
                                },
                            })

                            if (initialTags.length > 0) {
                                this.tagifyInstance.addTags(initialTags)
                            }

                            if (this.tagifyInstance && typeof this.tagifyInstance.on === 'function') {
                                this.tagifyInstance.on('add', (e) => {
                                    const tag = e.detail.data
                                    if (tag.id && !this.formData.tag_ids.includes(tag.id)) {
                                        this.formData.tag_ids.push(tag.id)
                                    }
                                })

                                this.tagifyInstance.on('remove', (e) => {
                                    const tag = e.detail.data
                                    if (tag.id) {
                                        this.formData.tag_ids = this.formData.tag_ids.filter((id) => id !== tag.id)
                                    }
                                })
                            }
                        } catch (e) {
                            // Tagify initialization failed, continue without it
                        }
                    }

                    setTimeout(init, 200)
                },

                initFlatpickr() {
                    setTimeout(() => {
                        const startInput = document.getElementById('special_price_start')
                        const endInput = document.getElementById('special_price_end')

                        if (startInput && !startInput.flatpickr) {
                            flatpickr(startInput, {
                                dateFormat: 'Y-m-d',
                                onChange: (selectedDates, dateStr) => {
                                    this.formData.special_price_start = dateStr
                                },
                            })
                        }

                        if (endInput && !endInput.flatpickr) {
                            flatpickr(endInput, {
                                dateFormat: 'Y-m-d',
                                onChange: (selectedDates, dateStr) => {
                                    this.formData.special_price_end = dateStr
                                },
                            })
                        }
                    }, 300)
                },

                initCategoriesTomSelect() {
                    const init = () => {
                        if (typeof TomSelect === 'undefined') {
                            setTimeout(init, 100)
                            return
                        }

                        const categoriesSelect = document.getElementById('categories-select')
                        if (!categoriesSelect) {
                            setTimeout(init, 100)
                            return
                        }

                        // Check if already initialized
                        if (categoriesSelect.tomselect || this.categoriesTomSelect) {
                            // Update selected values if product is loaded
                            if (this.productId && this.formData.category_ids.length > 0 && this.categoriesTomSelect) {
                                this.categoriesTomSelect.setValue(this.formData.category_ids)
                            }
                            return
                        }

                        try {
                            // Flatten categories tree for display
                            const flattenCategories = (categories, level = 0) => {
                                let result = []
                                categories.forEach((category) => {
                                    const prefix = '  '.repeat(level)
                                    result.push({
                                        value: category.id,
                                        text: prefix + category.name,
                                    })
                                    if (category.children && category.children.length > 0) {
                                        result = result.concat(flattenCategories(category.children, level + 1))
                                    }
                                })
                                return result
                            }

                            const flatCategories = flattenCategories(this.categories)

                            this.categoriesTomSelect = new TomSelect('#categories-select', {
                                plugins: ['remove_button'],
                                maxItems: null,
                                valueField: 'value',
                                labelField: 'text',
                                searchField: 'text',
                                options: flatCategories,
                                onChange: (values) => {
                                    this.formData.category_ids = values || []
                                },
                            })

                            // Set selected values if product is loaded
                            if (this.productId && this.formData.category_ids.length > 0) {
                                this.categoriesTomSelect.setValue(this.formData.category_ids)
                            }
                        } catch (e) {
                            console.error('Error initializing Tom Select for categories:', e)
                        }
                    }

                    setTimeout(init, 300)
                },
            }))

            // Media Picker Library Component (for modal)
            Alpine.data('mediaPickerLibrary', () => ({
                mediaFiles: [],
                loading: false,
                filters: {
                    search: '',
                    collection: '',
                },
                pagination: {
                    current_page: 1,
                    last_page: 1,
                    per_page: 24,
                    total: 0,
                    from: 0,
                    to: 0,
                },
                selectedMedia: null,

                async init() {
                    console.log('mediaPickerLibrary init() called')
                    await this.waitForAdminApi()
                    console.log('Admin API ready, loading media...')
                    await this.loadMedia()
                    console.log('Media loaded in init()')
                },

                async waitForAdminApi() {
                    let attempts = 0
                    while ((!window.adminApiHelpers || !window.adminApiHelpersLoaded) && attempts < 50) {
                        await new Promise((resolve) => setTimeout(resolve, 100))
                        attempts++
                    }
                    if (!window.adminApiHelpers) {
                        console.error('adminApiHelpers is not available')
                        throw new Error('Admin API helpers not loaded')
                    }
                },

                async loadMedia(page = 1) {
                    console.log('loadMedia called with page:', page)
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

                        console.log('Loading media with params:', params)
                        const response = await window.adminApiHelpers.get('/media', params)
                        console.log('Media API Response:', response)
                        this.mediaFiles = response.data

                        // Debug: Log media files to check mime_type and filename
                        console.log('=== MEDIA FILES LOADED ===')
                        console.log('Total files:', this.mediaFiles.length)
                        this.mediaFiles.forEach((media, index) => {
                            console.log(`[${index}] Media ID: ${media.id}`)
                            console.log(`  Filename: ${media.filename}`)
                            console.log(`  MIME Type: ${media.mime_type}`)
                            console.log(`  URL: ${media.url}`)
                            const isVideo =
                                (media.mime_type && media.mime_type.startsWith('video/')) ||
                                (media.filename &&
                                    (media.filename.toLowerCase().endsWith('.mp4') ||
                                        media.filename.toLowerCase().endsWith('.webm') ||
                                        media.filename.toLowerCase().endsWith('.ogg') ||
                                        media.filename.toLowerCase().endsWith('.mov')))
                            console.log(`  -> Is Video: ${isVideo}`)
                            console.log('---')
                        })
                        console.log('=== END MEDIA FILES ===')

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
                    } finally {
                        this.loading = false
                        console.log('loadMedia completed, loading set to false')
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

                selectMedia(media) {
                    console.log('Selecting media:', media)
                    console.log(`  - ID: ${media.id}`)
                    console.log(`  - Filename: ${media.filename}`)
                    console.log(`  - MIME Type: ${media.mime_type}`)
                    console.log(`  - URL: ${media.url}`)

                    this.selectedMedia = media
                    // Call parent callback
                    if (window.mediaSelectCallback) {
                        window.mediaSelectCallback(media)
                        window.mediaSelectCallback = null
                    }
                    // Close modal
                    const modal = bootstrap.Modal.getInstance(document.getElementById('mediaPickerModal'))
                    if (modal) {
                        modal.hide()
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
                <li class="breadcrumb-item"><a href="{{ route('admin.products.index') }}">Products</a></li>
                <li class="breadcrumb-item active" aria-current="page" x-text="productId ? 'Edit' : 'Create'"></li>
            </ol>
        </nav>
    </div>
    <!-- /BREADCRUMB -->

    <div x-data="productForm" x-init="init()">
        <div class="row layout-top-spacing">
            <div class="col-xl-12 col-lg-12 col-sm-12 layout-spacing">
                <div class="widget-content widget-content-area br-8 p-4">
                    <!-- Header -->
                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <h4 class="mb-0" x-text="productId ? 'Edit Product' : 'Create Product'"></h4>
                        <div>
                            <a href="{{ route('admin.products.index') }}" class="btn btn-secondary me-2">Cancel</a>
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
                        <!-- Tabs -->
                        <ul class="nav nav-tabs mb-4" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" :class="{ active: activeTab === 'general' }" @click="activeTab = 'general'" type="button">General</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" :class="{ active: activeTab === 'pricing' }" @click="activeTab = 'pricing'" type="button">Pricing</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" :class="{ active: activeTab === 'inventory' }" @click="activeTab = 'inventory'" type="button">Inventory</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" :class="{ active: activeTab === 'associations' }" @click="activeTab = 'associations'" type="button">Associations</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" :class="{ active: activeTab === 'images' }" @click="activeTab = 'images'" type="button">Images</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" :class="{ active: activeTab === 'attributes' }" @click="activeTab = 'attributes'" type="button">Attributes</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" :class="{ active: activeTab === 'variants' }" @click="activeTab = 'variants'" type="button">Options & Variants</button>
                            </li>
                        </ul>

                        <!-- Tab Content -->
                        <div class="tab-content">
                            <!-- General Tab -->
                            <div x-show="activeTab === 'general'" x-init="activeTab === 'general' && initQuill()">
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
                                        <label class="form-label">
                                            SKU
                                            <span class="text-danger">*</span>
                                        </label>
                                        <input type="text" x-model="formData.sku" class="form-control" :class="{ 'is-invalid': errors.sku }" />
                                        <div x-show="errors.sku" class="invalid-feedback" x-text="errors.sku?.[0] || errors.sku"></div>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Status</label>
                                        <select x-model="formData.is_active" class="form-select">
                                            <option :value="true">Active</option>
                                            <option :value="false">Inactive</option>
                                        </select>
                                    </div>
                                    <div class="col-md-12 mb-3">
                                        <label class="form-label">Short Description</label>
                                        <textarea x-model="formData.short_description" rows="2" class="form-control"></textarea>
                                    </div>
                                    <div class="col-md-12 mb-3">
                                        <label class="form-label">Description</label>
                                        <div id="description-editor" style="height: 300px"></div>
                                        <div x-show="errors.description" class="invalid-feedback d-block" x-text="errors.description?.[0] || errors.description"></div>
                                    </div>
                                </div>
                            </div>

                            <!-- Pricing Tab -->
                            <div x-show="activeTab === 'pricing'">
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">
                                            Price
                                            <span class="text-danger">*</span>
                                        </label>
                                        <input type="number" step="0.01" x-model="formData.price" class="form-control" :class="{ 'is-invalid': errors.price }" />
                                        <div x-show="errors.price" class="invalid-feedback" x-text="errors.price?.[0] || errors.price"></div>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Special Price</label>
                                        <input type="number" step="0.01" x-model="formData.special_price" class="form-control" />
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Special Price Type</label>
                                        <select x-model="formData.special_price_type" class="form-select">
                                            <option value="fixed">Fixed</option>
                                            <option value="percent">Percent</option>
                                        </select>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Tax Class</label>
                                        <select x-model="formData.tax_class_id" class="form-select">
                                            <option value="">Select Tax Class</option>
                                            <template x-for="taxClass in taxClasses" :key="taxClass.id">
                                                <option :value="taxClass.id" x-text="taxClass.name"></option>
                                            </template>
                                        </select>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Special Price Start</label>
                                        <input type="text" id="special_price_start" x-model="formData.special_price_start" class="form-control flatpickr" placeholder="Select date" />
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Special Price End</label>
                                        <input type="text" id="special_price_end" x-model="formData.special_price_end" class="form-control flatpickr" placeholder="Select date" />
                                    </div>
                                </div>
                            </div>

                            <!-- Inventory Tab -->
                            <div x-show="activeTab === 'inventory'">
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <div class="form-check form-switch">
                                            <input class="form-check-input" type="checkbox" x-model="formData.manage_stock" id="manage_stock" />
                                            <label class="form-check-label" for="manage_stock">Manage Stock</label>
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-3" x-show="formData.manage_stock">
                                        <label class="form-label">Quantity</label>
                                        <input type="number" x-model="formData.quantity" class="form-control" />
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <div class="form-check form-switch">
                                            <input class="form-check-input" type="checkbox" x-model="formData.in_stock" id="in_stock" />
                                            <label class="form-check-label" for="in_stock">In Stock</label>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Associations Tab -->
                            <div x-show="activeTab === 'associations'">
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Brand</label>
                                        <select x-model="formData.brand_id" class="form-select">
                                            <option value="">Select Brand</option>
                                            <template x-for="brand in brands" :key="brand.id">
                                                <option :value="brand.id" x-text="brand.name"></option>
                                            </template>
                                        </select>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Categories</label>
                                        <select id="categories-select" multiple class="form-select" placeholder="Select categories..."></select>
                                        <small class="form-text text-muted">Select one or more categories</small>
                                    </div>
                                    <div class="col-md-12 mb-3">
                                        <label class="form-label">Tags</label>
                                        <input id="tags-input" name="tags" class="form-control" />
                                    </div>
                                </div>
                            </div>

                            <!-- Images Tab -->
                            <div x-show="activeTab === 'images'">
                                <div class="mb-3">
                                    <button type="button" @click="openMediaPicker()" class="btn btn-secondary">Resim Seç</button>
                                </div>
                                <div class="row" x-show="selectedImages.length > 0">
                                    <template x-for="image in selectedImages" :key="image.id">
                                        <div class="col-xl-2 col-lg-3 col-md-4 col-sm-6 mb-4">
                                            <div class="card h-100">
                                                <div class="position-relative" style="height: 150px; overflow: hidden; background: #f5f5f5">
                                                    <!-- Action Buttons Overlay -->
                                                    <div
                                                        class="position-absolute top-0 end-0 p-1 d-flex gap-1"
                                                        style="z-index: 10; background: rgba(0, 0, 0, 0.3); border-radius: 0 0 0 0.25rem; backdrop-filter: blur(4px)"
                                                    >
                                                        <button
                                                            @click.stop="removeImage(image.id)"
                                                            class="btn btn-sm p-1 media-action-btn"
                                                            title="Kaldır"
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
                                                            (image.mime_type && image.mime_type.startsWith('video/')) ||
                                                                (image.url &&
                                                                    (image.url.toLowerCase().endsWith('.mp4') ||
                                                                        image.url.toLowerCase().endsWith('.webm') ||
                                                                        image.url.toLowerCase().endsWith('.ogg') ||
                                                                        image.url.toLowerCase().endsWith('.mov')))
                                                        "
                                                    >
                                                        <div style="height: 150px; width: 100%; display: flex; align-items: center; justify-content: center; background: #000">
                                                            <video
                                                                :src="image.url"
                                                                style="max-height: 100%; max-width: 100%; width: 100%; height: 100%; object-fit: contain"
                                                                preload="metadata"
                                                                muted
                                                            ></video>
                                                        </div>
                                                    </template>
                                                    <!-- Image -->
                                                    <template
                                                        x-if="
                                                            ! (image.mime_type && image.mime_type.startsWith('video/')) &&
                                                                ! (
                                                                    image.url &&
                                                                    (image.url.toLowerCase().endsWith('.mp4') ||
                                                                        image.url.toLowerCase().endsWith('.webm') ||
                                                                        image.url.toLowerCase().endsWith('.ogg') ||
                                                                        image.url.toLowerCase().endsWith('.mov'))
                                                                )
                                                        "
                                                    >
                                                        <img
                                                            :src="image.url"
                                                            :alt="'Ürün resmi ' + image.id"
                                                            class="card-img-top"
                                                            style="height: 150px; object-fit: cover; width: 100%"
                                                            x-on:error="$el.src='/storage/placeholder.jpg'"
                                                        />
                                                    </template>
                                                </div>
                                                <div class="card-body p-2">
                                                    <p class="card-text small text-truncate mb-0" x-text="'Image ' + image.id"></p>
                                                </div>
                                            </div>
                                        </div>
                                    </template>
                                </div>
                                <div x-show="selectedImages.length === 0" class="text-center text-muted p-4">
                                    <p>No images selected</p>
                                </div>
                            </div>

                            <!-- Attributes Tab -->
                            <div x-show="activeTab === 'attributes'">
                                <div class="row">
                                    <div class="col-md-12 mb-3">
                                        <label class="form-label">Attributes</label>
                                        <select x-model="formData.attribute_ids" multiple class="form-select" size="10">
                                            <template x-for="attribute in attributes" :key="attribute.id">
                                                <option :value="attribute.id" :selected="formData.attribute_ids.includes(attribute.id)" x-text="attribute.name"></option>
                                            </template>
                                        </select>
                                        <small class="form-text text-muted">
                                            Seçilen attribute'ler ürün için kullanılabilir. Attribute değerleri variant oluştururken belirlenir.
                                            <br>
                                            <span x-show="attributes.length === 0" class="text-warning">Henüz attribute tanımlanmamış. Önce Attributes sayfasından attribute ekleyin.</span>
                                        </small>
                                    </div>
                                </div>
                            </div>

                            <!-- Options & Variants Tab -->
                            <div x-show="activeTab === 'variants'">
                                <div class="row">
                                    <div class="col-md-12 mb-3">
                                        <label class="form-label">Options</label>
                                        <select x-model="formData.option_ids" multiple class="form-select" size="10">
                                            <template x-for="option in options" :key="option.id">
                                                <option :value="option.id" :selected="formData.option_ids.includes(option.id)" x-text="option.name"></option>
                                            </template>
                                        </select>
                                        <small class="form-text text-muted">
                                            Variant oluşturmak için option'ları seçin (örn: Renk, Beden). Seçilen option'ların değerlerinden otomatik olarak variant'lar oluşturulacaktır.
                                            <br>
                                            <span x-show="options.length === 0" class="text-warning">Henüz option tanımlanmamış. Önce Options sayfasından option ekleyin.</span>
                                        </small>
                                    </div>
                                    <div class="col-md-12" x-show="formData.option_ids.length > 0">
                                        <div class="alert alert-info">
                                            <p class="mb-0">
                                                <strong>Variant Oluşturma:</strong> Option'ları seçtikten sonra, variant'ları oluşturmak için "Generate Variants" butonunu kullanabilirsiniz. 
                                                Her option değeri kombinasyonu için bir variant oluşturulacaktır.
                                            </p>
                                        </div>
                                    </div>
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
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body" style="min-height: 500px; max-height: 70vh; overflow-y: auto">
                        <!-- Media Library Component -->
                        <div x-data="mediaPickerLibrary" x-init="init()">
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
                                    <div class="col-md-2 d-flex align-items-end">
                                        <button @click="resetFilters()" class="btn btn-secondary w-100">Reset</button>
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
                                        <div class="card" :class="selectedMedia && selectedMedia.id === media.id ? 'border-primary' : ''" @click="selectMedia(media)" style="cursor: pointer">
                                            <div class="position-relative" style="height: 150px; overflow: hidden; background: #f5f5f5">
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
                                                            if (isVideo) {
                                                                console.log(
                                                                    'Rendering VIDEO for media ID:',
                                                                    media.id,
                                                                    'Filename:',
                                                                    media.filename,
                                                                    'MIME:',
                                                                    media.mime_type,
                                                                )
                                                            }
                                                            return isVideo
                                                        })()
                                                    "
                                                >
                                                    <div style="height: 150px; display: flex; align-items: center; justify-content: center; background: #000">
                                                        <video :src="media.url" style="max-height: 150px; max-width: 100%; object-fit: contain" preload="metadata" muted></video>
                                                        <div
                                                            class="position-absolute"
                                                            style="top: 5px; right: 5px; background: rgba(0, 0, 0, 0.7); color: white; padding: 2px 6px; border-radius: 3px; font-size: 10px"
                                                        >
                                                            <i class="fas fa-video"></i>
                                                            Video
                                                        </div>
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
                                                            if (! isVideo) {
                                                                console.log(
                                                                    'Rendering IMAGE for media ID:',
                                                                    media.id,
                                                                    'Filename:',
                                                                    media.filename,
                                                                    'MIME:',
                                                                    media.mime_type,
                                                                )
                                                            }
                                                            return ! isVideo
                                                        })()
                                                    "
                                                >
                                                    <img :src="media.url" :alt="media.alt || media.filename" class="card-img-top" style="height: 150px; object-fit: cover; width: 100%" />
                                                </template>
                                            </div>
                                            <div class="card-body p-2">
                                                <p class="card-text small text-truncate mb-1" x-text="media.filename"></p>
                                                <p class="card-text small text-muted" x-text="media.collection || '-'"></p>
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
                                    Gösteriliyor
                                    <span x-text="pagination.from"></span>
                                    -
                                    <span x-text="pagination.to"></span>
                                    /
                                    <span x-text="pagination.total"></span>
                                    sonuç gösteriliyor
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
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
