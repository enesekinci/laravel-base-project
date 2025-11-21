<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreSliderRequest;
use App\Http\Requests\Admin\UpdateSliderRequest;
use App\Http\Resources\Admin\AdminSliderResource;
use App\Models\Slider;
use App\Support\DatabaseHelper;
use Illuminate\Http\Request;

class SliderController extends Controller
{
    public function index(Request $request)
    {
        $query = Slider::query();

        if ($search = $request->query('search')) {
            $likeOperator = DatabaseHelper::getCaseInsensitiveLikeOperator();
            $query->where(function ($q) use ($search, $likeOperator) {
                $q->where('name', $likeOperator, '%' . $search . '%')
                  ->orWhere('code', $likeOperator, '%' . $search . '%');
            });
        }

        if (!is_null($request->query('is_active'))) {
            $val = (int) $request->query('is_active') === 1;
            $query->where('is_active', $val);
        }

        $perPage = (int) $request->query('per_page', 50);

        $sliders = $query
            ->orderBy('sort_order')
            ->orderBy('id')
            ->paginate($perPage);

        return AdminSliderResource::collection($sliders);
    }

    public function show(Slider $slider)
    {
        $slider->load('items.media');

        return new AdminSliderResource($slider);
    }

    public function store(StoreSliderRequest $request)
    {
        $data = $request->validated();
        $data['is_active']  = $data['is_active'] ?? true;
        $data['sort_order'] = $data['sort_order'] ?? 0;

        $slider = Slider::create($data);

        return (new AdminSliderResource($slider))
            ->response()
            ->setStatusCode(201);
    }

    public function update(UpdateSliderRequest $request, Slider $slider)
    {
        $data = $request->validated();
        $slider->fill($data)->save();

        return new AdminSliderResource($slider);
    }

    public function destroy(Slider $slider)
    {
        $slider->delete();

        return response()->noContent();
    }

    public function restore($id)
    {
        $slider = Slider::withTrashed()->findOrFail($id);
        $slider->restore();

        return new AdminSliderResource($slider);
    }
}
