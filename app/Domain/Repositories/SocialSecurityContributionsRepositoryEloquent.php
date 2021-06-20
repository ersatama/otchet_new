<?php


namespace App\Domain\Repositories;

use App\Domain\BaseRepository;
use App\Domain\Contracts\SocialSecurityContributionsContract;
use App\Domain\Repositories\Interfaces\SocialSecurityContributionsRepositoryInterface;
use App\Models\SocialSecurityContributions;

class SocialSecurityContributionsRepositoryEloquent implements SocialSecurityContributionsRepositoryInterface
{
    use BaseRepository;
    protected $model;
    public function __construct()
    {
        $this->model    =   SocialSecurityContributions::class;
    }

    public function create($data)
    {
        return SocialSecurityContributions::create($data);
    }

    public function delete($id)
    {
        SocialSecurityContributions::where(SocialSecurityContributionsContract::ID,$id)->update([
            SocialSecurityContributionsContract::STATUS =>  SocialSecurityContributionsContract::ON
        ]);
    }

    public function getByIin($iin)
    {
        return SocialSecurityContributions::where([
            [SocialSecurityContributionsContract::IIN, $iin],
            [SocialSecurityContributionsContract::STATUS, SocialSecurityContributionsContract::ON]
        ])->get();
    }

    public function getByBin($bin)
    {
        return SocialSecurityContributions::where([
            [SocialSecurityContributionsContract::BIN, $bin],
            [SocialSecurityContributionsContract::STATUS, SocialSecurityContributionsContract::ON]
        ])->get();
    }

    public function getByUserId($userId)
    {
        return SocialSecurityContributions::where([
            [SocialSecurityContributionsContract::USER_ID, $userId],
            [SocialSecurityContributionsContract::STATUS, SocialSecurityContributionsContract::ON]
        ])->get();
    }

    public function getById($id)
    {
        return SocialSecurityContributions::where([
            [SocialSecurityContributionsContract::ID, $id],
            [SocialSecurityContributionsContract::STATUS, SocialSecurityContributionsContract::ON]
        ])->first();
    }

}
