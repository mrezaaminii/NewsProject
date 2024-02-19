<?php

namespace mam\Category\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use mam\Article\Models\Article;
use mam\Category\Repositories\CategoryRepository;

class CategoryController extends Controller
{
    protected $repository;
    public function __construct(CategoryRepository $repository)
    {
        $this->repository = $repository;
    }

    public function details(string $slug)
    {
        $category = $this->repository->findBySlug($slug);
        $articles = $category->articles()->where('status',Article::STATUS_ACTIVE)->paginate(5);
        return view('Category::Home.details',compact('category','articles'));
    }
}
