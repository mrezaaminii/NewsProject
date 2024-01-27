<?php

namespace mam\User\Providers;

use Illuminate\Support\ServiceProvider;

class UserServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->loadMigrationsFrom(__DIR__ . '/../database/Migrations');
        $this->loadViewsFrom(__DIR__.'/../Resources/Views','User');
    }
}
