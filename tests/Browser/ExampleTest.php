<?php

declare(strict_types=1);

use Laravel\Dusk\Browser;

test('basic example', function (): void {
    test()->browse(function (Browser $browser): void {
        $browser->visit('/')
            ->assertSee('Laravel');
    });
});
