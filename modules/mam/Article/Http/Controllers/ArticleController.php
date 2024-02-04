<?php

namespace mam\Article\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use mam\Article\Http\Requests\ArticleRequest;
use mam\Article\Models\Article;
use mam\Article\Repositories\ArticleRepository;
use mam\Article\Services\ArticleService;
use mam\Category\Repositories\CategoryRepository;

class ArticleController extends Controller
{

    protected $repository;
    public function __construct(ArticleRepository $repository)
    {
        $this->repository = $repository;
    }

    public function index()
    {
        $this->authorize('index',Article::class);
        $articles = $this->repository->getAllArticles();
        return view('Article::index',compact('articles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(CategoryRepository $categoryRepository)
    {
        $this->authorize('index',Article::class);
        $categories = $categoryRepository->getAllCategories();
        return view('Article::create',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ArticleRequest $request)
    {
        $this->authorize('index',Article::class);
        $articleData = $this->repository->filterRequest($request);
        $this->repository->createArticle($articleData);
        alert()->success('ذخیره مقاله','مقاله با موفقیت ذخیره شد');
        return to_route('Article::index');
    }

    /**
     * Display the specified resource.
     */

    public function edit(int $id,CategoryRepository $categoryRepository)
    {
        $this->authorize('index',Article::class);
        $article = $this->repository->findById($id);
        $categories = $categoryRepository->getAllCategories();
        return view('Article::edit',compact('categories','article'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ArticleRequest $request, int $id)
    {
        $this->authorize('index',Article::class);
        $article = $this->repository->findById($id);
        $data = $this->repository->filterRequest($request,$article);
        $this->repository->updateArticle($id,$data);
        alert()->success('ویرایش مقاله','مقاله با موفقیت ویرایش شد');
        return to_route('Article::index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id)
    {
        $this->authorize('index',Article::class);
        $this->repository->deleteArticles($id);
        alert()->success('حذف مقاله','مقاله با موفقیت حذف شد');
        return to_route('Article::index');
    }
}
