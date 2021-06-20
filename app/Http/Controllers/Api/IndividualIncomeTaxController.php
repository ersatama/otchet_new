<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Services\IndividualIncomeTaxService;

use App\Http\Requests\IndividualIncomeTax\IndividualIncomeTaxCreateRequest;

use App\Http\Resources\IndividualIncomeTaxResource;
use App\Http\Resources\IndividualIncomeTaxCollection;

class IndividualIncomeTaxController extends Controller
{

    protected $individualIncomeTaxService;

    public function __construct(IndividualIncomeTaxService $individualIncomeTaxService)
    {
        $this->individualIncomeTaxService   =   $individualIncomeTaxService;
    }

    public function create(IndividualIncomeTaxCreateRequest $request)
    {
        return new IndividualIncomeTaxResource($this->individualIncomeTaxService->create($request->validated()));
    }

    public function delete($id):void
    {
        $this->individualIncomeTaxService->delete($id);
    }

    public function iin($iin)
    {
        return new IndividualIncomeTaxCollection($this->individualIncomeTaxService->iin($iin));
    }

    public function getByUserId($userId)
    {
        return new IndividualIncomeTaxCollection($this->individualIncomeTaxService->getByUserId($userId));
    }

    public function getById($id)
    {
        if ($individualIncomeTax    =   $this->individualIncomeTaxService->getById($id)) {
            return new IndividualIncomeTaxResource($individualIncomeTax);
        }
        return response()->json(['message'  =>  'Individual Income Tax Not Found'],404);
    }

}
