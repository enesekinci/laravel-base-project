<div>
    <x-header title="Yazı Yönetimi" separator progress-indicator>
        <x-slot:actions>
            <x-button label="Yeni Yazı" icon="o-plus" class="btn-primary" link="{{ route('admin.blog.posts.create') }}" />
        </x-slot:actions>
    </x-header>

    <x-card>
        <x-input wire:model.live.debounce.300ms="search" icon="o-magnifying-glass" placeholder="Yazı ara..." class="mb-4" />

        <x-table :headers="$this->headers" :rows="$posts" with-pagination>
            @scope('cell_id', $post)
                {{ $post->id }}
            @endscope

            @scope('cell_title', $post)
                <div class="font-bold">{{ $post->title }}</div>
            @endscope

            @scope('cell_status', $post)
                @if($post->status === 'published')
                    <span class="badge badge-success">Yayında</span>
                @else
                    <span class="badge badge-ghost">Taslak</span>
                @endif
            @endscope

            @scope('cell_author', $post)
                {{ $post->author->name ?? '-' }}
            @endscope

            @scope('cell_created_at', $post)
                {{ $post->created_at->format('d.m.Y H:i') }}
            @endscope

            @scope('cell_actions', $post)
                <div class="flex gap-2">
                    <x-button icon="o-pencil" class="btn-ghost btn-sm" link="{{ route('admin.blog.posts.edit', $post->id) }}" />
                    <x-button 
                        icon="o-trash" 
                        class="btn-ghost btn-sm text-error" 
                        wire:click="delete({{ $post->id }})"
                        wire:confirm="Bu yazıyı silmek istediğinize emin misiniz?"
                    />
                </div>
            @endscope
        </x-table>
    </x-card>
</div>
