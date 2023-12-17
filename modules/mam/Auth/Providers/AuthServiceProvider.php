<?php

namespace mam\Auth\Providers;

use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->loadViewsFrom(__DIR__. '/../Resources/Views','Auth');
        Route::middleware('web')->group(__DIR__.'/../Routes/auth_routes.php');
    }
}
