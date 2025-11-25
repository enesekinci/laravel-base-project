<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Page;
use App\Support\DatabaseHelper;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function index(Request $request)
    {
        $query = Page::query();

        if ($search = $request->query('search')) {
            $likeOperator = DatabaseHelper::getCaseInsensitiveLikeOperator();
            $query->where(function ($q) use ($search, $likeOperator) {
                $q->where('title', $likeOperator, '%'.$search.'%')
                    ->orWhere('slug', $likeOperator, '%'.$search.'%');
            });
        }

        if ($request->has('is_active')) {
            $query->where('is_active', $request->boolean('is_active'));
        }

        $perPage = (int) $request->query('per_page', 50);

        $pages = $query
            ->orderBy('created_at', 'desc')
            ->paginate($perPage);

        return response()->json($pages);
    }

    public function show(Page $page)
    {
        return response()->json($page);
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'slug' => 'required|string|max:255|unique:pages,slug',
            'content' => 'nullable|string',
            'is_active' => 'boolean',
            'show_in_footer' => 'boolean',
            'meta_title' => 'nullable|string|max:255',
            'meta_description' => 'nullable|string|max:500',
        ]);

        $page = Page::create($request->only([
            'title',
            'slug',
            'content',
            'is_active',
            'show_in_footer',
            'meta_title',
            'meta_description',
        ]));

        return response()->json($page, 201);
    }

    public function update(Request $request, Page $page)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'slug' => 'required|string|max:255|unique:pages,slug,'.$page->id,
            'content' => 'nullable|string',
            'is_active' => 'boolean',
            'show_in_footer' => 'boolean',
            'meta_title' => 'nullable|string|max:255',
            'meta_description' => 'nullable|string|max:500',
        ]);

        $page->fill($request->only([
            'title',
            'slug',
            'content',
            'is_active',
            'show_in_footer',
            'meta_title',
            'meta_description',
        ]));
        $page->save();

        return response()->json($page);
    }

    public function destroy(Page $page)
    {
        $page->delete();

        return response()->noContent();
    }

    public function restore($id)
    {
        $page = Page::withTrashed()->findOrFail($id);
        $page->restore();

        return response()->json($page);
    }
}
