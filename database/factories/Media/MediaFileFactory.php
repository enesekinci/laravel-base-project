<?php

declare(strict_types=1);

namespace Database\Factories\Media;

use App\Models\Media\MediaFile;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<MediaFile>
 */
class MediaFileFactory extends Factory
{
    protected $model = MediaFile::class;

    public function definition(): array
    {
        return [
            'user_id' => User::factory(),
            'disk' => 'public',
            'path' => 'media/test/'.$this->faker->uuid.'.jpg',
            'filename' => $this->faker->lexify('image_????.jpg'),
            'mime_type' => 'image/jpeg',
            'size' => 123456,
            'width' => 800,
            'height' => 600,
            'collection' => 'products',
            'alt' => 'Test image',
            'is_private' => false,
        ];
    }
}
