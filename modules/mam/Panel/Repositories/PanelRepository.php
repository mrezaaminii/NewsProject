<?php

namespace mam\Panel\Repositories;

use mam\Article\Models\Article;
use mam\Category\Model\Category;
use mam\Home\Repositories\BaseRepository;
use mam\Panel\Contract\PanelRepositoryInterface;
use mam\Role\Models\Permission;
use mam\User\Models\User;

class PanelRepository implements PanelRepositoryInterface
{
    public function user_count()
    {
        return User::query()->count();
    }

    public function article_count()
    {
        return Article::query()->count();
    }

    public function comment_count()
    {
        return Article::query()->count();
    }

    public function cat_count()
    {
        return Category::query()->count();
    }

    public function getLatestAuthorUsers()
    {
        return User::query()->permission(Permission::PERMISSION_AUTHORS)->latest()->limit(4)->get();
    }

    public function getLatestArticles()
    {
        return Article::query()->latest()->limit(10)->get();
    }
}
