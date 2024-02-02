<?php

namespace mam\Article\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;
use mam\Article\Models\Article;
use mam\Article\Policies\ArticlePolicy;

class ArticleServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        Route::middleware('web')->group(__DIR__.'/../Routes/article_routes.php');
        $this->loadViewsFrom(__DIR__.'/../Resources/Views','Article');
        Gate::policy(Article::class,ArticlePolicy::class);
        $this->loadMigrationsFrom(__DIR__.'/../database/Migrations');
    }

    public function boot(): void
    {
        $this->app->booted(function (){
            Route::matched(function (){
                config()->set('panelConfig.menus.article',[
                    'url' => route('articles.index'),
                    'title' => 'مقالات',
                    'icon' => 'book'
                ]);
            });
        });
    }
}
