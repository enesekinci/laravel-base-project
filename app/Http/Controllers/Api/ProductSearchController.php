<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ProductResource;
use App\Models\Product;
use Illuminate\Http\Request;
use Meilisearch\Client;

class ProductSearchController extends Controller
{
    public function __invoke(Request $request)
    {
        // Meilisearch driver kontrolü
        if (config('scout.driver') !== 'meilisearch') {
            return response()->json([
                'message' => 'Meilisearch driver is not configured',
            ], 503);
        }

        $search = $request->query('search', '');
        $page = (int) $request->query('page', 1);
        $perPage = (int) $request->query('per_page', 20);

        // Filtreleri Meili formatına çevir
        $filterExpr = $this->buildFilterExpression($request);

        try {
            /** @var \Meilisearch\Client $client */
            $client = app(Client::class);
            $index = $client->index('products');
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Meilisearch client is not available: '.$e->getMessage(),
            ], 503);
        }

        try {
            $result = $index->search($search, [
                'filter' => $filterExpr ?: null,
                'limit' => $perPage,
                'offset' => ($page - 1) * $perPage,
            ]);

            // Meilisearch SearchResult objesi - metodlar kullanılmalı
            $hits = $result->getHits();
            $total = $result->getEstimatedTotalHits();
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Meilisearch search failed: '.$e->getMessage(),
            ], 503);
        }

        $ids = collect($hits)
            ->pluck('id')
            ->map(fn ($id) => (int) $id)
            ->all();

        $products = Product::query()
            ->whereIn('id', $ids)
            ->with(['brand', 'taxClass'])
            ->get()
            ->sortBy(fn ($p) => array_search($p->id, $ids)) // sıra meili ile aynı
            ->values();

        // Kendi pagination'ını simüle edelim
        return response()->json([
            'data' => ProductResource::collection($products),
            'meta' => [
                'total' => $total,
                'current_page' => $page,
                'per_page' => $perPage,
                'from' => ($page - 1) * $perPage + 1,
                'to' => ($page - 1) * $perPage + count($products),
            ],
        ]);
    }

    protected function buildFilterExpression(Request $request): ?string
    {
        $filters = $request->query('filter', []);
        $exprs = [];

        // örn: filter[color] = 10 → color_ids IN [10]
        if (! empty($filters['color'])) {
            $colorId = (int) $filters['color'];
            $exprs[] = "color_ids = {$colorId}";
        }

        if (! empty($filters['size'])) {
            $sizeId = (int) $filters['size'];
            $exprs[] = "size_ids = {$sizeId}";
        }

        // attribute filtreleri: filter[attribute][material] = Pamuk
        if (! empty($filters['attribute']['material'])) {
            $val = addslashes($filters['attribute']['material']);
            $exprs[] = "attribute_material = \"{$val}\"";
        }

        // stokta olanlar
        if (isset($filters['in_stock']) && $filters['in_stock']) {
            $exprs[] = 'in_stock = true';
        }

        if (isset($filters['is_active'])) {
            $exprs[] = 'is_active = '.($filters['is_active'] ? 'true' : 'false');
        }

        if (empty($exprs)) {
            return null;
        }

        // Meili filter syntax: expr AND expr AND expr
        return implode(' AND ', $exprs);
    }
}
