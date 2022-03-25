<?php

namespace App\Contracts;

use App\Services\ImageService;

interface ImageServiceContract
{
    public function setPathImage(string $path): ImageService;

    public function saveImage(int $product_id): string;
}
