<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Translation extends Model
{
    use HasFactory;

    protected $fillable = [
        'key',
        'language_id',
        'value',
        'group',
    ];

    public function language(): BelongsTo
    {
        return $this->belongsTo(Language::class);
    }
}

