<?php

declare(strict_types=1);

use App\Contracts\Repositories\Blog\PostCategoryRepositoryInterface;
use App\DTO\Blog\PostCategoryData;
use App\Models\Blog\PostCategory;
use App\Repositories\Blog\PostCategoryRepository;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

beforeEach(function () {
    $this->repository = new PostCategoryRepository();
});

it('can create a post category', function () {
    $data = new PostCategoryData(name: 'Integration Test Cat', slug: 'integration-test-cat');

    $category = $this->repository->create($data);

    expect($category)->toBeInstanceOf(PostCategory::class)
        ->and($category->name)->toBe('Integration Test Cat');

    $this->assertDatabaseHas('post_categories', [
        'name' => 'Integration Test Cat',
        'slug' => 'integration-test-cat',
    ]);
});

it('can update a post category', function () {
    $category = PostCategory::create(['name' => 'Old Name', 'slug' => 'old-name']);
    $data = new PostCategoryData(name: 'New Name', slug: 'new-name');

    $updatedCategory = $this->repository->update($category->id, $data);

    expect($updatedCategory->id)->toBe($category->id)
        ->and($updatedCategory->name)->toBe('New Name');

    $this->assertDatabaseHas('post_categories', [
        'id' => $category->id,
        'name' => 'New Name',
    ]);
});

it('can find a post category', function () {
    $category = PostCategory::create(['name' => 'Find Me', 'slug' => 'find-me']);

    $foundCategory = $this->repository->find($category->id);

    expect($foundCategory)->not->toBeNull()
        ->and($foundCategory->id)->toBe($category->id);
});

it('can delete a post category', function () {
    $category = PostCategory::create(['name' => 'Delete Me', 'slug' => 'delete-me']);

    $result = $this->repository->delete($category->id);

    expect($result)->toBeTrue();
    $this->assertSoftDeleted('post_categories', ['id' => $category->id]);
});

it('can list all categories', function () {
    // Ensure clean state (RefreshDatabase should handle this, but to be sure for this test run)
    PostCategory::query()->forceDelete();

    PostCategory::create(['name' => 'Cat 1', 'slug' => 'cat-1']);
    PostCategory::create(['name' => 'Cat 2', 'slug' => 'cat-2']);

    $all = $this->repository->all();

    expect($all)->toHaveCount(2);
});
