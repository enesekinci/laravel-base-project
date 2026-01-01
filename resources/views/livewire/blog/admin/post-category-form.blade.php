<div>
    <x-header 
        :title="$categoryId ? 'Kategori Düzenle' : 'Yeni Kategori'" 
        separator 
        progress-indicator
    >
        <x-slot:actions>
            <x-button label="Geri Dön" icon="o-arrow-left" class="btn-ghost" link="{{ route('admin.blog.categories.index') }}" />
        </x-slot:actions>
    </x-header>

    <x-card>
        <form wire:submit="save">
            <div class="grid grid-cols-1 gap-4">
                <x-input 
                    label="Kategori Adı" 
                    wire:model="name" 
                    icon="o-folder"
                    hint="Kategori adı"
                    required
                />

                <div class="form-control">
                    <label class="label">
                        <span class="label-text">Slug <span class="text-error">*</span></span>
                    </label>
                    <div class="join w-full">
                        <x-input 
                            wire:model="slug" 
                            icon="o-link"
                            hint="URL slug"
                            class="join-item flex-1"
                            required
                        />
                        <x-button 
                            type="button"
                            icon="o-arrow-path" 
                            class="join-item btn-primary"
                            wire:click="generateSlug"
                            tooltip="Kategori adından slug oluştur"
                        />
                    </div>
                </div>
            </div>

            <div class="flex justify-end gap-2 mt-6">
                <x-button label="İptal" class="btn-ghost" link="{{ route('admin.blog.categories.index') }}" />
                <x-button type="submit" label="Kaydet" icon="o-check" class="btn-primary" spinner="save" />
            </div>
        </form>
    </x-card>
</div>
