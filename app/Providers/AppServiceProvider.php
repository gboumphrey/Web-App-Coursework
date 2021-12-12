<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Services\Logstf;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        app()->singleton(Logstf::class, function ($app){
            return new Logstf('example key');
        });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
