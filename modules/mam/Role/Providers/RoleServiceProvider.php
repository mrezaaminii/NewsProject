<?php

namespace mam\Role\Providers;

use Database\Seeders\DatabaseSeeder;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;
use mam\Role\database\Seeders\PermissionSeeder;
use mam\Role\database\Seeders\RolePermissionSeeder;
use mam\Role\Models\Permission;
use mam\Role\Models\Role;
use mam\Role\Policies\RolePolicy;

class RoleServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->loadMigrationsFrom(__DIR__.'/../database/Migrations/');
        Route::middleware('web')->group(__DIR__.'/../Routes/role_routes.php');
        $this->loadJsonTranslationsFrom(__DIR__.'/../Resources/Lang/');
        DatabaseSeeder::$seeders[] = PermissionSeeder::class;
        DatabaseSeeder::$seeders[] = RolePermissionSeeder::class;
        Gate::before(function ($user){
            return $user->hasPermissionTo(Permission::PERMISSION_SUPER_ADMIN) ? true : null;
        });
        Gate::policy(Role::class,RolePolicy::class);
        $this->loadViewsFrom(__DIR__.'/../Resources/Views','Role');
    }

    public function boot(): void
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
