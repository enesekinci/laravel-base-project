<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreMannequinRequest;
use App\Http\Requests\UpdateMannequinRequest;
use App\Models\Mannequin;
use App\Services\MannequinService;
use Illuminate\Http\RedirectResponse;
use Inertia\Inertia;
use Inertia\Response;

class MannequinController extends Controller
{
    public function __construct(
        private MannequinService $mannequinService
    ) {}

    /**
     * Display a listing of the resource.
     */
    public function index(): Response
    {
        $mannequins = $this->mannequinService->list(request()->only(['search', 'is_active', 'per_page']));

        return Inertia::render('Admin/Mannequins/Index', [
            'mannequins' => $mannequins,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): Response
    {
        return Inertia::render('Admin/Mannequins/Create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreMannequinRequest $request): RedirectResponse
    {
        $mannequin = $this->mannequinService->create($request->validated());

        return redirect()
            ->route('admin.mannequins.index')
            ->with('success', 'Manken başarıyla oluşturuldu.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Mannequin $mannequin): Response
    {
        return Inertia::render('Admin/Mannequins/Show', [
            'mannequin' => $mannequin,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Mannequin $mannequin): Response
    {
        return Inertia::render('Admin/Mannequins/Edit', [
            'mannequin' => $mannequin,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateMannequinRequest $request, Mannequin $mannequin): RedirectResponse
    {
        $this->mannequinService->update($mannequin, $request->validated());

        return redirect()
            ->route('admin.mannequins.index')
            ->with('success', 'Manken başarıyla güncellendi.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Mannequin $mannequin): RedirectResponse
    {
        $this->mannequinService->delete($mannequin);

        return redirect()
            ->route('admin.mannequins.index')
            ->with('success', 'Manken başarıyla silindi.');
    }
}
