<?php

declare(strict_types=1);

use App\Livewire\Crm\Admin\UserForm;
use App\Livewire\Crm\Admin\UsersIndex;
use App\Models\User;
use Livewire\Livewire;

it('kullanıcı listesini görüntüler', function () {
    $admin = User::factory()->create(['is_admin' => true]);
    User::factory()->count(5)->create();

    Livewire::actingAs($admin)
        ->test(UsersIndex::class)
        ->assertSuccessful()
        ->assertSee('Kullanıcı Yönetimi')
        ->assertSee('Yeni Kullanıcı');
});

it('kullanıcı arama yapar', function () {
    $admin = User::factory()->create(['is_admin' => true]);
    $user = User::factory()->create(['name' => 'Test User']);

    Livewire::actingAs($admin)
        ->test(UsersIndex::class)
        ->set('search', 'Test')
        ->assertSee('Test User')
        ->assertSee($user->email);
});

it('yeni kullanıcı oluşturur', function () {
    $admin = User::factory()->create(['is_admin' => true]);

    Livewire::actingAs($admin)
        ->test(UserForm::class)
        ->set('name', 'Yeni Kullanıcı')
        ->set('email', 'yeni@example.com')
        ->set('password', 'password123')
        ->set('password_confirmation', 'password123')
        ->call('save')
        ->assertRedirect(route('admin.crm.users.index'));

    test()->assertDatabaseHas('users', [
        'name' => 'Yeni Kullanıcı',
        'email' => 'yeni@example.com',
    ]);
});

it('kullanıcı düzenler', function () {
    $admin = User::factory()->create(['is_admin' => true]);
    $user = User::factory()->create(['name' => 'Eski İsim']);

    Livewire::actingAs($admin)
        ->test(UserForm::class, ['id' => $user->id])
        ->assertSet('name', 'Eski İsim')
        ->set('name', 'Yeni İsim')
        ->set('email', $user->email)
        ->call('save')
        ->assertRedirect(route('admin.crm.users.index'));

    test()->assertDatabaseHas('users', [
        'id' => $user->id,
        'name' => 'Yeni İsim',
    ]);
});

it('kullanıcı siler', function () {
    $admin = User::factory()->create(['is_admin' => true]);
    $user = User::factory()->create();

    Livewire::actingAs($admin)
        ->test(UsersIndex::class)
        ->call('delete', $user->id)
        ->assertDispatched('toast');

    test()->assertDatabaseMissing('users', ['id' => $user->id]);
});

it('kendi hesabını silemez', function () {
    $admin = User::factory()->create(['is_admin' => true]);
    // Admin'in kendi ID'sini silmeye çalışıyor
    $adminCrmUser = User::find($admin->id);

    if (! $adminCrmUser) {
        // Eğer admin CRM users tablosunda yoksa, oluştur
        $adminCrmUser = User::factory()->create(['id' => $admin->id, 'email' => $admin->email]);
    }

    Livewire::actingAs($admin)
        ->test(UsersIndex::class)
        ->call('delete', $admin->id)
        ->assertDispatched('toast', message: 'Kendi hesabınızı silemezsiniz.', type: 'error');

    test()->assertDatabaseHas('users', ['id' => $admin->id]);
});

it('admin olmayan kullanıcı erişemez', function () {
    $user = User::factory()->create(['is_admin' => false]);

    $response = test()->actingAs($user)->get(route('admin.crm.users.index'));

    $response->assertForbidden();
});
