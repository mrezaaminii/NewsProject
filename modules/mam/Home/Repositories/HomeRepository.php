<?php

namespace mam\Home\Repositories;

use mam\Article\Models\Article;
use mam\Home\Repositories\BaseRepository;

class HomeRepository extends BaseRepository
{
    public function getVipPosts()
    {
        return Article::query()->where('status',Article::STATUS_ACTIVE)->where('type',Article::TYPE_VIP)->latest();
    }
}
