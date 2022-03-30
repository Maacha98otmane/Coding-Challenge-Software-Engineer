<?php

namespace App\Contracts;

use Illuminate\Database\Eloquent\Collection;

interface ProductServiceContract
{
    public function create(string $name, string $description, float $price, string $image, array $categories): int;

    public function deleteProduct(int $id): void;

    public function getInOrder(string $sortBy, string $type): Collection;
}
