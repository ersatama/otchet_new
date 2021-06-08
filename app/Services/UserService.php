<?php

namespace App\Services;

use App\Domain\Contracts\UserContract;
use App\Domain\Repositories\Interfaces\UserRepositoryInterface;

class UserService extends BaseService
{
    protected $userRepository;
    public function __construct(UserRepositoryInterface $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function create(array $data)
    {
        return $this->userRepository->create($data,'roles');
    }

    public function update(int $id, array $data)
    {
        return $this->userRepository->update($id,$data,'roles');
    }

    public function getById(int $id)
    {
        return $this->userRepository->getById($id,'roles');
    }

    public function getByIin(int $iin)
    {
        return $this->userRepository->getByColumn(UserContract::IIN,$iin);
    }

    public function getByApiToken(string $token)
    {
        return $this->userRepository->getByColumn(UserContract::API_TOKEN,$token);
    }
}
