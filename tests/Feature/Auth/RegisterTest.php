<?php

declare(strict_types=1);

use App\Livewire\Auth\RegisterForm;
use App\Models\User;
use Livewire\Livewire;

it('kayıt sayfasını görüntüler', function () {
    $response = test()->get(route('register'));

    $response->assertSuccessful();
    $response->assertSeeLivewire(RegisterForm::class);
});

it('yeni kullanıcı kaydeder', function () {
    Livewire::test(RegisterForm::class)
        ->set('name', 'Test User')
        ->set('email', 'test@example.com')
        ->set('phone', '+905551234567')
        ->set('password', 'password123')
        ->set('password_confirmation', 'password123')
        ->call('register')
        ->assertRedirect(route('home'));

    test()->assertDatabaseHas('users', [
        'name' => 'Test User',
        'email' => 'test@example.com',
        'phone' => '+905551234567',
        'is_admin' => false,
    ]);

    test()->assertAuthenticated();
});

it('geçersiz email ile kayıt yapamaz', function () {
    User::factory()->create(['email' => 'existing@example.com']);

    Livewire::test(RegisterForm::class)
        ->set('name', 'Test User')
        ->set('email', 'existing@example.com')
        ->set('password', 'password123')
        ->set('password_confirmation', 'password123')
        ->call('register')
        ->assertHasErrors(['email'])
        ->assertNoRedirect();

    test()->assertGuest();
});

it('şifreler eşleşmediğinde kayıt yapamaz', function () {
    Livewire::test(RegisterForm::class)
        ->set('name', 'Test User')
        ->set('email', 'test@example.com')
        ->set('password', 'password123')
        ->set('password_confirmation', 'different-password')
        ->call('register')
        ->assertHasErrors(['password'])
        ->assertNoRedirect();

    test()->assertGuest();
});

it('kısa şifre ile kayıt yapamaz', function () {
    Livewire::test(RegisterForm::class)
        ->set('name', 'Test User')
        ->set('email', 'test@example.com')
        ->set('password', '12345')
        ->set('password_confirmation', '12345')
        ->call('register')
        ->assertHasErrors(['password'])
        ->assertNoRedirect();

    test()->assertGuest();
});
