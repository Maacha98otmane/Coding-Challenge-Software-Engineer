<?php

namespace App\Repositories\Product;

use App\Models\Product;

class EloquentProduct implements ProductRepository
{
    private $model;

    public function __construct(Product $model)
    {
        $this->model = $model;
    }

    public function create(array $data): Product
    {
        return $this->model->create($data);
    }

    public function update(int $id, array $data): bool
    {
        return $this->model->findOrFail($id)->update($data);
    }

    public function find(int $id): Product
    {
        return $this->model->findOrFail($id);
    }

    public function delete(int $id): void
    {
        $product = $this->find($id);
        $product->delete();
    }

    public function addCategories(int $id, array $categories): void
    {
        $this->model->find($id)->categories()->sync($categories);
    }
}