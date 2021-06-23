<?php

namespace App\Http\Requests\SocialSecurityContributions;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use App\Domain\Contracts\SocialSecurityContributionsContract;

class SocialSecurityContributionsCreateRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            SocialSecurityContributionsContract::USER_ID  =>  'required|exists:users,id',
            SocialSecurityContributionsContract::PAYMENT_TYPE =>  'required|min:1|max:2',
            SocialSecurityContributionsContract::PAYMENT_DATE =>  'required|date',
            SocialSecurityContributionsContract::BIN  =>  'required|min:12|max:12',
            SocialSecurityContributionsContract::IIN  =>  'required|min:12|max:12',
            SocialSecurityContributionsContract::SUM  =>  'required',
        ];
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
