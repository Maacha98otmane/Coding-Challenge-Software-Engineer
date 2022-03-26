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

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return CategoryResource::collection($this->category->getInOrder($request->query('sortBy'), $request->query('sortingType')));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(CreateCategoryRequest $request)
    {
        $this->CategoryService->create($request->name, 0);
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
    }

    /**
     * Update the specified resource in storage.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->CategoryService->delete($id);
    }
}
