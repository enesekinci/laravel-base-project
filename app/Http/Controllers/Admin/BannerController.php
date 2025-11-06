<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use App\Services\BannerService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;

class BannerController extends Controller
{
    public function __construct(
        private BannerService $bannerService
    ) {}

    public function index(): Response
    {
        $banners = $this->bannerService->list(
            request()->only(['search', 'position', 'is_active', 'per_page'])
        );

        return Inertia::render('Admin/Banners/Index', [
            'banners' => $banners,
        ]);
    }

    public function create(): Response
    {
        return Inertia::render('Admin/Banners/Create');
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'description' => ['nullable', 'string'],
            'image' => ['required', 'string'],
            'link' => ['nullable', 'string'],
            'position' => ['nullable', 'string', 'max:255'],
            'sort_order' => ['nullable', 'integer', 'min:0'],
            'is_active' => ['nullable', 'boolean'],
        ]);

        $this->bannerService->create($validated);

        return redirect()
            ->route('admin.banners.index')
            ->with('success', 'Banner başarıyla oluşturuldu.');
    }

    public function show(Banner $banner): Response
    {
        return Inertia::render('Admin/Banners/Show', [
            'banner' => $banner,
        ]);
    }

    public function edit(Banner $banner): Response
    {
        return Inertia::render('Admin/Banners/Edit', [
            'banner' => $banner,
        ]);
    }

    public function update(Request $request, Banner $banner): RedirectResponse
    {
        $validated = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'description' => ['nullable', 'string'],
            'image' => ['required', 'string'],
            'link' => ['nullable', 'string'],
            'position' => ['nullable', 'string', 'max:255'],
            'sort_order' => ['nullable', 'integer', 'min:0'],
            'is_active' => ['nullable', 'boolean'],
        ]);

        $this->bannerService->update($banner, $validated);

        return redirect()
            ->route('admin.banners.index')
            ->with('success', 'Banner başarıyla güncellendi.');
    }

    public function destroy(Banner $banner): RedirectResponse
    {
        $this->bannerService->delete($banner);

        return redirect()
            ->route('admin.banners.index')
            ->with('success', 'Banner başarıyla silindi.');
    }
}
