<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Menu;
use App\Services\MenuService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;

class MenuController extends Controller
{
    public function __construct(
        private MenuService $menuService
    ) {}

    public function index(): Response
    {
        $menus = $this->menuService->list(
            request()->only(['search', 'location', 'is_active', 'per_page'])
        );

        return Inertia::render('Admin/Menus/Index', [
            'menus' => $menus,
        ]);
    }

    public function create(): Response
    {
        return Inertia::render('Admin/Menus/Create');
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'location' => ['nullable', 'string', 'max:255'],
            'items' => ['required', 'array'],
            'is_active' => ['nullable', 'boolean'],
        ]);

        $this->menuService->create($validated);

        return redirect()
            ->route('admin.menus.index')
            ->with('success', 'Menü başarıyla oluşturuldu.');
    }

    public function show(Menu $menu): Response
    {
        return Inertia::render('Admin/Menus/Show', [
            'menu' => $menu,
        ]);
    }

    public function edit(Menu $menu): Response
    {
        return Inertia::render('Admin/Menus/Edit', [
            'menu' => $menu,
        ]);
    }

    public function update(Request $request, Menu $menu): RedirectResponse
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'location' => ['nullable', 'string', 'max:255'],
            'items' => ['required', 'array'],
            'is_active' => ['nullable', 'boolean'],
        ]);

        $this->menuService->update($menu, $validated);

        return redirect()
            ->route('admin.menus.index')
            ->with('success', 'Menü başarıyla güncellendi.');
    }

    public function destroy(Menu $menu): RedirectResponse
    {
        $this->menuService->delete($menu);

        return redirect()
            ->route('admin.menus.index')
            ->with('success', 'Menü başarıyla silindi.');
    }
}
