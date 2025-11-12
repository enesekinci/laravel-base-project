<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\UpdateTopNoticeRequest;
use App\Services\StoreSettingService;
use Illuminate\Http\RedirectResponse;
use Inertia\Inertia;
use Inertia\Response;

class TopNoticeController extends Controller
{
    public function __construct(
        private StoreSettingService $storeSettingService
    ) {}

    public function edit(): Response
    {
        $topNotice = $this->getTopNoticeData();

        return Inertia::render('Admin/TopNotice/Edit', [
            'topNotice' => $topNotice,
        ]);
    }

    public function update(UpdateTopNoticeRequest $request): RedirectResponse
    {
        $validated = $request->validated();

        // JSON olarak sakla
        $this->storeSettingService->set(
            'top_notice',
            json_encode($validated),
            'design'
        );

        return redirect()
            ->route('admin.top-notice.edit')
            ->with('success', 'Top notice başarıyla güncellendi.');
    }

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
                ['label' => 'MEN', 'url' => '/porto/demo1-shop.html'],
                ['label' => 'WOMEN', 'url' => '/porto/demo1-shop.html'],
            ],
            'footer_text' => '* Limited time only.',
            'is_active' => false,
            'background_color' => 'bg-dark',
            'text_color' => 'text-white',
        ];
    }
}
