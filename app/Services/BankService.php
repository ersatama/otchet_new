<?php


namespace App\Services;

use App\Domain\Repositories\Interfaces\BankRepositoryInterface;

class BankService extends BaseService
{

    protected $bankRepository;

    public function __construct(BankRepositoryInterface $bankRepository)
    {
        $this->bankRepository   =   $bankRepository;
    }

    public function create($request)
    {
        return $this->bankRepository->create($request);
    }

    public function update($id,$request)
    {
        return $this->bankRepository->update($id,$request);
    }

    public function delete($id)
    {
        $this->bankRepository->delete($id);
    }

    public function getById($id)
    {
        return $this->bankRepository->getById($id);
    }

    public function getByUserId($userId)
    {
        return $this->bankRepository->getByUserId($userId);
    }

}
