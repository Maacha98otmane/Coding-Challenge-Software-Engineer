<?php

namespace App\Contracts;

interface ProductServiceContract
{
    public function create(string $name, string $description, float $price, string $image, array $categories): int;

    public function deleteProduct(int $id): void;
}
