<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUserGroupRequest;
use App\Http\Requests\UpdateUserGroupRequest;
use App\Models\UserGroup;
use App\Services\UserGroupService;
use Illuminate\Http\RedirectResponse;
use Inertia\Inertia;
use Inertia\Response;

class UserGroupController extends Controller
{
    public function __construct(
        private UserGroupService $userGroupService
    ) {}

    /**
     * Display a listing of the resource.
     */
    public function index(): Response
    {
        $userGroups = $this->userGroupService->list(request()->only(['search', 'is_active', 'per_page']));

        return Inertia::render('Admin/UserGroups/Index', [
            'userGroups' => $userGroups,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): Response
    {
        return Inertia::render('Admin/UserGroups/Create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUserGroupRequest $request): RedirectResponse
    {
        $userGroup = $this->userGroupService->create($request->validated());

        return redirect()
            ->route('admin.user-groups.index')
            ->with('success', 'Kullanıcı grubu başarıyla oluşturuldu.');
    }

    /**
     * Display the specified resource.
     */
    public function show(UserGroup $userGroup): Response
    {
        $userGroup->load('users');

        return Inertia::render('Admin/UserGroups/Show', [
            'userGroup' => $userGroup,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(UserGroup $userGroup): Response
    {
        return Inertia::render('Admin/UserGroups/Edit', [
            'userGroup' => $userGroup,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateUserGroupRequest $request, UserGroup $userGroup): RedirectResponse
    {
        $this->userGroupService->update($userGroup, $request->validated());

        return redirect()
            ->route('admin.user-groups.index')
            ->with('success', 'Kullanıcı grubu başarıyla güncellendi.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(UserGroup $userGroup): RedirectResponse
    {
        $this->userGroupService->delete($userGroup);

        return redirect()
            ->route('admin.user-groups.index')
            ->with('success', 'Kullanıcı grubu başarıyla silindi.');
    }
}

