<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Support\DatabaseHelper;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index(Request $request)
    {
        $query = Post::query()->with(['author', 'media', 'categories', 'tags']);

        if ($search = $request->query('search')) {
            $likeOperator = DatabaseHelper::getCaseInsensitiveLikeOperator();
            $query->where(function ($q) use ($search, $likeOperator) {
                $q->where('title', $likeOperator, '%'.$search.'%')
                    ->orWhere('slug', $likeOperator, '%'.$search.'%')
                    ->orWhere('excerpt', $likeOperator, '%'.$search.'%');
            });
        }

        if ($status = $request->query('status')) {
            $query->where('status', $status);
        }

        $perPage = (int) $request->query('per_page', 50);

        $posts = $query
            ->orderBy('created_at', 'desc')
            ->paginate($perPage);

        return response()->json($posts);
    }

    public function show(Post $post)
    {
        $post->load(['author', 'media', 'categories', 'tags']);

        return response()->json($post);
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'slug' => 'required|string|max:255|unique:posts,slug',
            'excerpt' => 'nullable|string',
            'content' => 'nullable|string',
            'status' => 'required|in:draft,published',
            'published_at' => 'nullable|date',
            'author_id' => 'required|exists:users,id',
            'media_file_id' => 'nullable|exists:media_files,id',
            'meta_title' => 'nullable|string|max:255',
            'meta_description' => 'nullable|string|max:500',
            'category_ids' => 'nullable|array',
            'category_ids.*' => 'exists:post_categories,id',
            'tag_ids' => 'nullable|array',
            'tag_ids.*' => 'exists:post_tags,id',
        ]);

        $post = Post::create($request->only([
            'author_id',
            'media_file_id',
            'title',
            'slug',
            'excerpt',
            'content',
            'status',
            'published_at',
            'meta_title',
            'meta_description',
        ]));

        if ($request->has('category_ids')) {
            $post->categories()->sync($request->category_ids);
        }

        if ($request->has('tag_ids')) {
            $post->tags()->sync($request->tag_ids);
        }

        $post->load(['author', 'media', 'categories', 'tags']);

        return response()->json($post, 201);
    }

    public function update(Request $request, Post $post)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'slug' => 'required|string|max:255|unique:posts,slug,'.$post->id,
            'excerpt' => 'nullable|string',
            'content' => 'nullable|string',
            'status' => 'required|in:draft,published',
            'published_at' => 'nullable|date',
            'author_id' => 'required|exists:users,id',
            'media_file_id' => 'nullable|exists:media_files,id',
            'meta_title' => 'nullable|string|max:255',
            'meta_description' => 'nullable|string|max:500',
            'category_ids' => 'nullable|array',
            'category_ids.*' => 'exists:post_categories,id',
            'tag_ids' => 'nullable|array',
            'tag_ids.*' => 'exists:post_tags,id',
        ]);

        $post->fill($request->only([
            'author_id',
            'media_file_id',
            'title',
            'slug',
            'excerpt',
            'content',
            'status',
            'published_at',
            'meta_title',
            'meta_description',
        ]));
        $post->save();

        if ($request->has('category_ids')) {
            $post->categories()->sync($request->category_ids);
        }

        if ($request->has('tag_ids')) {
            $post->tags()->sync($request->tag_ids);
        }

        $post->load(['author', 'media', 'categories', 'tags']);

        return response()->json($post);
    }

    public function destroy(Post $post)
    {
        $post->delete();

        return response()->noContent();
    }

    public function restore($id)
    {
        $post = Post::withTrashed()->findOrFail($id);
        $post->restore();

        return response()->json($post);
    }
}
