<?php

declare(strict_types=1);

it('ana sayfa açılıyor mu', function (): void {
    $page = visit('/');
    $page->assertSee('Laravel');
});

it('login sayfası açılıyor mu', function (): void {
    $page = visit('/login');
    $page->assertSee('Giriş');
});
