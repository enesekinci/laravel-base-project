<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CustomerRepresentative;
use App\Services\CustomerRepresentativeService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;

class CustomerRepresentativeController extends Controller
{
    public function __construct(
        private CustomerRepresentativeService $customerRepresentativeService
    ) {}

    /**
     * Display a listing of the resource.
     */
    public function index(): Response
    {
        $representatives = $this->customerRepresentativeService->list(request()->only(['search', 'customer_id', 'per_page']));

        return Inertia::render('Admin/CustomerRepresentatives/Index', [
            'representatives' => $representatives,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): Response
    {
        $customers = \App\Models\Customer::query()
            ->select('id', 'name', 'email')
            ->orderBy('name')
            ->get();

        return Inertia::render('Admin/CustomerRepresentatives/Create', [
            'customers' => $customers,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'customer_id' => ['required', 'exists:customers,id'],
            'name' => ['required', 'string', 'max:255'],
            'email' => ['nullable', 'string', 'email', 'max:255'],
            'phone' => ['nullable', 'string', 'max:255'],
            'notes' => ['nullable', 'string'],
            'is_active' => ['nullable', 'boolean'],
        ]);

        $representative = $this->customerRepresentativeService->create($validated);

        return redirect()
            ->route('admin.customer-representatives.index')
            ->with('success', 'Temsilci başarıyla oluşturuldu.');
    }

    /**
     * Display the specified resource.
     */
    public function show(CustomerRepresentative $customerRepresentative): Response
    {
        $customerRepresentative->load('customer');

        return Inertia::render('Admin/CustomerRepresentatives/Show', [
            'representative' => $customerRepresentative,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(CustomerRepresentative $customerRepresentative): Response
    {
        $customerRepresentative->load('customer');

        $customers = \App\Models\Customer::query()
            ->select('id', 'name', 'email')
            ->orderBy('name')
            ->get();

        return Inertia::render('Admin/CustomerRepresentatives/Edit', [
            'representative' => $customerRepresentative,
            'customers' => $customers,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, CustomerRepresentative $customerRepresentative): RedirectResponse
    {
        $validated = $request->validate([
            'customer_id' => ['required', 'exists:customers,id'],
            'name' => ['required', 'string', 'max:255'],
            'email' => ['nullable', 'string', 'email', 'max:255'],
            'phone' => ['nullable', 'string', 'max:255'],
            'notes' => ['nullable', 'string'],
            'is_active' => ['nullable', 'boolean'],
        ]);

        $this->customerRepresentativeService->update($customerRepresentative, $validated);

        return redirect()
            ->route('admin.customer-representatives.index')
            ->with('success', 'Temsilci başarıyla güncellendi.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(CustomerRepresentative $customerRepresentative): RedirectResponse
    {
        $this->customerRepresentativeService->delete($customerRepresentative);

        return redirect()
            ->route('admin.customer-representatives.index')
            ->with('success', 'Temsilci başarıyla silindi.');
    }
}
