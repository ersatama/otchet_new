<?php

namespace App\Providers\Repositories;

use Illuminate\Support\ServiceProvider;
use App\Domain\Repositories\Interfaces\SocialSecurityContributionsRepositoryInterface;
use App\Domain\Repositories\SocialSecurityContributionsRepositoryEloquent;

class SocialSecurityContributionsRepositoryProvider extends ServiceProvider
{

    public function register()
    {
        $this->app->bind(
            SocialSecurityContributionsRepositoryInterface::class,
            SocialSecurityContributionsRepositoryEloquent::class
        );
    }

    public function boot()
    {
        //
    }
}
