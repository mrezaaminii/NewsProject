<?php

namespace mam\Article\Repositories;

use mam\Article\Contract\ArticleRepositoryInterface;
use mam\Article\Http\Requests\ArticleRequest;
use mam\Article\Models\Article;
use mam\Article\Services\ArticleService;
use mam\Home\Repositories\BaseRepository;

class ArticleRepository extends BaseRepository implements ArticleRepositoryInterface
{

    public function __construct(Article $article,readonly private ArticleService $service)
    {
        parent::__construct($article);
    }

    public function getAllArticles()
    {
        return $this->getAll();
    }

    public function createArticle(array $data)
    {
        return $this->storeRecord($data);
    }

    public function updateArticle(int $id, array $data)
    {
        return $this->updateRecord($id,$data);
    }

    public function deleteArticles(int $id)
    {
        return $this->deleteRecord($id);
    }

    public function changeArticleStatus(int $id)
    {
        return $this->service->changeArticleStatusService($this->findById($id));
    }

    #[ArrayShape([
        'title' => 'string',
        'user_id' => 'int',
        'category_id' => 'int',
        'time_to_read' => 'int',
        'slug' => 'string',
        'keywords' => 'string',
        'description' => 'string',
        'imagePath' => 'string',
        'imageName' => 'string',
        'score' => 'int',
        'status' => 'string',
        'type' => 'string',
        'body' => 'string'
    ])]
    public function filterRequest(ArticleRequest $request,$article = null)
    {
        if ($request->method() === 'PUT' || $request->method() === 'PATCH'){
            list($imageName,$imagePath) = $this->service->checkIfImageSentWhileUpdating($article,$request);
        }else{
        list($imageName,$imagePath) = $this->service->checkIfImageSent($request);
        }
        return [
            'title' => $request->title,
            'user_id' => auth()->id(),
            'category_id' => $request->category_id,
            'time_to_read' => $request->time_to_read,
            'slug' => $this->service->makeSlug($request->title),
            'keywords' => $request->keywords,
            'description' => $request->description,
            'imagePath' => $imagePath,
            'imageName' => $imageName,
            'score' => $request->score,
            'status' => $request->status,
            'type' => $request->type,
            'body' => $request->body,
        ];
    }

    public function query(): \Illuminate\Database\Eloquent\Builder
    {
        return Article::query();
    }

    public function getRelatedArticles(int $categoryId,int $id)
    {
        return $this->query()->where('category_id',$categoryId)->where('id','!=',$id)->limit(3)->get();
    }

    public function home()
    {
        return Article::query()->where('status',Article::STATUS_ACTIVE)->latest();
    }

    public function getMostViewedArticles()
    {
        return Article::query()->where('status',Article::STATUS_ACTIVE)->orderByViews()->latest();
    }

}
