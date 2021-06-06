<?php


namespace App\Domain\Repositories;

use App\Domain\BaseRepository;
use App\Domain\Contracts\MainContract;
use App\Domain\Repositories\Interfaces\EmployeeRepositoryInterface;
use App\Models\Staff;

class EmployeeRepositoryEloquent implements EmployeeRepositoryInterface
{
    use BaseRepository;
    protected $model;
    public function __construct()
    {
        $this->model    =   Staff::class;
    }

    public function getByOrganizationIdAndUserId(int $organizationId, int $userId)
    {
        return $this->model::where([
            [MainContract::ORGANIZATION_ID,$organizationId],
            [MainContract::USER_ID,$userId]
        ])->first();
    }

    public function list($organizationId)
    {
        return $this->model::with('user','organization')->where([
            [MainContract::ORGANIZATION_ID,$organizationId],
            [MainContract::STATUS,MainContract::ON]
        ])->get();
    }

    public function delete($organizationId,$userId)
    {
        $this->model::where([
            [MainContract::ORGANIZATION_ID,$organizationId],
            [MainContract::USER_ID,$userId]
        ])->update([
            MainContract::STATUS    =>  MainContract::ON
        ]);
    }
}
