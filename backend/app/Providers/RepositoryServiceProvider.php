<?php

namespace App\Providers;

use App\Repositories\ServerRepository;
use App\Repositories\ServerRepositoryInterface;
use App\Repositories\UserKeyRepository;
use App\Repositories\UserKeyRepositoryInterface;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(
            ServerRepositoryInterface::class,
            ServerRepository::class
        );
        $this->app->bind(
            UserKeyRepositoryInterface::class,
            UserKeyRepository::class
        );
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
