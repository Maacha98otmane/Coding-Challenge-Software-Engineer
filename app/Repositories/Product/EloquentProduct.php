<?php

namespace App\Repositories\Product;

use App\Models\Product;
use Illuminate\Database\Eloquent\Collection;

class EloquentProduct implements ProductRepository
{
    public function create(array $data): Product
    {
        return Product::query()->create($data);
    }

    public function update(int $id, array $data): bool
    {
        return Product::query()->findOrFail($id)->update($data);
    }

    public function find(int $id): Product
    {
        return Product::query()->findOrFail($id);
    }

    public function delete(int $id): void
    {
        $product = Product::query()->find($id);
        $product->delete();
    }

    public function addCategories(int $id, array $categories): void
    {
        Product::query()->find($id)->categories()->sync($categories);
    }

    public function getInOrder(string $sortBy, string $type): Collection
    {
        return Product::query()->orderBy($sortBy, $type)->get();
    }
}
