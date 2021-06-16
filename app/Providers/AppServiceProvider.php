<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use App\Models\User;
use App\Models\Company;

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
            $view->with('__headers', User::getMenu());
            $view->with('__avatar', Company::getCompanyAvatar());
        });

        view()->composer('content.home', function ($view) {
            $view->with('__details', User::getUserDetails());
        });
    }
}
