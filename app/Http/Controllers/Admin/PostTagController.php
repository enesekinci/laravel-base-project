<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PostTag;
use App\Support\DatabaseHelper;
use Illuminate\Http\Request;

class PostTagController extends Controller
{
    public function index(Request $request)
    {
        $query = PostTag::query();

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

    public function show(PostTag $post_tag)
    {
        return response()->json($post_tag);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'slug' => 'required|string|max:255|unique:post_tags,slug',
        ]);

        $tag = PostTag::create($request->only(['name', 'slug']));

        return response()->json($tag, 201);
    }

    public function update(Request $request, PostTag $post_tag)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'slug' => 'required|string|max:255|unique:post_tags,slug,'.$post_tag->id,
        ]);

        $post_tag->fill($request->only(['name', 'slug']));
        $post_tag->save();

        return response()->json($post_tag);
    }

    public function destroy(PostTag $post_tag)
    {
        $post_tag->delete();

        return response()->noContent();
    }

    public function restore($id)
    {
        $tag = PostTag::withTrashed()->findOrFail($id);
        $tag->restore();

        return response()->json($tag);
    }
}
