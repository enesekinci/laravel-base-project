<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreCountryRequest;
use App\Http\Requests\Admin\UpdateCountryRequest;
use App\Models\Country;
use Illuminate\Http\RedirectResponse;
use Inertia\Inertia;
use Inertia\Response;

class CountryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): Response
    {
        $countries = Country::query()
            ->ordered()
            ->paginate(20);

        return Inertia::render('Admin/Countries/Index', [
            'countries' => $countries,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): Response
    {
        return Inertia::render('Admin/Countries/Create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCountryRequest $request): RedirectResponse
    {
        Country::create($request->validated());

        return redirect()
            ->route('admin.countries.index')
            ->with('success', 'Ülke başarıyla oluşturuldu.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Country $country): Response
    {
        $country->load('states');

        return Inertia::render('Admin/Countries/Show', [
            'country' => $country,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Country $country): Response
    {
        return Inertia::render('Admin/Countries/Edit', [
            'country' => $country,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCountryRequest $request, Country $country): RedirectResponse
    {
        $country->update($request->validated());

        return redirect()
            ->route('admin.countries.index')
            ->with('success', 'Ülke başarıyla güncellendi.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Country $country): RedirectResponse
    {
        $country->delete();

        return redirect()
            ->route('admin.countries.index')
            ->with('success', 'Ülke başarıyla silindi.');
    }
}
