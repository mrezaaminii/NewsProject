<?php

namespace mam\Article\Contract;

interface ArticleRepositoryInterface
{
    public function getAllArticles();
    public function createArticle(array $data);
    public function uploadArticle(int $id,array $data);
    public function deleteArticles(int $id);
    public function changeArticleStatus(int $id);
}
