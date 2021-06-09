<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Services\CompulsoryPensionContributionService;

use App\Http\Requests\CompulsoryPensionContribution\CompulsoryPensionContributionCreateRequest;

use App\Http\Resources\CompulsoryPensionContributionResource;
use App\Http\Resources\CompulsoryPensionContributionCollection;

class CompulsoryPensionContributionController extends Controller
{
    protected CompulsoryPensionContributionService $compulsoryPensionContributionService;
    public function __construct(CompulsoryPensionContributionService $compulsoryPensionContributionService)
    {
        $this->compulsoryPensionContributionService =   $compulsoryPensionContributionService;
    }

    public function create(CompulsoryPensionContributionCreateRequest $request)
    {
        return new CompulsoryPensionContributionResource($this->compulsoryPensionContributionService->create($request->validated()));
    }

    public function delete($id)
    {
        $this->compulsoryPensionContributionService->delete($id);
    }

    public function getByIin($iin)
    {
        return new CompulsoryPensionContributionCollection($this->compulsoryPensionContributionService->getByIin($iin));
    }

    public function getByBin($bin)
    {
        return new CompulsoryPensionContributionCollection($this->compulsoryPensionContributionService->getByBin($bin));
    }

    public function getByUserId($userId)
    {
        return new CompulsoryPensionContributionCollection($this->compulsoryPensionContributionService->getByUserId($userId));
    }

    public function getById($id)
    {
        if ($CompulsoryPensionContribution  =   $this->compulsoryPensionContributionService->getById($id)) {
            return new CompulsoryPensionContributionResource($CompulsoryPensionContribution);
        }
        return response()->json(['message'  =>  'Compulsory Pension Contribution Not Found'],404);
    }
}
