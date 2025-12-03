<?php

use App\Domains\Media\Models\MediaFile;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

uses(RefreshDatabase::class);

it('uploads a media file and stores record', function () {
    adminUser();

    Storage::fake('public');

    $file = UploadedFile::fake()->image('photo.jpg', 800, 600)->size(1024);

    $payload = [
        'file' => $file,
        'collection' => 'products',
        'alt' => 'Product image',
        'is_private' => false,
    ];

    // file upload için postJson yerine normal post kullanıyoruz:
    $res = $this->post('/api/admin/media', $payload, ['Accept' => 'application/json']);

    $res->assertStatus(201)
        ->assertJsonStructure([
            'data' => [
                'id',
                'filename',
                'path',
                'url',
                'collection',
                'alt',
            ],
        ]);

    $data = $res->json('data');

    $this->assertDatabaseHas('media_files', [
        'id' => $data['id'],
        'filename' => 'photo.jpg',
        'collection' => 'products',
        'alt' => 'Product image',
    ]);

    Storage::disk('public')->assertExists($data['path']);
});

it('lists media files with filters', function () {
    adminUser();

    $m1 = MediaFile::factory()->create([
        'collection' => 'products',
        'alt' => 'Red shirt',
    ]);

    $m2 = MediaFile::factory()->create([
        'collection' => 'banners',
        'alt' => 'Big banner',
        'is_private' => true,
    ]);

    $res = $this->getJson('/api/admin/media');
    $res->assertStatus(200)
        ->assertJsonStructure([
            'data' => [
                '*' => [
                    'id', 'filename', 'collection', 'alt', 'url',
                ],
            ],
            'meta' => ['current_page', 'per_page', 'total'],
        ]);

    $res2 = $this->getJson('/api/admin/media?collection=products');
    $ids2 = collect($res2->json('data'))->pluck('id');
    expect($ids2)->toContain($m1->id);
    expect($ids2)->not()->toContain($m2->id);
});

it('updates media metadata', function () {
    adminUser();

    $m = MediaFile::factory()->create([
        'collection' => 'products',
        'alt' => 'Old alt',
        'is_private' => false,
    ]);

    $payload = [
        'collection' => 'banners',
        'alt' => 'New alt',
        'is_private' => true,
    ];

    $res = $this->putJson("/api/admin/media/{$m->id}", $payload);

    $res->assertStatus(200)
        ->assertJsonPath('data.collection', 'banners')
        ->assertJsonPath('data.alt', 'New alt')
        ->assertJsonPath('data.is_private', true);

    $this->assertDatabaseHas('media_files', [
        'id' => $m->id,
        'collection' => 'banners',
        'alt' => 'New alt',
        'is_private' => true,
    ]);
});

it('soft deletes and restores a media file', function () {
    adminUser();

    $m = MediaFile::factory()->create();

    $res = $this->deleteJson("/api/admin/media/{$m->id}");
    $res->assertStatus(204);

    $this->assertSoftDeleted('media_files', [
        'id' => $m->id,
    ]);

    $res2 = $this->postJson("/api/admin/media/{$m->id}/restore");
    $res2->assertStatus(200)
        ->assertJsonPath('data.id', $m->id);

    $this->assertDatabaseHas('media_files', [
        'id' => $m->id,
        'deleted_at' => null,
    ]);
});

it('validates media upload payload', function () {
    adminUser();

    $res = $this->post('/api/admin/media', [], ['Accept' => 'application/json']);

    $res->assertStatus(422)
        ->assertJsonValidationErrors(['file']);
});
