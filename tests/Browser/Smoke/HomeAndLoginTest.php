<?php

declare(strict_types=1);

namespace Tests\Browser\Smoke;

use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

/**
 * @group smoke
 */
final class HomeAndLoginTest extends DuskTestCase
{
    /**
     * Ana sayfa açılıyor mu?
     */
    public function test_home_page_opens(): void
    {
        test()->browse(function (Browser $browser): void {
            $browser->visit('/')
                ->pause(1000) // Sayfanın yüklenmesini bekle
                ->assertPresent('body'); // Sayfada body elementi var mı kontrol et
        });
    }

    /**
     * Login sayfası açılıyor mu?
     */
    public function test_login_page_opens(): void
    {
        test()->browse(function (Browser $browser): void {
            $browser->visit('/login')
                ->assertPresent('form');
        });
    }
}
