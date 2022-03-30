<?php

namespace App\Http\Controllers;

use App\Contracts\ProductServiceContract;
use App\Http\Resources\ProductResource;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function __construct(ProductServiceContract $ProductService)
    {
        $this->ProductService = $ProductService;
    }

    public function index(Request $request)
    {
        return ProductResource::collection($this->ProductService->getInOrder($request->query('sortBy'), $request->query('sortingType')));
    }

    public function store(Request $request)
    {
        $this->ProductService->create($request->name, $request->description, $request->price, $request->image, [$request->categories] ?? []);
    }

    public function destroy($id)
    {
        $this->ProductService->deleteProduct($id);
    }
}
