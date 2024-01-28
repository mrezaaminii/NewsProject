<?php

namespace mam\Category\Providers;

use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;

class CategoryServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->loadMigrationsFrom(__DIR__.'/../database/Migrations');
        $this->loadViewsFrom(__DIR__.'/../Resources/Views','Category');
        Route::middleware('web')->group(__DIR__.'/../Routes/category_routes.php');
    }

    public function boot()
    {
        //
    }
}
