<?php

namespace App\Http\Requests\MandatoryContributions;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use App\Domain\Contracts\MandatoryContributionsContract;

class MandatoryContributionsCreateRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            MandatoryContributionsContract::USER_ID  =>  'required|exists:users,id',
            MandatoryContributionsContract::PAYMENT_TYPE =>  'required|min:1|max:2',
            MandatoryContributionsContract::PAYMENT_DATE =>  'required|date',
            MandatoryContributionsContract::IIN  =>  'required|min:12|max:12',
            MandatoryContributionsContract::SUM  =>  'required',
        ];
    }

    public function validated(): array
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
