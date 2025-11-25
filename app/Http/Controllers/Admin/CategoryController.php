<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreCategoryRequest;
use App\Http\Requests\Admin\UpdateCategoryRequest;
use App\Http\Resources\Admin\AdminCategoryResource;
use App\Models\Category;
use App\Support\DatabaseHelper;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index(Request $request)
    {
        $query = Category::query();

        if ($search = $request->query('search')) {
            $likeOperator = DatabaseHelper::getCaseInsensitiveLikeOperator();
            $query->where(function ($q) use ($search, $likeOperator) {
                $q->where('name', $likeOperator, '%'.$search.'%')
                    ->orWhere('slug', $likeOperator, '%'.$search.'%');
            });
        }

        if (! is_null($request->query('parent_id'))) {
            $query->where('parent_id', $request->query('parent_id'));
        }

        if (! is_null($request->query('is_active'))) {
            $val = (int) $request->query('is_active') === 1;
            $query->where('is_active', $val);
        }

        $perPage = (int) $request->query('per_page', 50);

        $categories = $query
            ->orderBy('parent_id')
            ->orderBy('sort_order')
            ->orderBy('name')
            ->paginate($perPage);

        return AdminCategoryResource::collection($categories);
    }

    public function tree()
    {
        $all = Category::query()
            ->orderBy('parent_id')
            ->orderBy('sort_order')
            ->orderBy('name')
            ->get();

        // id → node
        $nodes = [];
        foreach ($all as $cat) {
            $nodes[$cat->id] = [
                'id' => $cat->id,
                'name' => $cat->name,
                'slug' => $cat->slug,
                'parent_id' => $cat->parent_id,
                'children' => [],
            ];
        }

        $tree = [];

        foreach ($nodes as $id => &$node) {
            $parentId = $node['parent_id'];
            if ($parentId && isset($nodes[$parentId])) {
                $nodes[$parentId]['children'][] = &$node;
            } else {
                $tree[] = &$node;
            }
        }
        unset($node); // ref cleanup

        return response()->json([
            'data' => $tree,
        ]);
    }

    public function show(Category $category)
    {
        return new AdminCategoryResource($category);
    }

    public function store(StoreCategoryRequest $request)
    {
        $data = $request->validated();

        $data['is_active'] = $data['is_active'] ?? true;
        $data['sort_order'] = $data['sort_order'] ?? 0;

        $category = Category::create($data);

        return (new AdminCategoryResource($category))
            ->response()
            ->setStatusCode(201);
    }

    public function update(UpdateCategoryRequest $request, Category $category)
    {
        $data = $request->validated();

        $category->fill($data);
        $category->save();

        return new AdminCategoryResource($category);
    }

    public function destroy(Category $category)
    {
        $category->delete();

        return response()->noContent();
    }

    public function restore($id)
    {
        $category = Category::withTrashed()->findOrFail($id);
        $category->restore();

        return new AdminCategoryResource($category);
    }

    public function toggleActive(Category $category)
    {
        $category->is_active = ! $category->is_active;
        $category->save();

        return new AdminCategoryResource($category);
    }
}
