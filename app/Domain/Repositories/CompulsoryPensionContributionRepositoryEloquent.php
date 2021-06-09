<?php


namespace App\Domain\Repositories;

use App\Domain\BaseRepository;
use App\Domain\Contracts\CompulsoryPensionContributionContract;
use App\Domain\Repositories\Interfaces\CompulsoryPensionContributionRepositoryInterface;
use App\Models\CompulsoryPensionContribution;

class CompulsoryPensionContributionRepositoryEloquent implements CompulsoryPensionContributionRepositoryInterface
{
    use BaseRepository;
    protected $model;
    public function __construct()
    {
        $this->model    =   CompulsoryPensionContribution::class;
    }

    public function delete($id)
    {
        $this->model::where(CompulsoryPensionContributionContract::ID,$id)->update([
            CompulsoryPensionContributionContract::STATUS   =>  CompulsoryPensionContributionContract::OFF
        ]);
    }

    public function getByIin($iin)
    {
        return $this->model::where([
            [CompulsoryPensionContributionContract::IIN,$iin],
            [CompulsoryPensionContributionContract::STATUS,CompulsoryPensionContributionContract::ON]
        ])->get();
    }

    public function getByBin($bin)
    {
        return $this->model::where([
            [CompulsoryPensionContributionContract::BIN,$bin],
            [CompulsoryPensionContributionContract::STATUS,CompulsoryPensionContributionContract::ON]
        ])->get();
    }

    public function getByUserId($userId)
    {
        return $this->model::where([
            [CompulsoryPensionContributionContract::USER_ID,$userId],
            [CompulsoryPensionContributionContract::STATUS,CompulsoryPensionContributionContract::ON]
        ])->get();
    }

    public function getById($id)
    {
        return $this->model::where([
            [CompulsoryPensionContributionContract::ID,$id],
            [CompulsoryPensionContributionContract::STATUS,CompulsoryPensionContributionContract::ON]
        ])->first();
    }
}
