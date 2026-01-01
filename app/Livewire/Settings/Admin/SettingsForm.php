<?php

declare(strict_types=1);

namespace App\Livewire\Settings\Admin;

use App\Services\Settings\SettingService;
use Illuminate\Contracts\View\View;
use Livewire\Component;
use Mary\Traits\Toast;

class SettingsForm extends Component
{
    use Toast;

    public string $group = 'general';

    public array $formData = [];

    public array $groupFields = [
        'general' => [
            'site_name' => ['label' => 'Site Adı', 'type' => 'text', 'required' => true],
            'site_description' => ['label' => 'Site Açıklaması', 'type' => 'textarea', 'required' => false],
            'site_email' => ['label' => 'Site E-posta', 'type' => 'email', 'required' => true],
            'site_phone' => ['label' => 'Site Telefon', 'type' => 'text', 'required' => false],
            'site_address' => ['label' => 'Site Adresi', 'type' => 'textarea', 'required' => false],
            'maintenance_mode' => ['label' => 'Bakım Modu', 'type' => 'checkbox', 'required' => false],
        ],
        'mail' => [
            'mail_driver' => ['label' => 'Mail Sürücüsü', 'type' => 'text', 'required' => true],
            'mail_host' => ['label' => 'Mail Sunucusu', 'type' => 'text', 'required' => true],
            'mail_port' => ['label' => 'Port', 'type' => 'number', 'required' => true],
            'mail_username' => ['label' => 'Kullanıcı Adı', 'type' => 'text', 'required' => false],
            'mail_password' => ['label' => 'Şifre', 'type' => 'password', 'required' => false],
            'mail_encryption' => ['label' => 'Şifreleme', 'type' => 'text', 'required' => false],
            'mail_from_address' => ['label' => 'Gönderen E-posta', 'type' => 'email', 'required' => true],
            'mail_from_name' => ['label' => 'Gönderen İsim', 'type' => 'text', 'required' => true],
        ],
        'sms' => [
            'sms_provider' => ['label' => 'SMS Sağlayıcı', 'type' => 'text', 'required' => true],
            'sms_api_key' => ['label' => 'API Key', 'type' => 'text', 'required' => false],
            'sms_api_secret' => ['label' => 'API Secret', 'type' => 'password', 'required' => false],
            'sms_from_number' => ['label' => 'Gönderen Numara', 'type' => 'text', 'required' => false],
            'enable_sms_notifications' => ['label' => 'SMS Bildirimlerini Etkinleştir', 'type' => 'checkbox', 'required' => false],
        ],
    ];

    public function mount(string $group = 'general'): void
    {
        $this->group = $group;
        $this->loadSettings();
    }

    public function loadSettings(): void
    {
        $settingService = app(SettingService::class);
        $settings = $settingService->getGroup($this->group);

        foreach ($settings as $setting) {
            $value = $setting->value;
            // Eğer value array ise ve 'value' key'i varsa, onu al
            if (is_array($value) && isset($value['value'])) {
                $this->formData[$setting->key] = $value['value'];
            } else {
                $this->formData[$setting->key] = $value;
            }
        }
    }

    public function save(SettingService $settingService): void
    {
        $fields = $this->groupFields[$this->group] ?? [];

        foreach ($fields as $key => $field) {
            $value = $this->formData[$key] ?? null;

            if ($field['type'] === 'checkbox') {
                $value = (bool) $value;
            } elseif ($field['type'] === 'number') {
                $value = (int) $value;
            }

            $type = match ($field['type']) {
                'checkbox' => 'boolean',
                'number' => 'integer',
                'textarea' => 'string',
                default => 'string',
            };

            $settingService->set($this->group, $key, $value, $type);
        }

        $this->success('Ayarlar başarıyla kaydedildi.');
    }

    public function render(): View
    {
        $fields = $this->groupFields[$this->group] ?? [];

        return view('livewire.settings.admin.settings-form', [
            'fields' => $fields,
        ]);
    }
}
