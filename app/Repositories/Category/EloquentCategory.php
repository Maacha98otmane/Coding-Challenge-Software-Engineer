<?php

namespace App\Repositories\Category;

use App\Models\Category;

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
}
