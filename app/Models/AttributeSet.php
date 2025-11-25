<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AttributeSet extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = [];

    public function attributes()
    {
        return $this->belongsToMany(Attribute::class, 'attribute_set_attribute')
            ->withPivot('sort_order')
            ->withTimestamps()
            ->orderBy('attribute_set_attribute.sort_order');
    }
}
