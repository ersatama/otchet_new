<?php

namespace App\Providers\Repositories;

use App\Domain\Repositories\Interfaces\FaqRepositoryInterface;
use App\Domain\Repositories\FaqRepositoryEloquent;
use Illuminate\Support\ServiceProvider;

class FaqRepositoryProvider extends ServiceProvider
{

    public function register()
    {
        $this->app->bind(
            FaqRepositoryInterface::class,
            FaqRepositoryEloquent::class
        );
    }

    public function boot()
    {
        //
    }
}
