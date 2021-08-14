<?php

namespace App\Providers;

use App\Helper\Msegat;
use Illuminate\Support\ServiceProvider;

class MsegatServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register()
    {
        $this->app->singleton('msg', function () {
            return new Msegat();
        });
    }

    /**
     * Bootstrap services.
     */
    public function boot()
    {
        //
    }
}
