<?php

namespace App\Providers\Repositories;

use Illuminate\Support\ServiceProvider;
use App\Domain\Repositories\Interfaces\IndividualIncomeTaxRepositoryInterface;
use App\Domain\Repositories\IndividualIncomeTaxRepositoryEloquent;

class IndividualIncomeTaxRepositoryProvider extends ServiceProvider
{

    public function register()
    {
        $this->app->bind(
            IndividualIncomeTaxRepositoryInterface::class,
            IndividualIncomeTaxRepositoryEloquent::class
        );
    }

    public function boot()
    {
        //
    }
}
