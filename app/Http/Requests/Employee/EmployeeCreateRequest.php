<?php

namespace App\Http\Requests\Employee;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use App\Domain\Contracts\MainContract;
use Illuminate\Http\Exceptions\HttpResponseException;

class EmployeeCreateRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            MainContract::ORGANIZATION_ID   =>  'required|exists:organizations,id',
            MainContract::IIN   =>  'required|digits:12|exists:users,iin',
            MainContract::SALARY    =>  'required',
        ];
    }

    public function validated(): array
    {
        $request = $this->validator->validated();
        $request[MainContract::SALARY]    =   preg_replace('/[^0-9]/', '', $request[MainContract::SALARY]);
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
