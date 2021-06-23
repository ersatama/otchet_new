<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\CompulsoryDeductionsService;

use App\Http\Resources\CompulsoryDeductionsResource;
use App\Http\Resources\CompulsoryDeductionsCollection;

use App\Http\Requests\CompulsoryDeductions\CompulsoryDeductionsCreateRequest;

class CompulsoryDeductionsController extends Controller
{
    protected $compulsoryDeductionsService;
    public function __construct(CompulsoryDeductionsService $compulsoryDeductionsService)
    {
        $this->compulsoryDeductionsService  =   $compulsoryDeductionsService;
    }

    public function create(CompulsoryDeductionsCreateRequest $request)
    {
        return new CompulsoryDeductionsResource($this->compulsoryDeductionsService->create($request->validated()));
    }

    public function delete($id):void
    {
        $this->compulsoryDeductionsService->delete($id);
    }

    public function getByIin($iin)
    {
        return new CompulsoryDeductionsCollection($this->compulsoryDeductionsService->getByIin($iin));
    }

    public function getByBin($bin)
    {
        return new CompulsoryDeductionsCollection($this->compulsoryDeductionsService->getByBin($bin));
    }

    public function getByUserId($userId)
    {
        return new CompulsoryDeductionsCollection($this->compulsoryDeductionsService->getByUserId($userId));
    }

    public function getById($id)
    {
        if ($compulsoryDeductions = $this->compulsoryDeductionsService->getById($id)) {
            return new CompulsoryDeductionsResource($compulsoryDeductions);
        }
        return response()->json(['message'  =>  'Compulsory Deductions Not Found'],404);
    }

}
