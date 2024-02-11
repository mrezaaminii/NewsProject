<?php

namespace mam\Article\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use mam\Article\Http\Requests\ArticleRequest;
use mam\Article\Models\Article;
use mam\Article\Repositories\ArticleRepository;
use mam\Category\Repositories\CategoryRepository;
use mam\Home\Repositories\HomeRepository;

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
        $articles = $this->repository->getAllArticles()->paginate(10);
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
        return to_route('articles.index');
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
        return to_route('articles.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id)
    {
        $this->authorize('index',Article::class);
        $this->repository->deleteArticles($id);
        alert()->success('حذف مقاله','مقاله با موفقیت حذف شد');
        return to_route('articles.index');
    }

    public function changeStatus(int $id)
    {
        $this->authorize('index',Article::class);
        return $this->repository->changeArticleStatus($id);
    }

    public function details($slug)
    {
        $article = $this->repository->findBySlug($slug);
        if (is_null($article)) abort(404);
        $homeRepository = new HomeRepository;
        $related_articles = $this->repository->getRelatedArticles($article->category_id,$article->id);
        return view('Article::Home.details',compact('article','related_articles','homeRepository'));
    }
}
