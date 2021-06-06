<?php


namespace App\Services;

use App\Domain\Contracts\OrganizationContract;
use App\Domain\Repositories\Interfaces\OrganizationRepositoryInterface;

class OrganizationService extends BaseService
{
    protected $organizationRepository;
    public function __construct(OrganizationRepositoryInterface $organizationRepository)
    {
        $this->organizationRepository   =   $organizationRepository;
    }

    public function create(array $data)
    {
        return $this->organizationRepository->create($data);
    }

    public function getByBin(int $bin)
    {
        return $this->organizationRepository->getByColumn(OrganizationContract::BIN,$bin);
    }
}
