<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Collection;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class CollectionController extends Controller
{
    public function index(): JsonResponse
    {
        $collections = Collection::query()
            ->orderBy('name')
            ->get();

        return response()->json([
            'data' => $collections,
        ]);
    }

    public function store(Request $request): JsonResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255', 'unique:collections,name'],
        ]);

        $collection = Collection::create([
            'name' => $request->name,
            'description' => $request->description,
        ]);

        return response()->json([
            'data' => $collection,
            'message' => 'Klasör oluşturuldu',
        ], 201);
    }

    public function update(Request $request, Collection $collection): JsonResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255', 'unique:collections,name,'.$collection->id],
            'description' => ['nullable', 'string'],
        ]);

        $collection->update([
            'name' => $request->name,
            'description' => $request->description,
        ]);

        return response()->json([
            'data' => $collection,
            'message' => 'Klasör güncellendi',
        ]);
    }

    public function destroy(Collection $collection): JsonResponse
    {
        $collection->delete();

        return response()->json([
            'message' => 'Klasör silindi',
        ]);
    }
}
