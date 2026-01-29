<?php

declare(strict_types=1);

namespace App\Services\Blog;

use App\Contracts\Repositories\Blog\PostCategoryRepositoryInterface;
use App\DTO\Blog\PostCategoryData;
use App\Models\Blog\PostCategory;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Str;

class PostCategoryService
{
    public function __construct(
        private readonly PostCategoryRepositoryInterface $repository
    ) {}

    /**
     * @return Collection<int, PostCategory>
     */
    public function getAllCategories(): Collection
    {
        return $this->repository->all();
    }

    public function createCategory(PostCategoryData $data): PostCategory
    {
        // İş mantığı: Slug boşsa name'den oluştur (DTO'da yapılıyor ama burada da garanti edebiliriz veya ekstra logic ekleyebiliriz)
        // Burada basit bir passthrough yapıyoruz ama ileride "kategori oluşturulunca admin'e mail at" gibi logicler buraya gelecek.

        return $this->repository->create($data);
    }

    public function updateCategory(int $id, PostCategoryData $data): PostCategory
    {
        return $this->repository->update($id, $data);
    }

    public function deleteCategory(int $id): bool
    {
        // İş mantığı: Kategoriye bağlı postlar varsa silme?
        // Şimdilik direkt repository'e iletiyoruz.
        return $this->repository->delete($id);
    }

    public function findCategory(int $id): ?PostCategory
    {
        return $this->repository->find($id);
    }
}
