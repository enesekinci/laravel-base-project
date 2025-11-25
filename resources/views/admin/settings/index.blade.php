@extends('admin.layouts.app')

@section('title', 'Settings')

@push('scripts')
    <script>
        document.addEventListener('alpine:init', () => {
            Alpine.data('settings', () => ({
                loading: false,
                saving: false,
                activeTab: 'general',
                settings: {
                    general: {},
                    storefront: {},
                    mail: {},
                    sms: {},
                    currency: {},
                },
                formData: {},

                async init() {
                    await this.waitForAdminApi()
                    await this.loadSettings()
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

                async loadSettings() {
                    if (!window.adminApiHelpers) {
                        console.error('adminApiHelpers is not available')
                        return
                    }

                    this.loading = true
                    try {
                        const groups = ['general', 'storefront', 'mail', 'sms', 'currency']
                        for (const group of groups) {
                            try {
                                const response = await window.adminApiHelpers.get('/settings', { group })
                                this.settings[group] = response.data?.data || response.data || {}
                            } catch (error) {
                                console.error(`Error loading ${group} settings:`, error)
                                this.settings[group] = {}
                            }
                        }
                        this.formData = { ...this.settings[this.activeTab] }
                    } catch (error) {
                        console.error('Error loading settings:', error)
                        if (window.Alpine && window.Alpine.store('toast')) {
                            window.Alpine.store('toast').error('Ayarlar yüklenirken bir hata oluştu')
                        }
                    } finally {
                        this.loading = false
                    }
                },

                switchTab(tab) {
                    this.activeTab = tab
                    this.formData = { ...this.settings[tab] }
                },

                async save() {
                    this.saving = true
                    try {
                        const values = Object.keys(this.formData).map((key) => ({
                            key,
                            value: this.formData[key],
                            type: typeof this.formData[key] === 'boolean' ? 'boolean' : typeof this.formData[key] === 'number' ? 'integer' : 'string',
                        }))

                        const response = await window.adminApiHelpers.post(`/settings/${this.activeTab}`, { values })
                        
                        // Update settings with response data
                        if (response.data?.data) {
                            this.settings[this.activeTab] = response.data.data
                            this.formData = { ...this.settings[this.activeTab] }
                        }

                        if (window.swalHelpers) {
                            window.swalHelpers.success('Ayarlar kaydedildi')
                        } else if (window.Alpine && window.Alpine.store('toast')) {
                            window.Alpine.store('toast').success('Ayarlar kaydedildi')
                        }
                    } catch (error) {
                        console.error('Error saving settings:', error)
                        if (window.swalHelpers) {
                            window.swalHelpers.error('Ayarlar kaydedilirken bir hata oluştu')
                        } else if (window.Alpine && window.Alpine.store('toast')) {
                            window.Alpine.store('toast').error('Ayarlar kaydedilirken bir hata oluştu')
                        }
                    } finally {
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
                <li class="breadcrumb-item active" aria-current="page">Settings</li>
            </ol>
        </nav>
    </div>
    <!-- /BREADCRUMB -->

    <div x-data="settings" x-init="init()">
        <div class="row layout-top-spacing">
            <div class="col-xl-12 col-lg-12 col-sm-12 layout-spacing">
                <div class="widget-content widget-content-area br-8 p-4">
                    <!-- Header -->
                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <h4 class="mb-0">Settings</h4>
                        <button @click="save()" :disabled="saving" class="btn btn-primary">
                            <span x-show="!saving">Save Changes</span>
                            <span x-show="saving">Saving...</span>
                        </button>
                    </div>

                    <!-- Loading -->
                    <div x-show="loading" class="text-center p-4">
                        <div class="spinner-border text-primary" role="status">
                            <span class="visually-hidden">Loading...</span>
                        </div>
                        <p class="mt-2 text-muted">Loading...</p>
                    </div>

                    <!-- Content -->
                    <div x-show="!loading">
                        <!-- Tabs -->
                        <ul class="nav nav-tabs mb-4" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" :class="{ 'active': activeTab === 'general' }" @click="switchTab('general')" type="button" role="tab">
                                    General
                                </button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" :class="{ 'active': activeTab === 'storefront' }" @click="switchTab('storefront')" type="button" role="tab">
                                    Storefront
                                </button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" :class="{ 'active': activeTab === 'mail' }" @click="switchTab('mail')" type="button" role="tab">
                                    Mail
                                </button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" :class="{ 'active': activeTab === 'sms' }" @click="switchTab('sms')" type="button" role="tab">
                                    SMS
                                </button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" :class="{ 'active': activeTab === 'currency' }" @click="switchTab('currency')" type="button" role="tab">
                                    Currency & Taxes
                                </button>
                            </li>
                        </ul>

                        <!-- Tab Content -->
                        <div class="tab-content">
                            <div class="tab-pane fade show active">
                                <div class="row">
                                    <div class="col-md-8">
                                        <template x-for="(value, key) in formData" :key="key">
                                            <div class="mb-3">
                                                <label class="form-label" x-text="key.replace(/_/g, ' ').replace(/\b\w/g, l => l.toUpperCase())"></label>
                                                <input
                                                    x-show="typeof value === 'string' || typeof value === 'number'"
                                                    :type="typeof value === 'number' ? 'number' : 'text'"
                                                    x-model="formData[key]"
                                                    class="form-control"
                                                />
                                                <div x-show="typeof value === 'boolean'" class="form-check form-switch">
                                                    <input class="form-check-input" type="checkbox" x-model="formData[key]" :id="`setting_${key}`" />
                                                    <label class="form-check-label" :for="`setting_${key}`" x-text="key.replace(/_/g, ' ').replace(/\b\w/g, l => l.toUpperCase())"></label>
                                                </div>
                                            </div>
                                        </template>

                                        <div x-show="Object.keys(formData).length === 0" class="text-center py-8 text-muted">
                                            <p>No settings available for this group</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
