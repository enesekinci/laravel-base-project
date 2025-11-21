<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'type',
        'first_name',
        'last_name',
        'phone',
        'country',
        'city',
        'district',
        'postcode',
        'line_1',
        'line_2',
        'is_default',
    ];

    protected $casts = [
        'is_default' => 'bool',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
