<?php

declare(strict_types=1);

use App\Contracts\Repositories\Blog\PostCategoryRepositoryInterface;
use App\DTO\Blog\PostCategoryData;
use App\Models\Blog\PostCategory;
use App\Services\Blog\PostCategoryService;
use Illuminate\Database\Eloquent\Collection;

it('can get all categories', function () {
    // Arrange
    $repository = Mockery::mock(PostCategoryRepositoryInterface::class);
    $repository->shouldReceive('all')
        ->once()
        ->andReturn(new Collection());

    $service = new PostCategoryService($repository);

    // Act
    $result = $service->getAllCategories();

    // Assert
    expect($result)->toBeInstanceOf(Collection::class);
});

it('can create a category', function () {
    // Arrange
    $data = new PostCategoryData(name: 'Test Category', slug: 'test-category');

    $category = new PostCategory(['name' => 'Test Category', 'slug' => 'test-category']);
    $category->id = 1;

    $repository = Mockery::mock(PostCategoryRepositoryInterface::class);
    $repository->shouldReceive('create')
        ->once()
        ->with($data)
        ->andReturn($category);

    $service = new PostCategoryService($repository);

    // Act
    $result = $service->createCategory($data);

    // Assert
    expect($result)->toBeInstanceOf(PostCategory::class)
        ->and($result->name)->toBe('Test Category');
});

it('can update a category', function () {
    // Arrange
    $id = 1;
    $data = new PostCategoryData(name: 'Updated Category', slug: 'updated-category');

    $category = new PostCategory(['name' => 'Updated Category', 'slug' => 'updated-category']);
    $category->id = 1;

    $repository = Mockery::mock(PostCategoryRepositoryInterface::class);
    $repository->shouldReceive('update')
        ->once()
        ->with($id, $data)
        ->andReturn($category);

    $service = new PostCategoryService($repository);

    // Act
    $result = $service->updateCategory($id, $data);

    // Assert
    expect($result)->toBeInstanceOf(PostCategory::class)
        ->and($result->name)->toBe('Updated Category');
});

it('can delete a category', function () {
    // Arrange
    $id = 1;
    $repository = Mockery::mock(PostCategoryRepositoryInterface::class);
    $repository->shouldReceive('delete')
        ->once()
        ->with($id)
        ->andReturn(true);

    $service = new PostCategoryService($repository);

    // Act
    $result = $service->deleteCategory($id);

    // Assert
    expect($result)->toBeTrue();
});
