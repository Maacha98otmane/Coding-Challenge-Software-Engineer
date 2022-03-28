<?php

namespace App\Http\Controllers;

use App\Contracts\CategoryServiceContract;
use App\Http\Requests\CreateCategoryRequest;
use App\Http\Resources\CategoryResource;
use App\Repositories\Category\CategoryRepository;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function __construct(CategoryServiceContract $CategoryService, CategoryRepository $category)
    {
        $this->CategoryService = $CategoryService;
        $this->category = $category;
    }

    public function index(Request $request)
    {
        return CategoryResource::collection($this->category->getInOrder($request->query('sortBy') ?? 'name', $request->query('sortingType') ?? 'asc'));
    }

    public function store(CreateCategoryRequest $request)
    {
        $this->CategoryService->create($request->name, 0);
    }

    public function destroy($id)
    {
        $this->CategoryService->delete($id);
    }
}
