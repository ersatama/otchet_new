<?php

namespace App\Http\Requests\Bank;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use App\Domain\Contracts\BankContract;
use Illuminate\Http\Exceptions\HttpResponseException;

class BankCreateRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            BankContract::USER_ID   =>  'required|exists:users,id',
            BankContract::BIC   =>  'required',
            BankContract::IIC   =>  'required',
            BankContract::NAME  =>  'required'
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
