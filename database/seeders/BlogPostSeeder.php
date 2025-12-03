<?php

namespace Database\Seeders;

use App\Domains\Blog\Models\Post;
use App\Domains\Blog\Models\PostCategory;
use App\Domains\Blog\Models\PostTag;
use App\Domains\Crm\Models\User;
use App\Domains\Media\Models\MediaFile;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class BlogPostSeeder extends Seeder
{
    public function run(): void
    {
        $user = User::first();

        // Post kategorileri oluştur
        $categories = [
            ['name' => 'Moda', 'slug' => 'moda'],
            ['name' => 'Teknoloji', 'slug' => 'teknoloji'],
            ['name' => 'Yaşam', 'slug' => 'yasam'],
            ['name' => 'Spor', 'slug' => 'spor'],
        ];

        $postCategories = [];
        foreach ($categories as $catData) {
            $postCategories[] = PostCategory::firstOrCreate(
                ['slug' => $catData['slug']],
                ['name' => $catData['name']]
            );
        }

        // Post tag'leri oluştur
        $tags = [
            ['name' => 'Yeni Koleksiyon', 'slug' => 'yeni-koleksiyon'],
            ['name' => 'Trend', 'slug' => 'trend'],
            ['name' => 'İndirim', 'slug' => 'indirim'],
            ['name' => 'Öneri', 'slug' => 'oneri'],
        ];

        $postTags = [];
        foreach ($tags as $tagData) {
            $postTags[] = PostTag::firstOrCreate(
                ['slug' => $tagData['slug']],
                ['name' => $tagData['name']]
            );
        }

        // Blog post'ları oluştur
        $posts = [
            [
                'title' => 'Top New Collection',
                'excerpt' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras non placerat mi. Etiam non tellus sem. Aenean...',
                'content' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras non placerat mi. Etiam non tellus sem. Aenean...',
                'image' => 'porto/assets/images/blog/home/post-1.jpg',
                'category' => 'moda',
                'tags' => ['yeni-koleksiyon', 'trend'],
            ],
            [
                'title' => 'Fashion Trends',
                'excerpt' => 'Leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of...',
                'content' => 'Leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of...',
                'image' => 'porto/assets/images/blog/home/post-2.jpg',
                'category' => 'moda',
                'tags' => ['trend', 'oneri'],
            ],
            [
                'title' => 'Right Choices',
                'excerpt' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the...',
                'content' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the...',
                'image' => 'porto/assets/images/blog/home/post-3.jpg',
                'category' => 'yasam',
                'tags' => ['oneri', 'indirim'],
            ],
            [
                'title' => 'Perfect Accessories',
                'excerpt' => 'Leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of...',
                'content' => 'Leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of...',
                'image' => 'porto/assets/images/blog/home/post-4.jpg',
                'category' => 'moda',
                'tags' => ['yeni-koleksiyon', 'trend'],
            ],
        ];

        foreach ($posts as $postData) {
            $media = MediaFile::create([
                'user_id' => $user?->id,
                'disk' => 'public',
                'path' => $postData['image'],
                'filename' => basename($postData['image']),
                'mime_type' => 'image/jpeg',
                'size' => 0,
                'width' => 225,
                'height' => 280,
                'collection' => 'blog',
                'alt' => $postData['title'],
                'is_private' => false,
            ]);

            $category = collect($postCategories)->firstWhere('slug', $postData['category']);

            $post = Post::firstOrCreate(
                ['slug' => Str::slug($postData['title'])],
                [
                    'author_id' => $user?->id,
                    'media_file_id' => $media->id,
                    'title' => $postData['title'],
                    'excerpt' => $postData['excerpt'],
                    'content' => $postData['content'],
                    'status' => 'published',
                    'published_at' => now()->subDays(rand(1, 30)),
                    'meta_title' => $postData['title'],
                    'meta_description' => $postData['excerpt'],
                ]
            );

            if ($category) {
                $post->categories()->syncWithoutDetaching([$category->id]);
            }

            foreach ($postData['tags'] as $tagSlug) {
                $tag = collect($postTags)->firstWhere('slug', $tagSlug);
                if ($tag) {
                    $post->tags()->syncWithoutDetaching([$tag->id]);
                }
            }
        }
    }
}
