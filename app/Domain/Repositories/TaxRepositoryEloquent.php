<?php


namespace App\Domain\Repositories;

use App\Domain\BaseRepository;
use App\Domain\Contracts\MainContract;
use App\Domain\Repositories\Interfaces\TaxRepositoryInterface;
use App\Models\Tax;

class TaxRepositoryEloquent implements TaxRepositoryInterface
{
    use BaseRepository;
    protected $model;
    public function __construct()
    {
        $this->model    =   Tax::class;
    }

    public function delete($id)
    {
        $this->model::where(MainContract::STATUS,MainContract::OFF)->where([
            MainContract::ID    =>  $id
        ]);
    }

    public function getByOrganizationId($organizationId)
    {
        return $this->model::where([
            [MainContract::ORGANIZATION_ID,$organizationId],
            [MainContract::STATUS,MainContract::ON]
        ])->get();
    }

    public function getByUserId($userId)
    {
        return $this->model::where([
            [MainContract::USER_ID,$userId],
            [MainContract::STATUS,MainContract::ON]
        ])->get();
    }

    public function getById($id)
    {
        return $this->model::where([
            [MainContract::ID,$id],
            [MainContract::STATUS,MainContract::ON]
        ])->first();
    }
}
