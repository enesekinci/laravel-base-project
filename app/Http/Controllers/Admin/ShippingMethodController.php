<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ShippingMethod;
use App\Services\ShippingMethodService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;

class ShippingMethodController extends Controller
{
    public function __construct(
        private ShippingMethodService $shippingMethodService
    ) {}

    public function index(): Response
    {
        $shippingMethods = $this->shippingMethodService->list(
            request()->only(['search', 'type', 'is_active', 'per_page'])
        );

        return Inertia::render('Admin/ShippingMethods/Index', [
            'shippingMethods' => $shippingMethods,
        ]);
    }

    public function create(): Response
    {
        return Inertia::render('Admin/ShippingMethods/Create');
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'code' => ['required', 'string', 'max:255', 'unique:shipping_methods,code'],
            'description' => ['nullable', 'string'],
            'type' => ['required', 'in:fixed,free,weight_based,price_based'],
            'cost' => ['nullable', 'numeric', 'min:0'],
            'config' => ['nullable', 'array'],
            'is_active' => ['nullable', 'boolean'],
            'sort_order' => ['nullable', 'integer', 'min:0'],
        ]);

        $this->shippingMethodService->create($validated);

        return redirect()
            ->route('admin.shipping-methods.index')
            ->with('success', 'Kargo yöntemi başarıyla oluşturuldu.');
    }

    public function show(ShippingMethod $shippingMethod): Response
    {
        return Inertia::render('Admin/ShippingMethods/Show', [
            'shippingMethod' => $shippingMethod,
        ]);
    }

    public function edit(ShippingMethod $shippingMethod): Response
    {
        return Inertia::render('Admin/ShippingMethods/Edit', [
            'shippingMethod' => $shippingMethod,
        ]);
    }

    public function update(Request $request, ShippingMethod $shippingMethod): RedirectResponse
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'code' => ['required', 'string', 'max:255', 'unique:shipping_methods,code,' . $shippingMethod->id],
            'description' => ['nullable', 'string'],
            'type' => ['required', 'in:fixed,free,weight_based,price_based'],
            'cost' => ['nullable', 'numeric', 'min:0'],
            'config' => ['nullable', 'array'],
            'is_active' => ['nullable', 'boolean'],
            'sort_order' => ['nullable', 'integer', 'min:0'],
        ]);

        $this->shippingMethodService->update($shippingMethod, $validated);

        return redirect()
            ->route('admin.shipping-methods.index')
            ->with('success', 'Kargo yöntemi başarıyla güncellendi.');
    }

    public function destroy(ShippingMethod $shippingMethod): RedirectResponse
    {
        $this->shippingMethodService->delete($shippingMethod);

        return redirect()
            ->route('admin.shipping-methods.index')
            ->with('success', 'Kargo yöntemi başarıyla silindi.');
    }
}
