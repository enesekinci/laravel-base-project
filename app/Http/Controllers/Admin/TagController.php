<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Tag;
use App\Support\DatabaseHelper;
use Illuminate\Http\Request;

class TagController extends Controller
{
    public function index(Request $request)
    {
        $query = Tag::query();

        if ($search = $request->query('search')) {
            $likeOperator = DatabaseHelper::getCaseInsensitiveLikeOperator();
            $query->where(function ($q) use ($search, $likeOperator) {
                $q->where('name', $likeOperator, '%'.$search.'%')
                    ->orWhere('slug', $likeOperator, '%'.$search.'%');
            });
        }

        $perPage = (int) $request->query('per_page', 50);

        $tags = $query
            ->orderBy('name')
            ->paginate($perPage);

        return response()->json($tags);
    }

    public function show(Tag $tag)
    {
        return response()->json($tag);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'slug' => 'required|string|max:255|unique:tags,slug',
        ]);

        $tag = Tag::create($request->only(['name', 'slug']));

        return response()->json($tag, 201);
    }

    public function update(Request $request, Tag $tag)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'slug' => 'required|string|max:255|unique:tags,slug,'.$tag->id,
        ]);

        $tag->fill($request->only(['name', 'slug']));
        $tag->save();

        return response()->json($tag);
    }

    public function destroy(Tag $tag)
    {
        $tag->delete();

        return response()->noContent();
    }

    public function restore($id)
    {
        $tag = Tag::withTrashed()->findOrFail($id);
        $tag->restore();

        return response()->json($tag);
    }
}
