<?php

namespace mam\Home\Contract;

interface HomeRepositoryInterface
{
    public function getVipPosts();
    public function getActiveCategories();
    public function getVipArticleOrderedByViews();
}
