<?php

namespace App\Http\Controllers\Api;

use App\Domain\Contracts\MainContract;
use App\Http\Controllers\Controller;
use App\Http\Requests\Egov\EgovOrganizationRequest;
use Illuminate\Http\Request;

use App\Services\UserService;
use App\Services\OrganizationService;
use App\Services\EgovService;

use App\Http\Resources\UserResource;
use App\Http\Resources\OrganizationResource;
use App\Http\Resources\OrganizationCollection;

class OrganizationController extends Controller
{

    protected $organizationService;
    protected $egovService;
    protected $userService;

    public function __construct(OrganizationService $organizationService, EgovService $egovService, UserService $userService)
    {
        $this->organizationService  =   $organizationService;
        $this->egovService          =   $egovService;
        $this->userService          =   $userService;
    }

    public function getByUserId($userId)
    {
        return new OrganizationCollection($this->organizationService->getByUserId($userId));
    }

    public function getByBin($bin)
    {
        if ($organization   =   $this->organizationService->getByBin($bin)) {
            return new OrganizationResource($organization);
        }
        return response()->json(['message'  =>  'Organization not found'],404);
    }

    public function delete($organizationId)
    {
        $this->organizationService->delete($organizationId);
    }

    public function file($userId, EgovOrganizationRequest $request)
    {
        if ($data   =   $this->egovService->getByEcp($request->validated())) {
            if ($this->organizationService->getByBin($data[MainContract::BIN])) {
                return response([MainContract::MESSAGE   =>  __('main.bin_exists')],400);
            }
            if ($user   =   $this->userService->update($userId, $data)) {
                $user->organization =   $this->organizationService->create($data);
                return new UserResource($user);
            }
        }
        return response([MainContract::MESSAGE   =>  __('main.ecp_error')],400);
    }
}
