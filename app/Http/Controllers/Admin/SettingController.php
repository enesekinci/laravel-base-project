<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function index(Request $request)
    {
        $group = $request->query('group', 'general');

        $settings = Setting::where('group', $group)
            ->orderBy('key')
            ->get();

        return response()->json([
            'data' => $settings->map(function (Setting $s) {
                return [
                    'id'    => $s->id,
                    'group' => $s->group,
                    'key'   => $s->key,
                    'type'  => $s->type,
                    'value' => $s->value,
                ];
            }),
        ]);
    }

    public function updateGroup(Request $request, string $group)
    {
        $payload = $request->validate([
            'values'        => ['required', 'array'],
            'values.*.key'   => ['required', 'string'],
            'values.*.value' => ['nullable'],
            'values.*.type'  => ['nullable', 'string'],
        ]);

        foreach ($payload['values'] as $item) {
            $key  = $item['key'];
            $type = $item['type'] ?? 'string';
            $value = $item['value'];

            // hepsini json'da tut
            $valueArray = is_array($value) ? $value : ['value' => $value];

            Setting::updateOrCreate(
                ['group' => $group, 'key' => $key],
                ['value' => $valueArray, 'type' => $type]
            );
        }

        $settings = Setting::where('group', $group)
            ->orderBy('key')
            ->get();

        return response()->json([
            'data' => $settings->map(function (Setting $s) {
                return [
                    'id'    => $s->id,
                    'group' => $s->group,
                    'key'   => $s->key,
                    'type'  => $s->type,
                    'value' => $s->value,
                ];
            }),
        ]);
    }
}

