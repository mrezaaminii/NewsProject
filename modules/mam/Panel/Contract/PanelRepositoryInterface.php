<?php

namespace mam\Panel\Contract;

interface PanelRepositoryInterface
{
    public function user_count();

    public function article_count();

    public function comment_count();

    public function cat_count();
}
