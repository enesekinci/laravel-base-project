<?php

declare(strict_types=1);

it('basic example', function (): void {
    $page = visit('/');
    $page->assertSee('Laravel');
});
