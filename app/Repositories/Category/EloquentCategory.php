<?php

namespace App\Repositories\Category;

use App\Models\Category;
use Illuminate\Database\Eloquent\Collection;

class EloquentCategory implements CategoryRepository
{
    private $model;

    public function __construct(Category $model)
    {
        $this->model = $model;
    }

    public function create(array $data): Category
    {
        return $this->model->create($data);
    }

    public function delete(int $id): void
    {
        $this->model->findOrFail($id)->delete();
    }

    public function find(int $id): Category
    {
        return $this->model->findOrFail($id);
    }

    public function getInOrder(string $sortBy, string $type): Collection
    {
        return $this->model->query()->orderBy($sortBy, $type)->get();
    }
}
