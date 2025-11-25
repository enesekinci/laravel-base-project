@extends('admin.layouts.app')

@section('title', isset($id) ? 'Edit Option' : 'Create Option')

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

        // Option Form Component
        document.addEventListener('alpine:init', () => {
            Alpine.data('optionForm', () => ({
                loading: false,
                saving: false,
                optionId: {{ $id ?? 'null' }},
                formData: {
                    name: '',
                    type: 'select',
                },
                values: [],
                errors: {},

                async init() {
                    await waitForAdminApi()
                    if (this.optionId) {
                        await this.loadOption()
                    }
                },

                async loadOption() {
                    if (!window.adminApiHelpers) return
                    this.loading = true
                    try {
                        const response = await window.adminApiHelpers.get(`/options/${this.optionId}`)
                        const option = response.data
                        this.formData = {
                            name: option.name || '',
                            type: option.type || 'select',
                        }
                        this.values = option.values || []
                    } catch (error) {
                        console.error('Error loading option:', error)
                        if (window.swalHelpers) {
                            window.swalHelpers.error('Seçenek yüklenirken bir hata oluştu')
                        }
                    } finally {
                        this.loading = false
                    }
                },

                addValue() {
                    this.values.push({ value: '', sort_order: this.values.length })
                },

                removeValue(index) {
                    this.values.splice(index, 1)
                },

                async save() {
                    const payload = {
                        ...this.formData,
                        values: this.values,
                    }
                    try {
                        await handleFormSave(this, '/options', this.optionId, payload, this.optionId ? 'Seçenek güncellendi' : 'Seçenek oluşturuldu', '/admin/options')
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
                <li class="breadcrumb-item"><a href="{{ route('admin.options.index') }}">Options</a></li>
                <li class="breadcrumb-item active" aria-current="page" x-text="optionId ? 'Edit' : 'Create'"></li>
            </ol>
        </nav>
    </div>
    <!-- /BREADCRUMB -->

    <div x-data="optionForm" x-init="init()">
        <div class="row layout-top-spacing">
            <div class="col-xl-12 col-lg-12 col-sm-12 layout-spacing">
                <div class="widget-content widget-content-area br-8 p-4">
                    <!-- Header -->
                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <h4 class="mb-0" x-text="optionId ? 'Edit Option' : 'Create Option'"></h4>
                        <div>
                            <a href="{{ route('admin.options.index') }}" class="btn btn-secondary me-2">Cancel</a>
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
                                    Type
                                    <span class="text-danger">*</span>
                                </label>
                                <select x-model="formData.type" class="form-select" :class="{ 'is-invalid': errors.type }">
                                    <option value="select">Select</option>
                                    <option value="radio">Radio</option>
                                    <option value="checkbox">Checkbox</option>
                                    <option value="color">Color</option>
                                </select>
                                <div x-show="errors.type" class="invalid-feedback" x-text="errors.type?.[0] || errors.type"></div>
                            </div>
                        </div>

                        <!-- Values -->
                        <div class="mb-4">
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <h5 class="mb-0">Option Values</h5>
                                <button @click="addValue()" class="btn btn-sm btn-primary">Add Value</button>
                            </div>
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>Value</th>
                                            <th>Sort Order</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <template x-for="(value, index) in values" :key="index">
                                            <tr>
                                                <td>
                                                    <input type="text" x-model="value.value" class="form-control form-control-sm" />
                                                </td>
                                                <td>
                                                    <input type="number" x-model="value.sort_order" class="form-control form-control-sm" />
                                                </td>
                                                <td>
                                                    <button @click="removeValue(index)" class="btn btn-sm btn-danger">Remove</button>
                                                </td>
                                            </tr>
                                        </template>
                                        <tr x-show="values.length === 0">
                                            <td colspan="3" class="text-center text-muted">No values added</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
