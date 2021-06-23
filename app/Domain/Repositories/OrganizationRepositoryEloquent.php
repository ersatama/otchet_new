<?php


namespace App\Domain\Repositories;

use App\Domain\BaseRepository;
use App\Domain\Contracts\MainContract;
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

    public function getByUserId($userId)
    {
        return $this->model::where([
            [MainContract::USER_ID,$userId],
            [MainContract::STATUS,MainContract::ON]
        ])->get();
    }

    public function delete($organizationId)
    {
        $this->model::where(MainContract::ORGANIZATION_ID,$organizationId)->update([
            MainContract::STATUS    =>  MainContract::OFF
        ]);
    }
}
