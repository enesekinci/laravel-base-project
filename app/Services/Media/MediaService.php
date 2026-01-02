<?php

declare(strict_types=1);

namespace App\Services\Media;

use App\Models\Media\MediaFile;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class MediaService
{
    public function upload(UploadedFile $file, array $data = []): MediaFile
    {
        $path = $file->store('media/'.date('Y/m'), 'public');

        return MediaFile::create([
            'user_id' => Auth::id(),
            'disk' => 'public',
            'path' => $path,
            'filename' => $file->getClientOriginalName(),
            'mime_type' => $file->getMimeType(),
            'size' => $file->getSize(),
            'collection' => $data['collection'] ?? null,
            'alt' => $data['alt'] ?? null,
            'is_private' => $data['is_private'] ?? false,
        ]);
    }

    public function delete(MediaFile $mediaFile): bool
    {
        Storage::disk($mediaFile->disk)->delete($mediaFile->path);

        return (bool) $mediaFile->delete();
    }
}
