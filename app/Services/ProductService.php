<?php

namespace App\Services;

use App\Contracts\ProductServiceContract;
use App\Repositories\Product\ProductRepository;

class ProductService implements ProductServiceContract
{
    private $product;

    public function __construct(ProductRepository $product)
    {
        $this->product = $product;
    }

    public function create(string $name, string $description, float $price, string $img_path, array $categories = []): int
    {
        $product = $this->product->create(['name' => $name, 'description' => $description, 'price' => $price]);
        if ($categories) {
            $this->product->addCategories($product->id, $categories);
        }
        $this->product->update($product->id, ['img_path' => 'c://images/testing']); //img_path static just for test

        return $product->id;
    }

    public function deleteProduct(int $id): void
    {
        $this->product->delete($id);
    }
}
