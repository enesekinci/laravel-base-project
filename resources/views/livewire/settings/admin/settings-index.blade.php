<div>
    <x-header title="Ayarlar" separator progress-indicator></x-header>

    <x-card>
        <x-tabs wire:model="activeGroup">
            @foreach ($this->groups as $groupKey => $groupLabel)
                <x-tab name="{{ $groupKey }}" label="{{ $groupLabel }}">
                    {{-- Tab içeriği --}}
                </x-tab>
            @endforeach
        </x-tabs>

        {{-- Aktif tab'a göre form göster --}}
        <div class="mt-4">
            <livewire:settings.admin.settings-form :group="$activeGroup" :key="'settings-form-' . $activeGroup" />
        </div>
    </x-card>
</div>
