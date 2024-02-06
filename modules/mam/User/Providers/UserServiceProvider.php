<?php

namespace mam\User\Providers;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;
use mam\User\Models\User;
use mam\User\Policies\UserPolicy;

class UserServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->loadMigrationsFrom(__DIR__ . '/../database/Migrations');
        Route::middleware('web')->group(__DIR__.'/../Routes/user_routes.php');
        Gate::policy(User::class,UserPolicy::class);
        Factory::guessFactoryNamesUsing(function ($name){
            return 'mam\User\database\Factories\\'. class_basename($name).'Factory';
        });
        $this->loadViewsFrom(__DIR__.'/../Resources/Views','User');
    }
}
