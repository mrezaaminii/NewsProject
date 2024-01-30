<?php

namespace mam\Role\Providers;

use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;

class RoleServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        Route::middleware('web')->group(__DIR__.'/../Routes/role_routes.php');
        $this->loadMigrationsFrom(__DIR__.'/../database/Migrations');
        $this->loadViewsFrom(__DIR__.'/../Resources/Views','Role');
    }

    public function boot()
    {
        $this->app->booted(function (){
            Route::matched(function (){
                config()->set('panelConfig.menus.role',[
                    'url' => route('roles.index'),
                    'title' => 'مقام ها',
                    'icon' => 'bug'
                ]);
            });
        });
    }
}
