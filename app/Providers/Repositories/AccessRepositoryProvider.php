<?php

namespace App\Providers\Repositories;

use Illuminate\Support\ServiceProvider;
use App\Domain\Repositories\Interfaces\AccessRepositoryInterface;
use App\Domain\Repositories\AccessRepositoryEloquent;

class AccessRepositoryProvider extends ServiceProvider
{

    public function register()
    {
        $this->app->bind(
            AccessRepositoryInterface::class,
            AccessRepositoryEloquent::class
        );
    }

    public function boot()
    {
        //
    }
}
