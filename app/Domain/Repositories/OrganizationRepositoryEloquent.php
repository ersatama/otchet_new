<?php


namespace App\Domain\Repositories;

use App\Domain\BaseRepository;
use App\Domain\Repositories\Interfaces\OrganizationRepositoryInterface;
use App\Models\Organization;

class OrganizationRepositoryEloquent implements OrganizationRepositoryInterface
{
    use BaseRepository;
    protected $model;
    public function __construct()
    {
        $this->model    =   Organization::class;
    }
}
