<?php

namespace App\Services;

use App\Models\StoreSetting;
use Illuminate\Database\Eloquent\Collection;

class StoreSettingService
{
    public function get(string $key, $default = null)
    {
        $setting = StoreSetting::where('key', $key)->first();
        return $setting ? $setting->value : $default;
    }

    public function set(string $key, $value, string $group = 'general'): StoreSetting
    {
        return StoreSetting::updateOrCreate(
            ['key' => $key],
            ['value' => $value, 'group' => $group]
        );
    }

    public function getByGroup(string $group): Collection
    {
        return StoreSetting::where('group', $group)->get();
    }

    public function setMany(array $settings, string $group = 'general'): void
    {
        foreach ($settings as $key => $value) {
            $this->set($key, $value, $group);
        }
    }
}

