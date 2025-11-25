<?php

namespace App\Filters;

use App\Support\DatabaseHelper;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class ProductFilters
{
    public function __construct(
        protected Request $request
    ) {}

    public function apply(Builder $query): Builder
    {
        // Search
        $this->applySearch($query);

        $filters = $this->request->query('filter', []);

        if (! is_array($filters)) {
            return $query;
        }

        // 1) option_value_id bazlı filtreler (color, size vs.)
        $this->applyOptionFilters($query, $filters);

        // 2) attribute bazlı filtreler
        if (isset($filters['attribute']) && is_array($filters['attribute'])) {
            $this->applyAttributeFilters($query, $filters['attribute']);
        }

        return $query;
    }

    protected function applySearch(Builder $query): void
    {
        $search = $this->request->query('search');

        if (empty($search)) {
            return;
        }

        $likeOperator = DatabaseHelper::getCaseInsensitiveLikeOperator($query->getConnection());

        $query->where(function ($q) use ($search, $likeOperator) {
            $q->where('name', $likeOperator, "%{$search}%")
                ->orWhere('sku', $likeOperator, "%{$search}%");
        });
    }

    protected function applyOptionFilters(Builder $query, array $filters): void
    {
        foreach ($filters as $key => $value) {
            if ($key === 'attribute') {
                continue;
            }

            if (empty($value)) {
                continue;
            }

            // Burada varsayım: value direkt option_value_id
            $query->whereHas('variants.optionValues', function ($q) use ($value) {
                $q->where('option_values.id', $value);
            });
        }
    }

    protected function applyAttributeFilters(Builder $query, array $attributes): void
    {
        foreach ($attributes as $slug => $val) {
            if (empty($val)) {
                continue;
            }

            $query->whereHas('attributeValues', function ($q) use ($slug, $val) {
                $q->whereHas('attribute', function ($qa) use ($slug) {
                    $qa->where('slug', $slug)->where('is_filterable', true);
                })->where(function ($qb) use ($val) {
                    $qb->where('value_string', $val)
                        ->orWhere('value_text', $val);
                });
            });
        }
    }
}
