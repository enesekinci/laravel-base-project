<?php

declare(strict_types=1);

namespace App\Livewire\Settings\Admin;

use App\Models\Settings\Setting;
use App\Services\Settings\SettingService;
use Illuminate\Contracts\View\View;
use Livewire\Component;

class SettingsIndex extends Component
{
    public string $activeGroup = 'general';

    public array $groups = [
        'general' => 'Genel Ayarlar',
        'mail' => 'Mail Ayarları',
        'sms' => 'SMS Ayarları',
    ];

    public function mount(): void
    {
        //
    }

    // setGroup method'u artık gerekli değil, wire:model otomatik olarak güncelliyor

    public function render(SettingService $settingService): View
    {
        $settings = $settingService->getGroup($this->activeGroup);

        return view('livewire.settings.admin.settings-index', [
            'settings' => $settings,
        ]);
    }
}
