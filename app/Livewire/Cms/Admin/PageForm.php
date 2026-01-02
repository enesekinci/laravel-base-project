<?php

declare(strict_types=1);

namespace App\Livewire\Cms\Admin;

use App\Actions\Cms\CreatePageAction;
use App\Actions\Cms\UpdatePageAction;
use App\Models\Cms\Page;
use Illuminate\Support\Str;
use Livewire\Component;
use Livewire\WithFileUploads;
use Mary\Traits\Toast;
use Mary\Traits\WithMediaSync;

class PageForm extends Component
{
    use Toast, WithFileUploads, WithMediaSync;

    public ?int $pageId = null;

    public string $title = '';

    public string $slug = '';

    public ?string $content = null;

    public bool $is_active = true;

    public bool $show_in_footer = false;

    public ?string $meta_title = null;

    public ?string $meta_description = null;

    public bool $slugManuallyEdited = false;

    // Media
    public array $files = [];

    public \Illuminate\Support\Collection $library;

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
        $this->library = new \Illuminate\Support\Collection;

        if ($this->pageId) {
            $page = Page::findOrFail($this->pageId);
            $this->title = $page->title;
            $this->slug = $page->slug;
            $this->content = $page->content;
            $this->is_active = $page->is_active ?? true;
            $this->show_in_footer = $page->show_in_footer ?? false;
            $this->meta_title = $page->meta_title;
            $this->meta_description = $page->meta_description;

            // Load existing media library if exists
            $this->library = $page->library ?? new \Illuminate\Support\Collection;
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

            // Sync media - her zaman çağrılmalı (silinen resimlerin kontrolü için)
            $this->syncMedia($page, disk: 'r2', storage_subpath: 'cms/library');

            $this->success('Sayfa başarıyla güncellendi.');
        } else {
            $page = $createAction->handle($data);

            // Sync media if exists
            if (! empty($this->files) || ! $this->library->isEmpty()) {
                $this->syncMedia($page, disk: 'r2', storage_subpath: 'cms/library');
            }

            $this->success('Sayfa başarıyla oluşturuldu.');
        }

        $this->redirect(route('admin.cms.pages.index'), navigate: true);
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
            $media['url'] = $url.'?updated_at='.time();
            $media['path'] = str($storage_subpath)->finish('/')->append($name)->toString();
            $this->{$library} = $this->{$library}->replace([$index => $media]);
        }

        // Delete removed files from library
        $libraryUuids = $this->{$library}->pluck('uuid')->toArray();
        $diffs = $model->{$model_field}?->reject(fn ($item) => \in_array($item['uuid'] ?? null, $libraryUuids, true)) ?? new \Illuminate\Support\Collection;

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
        return view('livewire.cms.admin.page-form');
    }
}
