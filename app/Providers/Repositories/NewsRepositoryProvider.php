<?php

namespace App\Providers\Repositories;

use Illuminate\Support\ServiceProvider;
use App\Domain\Repositories\Interfaces\NewsRepositoryInterface;
use App\Domain\Repositories\NewsRepositoryEloquent;

class NewsRepositoryProvider extends ServiceProvider
{

    public function register()
    {
        $this->app->bind(
            NewsRepositoryInterface::class,
            NewsRepositoryEloquent::class
        );
    }

    public function boot()
    {
        //
    }
}
