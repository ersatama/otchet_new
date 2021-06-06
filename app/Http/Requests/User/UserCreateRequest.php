<?php

namespace App\Http\Requests\User;

use Dirape\Token\Token;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use App\Domain\Contracts\UserContract;
use Illuminate\Support\Facades\Hash;

class UserCreateRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            UserContract::ROLE_ID   =>  'required|exists:roles,id',
            UserContract::RESIDENT  => 'nullable',
            UserContract::IIN   =>  'required|digits:12',
            UserContract::NAME  =>  'nullable',
            UserContract::SURNAME   =>  'nullable',
            UserContract::LAST_NAME =>  'nullable',
            UserContract::EMAIL =>  'required|unique:users,email',
            UserContract::GOVERNMENT_REVENUE_CODE   =>  'nullable',
            UserContract::GOVERNMENT_REVENUE_CODE_BY_PLACE  =>  'nullable',
            UserContract::PASSWORD  =>  'required|min:8|max:100'
        ];
    }

    public function validated(): array
    {
        $request = $this->validator->validated();
        if (!$this->has(UserContract::RESIDENT)) {
            $request[UserContract::RESIDENT]    =   UserContract::UNDEFINED;
        }
        $request[UserContract::PASSWORD]    =   Hash::make($request[UserContract::PASSWORD]);
        $request[UserContract::API_TOKEN]   =   (new Token())->Unique(UserContract::TABLE,UserContract::API_TOKEN,80);
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
