<?php

declare(strict_types=1);

namespace App\Domains\Media\Services;

use App\Domains\Media\Models\MediaFile;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

class MediaService
{
    /**
     * Upload a file and create media record.
     */
    public function upload(UploadedFile $file, array $data = []): MediaFile
    {
        $path = $file->store('media/'.date('Y/m'), 'public');

        return MediaFile::create([
            'user_id' => auth()->id(),
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

    /**
     * Delete media file and record.
     */
    public function delete(MediaFile $mediaFile): bool
    {
        Storage::disk($mediaFile->disk)->delete($mediaFile->path);

        return $mediaFile->delete();
    }
}
