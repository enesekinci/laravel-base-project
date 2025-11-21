<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\UpdateTopNoticeRequest;
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

    /**
     * Top notice düzenleme sayfası
     */
    public function editTopNotice(): Response
    {
        $topNotice = $this->getTopNoticeData();

        return Inertia::render('Admin/TopNotice/Edit', [
            'topNotice' => $topNotice,
        ]);
    }

    /**
     * Top notice güncelleme
     */
    public function updateTopNotice(UpdateTopNoticeRequest $request): RedirectResponse
    {
        $validated = $request->validated();

        // JSON olarak sakla
        $this->storeSettingService->set(
            'top_notice',
            json_encode($validated),
            'design'
        );

        return redirect()
            ->route('admin.store-settings.top-notice.edit')
            ->with('success', 'Top notice başarıyla güncellendi.');
    }

    /**
     * Top notice verilerini döndürür
     */
    private function getTopNoticeData(): array
    {
        $data = $this->storeSettingService->get('top_notice');

        if ($data) {
            $decoded = json_decode($data, true);
            if (json_last_error() === JSON_ERROR_NONE) {
                return $decoded;
            }
        }

        // Varsayılan değerler
        return [
            'text' => 'Get Up to <b>40% OFF</b> New-Season Styles',
            'links' => [
                ['label' => 'MEN', 'url' => route('page', ['page' => 'shop'])],
                ['label' => 'WOMEN', 'url' => route('page', ['page' => 'shop'])],
            ],
            'footer_text' => '* Limited time only.',
            'is_active' => false,
            'background_color' => 'bg-dark',
            'text_color' => 'text-white',
        ];
    }
}
