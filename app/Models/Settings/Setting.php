<?php

declare(strict_types=1);

namespace App\Models\Settings;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @method static \Database\Factories\SettingFactory factory()
 */
class Setting extends Model
{
    /** @use HasFactory<\Database\Factories\SettingFactory> */
    use HasFactory;

    protected $fillable = [
        'group',
        'key',
        'value',
        'type',
    ];

    protected $casts = [
        'value' => 'array', // value'yi her zaman array/json tut; simple types için ["value" => "xxx"] kullanabilirsin.
    ];
}
