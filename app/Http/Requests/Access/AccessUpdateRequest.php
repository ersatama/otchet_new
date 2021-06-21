<?php

namespace App\Http\Requests\Access;

use App\Domain\Contracts\AccessContract;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class AccessUpdateRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            AccessContract::TAX     =>  'nullable|in:on,off',
            AccessContract::VIRTUAL_WAREHOUSE   =>  'nullable|in:on,off',
            AccessContract::CASH_MACHINE    =>  'nullable|in:on,off',
            AccessContract::DOCUMENTS   =>  'nullable|in:on,off',
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
