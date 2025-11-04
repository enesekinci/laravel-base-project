<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreTaxClassRequest;
use App\Http\Requests\UpdateTaxClassRequest;
use App\Models\TaxClass;
use App\Services\TaxClassService;
use Illuminate\Http\RedirectResponse;
use Inertia\Inertia;
use Inertia\Response;

class TaxClassController extends Controller
{
    public function __construct(
        private TaxClassService $taxClassService
    ) {}

    /**
     * Display a listing of the resource.
     */
    public function index(): Response
    {
        $taxClasses = $this->taxClassService->list(
            request()->only(['search', 'is_active', 'per_page'])
        );

        return Inertia::render('Admin/TaxClasses/Index', [
            'taxClasses' => $taxClasses,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): Response
    {
        return Inertia::render('Admin/TaxClasses/Create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTaxClassRequest $request): RedirectResponse
    {
        $taxClass = $this->taxClassService->create($request->validated());

        return redirect()
            ->route('admin.tax-classes.index')
            ->with('success', 'Vergi sınıfı başarıyla oluşturuldu.');
    }

    /**
     * Display the specified resource.
     */
    public function show(TaxClass $taxClass): Response
    {
        return Inertia::render('Admin/TaxClasses/Show', [
            'taxClass' => $taxClass,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(TaxClass $taxClass): Response
    {
        return Inertia::render('Admin/TaxClasses/Edit', [
            'taxClass' => $taxClass,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(
        UpdateTaxClassRequest $request,
        TaxClass $taxClass
    ): RedirectResponse {
        $this->taxClassService->update($taxClass, $request->validated());

        return redirect()
            ->route('admin.tax-classes.index')
            ->with('success', 'Vergi sınıfı başarıyla güncellendi.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(TaxClass $taxClass): RedirectResponse
    {
        $this->taxClassService->delete($taxClass);

        return redirect()
            ->route('admin.tax-classes.index')
            ->with('success', 'Vergi sınıfı başarıyla silindi.');
    }
}
