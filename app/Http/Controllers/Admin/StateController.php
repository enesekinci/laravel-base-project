<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreStateRequest;
use App\Http\Requests\Admin\UpdateStateRequest;
use App\Models\Country;
use App\Models\State;
use Illuminate\Http\RedirectResponse;
use Inertia\Inertia;
use Inertia\Response;

class StateController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): Response
    {
        $states = State::query()
            ->with('country')
            ->ordered()
            ->paginate(20);

        return Inertia::render('Admin/States/Index', [
            'states' => $states,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): Response
    {
        $countries = Country::active()->ordered()->get();

        return Inertia::render('Admin/States/Create', [
            'countries' => $countries,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreStateRequest $request): RedirectResponse
    {
        State::create($request->validated());

        return redirect()
            ->route('admin.states.index')
            ->with('success', 'Eyalet başarıyla oluşturuldu.');
    }

    /**
     * Display the specified resource.
     */
    public function show(State $state): Response
    {
        $state->load('country');

        return Inertia::render('Admin/States/Show', [
            'state' => $state,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(State $state): Response
    {
        $state->load('country');
        $countries = Country::active()->ordered()->get();

        return Inertia::render('Admin/States/Edit', [
            'state' => $state,
            'countries' => $countries,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateStateRequest $request, State $state): RedirectResponse
    {
        $state->update($request->validated());

        return redirect()
            ->route('admin.states.index')
            ->with('success', 'Eyalet başarıyla güncellendi.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(State $state): RedirectResponse
    {
        $state->delete();

        return redirect()
            ->route('admin.states.index')
            ->with('success', 'Eyalet başarıyla silindi.');
    }
}
