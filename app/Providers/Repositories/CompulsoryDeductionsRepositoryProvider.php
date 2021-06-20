<?php

namespace App\Providers\Repositories;

use Illuminate\Support\ServiceProvider;
use App\Domain\Repositories\Interfaces\CompulsoryDeductionsRepositoryInterface;
use App\Domain\Repositories\CompulsoryDeductionsRepositoryEloquent;

class CompulsoryDeductionsRepositoryProvider extends ServiceProvider
{

    public function register()
    {
        $this->app->bind(
            CompulsoryDeductionsRepositoryInterface::class,
            CompulsoryDeductionsRepositoryEloquent::class
        );
    }

    public function boot()
    {
        //
    }
}
