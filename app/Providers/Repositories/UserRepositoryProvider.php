<?php

namespace App\Providers\Repositories;

use Illuminate\Support\ServiceProvider;
use App\Domain\Repositories\Interfaces\UserRepositoryInterface;
use App\Domain\Repositories\UserRepositoryEloquent;

class UserRepositoryProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(
            UserRepositoryInterface::class,
            UserRepositoryEloquent::class
        );
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
