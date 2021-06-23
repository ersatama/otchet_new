<?php


namespace App\Services;

use App\Domain\Repositories\Interfaces\CompulsoryPensionContributionRepositoryInterface;

class CompulsoryPensionContributionService extends BaseService
{
    protected $compulsoryPensionContributionRepository;
    public function __construct(CompulsoryPensionContributionRepositoryInterface $compulsoryPensionContributionRepository)
    {
        $this->compulsoryPensionContributionRepository  =   $compulsoryPensionContributionRepository;
    }

    public function create(array $request)
    {
        return $this->compulsoryPensionContributionRepository->create($request);
    }

    public function delete($id)
    {
        $this->compulsoryPensionContributionRepository->delete($id);
    }

    public function getByIin($iin)
    {
        return $this->compulsoryPensionContributionRepository->getByIin($iin);
    }

    public function getByBin($bin)
    {
        return $this->compulsoryPensionContributionRepository->getByBin($bin);
    }

    public function getByUserId($userId)
    {
        return $this->compulsoryPensionContributionRepository->getByUserId($userId);
    }

    public function getById($id)
    {
        return $this->compulsoryPensionContributionRepository->getById($id);
    }
}
