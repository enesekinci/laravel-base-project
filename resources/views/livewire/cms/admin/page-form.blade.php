<div>
    <x-header 
        :title="$pageId ? 'Sayfa Düzenle' : 'Yeni Sayfa'" 
        separator 
        progress-indicator
    >
        <x-slot:actions>
            <x-button label="Geri Dön" icon="o-arrow-left" class="btn-ghost" link="{{ route('admin.cms.pages.index') }}" />
        </x-slot:actions>
    </x-header>

    <x-card>
        <form wire:submit="save">
            <div class="grid grid-cols-1 gap-4">
                <x-input 
                    label="Başlık" 
                    wire:model="title" 
                    icon="o-document-text"
                    hint="Sayfa başlığı"
                    required
                />

                <x-input 
                    label="Slug" 
                    wire:model="slug" 
                    icon="o-link"
                    hint="URL slug (otomatik oluşturulur)"
                    required
                />

                <x-textarea 
                    label="İçerik" 
                    wire:model="content" 
                    hint="Sayfa içeriği (HTML desteklenir)"
                    rows="10"
                />

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <x-toggle 
                        label="Aktif" 
                        wire:model="is_active"
                        hint="Sayfa aktif mi?"
                    />

                    <x-toggle 
                        label="Footer'da Göster" 
                        wire:model="show_in_footer"
                        hint="Sayfa footer menüsünde gösterilsin mi?"
                    />
                </div>

                <div class="divider">SEO Ayarları</div>

                <x-input 
                    label="Meta Başlık" 
                    wire:model="meta_title" 
                    icon="o-tag"
                    hint="SEO için meta title (boş bırakılırsa başlık kullanılır)"
                />

                <x-textarea 
                    label="Meta Açıklama" 
                    wire:model="meta_description" 
                    hint="SEO için meta description"
                    rows="3"
                />
            </div>

            <div class="flex justify-end gap-2 mt-6">
                <x-button label="İptal" class="btn-ghost" link="{{ route('admin.cms.pages.index') }}" />
                <x-button type="submit" label="Kaydet" icon="o-check" class="btn-primary" spinner="save" />
            </div>
        </form>
    </x-card>
</div>
