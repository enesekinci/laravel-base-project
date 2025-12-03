<?php

namespace App\Domains\Settings\Services;

use App\Domains\Settings\Models\Setting;

class SettingService
{
    /**
     * Get setting by group and key
     */
    public function get(string $group, string $key, mixed $default = null): mixed
    {
        $setting = Setting::where('group', $group)
            ->where('key', $key)
            ->first();

        if (! $setting) {
            return $default;
        }

        return $setting->value;
    }

    /**
     * Set setting value
     */
    public function set(string $group, string $key, mixed $value, string $type = 'string'): Setting
    {
        return Setting::updateOrCreate(
            [
                'group' => $group,
                'key' => $key,
            ],
            [
                'value' => is_array($value) ? $value : ['value' => $value],
                'type' => $type,
            ]
        );
    }

    /**
     * Get all settings by group
     */
    public function getGroup(string $group): \Illuminate\Database\Eloquent\Collection
    {
        return Setting::where('group', $group)->get();
    }
}
