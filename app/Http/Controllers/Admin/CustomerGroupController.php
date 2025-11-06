<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CustomerGroup;
use App\Services\CustomerGroupService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;

class CustomerGroupController extends Controller
{
    public function __construct(
        private CustomerGroupService $customerGroupService
    ) {}

    /**
     * Display a listing of the resource.
     */
    public function index(): Response
    {
        $customerGroups = $this->customerGroupService->list(request()->only(['search', 'is_active', 'per_page']));

        return Inertia::render('Admin/CustomerGroups/Index', [
            'customerGroups' => $customerGroups,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): Response
    {
        return Inertia::render('Admin/CustomerGroups/Create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'slug' => ['nullable', 'string', 'max:255', 'unique:customer_groups,slug'],
            'description' => ['nullable', 'string'],
            'is_active' => ['nullable', 'boolean'],
        ]);

        $customerGroup = $this->customerGroupService->create($validated);

        return redirect()
            ->route('admin.customer-groups.index')
            ->with('success', 'Müşteri grubu başarıyla oluşturuldu.');
    }

    /**
     * Display the specified resource.
     */
    public function show(CustomerGroup $customerGroup): Response
    {
        $customerGroup->load('customers');

        return Inertia::render('Admin/CustomerGroups/Show', [
            'customerGroup' => $customerGroup,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(CustomerGroup $customerGroup): Response
    {
        return Inertia::render('Admin/CustomerGroups/Edit', [
            'customerGroup' => $customerGroup,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, CustomerGroup $customerGroup): RedirectResponse
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'slug' => ['nullable', 'string', 'max:255', 'unique:customer_groups,slug,' . $customerGroup->id],
            'description' => ['nullable', 'string'],
            'is_active' => ['nullable', 'boolean'],
        ]);

        $this->customerGroupService->update($customerGroup, $validated);

        return redirect()
            ->route('admin.customer-groups.index')
            ->with('success', 'Müşteri grubu başarıyla güncellendi.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(CustomerGroup $customerGroup): RedirectResponse
    {
        $this->customerGroupService->delete($customerGroup);

        return redirect()
            ->route('admin.customer-groups.index')
            ->with('success', 'Müşteri grubu başarıyla silindi.');
    }
}
