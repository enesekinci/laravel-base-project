<div>
    <x-header title="{{ $todoId ? 'Görev Düzenle' : 'Yeni Görev' }}" separator progress-indicator />

    <x-card>
        <x-form wire:submit="save">
            <x-input wire:model="title" label="Başlık" />
            <x-textarea wire:model="description" label="Açıklama" rows="3" />
            <x-select wire:model="category" label="Kategori" :options="['İş', 'Kişisel', 'Sağlık', 'Alışveriş']" />
            <x-select wire:model="priority" label="Öncelik" :options="['Düşük', 'Orta', 'Yüksek', 'Kritik']" />
            <x-datetime wire:model="deadline" label="Son Tarih" />

            <div class="divider">Alt Görevler</div>

            @foreach($subtasks as $index => $subtask)
                <div class="flex gap-2 mb-2">
                    <x-input wire:model="subtasks.{{ $index }}.title" placeholder="Alt görev başlığı" class="flex-1" />
                    <x-button icon="o-trash" class="btn-ghost" wire:click="removeSubtask({{ $index }})" />
                </div>
            @endforeach

            <x-button label="Alt Görev Ekle" icon="o-plus" class="btn-ghost" wire:click="addSubtask" />

            <x-slot:actions>
                <x-button label="İptal" link="{{ route('admin.focusflow.todos.index') }}" />
                <x-button label="Kaydet" type="submit" icon="o-check" class="btn-primary" />
            </x-slot:actions>
        </x-form>
    </x-card>
</div>
