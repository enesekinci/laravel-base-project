<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreSliderItemRequest;
use App\Http\Requests\Admin\UpdateSliderItemRequest;
use App\Http\Resources\Admin\AdminSliderItemResource;
use App\Models\Slider;
use App\Models\SliderItem;
use Illuminate\Http\Request;

class SliderItemController extends Controller
{
    public function index(Slider $slider)
    {
        $items = $slider->items()
            ->with('media')
            ->orderBy('sort_order')
            ->get();

        return AdminSliderItemResource::collection($items);
    }

    public function store(StoreSliderItemRequest $request, Slider $slider)
    {
        $data = $request->validated();
        $data['slider_id'] = $slider->id;
        $data['sort_order'] = $data['sort_order'] ?? 0;
        $data['is_active'] = $data['is_active'] ?? true;

        $item = SliderItem::create($data);
        $item->load('media');

        return (new AdminSliderItemResource($item))
            ->response()
            ->setStatusCode(201);
    }

    public function update(UpdateSliderItemRequest $request, SliderItem $item)
    {
        $data = $request->validated();
        $item->fill($data)->save();
        $item->load('media');

        return new AdminSliderItemResource($item);
    }

    public function destroy(SliderItem $item)
    {
        $item->delete();

        return response()->noContent();
    }

    public function restore($id)
    {
        $item = SliderItem::withTrashed()->findOrFail($id);
        $item->restore();
        $item->load('media');

        return new AdminSliderItemResource($item);
    }
}
