<?php

namespace App\Providers\Repositories;

use App\Domain\Repositories\Interfaces\BankRepositoryInterface;
use App\Domain\Repositories\BankRepositoryEloquent;
use Illuminate\Support\ServiceProvider;

class BankRepositoryProvider extends ServiceProvider
{

    public function register()
    {
        $this->app->bind(
            BankRepositoryInterface::class,
            BankRepositoryEloquent::class
        );
    }

    public function boot()
    {
        //
    }
}
