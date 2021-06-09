<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\TaxService;
use App\Http\Requests\Tax\TaxCreateRequest;
use App\Http\Resources\TaxCollection;
use App\Http\Resources\TaxResource;

class TaxController extends Controller
{
    protected $taxService;
    public function __construct(TaxService $taxService)
    {
        $this->taxService   =   $taxService;
    }

    public function create(TaxCreateRequest $request)
    {
        if ($tax    =   $this->taxService->create($request->validated())) {
            return new TaxResource($tax);
        }
        return response()->json(['message'  =>  'Tax not found',404]);
    }

    public function delete($id)
    {
        $this->taxService->delete($id);
    }

    public function getByOrganizationId($organizationId)
    {
        return new TaxCollection($this->taxService->getByOrganizationId($organizationId));
    }

    public function getByUserId($userId)
    {
        return new TaxCollection($this->taxService->getByUserId($userId));
    }

    public function getById($id)
    {
        if ($tax    =   $this->taxService->getById($id)) {
            return new TaxResource($tax);
        }
        return response()->json(['message'  =>  'Tax not found'],404);
    }
}
