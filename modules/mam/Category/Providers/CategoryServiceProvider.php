<?php

namespace mam\Category\Providers;

use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;

class CategoryServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->loadMigrationsFrom(__DIR__ . '/../database/Migrations');
        $this->loadViewsFrom(__DIR__ . '/../Resources/Views', 'Category');
        $this->loadJsonTranslationsFrom(__DIR__.'/../Resources/Lang');
        Route::middleware('web')->group(__DIR__ . '/../Routes/category_routes.php');
    }

    public function boot(): void
    {
        $this->app->booted(function () {
            Route::matched(function () {
                config()->set('panelConfig.menus.categories', [
                    'url' => route('categories.index'),
                    'title' => 'دسته بندی ها',
                    'icon' => 'folder-open'
                ]);
            });
        });
    }
}
