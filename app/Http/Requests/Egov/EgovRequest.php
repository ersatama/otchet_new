<?php

namespace App\Http\Requests\Egov;

use App\Domain\Contracts\UserContract;
use Dirape\Token\Token;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use App\Domain\Contracts\MainContract;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Support\Facades\Hash;

class EgovRequest extends FormRequest
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
            MainContract::RESIDENT  =>  'required',
            MainContract::PASSWORD  =>  'required|min:8|max:100',
        ];
    }

    public function validated():array
    {
        $request = $this->validator->validated();
        $request[MainContract::PASSWORD]    =   Hash::make($request[MainContract::PASSWORD]);
        $request[MainContract::API_TOKEN]   =   (new Token())->Unique(UserContract::TABLE,UserContract::API_TOKEN,80);
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
