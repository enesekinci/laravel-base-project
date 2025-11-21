<?php

namespace App\QueryBuilders;

use App\Filters\ProductFilters;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class ProductQueryBuilder extends Builder
{
    public function withIncludes(Request $request): self
    {
        $includes = $this->parseIncludes($request);

        $this->with(['brand', 'taxClass']);

        if (in_array('variants', $includes, true)) {
            $this->with(['variants.optionValues.option']);
        }

        if (in_array('attributes', $includes, true)) {
            $this->with(['attributeValues.attribute']);
        }

        return $this;
    }

    public function applyFilters(Request $request): self
    {
        (new ProductFilters($request))->apply($this);

        return $this;
    }

    protected function parseIncludes(Request $request): array
    {
        $include = $request->query('include', '');

        if (!$include) {
            return [];
        }

        return array_filter(array_map('trim', explode(',', $include)));
    }
}
