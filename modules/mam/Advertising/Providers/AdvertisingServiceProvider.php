<?php

namespace mam\Advertising\Providers;

use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;

class AdvertisingServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        Route::middleware('web')->group(__DIR__ . '/../Routes/advertising_routes.php');
        $this->loadViewsFrom(__DIR__ . '/../Resources/Views', 'Advs');
        $this->loadJsonTranslationsFrom(__DIR__. '/../Resources/Lang/');
        $this->loadMigrationsFrom(__DIR__ . '/../database/Migrations');
    }

    public function boot(): void
    {
        $this->app->booted(function () {
            Route::matched(function () {
                config()->set('panelConfig.menus.advertising', [
                    'url' => route('advertising.index'),
                    'title' => 'تبلیغات',
                    'icon' => 'file'
                ]);
            });
        });
    }
}
