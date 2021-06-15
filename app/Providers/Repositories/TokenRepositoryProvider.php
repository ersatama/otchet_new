<?php

namespace App\Providers\Repositories;

use Illuminate\Support\ServiceProvider;

use App\Domain\Repositories\Interfaces\TokenRepositoryInterface;
use App\Domain\Repositories\TokenRepositoryEloquent;

class TokenRepositoryProvider extends ServiceProvider
{

    public function register()
    {
        $this->app->bind(
            TokenRepositoryInterface::class,
            TokenRepositoryEloquent::class
        );
    }

    public function boot()
    {
        //
    }
}
