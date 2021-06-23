<?php

namespace App\Http\Requests\IndividualIncomeTax;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use App\Domain\Contracts\IndividualIncomeTaxContract;

class IndividualIncomeTaxCreateRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            IndividualIncomeTaxContract::USER_ID        =>  'required|exists:users,id',
            IndividualIncomeTaxContract::PAYMENT_DATE   =>  'required|date',
            IndividualIncomeTaxContract::IIN            =>  'required|min:12|max:12',
            IndividualIncomeTaxContract::SUM            =>  'required',
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
