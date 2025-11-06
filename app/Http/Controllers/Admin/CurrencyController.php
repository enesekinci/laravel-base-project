<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Currency;
use App\Services\CurrencyService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;

class CurrencyController extends Controller
{
    public function __construct(
        private CurrencyService $currencyService
    ) {}

    public function index(): Response
    {
        $currencies = $this->currencyService->list(
            request()->only(['search', 'is_active', 'per_page'])
        );

        return Inertia::render('Admin/Currencies/Index', [
            'currencies' => $currencies,
        ]);
    }

    public function create(): Response
    {
        return Inertia::render('Admin/Currencies/Create');
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'code' => ['required', 'string', 'size:3', 'unique:currencies,code'],
            'symbol' => ['required', 'string', 'max:10'],
            'exchange_rate' => ['required', 'numeric', 'min:0'],
            'is_default' => ['nullable', 'boolean'],
            'is_active' => ['nullable', 'boolean'],
            'sort_order' => ['nullable', 'integer', 'min:0'],
        ]);

        $this->currencyService->create($validated);

        return redirect()
            ->route('admin.currencies.index')
            ->with('success', 'Para birimi başarıyla oluşturuldu.');
    }

    public function show(Currency $currency): Response
    {
        return Inertia::render('Admin/Currencies/Show', [
            'currency' => $currency,
        ]);
    }

    public function edit(Currency $currency): Response
    {
        return Inertia::render('Admin/Currencies/Edit', [
            'currency' => $currency,
        ]);
    }

    public function update(Request $request, Currency $currency): RedirectResponse
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'code' => ['required', 'string', 'size:3', 'unique:currencies,code,' . $currency->id],
            'symbol' => ['required', 'string', 'max:10'],
            'exchange_rate' => ['required', 'numeric', 'min:0'],
            'is_default' => ['nullable', 'boolean'],
            'is_active' => ['nullable', 'boolean'],
            'sort_order' => ['nullable', 'integer', 'min:0'],
        ]);

        $this->currencyService->update($currency, $validated);

        return redirect()
            ->route('admin.currencies.index')
            ->with('success', 'Para birimi başarıyla güncellendi.');
    }

    public function destroy(Currency $currency): RedirectResponse
    {
        $this->currencyService->delete($currency);

        return redirect()
            ->route('admin.currencies.index')
            ->with('success', 'Para birimi başarıyla silindi.');
    }
}
