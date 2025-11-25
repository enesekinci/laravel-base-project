<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreTaxClassRequest;
use App\Http\Requests\Admin\UpdateTaxClassRequest;
use App\Http\Resources\Admin\AdminTaxClassResource;
use App\Models\TaxClass;
use App\Support\DatabaseHelper;
use Illuminate\Http\Request;

class TaxClassController extends Controller
{
    public function index(Request $request)
    {
        $query = TaxClass::query();

        if ($search = $request->query('search')) {
            $likeOperator = DatabaseHelper::getCaseInsensitiveLikeOperator();
            $query->where('name', $likeOperator, '%'.$search.'%');
        }

        if (! is_null($request->query('is_active'))) {
            $val = (int) $request->query('is_active') === 1;
            $query->where('is_active', $val);
        }

        $taxes = $query
            ->orderBy('name')
            ->paginate((int) $request->query('per_page', 50));

        return AdminTaxClassResource::collection($taxes);
    }

    public function show(TaxClass $tax_class)
    {
        return new AdminTaxClassResource($tax_class);
    }

    public function store(StoreTaxClassRequest $request)
    {
        $data = $request->validated();
        $data['is_active'] = $data['is_active'] ?? true;

        $tax = TaxClass::create($data);

        return (new AdminTaxClassResource($tax))
            ->response()
            ->setStatusCode(201);
    }

    public function update(UpdateTaxClassRequest $request, TaxClass $tax_class)
    {
        $data = $request->validated();
        $tax_class->fill($data)->save();

        return new AdminTaxClassResource($tax_class);
    }

    public function destroy(TaxClass $tax_class)
    {
        $tax_class->delete(); // soft delete yoksa normal delete, migration'a göre

        return response()->noContent();
    }
}
