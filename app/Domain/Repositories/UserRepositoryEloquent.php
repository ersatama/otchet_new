<?php

namespace App\Domain\Repositories;

use App\Domain\Repositories\Interfaces\UserRepositoryInterface;
use App\Domain\BaseRepository;
use App\Models\User;

class UserRepositoryEloquent implements UserRepositoryInterface
{
    use BaseRepository;
    protected $model;
    public function __construct()
    {
        $this->model = User::class;
    }
}
