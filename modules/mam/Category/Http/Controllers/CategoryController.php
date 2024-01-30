<?php

namespace mam\Category\Http\Controllers;

use Illuminate\Http\Request;
use mam\Category\Http\Requests\CategoryRequest;
use mam\Category\Model\Category;
use mam\Category\Repositories\CategoryRepository;

class CategoryController extends \App\Http\Controllers\Controller
{
    protected $repository;

    public function __construct(CategoryRepository $categoryRepository)
    {
        $this->repository = $categoryRepository;
    }

    public function index()
    {
        $categories = $this->repository->getAllCategories();
        return view('Category::index',compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = $this->filterCategoriesForSelectOption();
        return view('Category::create',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CategoryRequest $request): \Illuminate\Http\RedirectResponse
    {
        $this->repository->storeCategory($request->only((new Category())->getFillable()));
        return to_route('categories.index');
    }

    /**
     * Display the specified resource.
     */
//    public function show(int $id)
//    {
//        $category = $this->repository->findById($id);
//        return view('Category::show',compact('category'));
//    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(int $id)
    {
        $category = $this->repository->findById($id);
        $categories = $this->filterCategoriesForSelectOption()->except($id);
        return view('Category::edit', compact('category','categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CategoryRequest $request, int $id): \Illuminate\Http\RedirectResponse
    {
        $this->repository->updateCategory($id,$request->only((new Category())->getFillable()));
        return to_route('categories.index');
    }

    public function filterCategoriesForSelectOption()
    {
        return $this->repository->getAll()->pluck('title','id')->prepend('--','');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id): \Illuminate\Http\RedirectResponse
    {
        $this->repository->deleteCategory($id);
        return to_route('categories.index');
    }

    public function changeStatus(int $id)
    {
        return $this->repository->changeCategoryStatus($id);
    }
}
