<?php

namespace App\Services;

use App\Contracts\ImageServiceContract;
use App\Contracts\ProductServiceContract;
use App\Repositories\Product\ProductRepository;

class ProductService implements ProductServiceContract
{
    private $product;

    public function __construct(ProductRepository $product, ImageServiceContract $imageService)
    {
        $this->product = $product;
        $this->imageService = $imageService;
    }

    public function create(string $name, string $description, float $price, string $image, array $categories = []): int
    {
        $product = $this->product->create(['name' => $name, 'description' => $description, 'price' => $price]);
        if ($categories) {
            $this->product->addCategories($product->id, $categories);
        }
        $path = $this->imageService->setPathImage($image)->saveImage($product->id);
        $this->product->update($product->id, ['img_path' => $path]);

        return $product->id;
    }

    public function deleteProduct(int $id): void
    {
        $this->product->delete($id);
    }
}
