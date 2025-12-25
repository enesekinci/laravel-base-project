<?php

declare(strict_types=1);

namespace App\Traits;

use App\Scopes\IsActiveScope;

/**
 * IsActive Trait.
 *
 * Bu trait, model'e IsActiveScope global scope'unu ekler.
 * Model'de is_active kolonu varsa, sadece aktif kayıtlar döner.
 *
 * Kullanım:
 * ```php
 * class Product extends Model
 * {
 *     use IsActive;
 *     // ...
 * }
 * ```
 *
 * Scope'u bypass etmek için:
 * ```php
 * Product::withoutGlobalScope(IsActiveScope::class)->get();
 * Product::withInactive()->get(); // Eğer scope extend edildiyse
 * ```
 */
trait IsActive
{
    /**
     * Boot the IsActive trait.
     */
    public static function bootIsActive(): void
    {
        static::addGlobalScope(new IsActiveScope);
    }
}
