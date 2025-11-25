<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Menu;
use App\Support\DatabaseHelper;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    public function index(Request $request)
    {
        $query = Menu::query();

        if ($search = $request->query('search')) {
            $likeOperator = DatabaseHelper::getCaseInsensitiveLikeOperator();
            $query->where(function ($q) use ($search, $likeOperator) {
                $q->where('name', $likeOperator, '%'.$search.'%')
                    ->orWhere('code', $likeOperator, '%'.$search.'%');
            });
        }

        $perPage = (int) $request->query('per_page', 50);

        $menus = $query
            ->orderBy('name')
            ->paginate($perPage);

        return response()->json($menus);
    }

    public function show(Menu $menu)
    {
        $menu->load('items');

        return response()->json($menu);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'code' => 'required|string|max:255|unique:menus,code',
        ]);

        $menu = Menu::create($request->only(['name', 'code']));

        return response()->json($menu, 201);
    }

    public function update(Request $request, Menu $menu)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'code' => 'required|string|max:255|unique:menus,code,'.$menu->id,
        ]);

        $menu->fill($request->only(['name', 'code']));
        $menu->save();

        return response()->json($menu);
    }

    public function destroy(Menu $menu)
    {
        $menu->delete();

        return response()->noContent();
    }

    public function restore($id)
    {
        $menu = Menu::withTrashed()->findOrFail($id);
        $menu->restore();

        return response()->json($menu);
    }
}
