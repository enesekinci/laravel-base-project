<?php

declare(strict_types=1);

use App\Livewire\Auth\ForgotPasswordForm;
use App\Models\User;
use Illuminate\Support\Facades\Password;
use Livewire\Livewire;

it('şifre unutma sayfasını görüntüler', function () {
    $response = $this->get(route('password.forgot'));

    $response->assertSuccessful();
    $response->assertSeeLivewire(ForgotPasswordForm::class);
});

it('geçerli email ile şifre sıfırlama bağlantısı gönderir', function () {
    $user = User::factory()->create(['email' => 'test@example.com']);

    Password::shouldReceive('sendResetLink')
        ->once()
        ->andReturn(Password::RESET_LINK_SENT);

    Livewire::test(ForgotPasswordForm::class)
        ->set('email', 'test@example.com')
        ->call('sendResetLink')
        ->assertHasNoErrors()
        ->assertSet('email', '');
});

it('geçersiz email ile şifre sıfırlama bağlantısı gönderemez', function () {
    Livewire::test(ForgotPasswordForm::class)
        ->set('email', 'invalid-email')
        ->call('sendResetLink')
        ->assertHasErrors(['email'])
        ->assertNoRedirect();
});

it('kayıtlı olmayan email ile hata gösterir', function () {
    Password::shouldReceive('sendResetLink')
        ->once()
        ->andReturn(Password::INVALID_USER);

    Livewire::test(ForgotPasswordForm::class)
        ->set('email', 'notfound@example.com')
        ->call('sendResetLink')
        ->assertHasNoErrors()
        ->assertSet('email', '');
});
