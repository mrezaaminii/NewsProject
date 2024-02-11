<?php

namespace mam\Article\Contract;

use mam\Article\Http\Requests\ArticleRequest;

interface ArticleRepositoryInterface
{
    public function getAllArticles();
    public function createArticle(array $data);
    public function filterRequest(ArticleRequest $request);
    public function updateArticle(int $id,array $data);
    public function deleteArticles(int $id);
    public function changeArticleStatus(int $id);
    public function query();
    public function getRelatedArticles(int $categoryId,int $id);
    public function home();
}
