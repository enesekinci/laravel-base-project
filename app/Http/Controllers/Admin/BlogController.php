<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Services\BlogService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;

class BlogController extends Controller
{
    public function __construct(
        private BlogService $blogService
    ) {}

    public function index(): Response
    {
        $blogs = $this->blogService->list(
            request()->only(['search', 'status', 'per_page'])
        );

        return Inertia::render('Admin/Blogs/Index', [
            'blogs' => $blogs,
        ]);
    }

    public function create(): Response
    {
        return Inertia::render('Admin/Blogs/Create');
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'slug' => ['nullable', 'string', 'max:255', 'unique:blogs,slug'],
            'excerpt' => ['nullable', 'string'],
            'content' => ['required', 'string'],
            'featured_image' => ['nullable', 'string'],
            'status' => ['required', 'in:draft,published'],
            'published_at' => ['nullable', 'date'],
            'author_id' => ['nullable', 'exists:users,id'],
        ]);

        $this->blogService->create($validated);

        return redirect()
            ->route('admin.blogs.index')
            ->with('success', 'Blog yazısı başarıyla oluşturuldu.');
    }

    public function show(Blog $blog): Response
    {
        $blog->load('author');

        return Inertia::render('Admin/Blogs/Show', [
            'blog' => $blog,
        ]);
    }

    public function edit(Blog $blog): Response
    {
        $blog->load('author');

        return Inertia::render('Admin/Blogs/Edit', [
            'blog' => $blog,
        ]);
    }

    public function update(Request $request, Blog $blog): RedirectResponse
    {
        $validated = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'slug' => ['nullable', 'string', 'max:255', 'unique:blogs,slug,' . $blog->id],
            'excerpt' => ['nullable', 'string'],
            'content' => ['required', 'string'],
            'featured_image' => ['nullable', 'string'],
            'status' => ['required', 'in:draft,published'],
            'published_at' => ['nullable', 'date'],
            'author_id' => ['nullable', 'exists:users,id'],
        ]);

        $this->blogService->update($blog, $validated);

        return redirect()
            ->route('admin.blogs.index')
            ->with('success', 'Blog yazısı başarıyla güncellendi.');
    }

    public function destroy(Blog $blog): RedirectResponse
    {
        $this->blogService->delete($blog);

        return redirect()
            ->route('admin.blogs.index')
            ->with('success', 'Blog yazısı başarıyla silindi.');
    }
}
