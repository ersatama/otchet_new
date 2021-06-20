<?php


namespace App\Domain\Repositories;

use App\Domain\Repositories\Interfaces\MandatoryContributionsRepositoryInterface;
use App\Models\MandatoryContributions;
use App\Domain\Contracts\MandatoryContributionsContract;

class MandatoryContributionsRepositoryEloquent implements MandatoryContributionsRepositoryInterface
{
    public function create($data)
    {
        return MandatoryContributions::create($data);
    }

    public function delete($id):void
    {
        MandatoryContributions::where(MandatoryContributionsContract::ID,$id)->update([
            MandatoryContributionsContract::STATUS  =>  MandatoryContributionsContract::OFF
        ]);
    }

    public function getByIin($iin)
    {
        return MandatoryContributions::where([
            [MandatoryContributionsContract::IIN,$iin],
            [MandatoryContributionsContract::STATUS,MandatoryContributionsContract::ON]
        ])->get();
    }

    public function getByUserId($userId)
    {
        return MandatoryContributions::where([
            [MandatoryContributionsContract::USER_ID,$userId],
            [MandatoryContributionsContract::STATUS,MandatoryContributionsContract::ON]
        ])->get();
    }

    public function getById($id)
    {
        return MandatoryContributions::where([
            [MandatoryContributionsContract::ID,$id],
            [MandatoryContributionsContract::STATUS,MandatoryContributionsContract::ON]
        ])->first();
    }

}
