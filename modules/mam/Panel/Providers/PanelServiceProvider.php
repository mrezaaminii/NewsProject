<?php

namespace mam\Panel\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;
use mam\Panel\Models\Panel;

class PanelServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        Route::middleware('web')->group(__DIR__.'/../Routes/panel_routes.php');
        $this->mergeConfigFrom(__DIR__.'/../Config/config.php','panelConfig');
        Gate::policy('index',Panel::class);
        $this->loadViewsFrom(__DIR__.'/../Resources/Views','Panel');
    }
    public function boot(): void
    {
        Route::matched(function (){
            $this->app->booted(function (){
                config()->set('panelConfig.menus.panel',[
                    'url' => route('panel.index'),
                    'title' => 'پنل کاربری',
                    'icon' => 'view-dashboard'
                ]);

                config()->set('panelConfig.menus.home',[
                    'url' => route('home.index'),
                    'title' => 'صفحه اصلی',
                    'icon' => 'home'
                ]);

                config()->set('panelConfig.menus.user',[
                    'url' => route('users.index'),
                    'title' => 'صفحه کاربران',
                    'icon' => 'account-group'
                ]);
            });
        });
    }

}
