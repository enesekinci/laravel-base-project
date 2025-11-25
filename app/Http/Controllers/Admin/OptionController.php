<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreOptionRequest;
use App\Http\Requests\Admin\UpdateOptionRequest;
use App\Http\Resources\Admin\AdminOptionResource;
use App\Models\Option;
use App\Models\OptionValue;
use App\Support\DatabaseHelper;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OptionController extends Controller
{
    public function index(Request $request)
    {
        $query = Option::query()->with('values');

        if ($search = $request->query('search')) {
            $likeOperator = DatabaseHelper::getCaseInsensitiveLikeOperator();
            $query->where('name', $likeOperator, '%'.$search.'%');
        }

        if ($type = $request->query('type')) {
            $query->where('type', $type);
        }

        $perPage = (int) $request->query('per_page', 50);

        $options = $query
            ->orderBy('name')
            ->paginate($perPage);

        return AdminOptionResource::collection($options);
    }

    public function show(Option $option)
    {
        $option->load('values');

        return new AdminOptionResource($option);
    }

    public function store(StoreOptionRequest $request)
    {
        $data = $request->validated();

        $valuesData = $data['values'] ?? [];
        unset($data['values']);

        $option = DB::transaction(function () use ($data, $valuesData) {
            $option = Option::create($data);

            foreach ($valuesData as $val) {
                OptionValue::create([
                    'option_id' => $option->id,
                    'value' => $val['value'],
                    'sort_order' => $val['sort_order'] ?? 0,
                ]);
            }

            return $option;
        });

        $option->load('values');

        return (new AdminOptionResource($option))
            ->response()
            ->setStatusCode(201);
    }

    public function update(UpdateOptionRequest $request, Option $option)
    {
        $data = $request->validated();

        $valuesData = $data['values'] ?? null;
        unset($data['values']);

        DB::transaction(function () use ($option, $data, $valuesData) {
            if (! empty($data)) {
                $option->fill($data);
                $option->save();
            }

            if (! is_null($valuesData)) {
                $keepIds = [];

                foreach ($valuesData as $val) {
                    if (! empty($val['id'])) {
                        // update existing
                        $ov = OptionValue::where('id', $val['id'])
                            ->where('option_id', $option->id)
                            ->first();

                        if ($ov) {
                            $ov->value = $val['value'];
                            $ov->sort_order = $val['sort_order'] ?? 0;
                            $ov->save();

                            $keepIds[] = $ov->id;
                        }
                    } else {
                        // create new
                        $ov = OptionValue::create([
                            'option_id' => $option->id,
                            'value' => $val['value'],
                            'sort_order' => $val['sort_order'] ?? 0,
                        ]);
                        $keepIds[] = $ov->id;
                    }
                }

                // silinmesi gereken eski değerler
                OptionValue::where('option_id', $option->id)
                    ->whereNotIn('id', $keepIds)
                    ->delete();
            }
        });

        $option->load('values');

        return new AdminOptionResource($option);
    }

    public function destroy(Option $option)
    {
        $option->delete(); // soft delete

        return response()->noContent();
    }
}
