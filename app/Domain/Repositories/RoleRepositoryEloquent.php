<?php


namespace App\Domain\Repositories;

use App\Domain\BaseRepository;
use App\Domain\Contracts\MainContract;
use App\Domain\Repositories\Interfaces\RoleRepositoryInterface;
use App\Models\Role;

class RoleRepositoryEloquent implements RoleRepositoryInterface
{
    use BaseRepository;
    protected $model;
    public function __construct()
    {
        $this->model = Role::class;
    }

    public function get()
    {
        return $this->model::get();
    }
}
