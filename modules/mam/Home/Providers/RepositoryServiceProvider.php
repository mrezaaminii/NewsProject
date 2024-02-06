<?php

namespace mam\Home\Providers;

use Illuminate\Support\ServiceProvider;
use mam\Category\Contract\CategoryRepositoryInterface;
use mam\Category\Repositories\CategoryRepository;
use mam\Home\Contract\BaseRepositoryInterface;
use mam\Home\Contract\HomeRepositoryInterface;
use mam\Home\Repositories\BaseRepository;
use mam\Home\Repositories\HomeRepository;
use mam\Role\Contract\RoleRepositoryInterface;
use mam\Role\Repositories\RoleRepository;
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
        $this->app->bind(RoleRepositoryInterface::class,RoleRepository::class);
        $this->app->bind(HomeRepositoryInterface::class,HomeRepository::class);
    }
}
