<?php

namespace App\Repositories\Category;

use App\Models\Category;
use Illuminate\Database\Eloquent\Collection;

class EloquentCategory implements CategoryRepository
{
    public function create(array $data): Category
    {
        return Category::query()->create($data);
    }

    public function delete(int $id): void
    {
        Category::query()->findOrFail($id)->delete();
    }

    public function find(int $id): Category
    {
        return Category::query()->findOrFail($id);
    }

    public function getInOrder(string $sortBy, string $type): Collection
    {
        return Category::query()->orderBy($sortBy, $type)->get();
    }
}
