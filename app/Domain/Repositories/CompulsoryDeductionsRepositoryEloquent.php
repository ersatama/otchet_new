<?php


namespace App\Domain\Repositories;

use App\Domain\Repositories\Interfaces\CompulsoryDeductionsRepositoryInterface;
use App\Models\CompulsoryDeductions;
use App\Domain\Contracts\CompulsoryDeductionsContract;

class CompulsoryDeductionsRepositoryEloquent implements CompulsoryDeductionsRepositoryInterface
{
    public function create($data)
    {
        return CompulsoryDeductions::create($data);
    }

    public function delete($id):void
    {
        CompulsoryDeductions::where(CompulsoryDeductionsContract::ID,$id)->update([
            CompulsoryDeductionsContract::STATUS    =>  CompulsoryDeductionsContract::ON
        ]);
    }

    public function getByIin($iin)
    {
        return CompulsoryDeductions::where([
            [CompulsoryDeductionsContract::IIN,$iin],
            [CompulsoryDeductionsContract::STATUS,CompulsoryDeductionsContract::ON]
        ])->get();
    }

    public function getByBin($bin)
    {
        return CompulsoryDeductions::where([
            [CompulsoryDeductionsContract::BIN,$bin],
            [CompulsoryDeductionsContract::STATUS,CompulsoryDeductionsContract::ON]
        ])->get();
    }

    public function getByUserId($userId)
    {
        return CompulsoryDeductions::where([
            [CompulsoryDeductionsContract::USER_ID,$userId],
            [CompulsoryDeductionsContract::STATUS,CompulsoryDeductionsContract::ON]
        ])->get();
    }

    public function getById($id)
    {
        return CompulsoryDeductions::where([
            [CompulsoryDeductionsContract::ID,$id],
            [CompulsoryDeductionsContract::STATUS,CompulsoryDeductionsContract::ON]
        ])->first();
    }

}
