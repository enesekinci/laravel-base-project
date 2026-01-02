<?php

declare(strict_types=1);

namespace App\Livewire\Blog\Admin;

use App\Actions\Blog\CreatePostAction;
use App\Actions\Blog\UpdatePostAction;
use App\Models\Blog\Post;
use App\Models\Blog\PostCategory;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Livewire\Component;
use Livewire\WithFileUploads;
use Mary\Traits\Toast;
use Mary\Traits\WithMediaSync;

class PostForm extends Component
{
    use Toast, WithFileUploads, WithMediaSync;

    public ?int $postId = null;

    public string $title = '';

    public string $slug = '';

    public ?string $excerpt = null;

    public ?string $content = null;

    public string $status = 'draft';

    public ?string $published_at = null;

    public array $category_ids = [];

    public ?string $meta_title = null;

    public ?string $meta_description = null;

    // Media
    public array $files = [];

    public \Illuminate\Support\Collection $library;

    public bool $slugManuallyEdited = false;

    protected array $rules = [
        'title' => ['required', 'string', 'max:255'],
        'slug' => ['required', 'string', 'max:255'],
        'excerpt' => ['nullable', 'string', 'max:500'],
        'content' => ['nullable', 'string'],
        'status' => ['required', 'string', 'in:draft,published'],
        'published_at' => ['nullable', 'date'],
        'category_ids' => ['nullable', 'array'],
        'meta_title' => ['nullable', 'string', 'max:255'],
        'meta_description' => ['nullable', 'string', 'max:500'],
    ];

    protected array $messages = [
        'title.required' => 'Başlık gereklidir.',
        'slug.required' => 'Slug gereklidir.',
    ];

    public function mount(?int $id = null): void
    {
        $this->postId = $id;
        $this->library = new \Illuminate\Support\Collection;

        if ($this->postId) {
            $post = Post::with('categories')->findOrFail($this->postId);
            $this->title = $post->title;
            $this->slug = $post->slug;
            $this->excerpt = $post->excerpt;
            $this->content = $post->content;
            $this->status = $post->status ?? 'draft';
            $this->published_at = $post->published_at?->format('Y-m-d\TH:i');
            $this->category_ids = $post->categories->pluck('id')->toArray();
            $this->meta_title = $post->meta_title;
            $this->meta_description = $post->meta_description;

            // Load existing media library if exists
            $this->library = $post->library ?? new \Illuminate\Support\Collection;
        }
    }

    public function updated($propertyName): void
    {
        $this->validateOnly($propertyName);

        // Auto-generate slug from title if not manually edited
        if ($propertyName === 'title' && ! $this->slugManuallyEdited && empty($this->slug)) {
            $this->slug = Str::slug($this->title);
        }
    }

    public function generateSlug(): void
    {
        if (! empty($this->title)) {
            $this->slug = Str::slug($this->title);
            $this->slugManuallyEdited = false;
        }
    }

    public function updatedSlug(): void
    {
        $this->slugManuallyEdited = true;
    }

    public function save(CreatePostAction $createAction, UpdatePostAction $updateAction): void
    {
        // Generate slug if empty
        if (empty($this->slug) && ! empty($this->title)) {
            $this->slug = Str::slug($this->title);
        }

        // Normalize slug
        $this->slug = Str::slug($this->slug);

        $this->validate($this->rules, $this->messages);

        $data = [
            'author_id' => Auth::id(),
            'title' => $this->title,
            'slug' => $this->slug,
            'excerpt' => $this->excerpt,
            'content' => $this->content,
            'status' => $this->status,
            'published_at' => $this->published_at ? date('Y-m-d H:i:s', strtotime($this->published_at)) : null,
            'category_ids' => $this->category_ids,
            'meta_title' => $this->meta_title,
            'meta_description' => $this->meta_description,
        ];

        if ($this->postId) {
            $post = Post::findOrFail($this->postId);
            $updateAction->handle($post, $data);

            // Sync media - her zaman çağrılmalı (silinen resimlerin kontrolü için)
            // syncMedia metodu silinen resimleri de kontrol eder ve siler
            $this->syncMedia($post, disk: 'r2', storage_subpath: 'blog/library');

            $this->success('Yazı başarıyla güncellendi.');
        } else {
            $post = $createAction->handle($data);

            // Sync media if exists
            if (! empty($this->files) || ! $this->library->isEmpty()) {
                $this->syncMedia($post, disk: 'r2', storage_subpath: 'blog/library');
            }

            $this->success('Yazı başarıyla oluşturuldu.');
        }

        $this->redirect(route('admin.blog.posts.index'), navigate: true);
    }

    /**
     * Override syncMedia to fix doesntContain issue
     */
    public function syncMedia(
        \Illuminate\Database\Eloquent\Model $model,
        string $library = 'library',
        string $files = 'files',
        string $storage_subpath = '',
        $model_field = 'library',
        string $visibility = 'public',
        string $disk = 'r2'
    ): void {
        // Store new files
        foreach ($this->{$files} as $index => $file) {
            $media = $this->{$library}->get($index);
            if (! $media) {
                continue;
            }

            $name = $this->getFileName($media);
            if (! $name) {
                continue;
            }

            $filePath = \Illuminate\Support\Facades\Storage::disk($disk)->putFileAs($storage_subpath, $file, $name, $visibility);

            /** @var \Illuminate\Filesystem\FilesystemAdapter $storage */
            $storage = \Illuminate\Support\Facades\Storage::disk($disk);
            $url = $storage->url($filePath);

            // Update library
            $media['url'] = $url . '?updated_at=' . time();
            $media['path'] = str($storage_subpath)->finish('/')->append($name)->toString();
            $this->{$library} = $this->{$library}->replace([$index => $media]);
        }

        // Delete removed files from library
        $libraryUuids = $this->{$library}->pluck('uuid')->toArray();
        $diffs = $model->{$model_field}?->reject(fn($item) => \in_array($item['uuid'] ?? null, $libraryUuids, true)) ?? new \Illuminate\Support\Collection;

        foreach ($diffs as $diff) {
            if (isset($diff['path'])) {
                \Illuminate\Support\Facades\Storage::disk($disk)->delete($diff['path']);
            }
        }

        // Updates model
        $model->update([$model_field => $this->{$library}]);

        // Resets files
        $this->{$files} = [];
    }

    /**
     * Get file name from media array
     */
    private function getFileName(?array $media): ?string
    {
        $name = $media['uuid'] ?? null;
        if (! $name) {
            return null;
        }

        $extension = str($media['url'] ?? '')->afterLast('.')->before('?expires')->toString();
        if (empty($extension)) {
            $extension = 'jpg'; // Default extension
        }

        return "$name.$extension";
    }

    public function render()
    {
        $categories = PostCategory::orderBy('name')->get();

        return view('livewire.blog.admin.post-form', [
            'categories' => $categories,
        ]);
    }
}
