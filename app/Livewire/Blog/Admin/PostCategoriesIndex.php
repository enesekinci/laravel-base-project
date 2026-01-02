<?php

declare(strict_types=1);

namespace App\Livewire\Blog\Admin;

use App\Models\Blog\PostCategory;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Livewire\WithPagination;
use Mary\Traits\Toast;

#[Layout('admin.layouts.app')]
class PostCategoriesIndex extends Component
{
    use Toast, WithPagination;

    public string $search = '';

    public function updatingSearch(): void
    {
        $this->resetPage();
    }

    public function getHeadersProperty(): array
    {
        return [
            ['key' => 'id', 'label' => 'ID', 'class' => 'w-16'],
            ['key' => 'name', 'label' => 'Ad'],
            ['key' => 'slug', 'label' => 'Slug'],
            ['key' => 'posts_count', 'label' => 'Yazı Sayısı'],
            ['key' => 'created_at', 'label' => 'Oluşturulma'],
            ['key' => 'actions', 'label' => 'İşlemler', 'class' => 'w-24'],
        ];
    }

    public function render()
    {
        $categories = PostCategory::query()
            ->withCount('posts')
            ->when($this->search, function ($query) {
                $query->where('name', 'like', '%' . $this->search . '%')
                    ->orWhere('slug', 'like', '%' . $this->search . '%');
            })
            ->orderBy('name')
            ->paginate(10);

        return view('livewire.blog.admin.post-categories-index', [
            'categories' => $categories,
        ]);
    }

    public function delete(int $categoryId): void
    {
        $category = PostCategory::findOrFail($categoryId);
        $category->delete();

        $this->success('Kategori başarıyla silindi.');
    }
}
