<?php

namespace App\Contracts;

use Illuminate\Database\Eloquent\Collection;

interface CategoryServiceContract
{
    public function create(string $name, int $parent): int;

    public function delete(int $id): void;

}
