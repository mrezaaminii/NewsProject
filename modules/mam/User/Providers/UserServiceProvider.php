<?php

namespace mam\User\Providers;

use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;

class UserServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->loadMigrationsFrom(__DIR__ . '/../database/Migrations');
        Route::middleware('web')->group(__DIR__.'/../Routes/user_routes.php');
        $this->loadViewsFrom(__DIR__.'/../Resources/Views','User');
    }
}
