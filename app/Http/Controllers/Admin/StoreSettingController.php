<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\StoreSettingService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;

class StoreSettingController extends Controller
{
    public function __construct(
        private StoreSettingService $storeSettingService
    ) {}

    public function index(Request $request): Response
    {
        $group = $request->get('group', 'general');
        $settings = $this->storeSettingService->getByGroup($group);

        return Inertia::render('Admin/StoreSettings/Index', [
            'settings' => $settings,
            'group' => $group,
        ]);
    }

    public function update(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'settings' => ['required', 'array'],
            'group' => ['required', 'string'],
        ]);

        $this->storeSettingService->setMany(
            $validated['settings'],
            $validated['group']
        );

        return redirect()
            ->route('admin.store-settings.index', ['group' => $validated['group']])
            ->with('success', 'Ayarlar başarıyla güncellendi.');
    }
}
