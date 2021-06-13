<?php


namespace App\Domain\Repositories;

use App\Domain\BaseRepository;
use App\Domain\Repositories\Interfaces\BankRepositoryInterface;

use App\Models\Bank;

use App\Domain\Contracts\BankContract;

class BankRepositoryEloquent implements BankRepositoryInterface
{
    use BaseRepository;
    protected $model;

    public function __construct()
    {
        $this->model    =   Bank::class;
    }

    public function delete($id)
    {
        $this->model::where(BankContract::ID,$id)->update([
            BankContract::STATUS    =>  BankContract::OFF
        ]);
    }

    public function getById($id)
    {
        return $this->model::where([
            [BankContract::ID,$id],
            [BankContract::STATUS,BankContract::ON]
        ])->first();
    }

    public function getByUserId($userId)
    {
        return $this->model::where([
            [BankContract::USER_ID,$userId],
            [BankContract::STATUS,BankContract::ON]
        ])->get();
    }

}
