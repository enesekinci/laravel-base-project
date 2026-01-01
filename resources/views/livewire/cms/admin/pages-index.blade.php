<div>
    <x-header title="Sayfa Yönetimi" separator progress-indicator>
        <x-slot:actions>
            <x-button label="Yeni Sayfa" icon="o-plus" class="btn-primary" link="{{ route('admin.cms.pages.create') }}" />
        </x-slot:actions>
    </x-header>

    <x-card>
        <x-input wire:model.live.debounce.300ms="search" icon="o-magnifying-glass" placeholder="Sayfa ara..." class="mb-4" />

        <x-table :headers="$this->headers" :rows="$pages" with-pagination>
            @scope('cell_id', $page)
                {{ $page->id }}
            @endscope

            @scope('cell_title', $page)
                <div class="font-bold">{{ $page->title }}</div>
            @endscope

            @scope('cell_slug', $page)
                <code class="text-sm">{{ $page->slug }}</code>
            @endscope

            @scope('cell_is_active', $page)
                @if($page->is_active)
                    <span class="badge badge-success">Aktif</span>
                @else
                    <span class="badge badge-ghost">Pasif</span>
                @endif
            @endscope

            @scope('cell_created_at', $page)
                {{ $page->created_at->format('d.m.Y H:i') }}
            @endscope

            @scope('cell_actions', $page)
                <div class="flex gap-2">
                    <x-button icon="o-pencil" class="btn-ghost btn-sm" link="{{ route('admin.cms.pages.edit', $page->id) }}" />
                    <x-button 
                        icon="o-trash" 
                        class="btn-ghost btn-sm text-error" 
                        wire:click="delete({{ $page->id }})"
                        wire:confirm="Bu sayfayı silmek istediğinize emin misiniz?"
                    />
                </div>
            @endscope
        </x-table>
    </x-card>
</div>
