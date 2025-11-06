<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use App\Services\CustomerService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;

class CustomerController extends Controller
{
    public function __construct(
        private CustomerService $customerService
    ) {}

    /**
     * Display a listing of the resource.
     */
    public function index(): Response
    {
        $customers = $this->customerService->list(request()->only(['search', 'per_page']));

        return Inertia::render('Admin/Customers/Index', [
            'customers' => $customers,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): Response
    {
        $customerGroups = app(\App\Services\CustomerGroupService::class)->all();

        return Inertia::render('Admin/Customers/Create', [
            'customerGroups' => $customerGroups,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:customers,email'],
            'phone' => ['nullable', 'string', 'max:255'],
            'address' => ['nullable', 'string'],
            'city' => ['nullable', 'string', 'max:255'],
            'country' => ['nullable', 'string', 'max:255'],
            'postal_code' => ['nullable', 'string', 'max:255'],
            'is_active' => ['nullable', 'boolean'],
            'group_ids' => ['nullable', 'array'],
            'group_ids.*' => ['exists:customer_groups,id'],
        ]);

        $customer = $this->customerService->create($validated);

        return redirect()
            ->route('admin.customers.index')
            ->with('success', 'Müşteri başarıyla oluşturuldu.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Customer $customer): Response
    {
        $customer->load('groups', 'representatives');

        return Inertia::render('Admin/Customers/Show', [
            'customer' => $customer,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Customer $customer): Response
    {
        $customer->load('groups');
        $customerGroups = app(\App\Services\CustomerGroupService::class)->all();

        return Inertia::render('Admin/Customers/Edit', [
            'customer' => $customer,
            'customerGroups' => $customerGroups,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Customer $customer): RedirectResponse
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:customers,email,' . $customer->id],
            'phone' => ['nullable', 'string', 'max:255'],
            'address' => ['nullable', 'string'],
            'city' => ['nullable', 'string', 'max:255'],
            'country' => ['nullable', 'string', 'max:255'],
            'postal_code' => ['nullable', 'string', 'max:255'],
            'is_active' => ['nullable', 'boolean'],
            'group_ids' => ['nullable', 'array'],
            'group_ids.*' => ['exists:customer_groups,id'],
        ]);

        $this->customerService->update($customer, $validated);

        return redirect()
            ->route('admin.customers.index')
            ->with('success', 'Müşteri başarıyla güncellendi.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Customer $customer): RedirectResponse
    {
        $this->customerService->delete($customer);

        return redirect()
            ->route('admin.customers.index')
            ->with('success', 'Müşteri başarıyla silindi.');
    }
}
