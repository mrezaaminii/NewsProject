<?php

namespace mam\Article\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use mam\Article\Http\Requests\ArticleRequest;
use mam\Article\Models\Article;
use mam\Article\Repositories\ArticleRepository;
use mam\Category\Repositories\CategoryRepository;
use mam\Comment\Repositories\CommentRepository;
use mam\Home\Repositories\HomeRepository;

class ArticleController extends Controller
{
    protected $repository;
    public function __construct(ArticleRepository $repository)
    {
        $this->repository = $repository;
    }

    public function details($slug)
    {
        $article = $this->repository->findBySlug($slug);
        if (is_null($article)) abort(404);
        $homeRepository = new HomeRepository;
        $related_articles = $this->repository->getRelatedArticles($article->category_id,$article->id);
        return view('Article::Home.details',compact('article','related_articles','homeRepository'));
    }

    public function home(CommentRepository $commentRepository)
    {
        $articles =  $this->repository->home()->paginate(6);
        $latestComments = $commentRepository->getAllComments()->latest();
        $mostViewedArticles = $this->repository->getMostViewedArticles()->limit(5);
        return view('Article::Home.home',compact('articles','mostViewedArticles','latestComments'));
    }
}
