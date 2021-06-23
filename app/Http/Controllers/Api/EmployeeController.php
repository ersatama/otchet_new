<?php

namespace App\Http\Controllers\Api;

use App\Domain\Contracts\MainContract;
use App\Http\Controllers\Controller;
use App\Http\Resources\EmployeeCollection;
use App\Http\Resources\EmployeeResource;
use Illuminate\Http\Request;

use App\Services\EmployeeService;
use App\Services\UserService;

use App\Http\Requests\Employee\EmployeeCreateRequest;

class EmployeeController extends Controller
{

    protected $employeeService;
    protected $userService;

    public function __construct(EmployeeService $employeeService, UserService $userService)
    {
        $this->employeeService  =   $employeeService;
        $this->userService      =   $userService;
    }

    public function create(EmployeeCreateRequest $request)
    {
        $data   =   $request->validated();
        $user   =   $this->userService->getByIin($data[MainContract::IIN]);
        if ($employee   =   $this->employeeService->getByOrganizationIdAndUserId($data[MainContract::ORGANIZATION_ID],$user->id)) {
            return new EmployeeResource($this->employeeService->update($employee->id,[
                MainContract::SALARY    =>  $data[MainContract::SALARY],
                MainContract::STATUS    =>  MainContract::ON,
            ]));
        }
        return new EmployeeResource($this->employeeService->create([
            MainContract::USER_ID   =>  $user->id,
            MainContract::ORGANIZATION_ID   =>  $data[MainContract::ORGANIZATION_ID],
            MainContract::SALARY    =>  $data[MainContract::SALARY],
        ]));
    }

    public function list($organizationId) {
        return new EmployeeCollection($this->employeeService->list($organizationId));
    }

    public function delete($organizationId,$userId) {
        $this->employeeService->delete($organizationId,$userId);
    }

}
