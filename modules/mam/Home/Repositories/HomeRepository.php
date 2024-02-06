<?php

namespace mam\Home\Repositories;

use mam\Article\Models\Article;
use mam\Category\Model\Category;
use mam\Home\Contract\HomeRepositoryInterface;
use mam\Home\Repositories\BaseRepository;

class HomeRepository extends BaseRepository implements HomeRepositoryInterface
{
    public function __construct(Article $article)
    {
        parent::__construct($article);
    }
    public function getVipPosts()
    {
        return Article::query()->where('status',Article::STATUS_ACTIVE)->where('type',Article::TYPE_VIP)->latest();
    }

    public function getActiveCategories()
    {
        return Category::query()->where('status',Category::ACTIVE)->latest()->get();
    }
}
