<?php

namespace App\Http\Requests\Egov;

use App\Domain\Contracts\MainContract;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class EgovOrganizationRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            MainContract::ROLE_ID   =>  'required',
            MainContract::ECP   =>  'required|file|max:10240',
            MainContract::ECP_PASSWORD  =>  'required',
            MainContract::GOVERNMENT_REVENUE_CODE   =>  'required',
            MainContract::GOVERNMENT_REVENUE_CODE_BY_PLACE  =>  'required',
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
