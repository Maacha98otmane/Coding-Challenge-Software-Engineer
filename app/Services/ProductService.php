<?php

namespace App\Services;

use App\Contracts\ImageServiceContract;
use App\Contracts\ProductServiceContract;
use App\Repositories\Product\ProductRepository;
use Illuminate\Database\Eloquent\Collection;

class ProductService implements ProductServiceContract
{
    private $productRepository;

    public function __construct(ProductRepository $productRepository, ImageServiceContract $imageService)
    {
        $this->productRepository = $productRepository;
        $this->imageService = $imageService;
    }

    public function create(string $name, string $description, float $price, string $image, array $categories = []): int
    {
        $product = $this->productRepository->create(['name' => $name, 'description' => $description, 'price' => $price]);
        if ($categories) {
            $this->productRepository->addCategories($product->id, $categories);
        }
        $path = $this->imageService->setPathImage($image)->saveImage($product->id);
        $this->productRepository->update($product->id, ['image' => $path]);

        return $product->id;
    }

    public function deleteProduct(int $id): void
    {
        $this->productRepository->delete($id);
    }

    public function getInOrder(string $sortBy, string $type): Collection
    {
        return $this->productRepository->getInOrder($sortBy, $type);
    }
}
