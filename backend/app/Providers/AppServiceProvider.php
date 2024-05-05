<?php

namespace App\Providers;

use App\ClientOutline\Call;
use GuzzleHttp\Client;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /*
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->singleton(Call::class, function ($app) {
            return new Call(new Client(['verify' => false]));
        });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
