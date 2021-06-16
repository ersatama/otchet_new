<?php

namespace App\Providers\Repositories;

use Illuminate\Support\ServiceProvider;
use App\Domain\Repositories\Interfaces\NotificationRepositoryInterface;
use App\Domain\Repositories\NotificationRepositoryEloquent;

class NotificationRepositoryProvider extends ServiceProvider
{

    public function register()
    {
        $this->app->bind(
            NotificationRepositoryInterface::class,
            NotificationRepositoryEloquent::class
        );
    }

    public function boot()
    {
        //
    }
}
