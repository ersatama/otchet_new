<?php

namespace App\Http\Controllers\Api;

use App\Domain\Contracts\UserContract;
use App\Http\Controllers\Controller;

use Dirape\Token\Token;
use Illuminate\Support\Facades\Hash;

use App\Services\UserService;
use App\Services\EgovService;
use App\Services\OrganizationService;

use Illuminate\Http\Request;
use App\Http\Requests\User\UserCreateRequest;
use App\Http\Requests\User\UserUpdateRequest;
use App\Http\Requests\Egov\EgovRequest;

use App\Http\Resources\UserResource;

use App\Domain\Contracts\MainContract;

class UserController extends Controller
{

    protected $userService;
    protected $egovService;
    protected $organizationService;

    public function __construct(UserService $userService, EgovService $egovService, OrganizationService $organizationService)
    {
        $this->userService  =   $userService;
        $this->egovService  =   $egovService;
        $this->organizationService  =   $organizationService;
    }

    public function file(EgovRequest $request)
    {

        if ($data   =   $this->egovService->getByEcp($request->validated())) {

            if ($this->userService->getByIin($data[MainContract::IIN])) {
                return response([MainContract::MESSAGE   =>  __('main.iin_exists')],400);
            } elseif ($this->organizationService->getByBin($data[MainContract::BIN])) {
                return response([MainContract::MESSAGE   =>  __('main.bin_exists')],400);
            }
            $user   =   $this->userService->create($data);
            $data[MainContract::USER_ID]    =   $user->id;

            $user->organization =   $this->organizationService->create($data);
            return $user;
        }
        return response([MainContract::MESSAGE   =>  __('main.ecp_error')],400);
    }

    public function create(UserCreateRequest $request)
    {
        return new UserResource($this->userService->create($request->validated()));
    }

    public function update($id,UserUpdateRequest $request)
    {
        return new UserResource($this->userService->update($id,$request->validated()));
    }

    public function getById(int $id)
    {
        return new UserResource($this->userService->getById($id));
    }

    public function apiToken($token)
    {
        return new UserResource($this->userService->getByApiToken($token));
    }
}
