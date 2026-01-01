<div>
    <x-header :title="$postId ? 'Yazı Düzenle' : 'Yeni Yazı'" separator progress-indicator>
        <x-slot:actions>
            <x-button label="Geri Dön" icon="o-arrow-left" class="btn-ghost" link="{{ route('admin.blog.posts.index') }}" />
        </x-slot>
    </x-header>

    <x-card>
        <form wire:submit="save">
            <div class="grid grid-cols-1 gap-4">
                <x-input label="Başlık" wire:model="title" icon="o-document-text" hint="Yazı başlığı" required />

                <div class="form-control">
                    <label class="label">
                        <span class="label-text">
                            Slug
                            <span class="text-error">*</span>
                        </span>
                    </label>
                    <div class="flex gap-2 w-full">
                        <div class="flex-1">
                            <x-input wire:model="slug" icon="o-link" hint="URL slug" required />
                        </div>
                        <x-button type="button" icon="o-arrow-path" class="btn-primary" wire:click="generateSlug" tooltip="Başlıktan slug oluştur" />
                    </div>
                </div>

                <x-textarea label="Özet" wire:model="excerpt" hint="Yazı özeti" rows="3" />

                <x-editor wire:model="content" label="İçerik" hint="Yazı içeriği (zengin metin editörü)" />

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <x-select
                        label="Durum"
                        wire:model="status"
                        :options="[
                            ['id' => 'draft', 'name' => 'Taslak'],
                            ['id' => 'published', 'name' => 'Yayında'],
                        ]"
                        option-value="id"
                        option-label="name"
                    />

                    <x-input label="Yayınlanma Tarihi" wire:model="published_at" type="datetime-local" hint="Yayınlanma tarihi (opsiyonel)" />
                </div>

                <div class="form-control">
                    <label class="label">
                        <span class="label-text">Kapak Görseli</span>
                    </label>
                    <x-image-library wire:model="files" wire:library="library" :preview="$library" label="Kapak Görseli" hint="Yazı için kapak görseli seçin" />
                </div>

                <x-choices label="Kategoriler" wire:model="category_ids" :options="$categories" option-value="id" option-label="name" searchable multiple />

                <div class="divider">SEO Ayarları</div>

                <x-input label="Meta Başlık" wire:model="meta_title" icon="o-tag" hint="SEO için meta title" />

                <x-textarea label="Meta Açıklama" wire:model="meta_description" hint="SEO için meta description" rows="3" />
            </div>

            <div class="flex justify-end gap-2 mt-6">
                <x-button label="İptal" class="btn-ghost" link="{{ route('admin.blog.posts.index') }}" />
                <x-button type="submit" label="Kaydet" icon="o-check" class="btn-primary" spinner="save" />
            </div>
        </form>
    </x-card>
</div>
