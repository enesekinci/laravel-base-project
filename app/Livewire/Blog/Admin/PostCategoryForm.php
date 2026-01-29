<?php

declare(strict_types=1);

namespace App\Livewire\Blog\Admin;

use App\Services\Blog\PostCategoryService;
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

    protected function rules(): array
    {
        $rules = [
            'name' => ['required', 'string', 'max:255'],
            'slug' => ['required', 'string', 'max:255'],
        ];

        // Slug unique rule - edit durumunda mevcut kaydı ignore et
        if ($this->categoryId) {
            $rules['slug'][] = 'unique:post_categories,slug,' . $this->categoryId;
        } else {
            $rules['slug'][] = 'unique:post_categories,slug';
        }

        return $rules;
    }

    protected array $messages = [
        'name.required' => 'Kategori adı gereklidir.',
        'slug.required' => 'Slug gereklidir.',
        'slug.unique' => 'Bu slug zaten kullanılıyor.',
    ];

    protected PostCategoryService $service;

    public function boot(PostCategoryService $service): void
    {
        $this->service = $service;
    }

    public function mount(?int $id = null): void
    {
        $this->categoryId = $id;

        if ($this->categoryId) {
            $category = $this->service->findCategory($this->categoryId);

            if (! $category) {
                // Eğer kategori bulunamazsa listeye yönlendir
                $this->redirect(route('admin.blog.categories.index'), navigate: true);
                return;
            }

            $this->name = $category->name;
            $this->slug = $category->slug;
        }
    }

    public function updated(string $propertyName): void
    {
        $this->validateOnly($propertyName, $this->rules(), $this->messages);

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

        $this->validate($this->rules(), $this->messages);

        $data = new \App\DTO\Blog\PostCategoryData(
            name: $this->name,
            slug: $this->slug
        );

        if ($this->categoryId) {
            $this->service->updateCategory($this->categoryId, $data);
            $this->success('Kategori başarıyla güncellendi.');
        } else {
            $this->service->createCategory($data);
            $this->success('Kategori başarıyla oluşturuldu.');
        }

        $this->redirect(route('admin.blog.categories.index'), navigate: true);
    }

    public function render(): \Illuminate\Contracts\View\View
    {
        return view('livewire.blog.admin.post-category-form');
    }
}
