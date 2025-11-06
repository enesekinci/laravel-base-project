<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Newsletter;
use App\Services\NewsletterService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;

class NewsletterController extends Controller
{
    public function __construct(
        private NewsletterService $newsletterService
    ) {}

    public function index(): Response
    {
        $newsletters = $this->newsletterService->list(
            request()->only(['search', 'is_active', 'per_page'])
        );

        return Inertia::render('Admin/Newsletters/Index', [
            'newsletters' => $newsletters,
        ]);
    }

    public function show(Newsletter $newsletter): Response
    {
        return Inertia::render('Admin/Newsletters/Show', [
            'newsletter' => $newsletter,
        ]);
    }

    public function update(Request $request, Newsletter $newsletter): RedirectResponse
    {
        $validated = $request->validate([
            'is_active' => ['nullable', 'boolean'],
        ]);

        $this->newsletterService->update($newsletter, $validated);

        return redirect()
            ->route('admin.newsletters.index')
            ->with('success', 'E-bülten abonesi başarıyla güncellendi.');
    }

    public function destroy(Newsletter $newsletter): RedirectResponse
    {
        $this->newsletterService->delete($newsletter);

        return redirect()
            ->route('admin.newsletters.index')
            ->with('success', 'E-bülten abonesi başarıyla silindi.');
    }
}
