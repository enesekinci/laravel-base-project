<?php

namespace Database\Factories;

use App\Models\AttributeSet;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class AttributeSetFactory extends Factory
{
    protected $model = AttributeSet::class;

    public function definition()
    {
        $name = ucfirst($this->faker->word).' Set';

        return [
            'name' => $name,
            'slug' => Str::slug($name),
        ];
    }
}
