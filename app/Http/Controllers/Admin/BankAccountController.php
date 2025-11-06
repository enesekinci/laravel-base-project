<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BankAccount;
use App\Services\BankAccountService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;

class BankAccountController extends Controller
{
    public function __construct(
        private BankAccountService $bankAccountService
    ) {}

    public function index(): Response
    {
        $bankAccounts = $this->bankAccountService->list(
            request()->only(['search', 'is_active', 'per_page'])
        );

        return Inertia::render('Admin/BankAccounts/Index', [
            'bankAccounts' => $bankAccounts,
        ]);
    }

    public function create(): Response
    {
        return Inertia::render('Admin/BankAccounts/Create');
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'bank_name' => ['required', 'string', 'max:255'],
            'account_holder' => ['required', 'string', 'max:255'],
            'account_number' => ['required', 'string', 'max:255'],
            'iban' => ['nullable', 'string', 'max:255'],
            'branch' => ['nullable', 'string', 'max:255'],
            'currency' => ['nullable', 'string', 'size:3'],
            'notes' => ['nullable', 'string'],
            'is_active' => ['nullable', 'boolean'],
        ]);

        $this->bankAccountService->create($validated);

        return redirect()
            ->route('admin.bank-accounts.index')
            ->with('success', 'Banka hesabı başarıyla oluşturuldu.');
    }

    public function show(BankAccount $bankAccount): Response
    {
        return Inertia::render('Admin/BankAccounts/Show', [
            'bankAccount' => $bankAccount,
        ]);
    }

    public function edit(BankAccount $bankAccount): Response
    {
        return Inertia::render('Admin/BankAccounts/Edit', [
            'bankAccount' => $bankAccount,
        ]);
    }

    public function update(Request $request, BankAccount $bankAccount): RedirectResponse
    {
        $validated = $request->validate([
            'bank_name' => ['required', 'string', 'max:255'],
            'account_holder' => ['required', 'string', 'max:255'],
            'account_number' => ['required', 'string', 'max:255'],
            'iban' => ['nullable', 'string', 'max:255'],
            'branch' => ['nullable', 'string', 'max:255'],
            'currency' => ['nullable', 'string', 'size:3'],
            'notes' => ['nullable', 'string'],
            'is_active' => ['nullable', 'boolean'],
        ]);

        $this->bankAccountService->update($bankAccount, $validated);

        return redirect()
            ->route('admin.bank-accounts.index')
            ->with('success', 'Banka hesabı başarıyla güncellendi.');
    }

    public function destroy(BankAccount $bankAccount): RedirectResponse
    {
        $this->bankAccountService->delete($bankAccount);

        return redirect()
            ->route('admin.bank-accounts.index')
            ->with('success', 'Banka hesabı başarıyla silindi.');
    }
}
