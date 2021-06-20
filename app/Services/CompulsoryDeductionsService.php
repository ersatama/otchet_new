<?php


namespace App\Services;

use App\Domain\Repositories\Interfaces\CompulsoryDeductionsRepositoryInterface;

class CompulsoryDeductionsService extends BaseService
{
    protected $compulsoryDeductionsRepository;
    public function __construct(CompulsoryDeductionsRepositoryInterface $compulsoryDeductionsRepository)
    {
        $this->compulsoryDeductionsRepository   =   $compulsoryDeductionsRepository;
    }

    public function create($data)
    {
        return $this->compulsoryDeductionsRepository->create($data);
    }

    public function delete($id):void
    {
        $this->compulsoryDeductionsRepository->delete($id);
    }

    public function getByIin($iin)
    {
        return $this->compulsoryDeductionsRepository->getByIin($iin);
    }

    public function getByBin($bin)
    {
        return $this->compulsoryDeductionsRepository->getByBin($bin);
    }

    public function getByUserId($userId)
    {
        return $this->compulsoryDeductionsRepository->getByUserId($userId);
    }

    public function getById($id)
    {
        return $this->compulsoryDeductionsRepository->getById($id);
    }

}
