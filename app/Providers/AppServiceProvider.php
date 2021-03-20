<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use App\Models\Header;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer(['panels.sidebar'], function ($view) {
            $view->with('headers', Header::get_menus());
        });
    }
}
