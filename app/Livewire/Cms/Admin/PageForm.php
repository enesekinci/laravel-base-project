<?php

declare(strict_types=1);

namespace App\Livewire\Cms\Admin;

use App\Actions\Cms\CreatePageAction;
use App\Actions\Cms\UpdatePageAction;
use App\Models\Cms\Page;
use Illuminate\Support\Str;
use Livewire\Component;
use Mary\Traits\Toast;

class PageForm extends Component
{
    use Toast;

    public ?int $pageId = null;

    public string $title = '';

    public string $slug = '';

    public ?string $content = null;

    public bool $is_active = true;

    public bool $show_in_footer = false;

    public ?string $meta_title = null;

    public ?string $meta_description = null;

    public bool $slugManuallyEdited = false;

    protected array $rules = [
        'title' => ['required', 'string', 'max:255'],
        'slug' => ['required', 'string', 'max:255'],
        'content' => ['nullable', 'string'],
        'is_active' => ['boolean'],
        'show_in_footer' => ['boolean'],
        'meta_title' => ['nullable', 'string', 'max:255'],
        'meta_description' => ['nullable', 'string', 'max:500'],
    ];

    protected array $messages = [
        'title.required' => 'Başlık gereklidir.',
        'slug.required' => 'Slug gereklidir.',
    ];

    public function mount(?int $id = null): void
    {
        $this->pageId = $id;

        if ($this->pageId) {
            $page = Page::findOrFail($this->pageId);
            $this->title = $page->title;
            $this->slug = $page->slug;
            $this->content = $page->content;
            $this->is_active = $page->is_active ?? true;
            $this->show_in_footer = $page->show_in_footer ?? false;
            $this->meta_title = $page->meta_title;
            $this->meta_description = $page->meta_description;
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

    public function save(CreatePageAction $createAction, UpdatePageAction $updateAction): void
    {
        // Generate slug if empty
        if (empty($this->slug) && ! empty($this->title)) {
            $this->slug = Str::slug($this->title);
        }

        // Normalize slug
        $this->slug = Str::slug($this->slug);

        $this->validate($this->rules, $this->messages);

        $data = [
            'title' => $this->title,
            'slug' => $this->slug,
            'content' => $this->content,
            'is_active' => $this->is_active,
            'show_in_footer' => $this->show_in_footer,
            'meta_title' => $this->meta_title,
            'meta_description' => $this->meta_description,
        ];

        if ($this->pageId) {
            $page = Page::findOrFail($this->pageId);
            $updateAction->handle($page, $data);
            $this->success('Sayfa başarıyla güncellendi.');
        } else {
            $createAction->handle($data);
            $this->success('Sayfa başarıyla oluşturuldu.');
        }

        $this->redirect(route('admin.cms.pages.index'), navigate: true);
    }

    public function render()
    {
        return view('livewire.cms.admin.page-form');
    }
}
