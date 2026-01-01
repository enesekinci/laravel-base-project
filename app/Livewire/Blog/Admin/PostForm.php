<?php

declare(strict_types=1);

namespace App\Livewire\Blog\Admin;

use App\Actions\Blog\CreatePostAction;
use App\Actions\Blog\UpdatePostAction;
use App\Models\Blog\Post;
use App\Models\Blog\PostCategory;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Mary\Traits\Toast;

class PostForm extends Component
{
    use Toast;

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
        }
    }

    public function updated($propertyName): void
    {
        $this->validateOnly($propertyName);
    }

    public function save(CreatePostAction $createAction, UpdatePostAction $updateAction): void
    {
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
            $this->success('Yazı başarıyla güncellendi.');
        } else {
            $createAction->handle($data);
            $this->success('Yazı başarıyla oluşturuldu.');
        }

        $this->redirect(route('admin.blog.posts.index'), navigate: true);
    }

    public function render()
    {
        $categories = PostCategory::orderBy('name')->get();

        return view('livewire.blog.admin.post-form', [
            'categories' => $categories,
        ]);
    }
}
