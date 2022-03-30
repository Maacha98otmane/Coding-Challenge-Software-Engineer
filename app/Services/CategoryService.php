<?php

namespace App\Services;

use App\Contracts\CategoryServiceContract;
use App\Repositories\Category\CategoryRepository;
use Illuminate\Database\Eloquent\Collection;

class CategoryService implements CategoryServiceContract
{
    private $categoryRepository;

    public function __construct(CategoryRepository $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
    }

    public function create(string $name, int $parent): int
    {
        return $this->categoryRepository->create(['name' => $name, 'parent_category' => $parent ? $parent : null])->id;
    }

    public function delete(int $id): void
    {
        $this->categoryRepository->find($id)->delete();
    }

    public function getInOrder(string $sortBy, string $type): Collection
    {
        return $this->categoryRepository->getInOrder($sortBy, $type);
    }
}
