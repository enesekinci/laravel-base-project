<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
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
