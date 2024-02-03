<?php

namespace mam\Article\Contract;

use mam\Article\Http\Requests\ArticleRequest;

interface ArticleRepositoryInterface
{
    public function getAllArticles();
    public function createArticle(array $data);
    public function filterRequest(ArticleRequest $request);
    public function uploadArticle(int $id,array $data);
    public function deleteArticles(int $id);
    public function changeArticleStatus(int $id);
}
