<?php

namespace mam\Comment\Providers;

use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;
use mam\Comment\Services\CommentService;

class CommentServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->loadMigrationsFrom(__DIR__.'/../database/Migrations');
        $this->loadViewsFrom(__DIR__.'/../Resources/Views','Comment');
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

        view()->composer(['Article::Home.details-partials.sidebar-left'],function ($view){
            $commentService = new CommentService;
            $comments = $commentService->getLatestComments();
            $view->with(['comments' => $comments]);
        });
    }
}
