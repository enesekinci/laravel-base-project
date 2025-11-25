<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreMediaFileRequest;
use App\Http\Requests\Admin\UpdateMediaFileRequest;
use App\Http\Resources\Admin\AdminMediaFileResource;
use App\Models\MediaFile;
use App\Support\DatabaseHelper;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class MediaFileController extends Controller
{
    public function index(Request $request)
    {
        $query = MediaFile::query();

        if ($search = $request->query('search')) {
            $likeOperator = DatabaseHelper::getCaseInsensitiveLikeOperator();
            $query->where(function ($q) use ($search, $likeOperator) {
                $q->where('filename', $likeOperator, '%'.$search.'%')
                    ->orWhere('alt', $likeOperator, '%'.$search.'%')
                    ->orWhere('collection', $likeOperator, '%'.$search.'%');
            });
        }

        if ($collection = $request->query('collection')) {
            $query->where('collection', $collection);
        }

        if (! is_null($request->query('is_private'))) {
            $val = (int) $request->query('is_private') === 1;
            $query->where('is_private', $val);
        }

        $perPage = (int) $request->query('per_page', 50);

        $files = $query
            ->orderByDesc('id')
            ->paginate($perPage);

        return AdminMediaFileResource::collection($files);
    }

    public function show(MediaFile $media_file)
    {
        return new AdminMediaFileResource($media_file);
    }

    public function store(StoreMediaFileRequest $request)
    {
        $user = $request->user();
        $disk = 'public';
        $folder = 'media/'.now()->format('Y/m');
        $collection = $request->input('collection');
        $isPrivate = (bool) $request->input('is_private', false);

        // Multiple files support
        $files = $request->file('files') ?? ($request->hasFile('file') ? [$request->file('file')] : []);

        if (empty($files)) {
            return response()->json(['message' => 'No files provided'], 422);
        }

        $uploadedMedia = [];

        foreach ($files as $file) {
            $storedPath = $file->store($folder, $disk);

            $width = null;
            $height = null;

            // Image boyutlarını çekelim (GD veya Imagick extension varsa)
            try {
                if (str_starts_with($file->getMimeType(), 'image/')) {
                    $imageInfo = getimagesize($file->getRealPath());
                    if ($imageInfo !== false) {
                        $width = $imageInfo[0];
                        $height = $imageInfo[1];
                    }
                }
            } catch (\Throwable $e) {
                // sessiz geç
            }

            $media = MediaFile::create([
                'user_id' => $user?->id,
                'disk' => $disk,
                'path' => $storedPath,
                'filename' => $file->getClientOriginalName(),
                'mime_type' => $file->getMimeType(),
                'size' => $file->getSize(),
                'width' => $width,
                'height' => $height,
                'collection' => $collection,
                'alt' => $request->input('alt'),
                'is_private' => $isPrivate,
            ]);

            $uploadedMedia[] = $media;
        }

        // Single file için eski format, multiple için collection
        if (count($uploadedMedia) === 1) {
            return (new AdminMediaFileResource($uploadedMedia[0]))
                ->response()
                ->setStatusCode(201);
        }

        return AdminMediaFileResource::collection($uploadedMedia)
            ->response()
            ->setStatusCode(201);
    }

    public function update(UpdateMediaFileRequest $request, MediaFile $media_file)
    {
        $media_file->fill($request->validated());
        $media_file->save();

        return new AdminMediaFileResource($media_file);
    }

    public function destroy(MediaFile $media_file)
    {
        // Dosyayı diskten sil
        if ($media_file->path && Storage::disk($media_file->disk)->exists($media_file->path)) {
            try {
                Storage::disk($media_file->disk)->delete($media_file->path);
            } catch (\Exception $e) {
                // Dosya silinirken hata oluşursa log'la ama işlemi durdurma
                Log::warning('Media file could not be deleted from disk', [
                    'path' => $media_file->path,
                    'disk' => $media_file->disk,
                    'error' => $e->getMessage(),
                ]);
            }
        }

        // Veritabanından sil (soft delete)
        $media_file->delete();

        return response()->noContent();
    }

    public function restore($id)
    {
        $media = MediaFile::withTrashed()->findOrFail($id);
        $media->restore();

        return new AdminMediaFileResource($media);
    }
}
