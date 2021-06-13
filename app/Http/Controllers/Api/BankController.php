<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\BankCollection;
use Illuminate\Http\Request;

use App\Services\BankService;

use App\Http\Requests\Bank\BankCreateRequest;
use App\Http\Requests\Bank\BankUpdateRequest;

use App\Http\Resources\BankResource;

class BankController extends Controller
{
    protected BankService $bankService;

    public function __construct(BankService $bankService)
    {
        $this->bankService  =   $bankService;
    }

    public function create(BankCreateRequest $request)
    {
        return new BankResource($this->bankService->create($request->validated()));
    }

    public function update($id, BankUpdateRequest $request)
    {
        if ($bank   =   $this->bankService->update($id, $request->validated())) {
            return new BankResource($bank);
        }
        return response()->json(['message'   =>  'bank not found'],404);
    }

    public function delete($id)
    {
        $this->bankService->delete($id);
    }

    public function getById($id)
    {
        if ($bank   =   $this->bankService->getById($id)) {
            return new BankResource($bank);
        }
        return response()->json(['message'   =>  'bank not found'],404);
    }

    public function getByUserId($userId)
    {
        return new BankCollection($this->bankService->getByUserId($userId));
    }

}
