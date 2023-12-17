<?php

namespace mam\Home\Providers;

use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;

class HomeServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->loadViewsFrom(__DIR__.'/../Resources/Views','Home');
//        $this->loadRoutesFrom(__DIR__ .'/../Routes/home-routes.php');
        Route::middleware('web')->group(__DIR__.'/../Routes/home-routes.php');
    }

    public function boot()
    {

    }

}
