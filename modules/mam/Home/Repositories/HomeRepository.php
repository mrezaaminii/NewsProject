<?php

namespace mam\Home\Repositories;

use mam\Article\Models\Article;
use mam\Category\Model\Category;
use mam\Home\Contract\HomeRepositoryInterface;
use mam\Home\Repositories\BaseRepository;
use mam\Role\Models\Permission;
use mam\User\Models\User;

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

    public function getVipArticleOrderedByViews()
    {
        return Article::query()->where('type',Article::TYPE_VIP)->where('status',Article::STATUS_ACTIVE)->orderByViews()->latest()->limit(5)->get();
    }

    public function getUserAuthor()
    {
        return User::query()->permission(Permission::PERMISSION_AUTHORS)->limit(20)->get();
    }

    public function getArticlesOrderedByViews()
    {
        return Article::query()->where('type',Article::TYPE_NORMAL)->where('status',Article::STATUS_ACTIVE)->orderByViews()->latest()->limit(3)->get();
    }

    public function getNewArticles()
    {
        return Article::query()->where('type',Article::TYPE_NORMAL)->where('status',Article::STATUS_ACTIVE)->latest()->limit(8)->get();
    }
}
