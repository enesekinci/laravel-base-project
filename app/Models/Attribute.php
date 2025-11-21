<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class Attribute extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = [];

    protected $casts = [
        'is_filterable' => 'boolean',
        'is_required'   => 'boolean',
    ];

    public function attributeSets()
    {
        return $this->belongsToMany(AttributeSet::class, 'attribute_set_attribute')
            ->withPivot('sort_order')
            ->withTimestamps();
    }

    public function option()
    {
        return $this->belongsTo(Option::class);
    }

    public function productValues()
    {
        return $this->hasMany(ProductAttributeValue::class);
    }

    public function values()
    {
        return $this->hasMany(AttributeValue::class);
    }

    public function attributeSet()
    {
        return $this->belongsTo(AttributeSet::class, 'attribute_set_id');
    }
}
