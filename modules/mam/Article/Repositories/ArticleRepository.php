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

    }

    public function uploadArticle(int $id, array $data)
    {

    }

    public function deleteArticles(int $id)
    {

    }

    public function changeArticleStatus(int $id)
    {

    }

    #[ArrayShape(['title' => 'string',
        'user_id' => 'int',
        'category_id' => 'int',
        'time_to_read' => 'int',
        'imagePath' => 'string',
        'imageName' => 'string',
        'score' => 'int',
        'status' => 'string',
        'type' => 'string',
        'body' => 'string'
    ])]
    public function filterRequest(ArticleRequest $request)
    {
        list($imageName,$imagePath) = $this->service->checkIfImageSent($request);
        return [
            'user_id' => auth()->id(),
            'category_id' => $request->category_id,
            'time_to_read' => $request->time_to_read,
            'imagePath' => $imagePath,
            'imageName' => $imageName,
            'score' => $request->score,
            'status' => $request->status,
            'type' => $request->type,
            'body' => $request->body,
        ];
    }
}
