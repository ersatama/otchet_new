<?php

namespace App\Http\Requests\User;

use App\Domain\Contracts\UserContract;
use Dirape\Token\Token;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Support\Facades\Hash;

class UserUpdateRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            UserContract::RESIDENT  => 'nullable',
            UserContract::ROLE_ID   =>  'nullable|exists:roles,id',
            UserContract::IIN   =>  'nullable|digits:12',
            UserContract::NAME  =>  'nullable',
            UserContract::SURNAME   =>  'nullable',
            UserContract::LAST_NAME =>  'nullable',
            UserContract::EMAIL =>  'nullable|unique:users,email',
            UserContract::GOVERNMENT_REVENUE_CODE   =>  'nullable',
            UserContract::GOVERNMENT_REVENUE_CODE_BY_PLACE  =>  'nullable',
            UserContract::PASSWORD  =>  'nullable|min:8|max:100'
        ];
    }

    public function validated(): array
    {
        $request = $this->validator->validated();
        if ($this->has(UserContract::PASSWORD)) {
            $request[UserContract::PASSWORD]    =   Hash::make($request[UserContract::PASSWORD]);
        }
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
