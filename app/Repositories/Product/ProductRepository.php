<?php

namespace App\Repositories\Product;

use App\Models\Product;
use Illuminate\Database\Eloquent\Collection;

interface ProductRepository
{
    public function create(array $data): Product;

    public function find(int $id): Product;

    public function update(int $id, array $data): bool;

    public function delete(int $id): void;

    public function addCategories(int $id, array $categories): void;

    public function getInOrder(string $sortBy, string $type): Collection;
}
