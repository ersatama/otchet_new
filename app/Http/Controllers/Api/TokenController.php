<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;

use App\Http\Resources\TokenCollection;
use App\Http\Resources\TokenResource;

use App\Http\Requests\Token\TokenCreateRequest;

use App\Services\TokenService;

class TokenController extends Controller
{
    protected $tokenService;
    public function __construct(TokenService $tokenService)
    {
        $this->tokenService =   $tokenService;
    }

    public function create(TokenCreateRequest $request)
    {
        return new TokenResource($this->tokenService->create($request->validated()));
    }

    public function delete($id)
    {
        $this->tokenService->delete($id);
    }

    public function getByUserId($userId)
    {
        return New TokenCollection($this->tokenService->getByUserId($userId));
    }

    public function getById($id)
    {
        if ($token  =   $this->tokenService->getById($id)) {
            return new TokenResource($token);
        }
        return response()->json(['message'   =>  'Token not found'],404);
    }

}
