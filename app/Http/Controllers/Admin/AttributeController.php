<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreAttributeRequest;
use App\Http\Requests\Admin\UpdateAttributeRequest;
use App\Http\Resources\Admin\AdminAttributeResource;
use App\Models\Attribute;
use App\Models\AttributeValue;
use App\Support\DatabaseHelper;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AttributeController extends Controller
{
    public function index(Request $request)
    {
        $query = Attribute::query()
            ->with(['attributeSet', 'values']);

        if ($search = $request->query('search')) {
            $likeOperator = DatabaseHelper::getCaseInsensitiveLikeOperator();
            $query->where(function ($q) use ($search, $likeOperator) {
                $q->where('name', $likeOperator, '%' . $search . '%')
                    ->orWhere('slug', $likeOperator, '%' . $search . '%');
            });
        }

        if (!is_null($request->query('attribute_set_id'))) {
            $query->where('attribute_set_id', $request->query('attribute_set_id'));
        }

        if (!is_null($request->query('is_filterable'))) {
            $val = (int) $request->query('is_filterable') === 1;
            $query->where('is_filterable', $val);
        }

        $perPage = (int) $request->query('per_page', 50);

        $attributes = $query
            ->orderBy('name')
            ->paginate($perPage);

        return AdminAttributeResource::collection($attributes);
    }

    public function show(Attribute $attribute)
    {
        $attribute->load(['attributeSet', 'values']);

        return new AdminAttributeResource($attribute);
    }

    public function store(StoreAttributeRequest $request)
    {
        $data = $request->validated();

        $valuesData = $data['values'] ?? [];
        unset($data['values']);

        $data['is_filterable'] = $data['is_filterable'] ?? false;

        $attribute = DB::transaction(function () use ($data, $valuesData) {
            $attribute = Attribute::create($data);

            foreach ($valuesData as $val) {
                AttributeValue::create([
                    'attribute_id' => $attribute->id,
                    'value'        => $val['value'],
                    'sort_order'   => $val['sort_order'] ?? 0,
                ]);
            }

            return $attribute;
        });

        $attribute->load(['attributeSet', 'values']);

        return (new AdminAttributeResource($attribute))
            ->response()
            ->setStatusCode(201);
    }

    public function update(UpdateAttributeRequest $request, Attribute $attribute)
    {
        $data = $request->validated();

        $valuesData = $data['values'] ?? null;
        unset($data['values']);

        DB::transaction(function () use ($attribute, $data, $valuesData) {
            if (!empty($data)) {
                $attribute->fill($data);
                $attribute->save();
            }

            if (!is_null($valuesData)) {
                $keepIds = [];

                foreach ($valuesData as $val) {
                    if (!empty($val['id'])) {
                        $av = AttributeValue::where('id', $val['id'])
                            ->where('attribute_id', $attribute->id)
                            ->first();

                        if ($av) {
                            $av->value      = $val['value'];
                            $av->sort_order = $val['sort_order'] ?? 0;
                            $av->save();

                            $keepIds[] = $av->id;
                        }
                    } else {
                        $av = AttributeValue::create([
                            'attribute_id' => $attribute->id,
                            'value'        => $val['value'],
                            'sort_order'   => $val['sort_order'] ?? 0,
                        ]);
                        $keepIds[] = $av->id;
                    }
                }

                AttributeValue::where('attribute_id', $attribute->id)
                    ->whereNotIn('id', $keepIds)
                    ->delete();
            }
        });

        $attribute->load(['attributeSet', 'values']);

        return new AdminAttributeResource($attribute);
    }

    public function destroy(Attribute $attribute)
    {
        $attribute->delete();

        return response()->noContent();
    }
}
