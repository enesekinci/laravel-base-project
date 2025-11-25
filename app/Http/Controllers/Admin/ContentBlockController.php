<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Resources\Admin\AdminContentBlockResource;
use App\Models\ContentBlock;
use App\Support\DatabaseHelper;
use Illuminate\Http\Request;

class ContentBlockController extends Controller
{
    public function index(Request $request)
    {
        $query = ContentBlock::query();

        if ($search = $request->query('search')) {
            $likeOperator = DatabaseHelper::getCaseInsensitiveLikeOperator();
            $query->where(function ($q) use ($search, $likeOperator) {
                $q->where('key', $likeOperator, '%'.$search.'%')
                    ->orWhere('name', $likeOperator, '%'.$search.'%');
            });
        }

        if (! is_null($request->query('is_active'))) {
            $val = (int) $request->query('is_active') === 1;
            $query->where('is_active', $val);
        }

        $perPage = (int) $request->query('per_page', 50);

        $blocks = $query
            ->orderBy('key')
            ->paginate($perPage);

        return AdminContentBlockResource::collection($blocks);
    }

    public function show(ContentBlock $content_block)
    {
        return new AdminContentBlockResource($content_block);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'key' => ['required', 'string', 'max:255', 'unique:content_blocks,key'],
            'name' => ['required', 'string', 'max:255'],
            'type' => ['required', 'string', 'in:json,html,markdown'],
            'value' => ['nullable', 'array'],
            'is_active' => ['nullable', 'boolean'],
        ]);

        $data['is_active'] = $data['is_active'] ?? true;

        $block = ContentBlock::create($data);

        return (new AdminContentBlockResource($block))
            ->response()
            ->setStatusCode(201);
    }

    public function update(Request $request, ContentBlock $content_block)
    {
        $data = $request->validate([
            'key' => ['sometimes', 'required', 'string', 'max:255', 'unique:content_blocks,key,'.$content_block->id],
            'name' => ['sometimes', 'required', 'string', 'max:255'],
            'type' => ['sometimes', 'required', 'string', 'in:json,html,markdown'],
            'value' => ['sometimes', 'nullable', 'array'],
            'is_active' => ['sometimes', 'boolean'],
        ]);

        $content_block->fill($data)->save();

        return new AdminContentBlockResource($content_block);
    }

    public function destroy(ContentBlock $content_block)
    {
        $content_block->delete();

        return response()->noContent();
    }

    public function restore($id)
    {
        $block = ContentBlock::withTrashed()->findOrFail($id);
        $block->restore();

        return new AdminContentBlockResource($block);
    }
}
