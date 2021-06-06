<?php


namespace App\Services;

use App\Domain\Contracts\MainContract;
use App\Domain\Repositories\Interfaces\EmployeeRepositoryInterface;

class EmployeeService extends BaseService
{
    protected $employeeRepository;
    protected $with =   ['organization','user'];
    public function __construct(EmployeeRepositoryInterface $employeeRepository)
    {
        $this->employeeRepository   =   $employeeRepository;
    }

    public function getByOrganizationIdAndUserId(int $organizationId, int $userId)
    {
        return $this->employeeRepository->getByOrganizationIdAndUserId($organizationId,$userId);
    }

    public function update(int $id, array $data)
    {
        return $this->employeeRepository->update($id,$data,$this->with);
    }

    public function create(array $data)
    {
        return $this->employeeRepository->create($data,$this->with);
    }

    public function list($organizationId)
    {
        return $this->employeeRepository->list($organizationId);
    }

    public function delete($organizationId,$userId)
    {
        $this->employeeRepository->delete($organizationId,$userId);
    }

}
