<?php

namespace App\Services;

use App\Models\Category;
use App\Traits\ServiceTrait;
use Illuminate\Database\Eloquent\Collection;

class CategoryService
{
    use ServiceTrait;

    public function getAllCategories(): Collection
    {
        return $this->getAll(Category::class);
    }

    public function getCategory(int|string $data, string $column = 'class'): mixed
    {
        return $this->get($data, Category::class, $column);
    }

    public function createCategory(array $data)
    {
        return $this->create($data, Category::class);
    }

    public function updateCategory(int $id, object $data)
    {
        return $this->update($id, $data, Category::class);
    }

    public function deleteCategory(int $id): true
    {
        return $this->delete($id, Category::class);
    }
}
