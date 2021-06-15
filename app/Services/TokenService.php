<?php


namespace App\Services;

use App\Domain\Repositories\Interfaces\TokenRepositoryInterface;

class TokenService extends BaseService
{
    protected $tokenRepository;
    public function __construct(TokenRepositoryInterface $tokenRepository)
    {
        $this->tokenRepository  =   $tokenRepository;
    }

    public function create($request)
    {
        return $this->tokenRepository->create($request);
    }

    public function delete($id)
    {
        $this->tokenRepository->delete($id);
    }

    public function getByUserId($userId)
    {
        return $this->tokenRepository->getByUserId($userId);
    }

    public function getById($id)
    {
        return $this->tokenRepository->getById($id);
    }

}
