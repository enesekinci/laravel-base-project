<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ProductAttributeValue extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $casts = [
        'value_datetime' => 'datetime',
    ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function attribute()
    {
        return $this->belongsTo(Attribute::class);
    }

    public function optionValue()
    {
        return $this->belongsTo(OptionValue::class, 'option_value_id');
    }

    public function getTypedValueAttribute()
    {
        $type = $this->attribute->type ?? 'text';

        return match ($type) {
            'integer'    => $this->value_int,
            'decimal'    => $this->value_decimal,
            'boolean'    => (bool) $this->value_int,
            'date'       => $this->value_datetime,
            'select',
            'multiselect' => $this->optionValue?->value,
            'textarea'   => $this->value_text,
            default      => $this->value_string,
        };
    }
}

