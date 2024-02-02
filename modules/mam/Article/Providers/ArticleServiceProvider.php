<?php

namespace mam\Article\Providers;

use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;

class ArticleServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        Route::middleware('web')->group(__DIR__.'/../Routes/article_routes.php');
    }

    public function boot(): void
    {

    }
}
