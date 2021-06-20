<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Services\MandatoryContributionsService;

use App\Http\Resources\MandatoryContributionsResource;
use App\Http\Resources\MandatoryContributionsCollection;

use App\Http\Requests\MandatoryContributions\MandatoryContributionsCreateRequest;

class MandatoryContributionsController extends Controller
{
    protected $mandatoryContributionsService;
    public function __construct(MandatoryContributionsService $mandatoryContributionsService)
    {
        $this->mandatoryContributionsService    =   $mandatoryContributionsService;
    }

    public function create(MandatoryContributionsCreateRequest $request)
    {
        return new MandatoryContributionsResource($this->mandatoryContributionsService->create($request->validated()));
    }

    public function delete($id):void
    {
        $this->mandatoryContributionsService->delete($id);
    }

    public function getByIin($iin)
    {
        return new MandatoryContributionsCollection($this->mandatoryContributionsService->getByIin($iin));
    }

    public function getByUserId($userId)
    {
        return new MandatoryContributionsCollection($this->mandatoryContributionsService->getByUserId($userId));
    }

    public function getById($id)
    {
        if ($mandatoryContribution  =   $this->mandatoryContributionsService->getById($id)) {
            return new MandatoryContributionsResource($mandatoryContribution);
        }
        return response()->json(['message'  =>  'Mandatory Contribution Not Found'],404);
    }

}
