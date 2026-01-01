<?php

declare(strict_types=1);

use App\Livewire\Auth\LoginForm;
use App\Models\User;
use Livewire\Livewire;

it('giriş sayfasını görüntüler', function () {
    $response = $this->get(route('login'));

    $response->assertSuccessful();
    $response->assertSeeLivewire(LoginForm::class);
});

it('geçerli bilgilerle giriş yapar', function () {
    $user = User::factory()->create([
        'email' => 'test@example.com',
        'password' => bcrypt('password123'),
    ]);

    Livewire::test(LoginForm::class)
        ->set('email', 'test@example.com')
        ->set('password', 'password123')
        ->call('login')
        ->assertRedirect(route('account.dashboard'));

    $this->assertAuthenticatedAs($user);
});

it('geçersiz bilgilerle giriş yapamaz', function () {
    User::factory()->create([
        'email' => 'test@example.com',
        'password' => bcrypt('password123'),
    ]);

    Livewire::test(LoginForm::class)
        ->set('email', 'test@example.com')
        ->set('password', 'wrong-password')
        ->call('login')
        ->assertHasErrors(['email'])
        ->assertNoRedirect();

    $this->assertGuest();
});

it('admin kullanıcı admin paneline yönlendirilir', function () {
    $user = User::factory()->create([
        'email' => 'admin@example.com',
        'password' => bcrypt('password123'),
        'is_admin' => true,
    ]);

    Livewire::test(LoginForm::class)
        ->set('email', 'admin@example.com')
        ->set('password', 'password123')
        ->call('login')
        ->assertRedirect(route('admin.dashboard'));
});

it('remember me seçeneği çalışır', function () {
    $user = User::factory()->create([
        'email' => 'test@example.com',
        'password' => bcrypt('password123'),
    ]);

    Livewire::test(LoginForm::class)
        ->set('email', 'test@example.com')
        ->set('password', 'password123')
        ->set('remember', true)
        ->call('login');

    $this->assertAuthenticatedAs($user);
    expect($user->fresh()->remember_token)->not->toBeNull();
});
