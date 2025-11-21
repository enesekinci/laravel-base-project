<?php

namespace Database\Factories;

use App\Models\TaxClass;
use Illuminate\Database\Eloquent\Factories\Factory;

class TaxClassFactory extends Factory
{
    protected $model = TaxClass::class;

    public function definition(): array
    {
        return [
            'name'      => 'KDV 18',
            'rate'      => 18,
            'is_active' => true,
        ];
    }
}
