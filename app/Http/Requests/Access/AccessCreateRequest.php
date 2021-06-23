<?php

namespace App\Http\Requests\Access;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use App\Domain\Contracts\AccessContract;

class AccessCreateRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            AccessContract::USER_ID =>  'required|exists:users,id',
            AccessContract::IIN     =>  'required|required|min:12|max:12',
            AccessContract::TAX     =>  'required|in:on,off',
            AccessContract::VIRTUAL_WAREHOUSE   =>  'required|in:on,off',
            AccessContract::CASH_MACHINE    =>  'required|in:on,off',
            AccessContract::DOCUMENTS   =>  'required|in:on,off',
        ];
    }

    public function validated():array
    {
        $request = $this->validator->validated();
        return $request;
    }

    protected function failedValidation(Validator $validator)
    {
        $response = [
            'status' => 'failure',
            'status_code' => 400,
            'message' => 'Bad Request',
            'errors' => $validator->errors(),
        ];
        throw new HttpResponseException(response()->json($response, 400));
    }
}
