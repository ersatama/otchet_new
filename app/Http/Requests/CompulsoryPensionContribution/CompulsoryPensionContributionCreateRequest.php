<?php

namespace App\Http\Requests\CompulsoryPensionContribution;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use App\Domain\Contracts\CompulsoryPensionContributionContract;
use Illuminate\Http\Exceptions\HttpResponseException;

class CompulsoryPensionContributionCreateRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            CompulsoryPensionContributionContract::USER_ID  =>  'required|exists:users,id',
            CompulsoryPensionContributionContract::PAYMENT_TYPE =>  'required|min:1|max:2',
            CompulsoryPensionContributionContract::PAYMENT_DATE =>  'required|date',
            CompulsoryPensionContributionContract::BIN  =>  'required|min:12|max:12',
            CompulsoryPensionContributionContract::IIN  =>  'required|min:12|max:12',
            CompulsoryPensionContributionContract::SUM  =>  'required',
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
