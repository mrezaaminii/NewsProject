<?php

namespace mam\Comment\Providers;

use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;

class CommentServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->loadMigrationsFrom(__DIR__.'/../database/Migrations');
        $this->loadViewsFrom(__DIR__.'/../Resources/Admin/Views','Comment');
        Route::middleware('web')->group(__DIR__.'/../Routes/comment_routes.php');
    }

    public function boot(): void
    {
        $this->app->booted(function (){
            Route::matched(function (){
                config()->set('panelConfig.menus.comment',[
                    'url' => route('comments.index'),
                    'title' => 'نظرات',
                    'icon' => 'comment'
                ]);
            });
        });
    }
}
