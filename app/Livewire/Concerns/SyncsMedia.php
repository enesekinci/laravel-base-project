<?php

declare(strict_types=1);

namespace App\Livewire\Concerns;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

/**
 * SyncsMedia trait - WithMediaSync'in yerine kullanılır
 * syncMedia metodunu override eder ve R2 desteği ekler
 */
trait SyncsMedia
{
    /**
     * Remove media from library
     */
    public function removeMedia(string $uuid, string $filesModelName, string $library, string $url): void
    {
        // Updates library
        $this->{$library} = $this->{$library}->filter(fn ($image) => $image['uuid'] != $uuid);

        // Remove file
        $name = str($url)->after('preview-file/')->before('?expires')->toString();
        $files = $this->{$filesModelName};
        $this->{$filesModelName} = collect($files)->filter(fn ($file) => $file->getFilename() != $name)->all();
    }

    /**
     * Set order for media items
     */
    public function refreshMediaOrder(array $order, string $library): void
    {
        $this->{$library} = $this->{$library}->sortBy(function ($item) use ($order) {
            return array_search($item['uuid'], $order);
        });
    }

    /**
     * Bind temporary files with respective previews and replace existing ones
     */
    public function refreshMediaSources(string $filesModelName, string $library): void
    {
        // New files area
        foreach ($this->{$filesModelName}['*'] ?? [] as $key => $file) {
            $this->{$library} = $this->{$library}->add(['uuid' => Str::uuid()->toString(), 'url' => $file->temporaryUrl()]);

            $key = $this->{$library}->keys()->last();
            $this->{$filesModelName}[$key] = $file;
        }

        // Reset new files area
        unset($this->{$filesModelName}['*']);

        // Replace existing files
        foreach ($this->{$filesModelName} as $key => $file) {
            $media = $this->{$library}->get($key);
            $media['url'] = $file->temporaryUrl();

            $this->{$library} = $this->{$library}->replace([$key => $media]);
        }

        $this->validateOnly($filesModelName.'.*');
    }

    /**
     * Override syncMedia to fix doesntContain issue and handle R2 URLs.
     */
    public function syncMedia(
        Model $model,
        string $library = 'library',
        string $files = 'files',
        string $storage_subpath = '',
        $model_field = 'library',
        string $visibility = 'public',
        string $disk = 'r2'
    ): void {
        // Store new files
        foreach ($this->{$files} as $index => $file) {
            $media = $this->{$library}->get($index);
            if (! $media) {
                continue;
            }

            $name = $this->getFileName($media);
            if (! $name) {
                continue;
            }

            $filePath = Storage::disk($disk)->putFileAs($storage_subpath, $file, $name, $visibility);

            if ($filePath === false) {
                continue;
            }

            $url = Storage::disk($disk)->url($filePath);

            // Update library
            $media['url'] = $url.'?updated_at='.time();
            $media['path'] = str($storage_subpath)->finish('/')->append($name)->toString();
            $this->{$library} = $this->{$library}->replace([$index => $media]);
        }

        // Delete removed files from library
        $libraryUuids = $this->{$library}->pluck('uuid')->toArray();
        $diffs = $model->{$model_field}?->reject(fn ($item) => \in_array($item['uuid'] ?? null, $libraryUuids, true)) ?? new \Illuminate\Support\Collection;

        foreach ($diffs as $diff) {
            if (isset($diff['path'])) {
                Storage::disk($disk)->delete($diff['path']);
            }
        }

        // Updates model
        $model->update([$model_field => $this->{$library}]);

        // Resets files
        $this->{$files} = [];
    }

    /**
     * Get file name from media array
     */
    private function getFileName(?array $media): ?string
    {
        $name = $media['uuid'] ?? null;
        if (! $name) {
            return null;
        }

        $extension = str($media['url'] ?? '')->afterLast('.')->before('?expires')->toString();
        if (empty($extension)) {
            $extension = 'jpg'; // Default extension
        }

        return "$name.$extension";
    }
}
