<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PostCategory;
use App\Support\DatabaseHelper;
use Illuminate\Http\Request;

class PostCategoryController extends Controller
{
    public function index(Request $request)
    {
        $query = PostCategory::query();

        if ($search = $request->query('search')) {
            $likeOperator = DatabaseHelper::getCaseInsensitiveLikeOperator();
            $query->where(function ($q) use ($search, $likeOperator) {
                $q->where('name', $likeOperator, '%'.$search.'%')
                    ->orWhere('slug', $likeOperator, '%'.$search.'%');
            });
        }

        $perPage = (int) $request->query('per_page', 50);

        $categories = $query
            ->orderBy('name')
            ->paginate($perPage);

        return response()->json($categories);
    }

    public function show(PostCategory $post_category)
    {
        return response()->json($post_category);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'slug' => 'required|string|max:255|unique:post_categories,slug',
            'parent_id' => 'nullable|exists:post_categories,id',
        ]);

        $category = PostCategory::create($request->only(['name', 'slug', 'parent_id', 'description']));

        return response()->json($category, 201);
    }

    public function update(Request $request, PostCategory $post_category)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'slug' => 'required|string|max:255|unique:post_categories,slug,'.$post_category->id,
            'parent_id' => 'nullable|exists:post_categories,id',
        ]);

        $post_category->fill($request->only(['name', 'slug', 'parent_id', 'description']));
        $post_category->save();

        return response()->json($post_category);
    }

    public function destroy(PostCategory $post_category)
    {
        $post_category->delete();

        return response()->noContent();
    }

    public function restore($id)
    {
        $category = PostCategory::withTrashed()->findOrFail($id);
        $category->restore();

        return response()->json($category);
    }
}
