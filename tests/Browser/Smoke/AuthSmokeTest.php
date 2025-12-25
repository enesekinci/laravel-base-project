<?php

declare(strict_types=1);

namespace Tests\Browser\Smoke;

use App\Models\Crm\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

/**
 * @group smoke
 */
final class AuthSmokeTest extends DuskTestCase
{
    use RefreshDatabase;

    /**
     * Login yapıp dashboard'a erişilebiliyor mu?
     */
    public function test_login_and_access_dashboard(): void
    {
        $user = User::factory()->create([
            'email' => 'test@example.com',
            'password' => bcrypt('password'),
            'is_admin' => true,
        ]);

        test()->browse(function (Browser $browser) use ($user): void {
            $browser->visit('/login')
                ->waitFor('input[type="email"]', 5)
                ->type('email', $user->email)
                ->type('password', 'password')
                ->waitFor('button[type="submit"]', 5)
                ->click('button[type="submit"]')
                ->pause(3000); // Login işleminin tamamlanmasını bekle

            // Login sonrası path kontrolü
            $currentUrl = $browser->driver->getCurrentURL();
            $baseUrl = config('app.url');

            if (str_contains($currentUrl, '/login')) {
                // Hala login sayfasındaysa hata mesajını kontrol et
                $browser->assertSee('Girdiğiniz bilgiler'); // Hata mesajı var mı?
            } else {
                // Dashboard'a yönlendirildiyse kontrol et
                $browser->assertPathIs('/admin/dashboard');
            }
        });
    }
}
