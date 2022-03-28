<?php

namespace App\Http\Controllers;

use App\Contracts\ProductServiceContract;
use App\Http\Requests\CreateProductRequest;
use App\Http\Resources\ProductResource;
use App\Repositories\Product\ProductRepository;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function __construct(ProductServiceContract $ProductService, ProductRepository $product)
    {
        $this->ProductService = $ProductService;
        $this->product = $product;
    }

    public function index(Request $request)
    {
        return ProductResource::collection($this->product->getInOrder($request->query('sortBy'), $request->query('sortingType')));
    }

    public function store(CreateProductRequest $request)
    {
        // dd($request->all());
        $this->ProductService->create($request->name, $request->description, $request->price, $request->image, [$request->categories] ?? []);
    }

    public function destroy($id)
    {
        $this->ProductService->deleteProduct($id);
    }
}
