<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class StoreHomeSeeder extends Seeder
{
    public function run(): void
    {
        $this->call([
            SliderSeeder::class,
            BlogPostSeeder::class,
        ]);
    }
}
