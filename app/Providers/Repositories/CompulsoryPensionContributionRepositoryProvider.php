<?php

namespace App\Providers\Repositories;

use Illuminate\Support\ServiceProvider;
use App\Domain\Repositories\Interfaces\CompulsoryPensionContributionRepositoryInterface;
use App\Domain\Repositories\CompulsoryPensionContributionRepositoryEloquent;

class CompulsoryPensionContributionRepositoryProvider extends ServiceProvider
{

    public function register()
    {
        $this->app->bind(
            CompulsoryPensionContributionRepositoryInterface::class,
            CompulsoryPensionContributionRepositoryEloquent::class
        );
    }

    public function boot()
    {
        //
    }
}
