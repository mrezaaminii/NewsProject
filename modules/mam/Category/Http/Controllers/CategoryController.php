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
        return view('Category::create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CategoryRequest $request)
    {
        $this->repository->
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CategoryRequest $request, Category $category)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        //
    }
}
