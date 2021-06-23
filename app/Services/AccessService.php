<?php


namespace App\Services;

use App\Domain\Repositories\Interfaces\AccessRepositoryInterface;

class AccessService extends BaseService
{
    protected $accessRepository;
    public function __construct(AccessRepositoryInterface $accessRepository)
    {
        $this->accessRepository =   $accessRepository;
    }

    public function create($data)
    {
        return $this->accessRepository->create($data);
    }

    public function update($id, $data)
    {
        return $this->accessRepository->update($id, $data);
    }

    public function delete($id):void
    {
        $this->accessRepository->delete($id);
    }

    public function getByIin($iin)
    {
        return $this->accessRepository->getByIin($iin);
    }

    public function getByUserId($userId)
    {
        return $this->accessRepository->getByUserId($userId);
    }

}
