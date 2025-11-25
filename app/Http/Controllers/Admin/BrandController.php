<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreBrandRequest;
use App\Http\Requests\Admin\UpdateBrandRequest;
use App\Http\Resources\Admin\AdminBrandResource;
use App\Models\Brand;
use App\Support\DatabaseHelper;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    public function index(Request $request)
    {
        $query = Brand::query();

        if ($search = $request->query('search')) {
            $likeOperator = DatabaseHelper::getCaseInsensitiveLikeOperator();
            $query->where(function ($q) use ($search, $likeOperator) {
                $q->where('name', $likeOperator, '%'.$search.'%')
                    ->orWhere('slug', $likeOperator, '%'.$search.'%');
            });
        }

        if (! is_null($request->query('is_active'))) {
            $val = (int) $request->query('is_active') === 1;
            $query->where('is_active', $val);
        }

        $perPage = (int) $request->query('per_page', 50);

        $brands = $query
            ->orderBy('name')
            ->paginate($perPage);

        return AdminBrandResource::collection($brands);
    }

    public function show(Brand $brand)
    {
        return new AdminBrandResource($brand);
    }

    public function store(StoreBrandRequest $request)
    {
        $data = $request->validated();

        $data['is_active'] = $data['is_active'] ?? true;

        $brand = Brand::create($data);

        return (new AdminBrandResource($brand))
            ->response()
            ->setStatusCode(201);
    }

    public function update(UpdateBrandRequest $request, Brand $brand)
    {
        $data = $request->validated();

        $brand->fill($data);
        $brand->save();

        return new AdminBrandResource($brand);
    }

    public function destroy(Brand $brand)
    {
        $brand->delete();

        return response()->noContent();
    }

    public function restore($id)
    {
        $brand = Brand::withTrashed()->findOrFail($id);
        $brand->restore();

        return new AdminBrandResource($brand);
    }

    public function toggleActive(Brand $brand)
    {
        $brand->is_active = ! $brand->is_active;
        $brand->save();

        return new AdminBrandResource($brand);
    }
}
