<?php

namespace App\Providers\Repositories;

use App\Domain\Repositories\Interfaces\OrganizationRepositoryInterface;
use App\Domain\Repositories\OrganizationRepositoryEloquent;
use Illuminate\Support\ServiceProvider;

class OrganizationRepositoryProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(
            OrganizationRepositoryInterface::class,
            OrganizationRepositoryEloquent::class
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
