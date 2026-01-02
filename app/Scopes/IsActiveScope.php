<?php

declare(strict_types=1);

namespace App\Scopes;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Scope;

/**
 * IsActive Global Scope.
 *
 * Bu scope, model'lerde is_active kolonunu otomatik olarak filtreler.
 * Sadece is_active = true olan kayıtlar döner.
 *
 * Kullanım:
 * - Model'de IsActive trait'ini kullan
 * - Veya manuel olarak: Model::addGlobalScope(new IsActiveScope);
 *
 * Scope'u bypass etmek için:
 * - Model::withoutGlobalScope(IsActiveScope::class)->get();
 * - Model::withInactive()->get(); (eğer scope method tanımlıysa)
 */
class IsActiveScope implements Scope
{
    /**
     * Apply the scope to a given Eloquent query builder.
     */
    public function apply(Builder $builder, Model $model): void
    {
        $builder->where($model->getTable().'.is_active', true);
    }

    /**
     * Extend the query builder with the needed functions.
     */
    public function extend(Builder $builder): void
    {
        // withInactive() method'u ekle - scope'u bypass etmek için
        $builder->macro('withInactive', fn (Builder $builder) => $builder->withoutGlobalScope(IsActiveScope::class));

        // onlyInactive() method'u ekle - sadece inactive kayıtları getirmek için
        $builder->macro('onlyInactive', function (Builder $builder) {
            $model = $builder->getModel();

            return $builder->withoutGlobalScope(IsActiveScope::class)
                ->where($model->getTable().'.is_active', false);
        });
    }
}
