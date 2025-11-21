<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class OptionValue extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function option()
    {
        return $this->belongsTo(Option::class);
    }

    public function variants()
    {
        return $this->belongsToMany(ProductVariant::class, 'variant_option_values', 'option_value_id', 'variant_id')
            ->withPivot('option_id')
            ->withTimestamps();
    }
}

