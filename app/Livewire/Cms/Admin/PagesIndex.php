<?php

declare(strict_types=1);

namespace App\Livewire\Cms\Admin;

use App\Models\Cms\Page;
use Illuminate\Contracts\View\View;
use Livewire\Component;
use Livewire\WithPagination;

class PagesIndex extends Component
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
            ['key' => 'slug', 'label' => 'Slug'],
            ['key' => 'is_active', 'label' => 'Durum'],
            ['key' => 'created_at', 'label' => 'Oluşturulma'],
            ['key' => 'actions', 'label' => 'İşlemler', 'class' => 'w-24'],
        ];
    }

    public function render(): View
    {
        $pages = Page::query()
            ->when($this->search, function ($query) {
                $query->where('title', 'like', '%'.$this->search.'%')
                    ->orWhere('slug', 'like', '%'.$this->search.'%');
            })
            ->orderBy('created_at', 'desc')
            ->paginate(15);

        return view('livewire.cms.admin.pages-index', [
            'pages' => $pages,
        ]);
    }

    public function delete(int $pageId): void
    {
        $page = Page::findOrFail($pageId);
        $page->delete();

        $this->dispatch('toast', message: 'Sayfa başarıyla silindi.', type: 'success');
    }
}
