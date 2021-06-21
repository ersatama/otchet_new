<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Services\AccessService;

use App\Http\Resources\AccessResource;
use App\Http\Resources\AccessCollection;

use App\Http\Requests\Access\AccessCreateRequest;
use App\Http\Requests\Access\AccessUpdateRequest;

class AccessController extends Controller
{
    protected $accessService;
    public function __construct(AccessService $accessService)
    {
        $this->accessService    =   $accessService;
    }

    public function create(AccessCreateRequest $request)
    {
        return new AccessResource($this->accessService->create($request->validated()));
    }

    public function update($id, AccessUpdateRequest $request)
    {
        if ($access = $this->accessService->update($id,$request->validated())) {
            return new AccessResource($access);
        }
        return response()->json(['message'   =>  'Access not found'],404);
    }

    public function delete($id):void
    {
        $this->accessService->delete($id);
    }

    public function getByIin($iin)
    {
        return new AccessCollection($this->accessService->getByIin($iin));
    }

    public function getByUserId($userId)
    {
        return new AccessCollection($this->accessService->getByUserId($userId));
    }

}
