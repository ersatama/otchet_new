<?php


namespace App\Services;

use App\Domain\Repositories\Interfaces\IndividualIncomeTaxRepositoryInterface;

class IndividualIncomeTaxService extends BaseService
{
    protected $individualIncomeTaxRepository;
    public function __construct(IndividualIncomeTaxRepositoryInterface $individualIncomeTaxRepository)
    {
        $this->individualIncomeTaxRepository    =   $individualIncomeTaxRepository;
    }

    public function create($request)
    {
        return $this->individualIncomeTaxRepository->create($request);
    }

    public function delete($id):void
    {
        $this->individualIncomeTaxRepository->delete($id);
    }

    public function iin($iin)
    {
        return $this->individualIncomeTaxRepository->iin($iin);
    }

    public function getByUserId($userId)
    {
        return $this->individualIncomeTaxRepository->getByUserId($userId);
    }

    public function getById($id)
    {
        return $this->individualIncomeTaxRepository->getById($id);
    }

}
