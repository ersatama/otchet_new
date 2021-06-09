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
        if ($user = $this->userService->create($request->validated())) {
            return new UserResource($user);
        }
        return response()->json(['message'   =>  'user not found'],404);
    }

    public function update($id,UserUpdateRequest $request)
    {
        if ($user   =   $this->userService->update($id,$request->validated())) {
            return new UserResource($user);
        }
        return response()->json(['message'   =>  'user not found'],404);
    }

    public function getByIin($iin)
    {
        if ($user   =   $this->userService->getByIin($iin)) {
            return new UserResource($user);
        }
        return response()->json(['message'   =>  'user not found'],404);
    }

    public function getById(int $id)
    {
        if ($user   =   $this->userService->getById($id)) {
            return new UserResource($user);
        }
        return response()->json(['message'   =>  'user not found'],404);
    }

    public function apiToken($token)
    {
        if ($user   =   $this->userService->getByApiToken($token)) {
            return new UserResource($user);
        }
        return response()->json(['message'   =>  'user not found'],404);
    }
}
