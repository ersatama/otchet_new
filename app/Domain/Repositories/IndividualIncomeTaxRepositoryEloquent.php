<?php


namespace App\Domain\Repositories;

use App\Domain\BaseRepository;
use App\Domain\Contracts\IndividualIncomeTaxContract;
use App\Domain\Repositories\Interfaces\IndividualIncomeTaxRepositoryInterface;
use App\Models\IndividualIncomeTax;

class IndividualIncomeTaxRepositoryEloquent implements IndividualIncomeTaxRepositoryInterface
{
    use BaseRepository;
    protected $model;
    public function __construct()
    {
        $this->model    =   IndividualIncomeTax::class;
    }

    public function create($data)
    {
        return $this->model::create($data);
    }

    public function delete($id):void
    {
        $this->model::where(IndividualIncomeTaxContract::ID,$id)->update([
            IndividualIncomeTaxContract::STATUS =>  IndividualIncomeTaxContract::OFF
        ]);
    }

    public function iin($iin)
    {
        return $this->model::where([
            [IndividualIncomeTaxContract::IIN,$iin],
            [IndividualIncomeTaxContract::STATUS,IndividualIncomeTaxContract::ON]
        ])->get();
    }

    public function getByUserId($userId)
    {
        return $this->model::where([
            [IndividualIncomeTaxContract::USER_ID,$userId],
            [IndividualIncomeTaxContract::STATUS,IndividualIncomeTaxContract::ON]
        ])->get();
    }

    public function getById($id)
    {
        return $this->model::where([
            [IndividualIncomeTaxContract::ID,$id],
            [IndividualIncomeTaxContract::STATUS,IndividualIncomeTaxContract::ON]
        ])->first();
    }

}
