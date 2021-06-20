<?php

namespace App\Providers\Repositories;

use Illuminate\Support\ServiceProvider;
use App\Domain\Repositories\Interfaces\MandatoryContributionsRepositoryInterface;
use App\Domain\Repositories\MandatoryContributionsRepositoryEloquent;

class MandatoryContributionsRepositoryProvider extends ServiceProvider
{

    public function register()
    {
        $this->app->bind(
            MandatoryContributionsRepositoryInterface::class,
            MandatoryContributionsRepositoryEloquent::class
        );
    }

    public function boot()
    {
        //
    }
}
