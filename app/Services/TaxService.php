<?php


namespace App\Services;

use App\Domain\Repositories\Interfaces\TaxRepositoryInterface;

class TaxService extends BaseService
{
    protected $taxRepository;
    public function __construct(TaxRepositoryInterface $taxRepository)
    {
        $this->taxRepository    =   $taxRepository;
    }

    public function create(array $data)
    {
        return $this->taxRepository->create($data);
    }

    public function delete($id)
    {
        $this->taxRepository->delete($id);
    }

    public function getByOrganizationId($organizationId)
    {
        return $this->taxRepository->getByOrganizationId($organizationId);
    }

    public function getByUserId($userId)
    {
        return $this->taxRepository->getByUserId($userId);
    }

    public function getById($id)
    {
        return $this->taxRepository->getById($id);
    }
}
