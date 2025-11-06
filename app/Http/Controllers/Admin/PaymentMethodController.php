<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PaymentMethod;
use App\Services\PaymentMethodService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;

class PaymentMethodController extends Controller
{
    public function __construct(
        private PaymentMethodService $paymentMethodService
    ) {}

    public function index(): Response
    {
        $paymentMethods = $this->paymentMethodService->list(
            request()->only(['search', 'is_active', 'per_page'])
        );

        return Inertia::render('Admin/PaymentMethods/Index', [
            'paymentMethods' => $paymentMethods,
        ]);
    }

    public function create(): Response
    {
        return Inertia::render('Admin/PaymentMethods/Create');
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'code' => ['required', 'string', 'max:255', 'unique:payment_methods,code'],
            'description' => ['nullable', 'string'],
            'config' => ['nullable', 'array'],
            'is_active' => ['nullable', 'boolean'],
            'sort_order' => ['nullable', 'integer', 'min:0'],
        ]);

        $this->paymentMethodService->create($validated);

        return redirect()
            ->route('admin.payment-methods.index')
            ->with('success', 'Ödeme yöntemi başarıyla oluşturuldu.');
    }

    public function show(PaymentMethod $paymentMethod): Response
    {
        return Inertia::render('Admin/PaymentMethods/Show', [
            'paymentMethod' => $paymentMethod,
        ]);
    }

    public function edit(PaymentMethod $paymentMethod): Response
    {
        return Inertia::render('Admin/PaymentMethods/Edit', [
            'paymentMethod' => $paymentMethod,
        ]);
    }

    public function update(Request $request, PaymentMethod $paymentMethod): RedirectResponse
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'code' => ['required', 'string', 'max:255', 'unique:payment_methods,code,' . $paymentMethod->id],
            'description' => ['nullable', 'string'],
            'config' => ['nullable', 'array'],
            'is_active' => ['nullable', 'boolean'],
            'sort_order' => ['nullable', 'integer', 'min:0'],
        ]);

        $this->paymentMethodService->update($paymentMethod, $validated);

        return redirect()
            ->route('admin.payment-methods.index')
            ->with('success', 'Ödeme yöntemi başarıyla güncellendi.');
    }

    public function destroy(PaymentMethod $paymentMethod): RedirectResponse
    {
        $this->paymentMethodService->delete($paymentMethod);

        return redirect()
            ->route('admin.payment-methods.index')
            ->with('success', 'Ödeme yöntemi başarıyla silindi.');
    }
}
