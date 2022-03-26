<?php

namespace App\Repositories\Category;

use App\Models\Category;
use Illuminate\Database\Eloquent\Collection;

interface CategoryRepository
{
    public function create(array $data): Category;

    public function delete(int $id): void;

    public function find(int $id): Category;

    public function getInOrder(string $sortBy, string $type): Collection;
}
