<?php

namespace Database\Factories;

use App\Models\Attribute;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class AttributeFactory extends Factory
{
    protected $model = Attribute::class;

    public function definition()
    {
        $name = ucfirst($this->faker->word);

        return [
            'name' => $name,
            'slug' => Str::slug($name),
            'type' => 'text',
            'is_filterable' => false,
            'is_required' => false,
            'sort_order' => 0,
        ];
    }
}
