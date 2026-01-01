<?php

declare(strict_types=1);

namespace App\Livewire\Blog\Admin;

use App\Models\Blog\Post;
use Illuminate\Contracts\View\View;
use Livewire\Component;
use Livewire\WithPagination;

class PostsIndex extends Component
{
    use WithPagination;

    public string $search = '';

    public function mount(): void
    {
        //
    }

    public function updatingSearch(): void
    {
        $this->resetPage();
    }

    public function getHeadersProperty(): array
    {
        return [
            ['key' => 'id', 'label' => 'ID', 'class' => 'w-16'],
            ['key' => 'title', 'label' => 'Başlık'],
            ['key' => 'status', 'label' => 'Durum'],
            ['key' => 'author', 'label' => 'Yazar'],
            ['key' => 'created_at', 'label' => 'Oluşturulma'],
            ['key' => 'actions', 'label' => 'İşlemler', 'class' => 'w-24'],
        ];
    }

    public function render(): View
    {
        $posts = Post::query()
            ->with('author')
            ->when($this->search, function ($query) {
                $query->where('title', 'like', '%'.$this->search.'%')
                    ->orWhere('slug', 'like', '%'.$this->search.'%');
            })
            ->orderBy('created_at', 'desc')
            ->paginate(15);

        return view('livewire.blog.admin.posts-index', [
            'posts' => $posts,
        ]);
    }

    public function delete(int $postId): void
    {
        $post = Post::findOrFail($postId);
        $post->delete();

        $this->dispatch('toast', message: 'Yazı başarıyla silindi.', type: 'success');
    }
}
