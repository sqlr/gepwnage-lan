<?php

namespace App\Providers;

use Sqlr\GEWIS\GEWIS;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(GEWIS::class, function () {
            return new GEWIS(config('services.gewis'));
        });
    }
}
