<?php

namespace mam\Home\Providers;

use Illuminate\Support\ServiceProvider;
use mam\Category\Contract\CategoryRepositoryInterface;
use mam\Category\Repositories\CategoryRepository;
use mam\Home\Contract\BaseRepositoryInterface;
use mam\Home\Repositories\BaseRepository;
use mam\User\Contract\UserRepositoryInterface;
use mam\User\Repositories\UserRepository;

class RepositoryServiceProvider extends ServiceProvider
{
    public function register()
    {
        //
    }

    public function boot()
    {
        $this->app->bind(BaseRepositoryInterface::class,BaseRepository::class);
        $this->app->bind(UserRepositoryInterface::class,UserRepository::class);
        $this->app->bind(CategoryRepositoryInterface::class,CategoryRepository::class);
    }
}
