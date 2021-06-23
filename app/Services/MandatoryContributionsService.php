<?php


namespace App\Services;

use App\Domain\Repositories\Interfaces\MandatoryContributionsRepositoryInterface;

class MandatoryContributionsService extends BaseService
{
    protected $mandatoryContributionsRepository;
    public function __construct(MandatoryContributionsRepositoryInterface $mandatoryContributionsRepository)
    {
        $this->mandatoryContributionsRepository =   $mandatoryContributionsRepository;
    }

    public function create($data)
    {
        return $this->mandatoryContributionsRepository->create($data);
    }

    public function delete($id):void
    {
        $this->mandatoryContributionsRepository->delete($id);
    }

    public function getByIin($iin)
    {
        return $this->mandatoryContributionsRepository->getByIin($iin);
    }

    public function getByUserId($userId)
    {
        return $this->mandatoryContributionsRepository->getByUserId($userId);
    }

    public function getById($id)
    {
        return $this->mandatoryContributionsRepository->getById($id);
    }

}
