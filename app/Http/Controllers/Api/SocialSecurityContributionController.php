<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\SocialSecurityContributions\SocialSecurityContributionsCreateRequest;

use App\Services\SocialSecurityContributionsService;

use App\Http\Resources\SocialSecurityContributionResource;
use App\Http\Resources\SocialSecurityContributionCollection;

class SocialSecurityContributionController extends Controller
{
    protected $socialSecurityContributionsService;
    public function __construct(SocialSecurityContributionsService $socialSecurityContributionsService)
    {
        $this->socialSecurityContributionsService   =   $socialSecurityContributionsService;
    }

    public function create(SocialSecurityContributionsCreateRequest $request)
    {
        return new SocialSecurityContributionResource($this->socialSecurityContributionsService->create($request->validated()));
    }

    public function delete($id)
    {
        $this->socialSecurityContributionsService->delete($id);
    }

    public function getByIin($iin)
    {
        return new SocialSecurityContributionCollection($this->socialSecurityContributionsService->getByIin($iin));
    }

    public function getByBin($bin)
    {
        return new SocialSecurityContributionCollection($this->socialSecurityContributionsService->getByBin($bin));
    }

    public function getByUserId($userId)
    {
        return new SocialSecurityContributionCollection($this->socialSecurityContributionsService->getByUserId($userId));
    }

    public function getById($id)
    {
        if ($socialSecurityContribution = $this->socialSecurityContributionsService->getById($id)) {
            return new SocialSecurityContributionResource($socialSecurityContribution);
        }
        return response()->json(['message'  =>  'Social Security Contribution Not Found'],404);
    }

}
