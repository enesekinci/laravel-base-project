<?php

declare(strict_types=1);

namespace Database\Factories\Blog;

use App\Models\Blog\Post;
use App\Models\Media\MediaFile;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends Factory<Post>
 */
class PostFactory extends Factory
{
    protected $model = Post::class;

    public function definition(): array
    {
        $title = $this->faker->sentence();

        return [
            'author_id' => User::factory(),
            'media_file_id' => MediaFile::factory(),
            'title' => $title,
            'slug' => Str::slug($title).'-'.Str::random(6),
            'excerpt' => $this->faker->paragraph(),
            'content' => $this->faker->paragraphs(5, true),
            'status' => 'published',
            'published_at' => now(),
            'meta_title' => $title,
            'meta_description' => $this->faker->sentence(),
        ];
    }

    public function draft(): static
    {
        return $this->state(fn (array $attributes) => [
            'status' => 'draft',
            'published_at' => null,
        ]);
    }

    public function published(): static
    {
        return $this->state(fn (array $attributes) => [
            'status' => 'published',
            'published_at' => now(),
        ]);
    }
}
