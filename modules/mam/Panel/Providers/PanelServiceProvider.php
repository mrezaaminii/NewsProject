<?php

namespace mam\Panel\Providers;

use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;

class PanelServiceProvider extends ServiceProvider
{
    public function register()
    {
        Route::middleware('web')->group(__DIR__.'/../Routes/panel_routes.php');
        $this->loadViewsFrom(__DIR__.'/../Resources/Views','Panel');
    }
}
