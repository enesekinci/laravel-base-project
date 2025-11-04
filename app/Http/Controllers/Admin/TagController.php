<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreTagRequest;
use App\Http\Requests\UpdateTagRequest;
use App\Models\Tag;
use App\Services\TagService;
use Illuminate\Http\RedirectResponse;
use Inertia\Inertia;
use Inertia\Response;

class TagController extends Controller
{
    public function __construct(
        private TagService $tagService
    ) {}

    /**
     * Display a listing of the resource.
     */
    public function index(): Response
    {
        $tags = $this->tagService->list(request()->only(['search', 'is_active', 'per_page']));

        return Inertia::render('Admin/Tags/Index', [
            'tags' => $tags,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): Response
    {
        return Inertia::render('Admin/Tags/Create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTagRequest $request): RedirectResponse
    {
        $tag = $this->tagService->create($request->validated());

        return redirect()
            ->route('admin.tags.index')
            ->with('success', 'Etiket başarıyla oluşturuldu.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Tag $tag): Response
    {
        return Inertia::render('Admin/Tags/Show', [
            'tag' => $tag,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Tag $tag): Response
    {
        return Inertia::render('Admin/Tags/Edit', [
            'tag' => $tag,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTagRequest $request, Tag $tag): RedirectResponse
    {
        $this->tagService->update($tag, $request->validated());

        return redirect()
            ->route('admin.tags.index')
            ->with('success', 'Etiket başarıyla güncellendi.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Tag $tag): RedirectResponse
    {
        $this->tagService->delete($tag);

        return redirect()
            ->route('admin.tags.index')
            ->with('success', 'Etiket başarıyla silindi.');
    }
}
