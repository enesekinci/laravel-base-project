<?php

declare(strict_types=1);

namespace App\Livewire\Blog\Admin;

use App\Models\Blog\PostCategory;
use Illuminate\Support\Str;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Mary\Traits\Toast;

#[Layout('admin.layouts.app')]
class PostCategoryForm extends Component
{
    use Toast;

    public ?int $categoryId = null;

    public string $name = '';

    public string $slug = '';

    public bool $slugManuallyEdited = false;

    protected array $rules = [
        'name' => ['required', 'string', 'max:255'],
        'slug' => ['required', 'string', 'max:255', 'unique:post_categories,slug'],
    ];

    protected array $messages = [
        'name.required' => 'Kategori adı gereklidir.',
        'slug.required' => 'Slug gereklidir.',
        'slug.unique' => 'Bu slug zaten kullanılıyor.',
    ];

    public function mount(?int $id = null): void
    {
        $this->categoryId = $id;

        if ($this->categoryId) {
            $category = PostCategory::findOrFail($this->categoryId);
            $this->name = $category->name;
            $this->slug = $category->slug;

            // Update unique rule for edit
            $this->rules['slug'] = ['required', 'string', 'max:255', 'unique:post_categories,slug,'.$this->categoryId];
        }
    }

    public function updated($propertyName): void
    {
        $this->validateOnly($propertyName);

        // Auto-generate slug from name if not manually edited
        if ($propertyName === 'name' && ! $this->slugManuallyEdited && empty($this->slug)) {
            $this->slug = Str::slug($this->name);
        }
    }

    public function generateSlug(): void
    {
        if (! empty($this->name)) {
            $this->slug = Str::slug($this->name);
            $this->slugManuallyEdited = false;
        }
    }

    public function updatedSlug(): void
    {
        $this->slugManuallyEdited = true;
    }

    public function save(): void
    {
        // Generate slug if empty
        if (empty($this->slug) && ! empty($this->name)) {
            $this->slug = Str::slug($this->name);
        }

        // Normalize slug
        $this->slug = Str::slug($this->slug);

        $this->validate($this->rules, $this->messages);

        $data = [
            'name' => $this->name,
            'slug' => $this->slug,
        ];

        if ($this->categoryId) {
            $category = PostCategory::findOrFail($this->categoryId);
            $category->update($data);
            $this->success('Kategori başarıyla güncellendi.');
        } else {
            PostCategory::create($data);
            $this->success('Kategori başarıyla oluşturuldu.');
        }

        $this->redirect(route('admin.blog.categories.index'), navigate: true);
    }

    public function render()
    {
        return view('livewire.blog.admin.post-category-form');
    }
}
