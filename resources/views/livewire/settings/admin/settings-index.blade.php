<div>
    <x-header title="Ayarlar" separator progress-indicator></x-header>

    <x-card>
        <div class="tabs tabs-boxed mb-4">
            @foreach ($this->groups as $groupKey => $groupLabel)
                <button wire:click="setGroup('{{ $groupKey }}')" class="tab {{ $activeGroup === $groupKey ? 'tab-active' : '' }}">
                    {{ $groupLabel }}
                </button>
            @endforeach
        </div>

        <livewire:settings.admin.settings-form :group="$activeGroup" />
    </x-card>
</div>
