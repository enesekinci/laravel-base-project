<?php

namespace Database\Factories;

use App\Models\TaxClass;
use Illuminate\Database\Eloquent\Factories\Factory;

class TaxClassFactory extends Factory
{
    protected $model = TaxClass::class;

    public function definition()
    {
        return [
            'name' => 'Standard VAT',
            'rate' => 18.0,
            'is_active' => true,
        ];
    }
}
