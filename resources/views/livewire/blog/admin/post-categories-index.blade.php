<div>
    <x-header title="Blog Kategorileri" separator progress-indicator>
        <x-slot:actions>
            <x-button label="Yeni Kategori" icon="o-plus" class="btn-primary" link="{{ route('admin.blog.categories.create') }}" />
        </x-slot:actions>
    </x-header>

    <x-card>
        <x-input wire:model.live.debounce.300ms="search" icon="o-magnifying-glass" placeholder="Kategori ara..." class="mb-4" />

        <x-table :headers="$this->headers" :rows="$categories" with-pagination>
            @scope('cell_id', $category)
                {{ $category->id }}
            @endscope

            @scope('cell_name', $category)
                <div class="font-bold">{{ $category->name }}</div>
            @endscope

            @scope('cell_slug', $category)
                <code class="text-sm">{{ $category->slug }}</code>
            @endscope

            @scope('cell_posts_count', $category)
                <span class="badge badge-primary">{{ $category->posts_count ?? 0 }}</span>
            @endscope

            @scope('cell_created_at', $category)
                {{ $category->created_at->format('d.m.Y H:i') }}
            @endscope

            @scope('cell_actions', $category)
                <div class="flex gap-2">
                    <x-button icon="o-pencil" class="btn-ghost btn-sm" link="{{ route('admin.blog.categories.edit', $category->id) }}" />
                    <x-button 
                        icon="o-trash" 
                        class="btn-ghost btn-sm text-error" 
                        wire:click="delete({{ $category->id }})"
                        wire:confirm="Bu kategoriyi silmek istediğinize emin misiniz?"
                    />
                </div>
            @endscope
        </x-table>
    </x-card>
</div>
