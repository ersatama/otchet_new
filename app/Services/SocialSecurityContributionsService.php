<?php


namespace App\Services;

use App\Domain\Repositories\Interfaces\SocialSecurityContributionsRepositoryInterface;

class SocialSecurityContributionsService extends BaseService
{
    protected $socialSecurityContributionsRepository;

    public function __construct(SocialSecurityContributionsRepositoryInterface $socialSecurityContributionsRepository)
    {
        $this->socialSecurityContributionsRepository    =   $socialSecurityContributionsRepository;
    }

    public function create($data)
    {
        return $this->socialSecurityContributionsRepository->create($data);
    }

    public function delete($id)
    {
        $this->socialSecurityContributionsRepository->delete($id);
    }

    public function getByIin($iin)
    {
        return $this->socialSecurityContributionsRepository->getByIin($iin);
    }

    public function getByBin($bin)
    {
        return $this->socialSecurityContributionsRepository->getByBin($bin);
    }

    public function getByUserId($userId)
    {
        return $this->socialSecurityContributionsRepository->getByUserId($userId);
    }

    public function getById($id)
    {
        return $this->socialSecurityContributionsRepository->getById($id);
    }

}
