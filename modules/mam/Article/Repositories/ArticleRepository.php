<?php

namespace mam\Article\Repositories;

use mam\Article\Contract\ArticleRepositoryInterface;
use mam\Article\Models\Article;
use mam\Home\Repositories\BaseRepository;

class ArticleRepository extends BaseRepository implements ArticleRepositoryInterface
{

    public function __construct(Article $article)
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
}
