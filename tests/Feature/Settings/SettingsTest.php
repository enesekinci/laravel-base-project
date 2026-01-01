<?php

declare(strict_types=1);

use App\Livewire\Settings\Admin\SettingsIndex;
use App\Livewire\Settings\Admin\SettingsForm;
use App\Models\Settings\Setting;
use App\Models\User;
use Livewire\Livewire;

it('ayarlar sayfasını görüntüler', function () {
    $admin = User::factory()->create(['is_admin' => true]);

    Livewire::actingAs($admin)
        ->test(SettingsIndex::class)
        ->assertSuccessful()
        ->assertSee('Ayarlar')
        ->assertSee('Genel Ayarlar');
});

it('ayar grubunu değiştirir', function () {
    $admin = User::factory()->create(['is_admin' => true]);

    Livewire::actingAs($admin)
        ->test(SettingsIndex::class)
        ->assertSet('activeGroup', 'general')
        ->call('setGroup', 'mail')
        ->assertSet('activeGroup', 'mail')
        ->assertSee('Mail Ayarları');
});

it('genel ayarları kaydeder', function () {
    $admin = User::factory()->create(['is_admin' => true]);

    Setting::updateOrCreate(
        ['group' => 'general', 'key' => 'site_name'],
        [
            'value' => ['value' => 'Eski Site Adı'],
            'type' => 'string',
        ]
    );

    Livewire::actingAs($admin)
        ->test(SettingsForm::class, ['group' => 'general'])
        ->set('formData.site_name', 'Yeni Site Adı')
        ->call('save')
        ->assertSuccessful();

    $this->assertDatabaseHas('settings', [
        'group' => 'general',
        'key' => 'site_name',
    ]);

    $setting = Setting::where('group', 'general')->where('key', 'site_name')->first();
    expect($setting->value['value'])->toBe('Yeni Site Adı');
});

it('mail ayarlarını kaydeder', function () {
    $admin = User::factory()->create(['is_admin' => true]);

    Setting::updateOrCreate(
        ['group' => 'mail', 'key' => 'mail_host'],
        [
            'value' => ['value' => 'smtp.example.com'],
            'type' => 'string',
        ]
    );

    Livewire::actingAs($admin)
        ->test(SettingsForm::class, ['group' => 'mail'])
        ->set('formData.mail_host', 'smtp.newhost.com')
        ->call('save')
        ->assertSuccessful();

    $setting = Setting::where('group', 'mail')->where('key', 'mail_host')->first();
    expect($setting->value['value'])->toBe('smtp.newhost.com');
});

it('checkbox ayarlarını kaydeder', function () {
    $admin = User::factory()->create(['is_admin' => true]);

    Setting::updateOrCreate(
        ['group' => 'general', 'key' => 'maintenance_mode'],
        [
            'value' => ['value' => false],
            'type' => 'boolean',
        ]
    );

    Livewire::actingAs($admin)
        ->test(SettingsForm::class, ['group' => 'general'])
        ->set('formData.maintenance_mode', true)
        ->call('save')
        ->assertSuccessful();

    $setting = Setting::where('group', 'general')->where('key', 'maintenance_mode')->first();
    expect($setting->value['value'])->toBe(true);
});

it('admin olmayan kullanıcı erişemez', function () {
    $user = User::factory()->create(['is_admin' => false]);

    $response = $this->actingAs($user)->get(route('admin.settings.index'));

    $response->assertForbidden();
});
