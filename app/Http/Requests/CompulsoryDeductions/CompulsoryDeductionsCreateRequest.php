<?php

namespace App\Http\Requests\CompulsoryDeductions;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use App\Domain\Contracts\CompulsoryDeductionsContract;

class CompulsoryDeductionsCreateRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            CompulsoryDeductionsContract::USER_ID  =>  'required|exists:users,id',
            CompulsoryDeductionsContract::PAYMENT_TYPE =>  'required|min:1|max:2',
            CompulsoryDeductionsContract::PAYMENT_DATE =>  'required|date',
            CompulsoryDeductionsContract::BIN  =>  'required|min:12|max:12',
            CompulsoryDeductionsContract::IIN  =>  'required|min:12|max:12',
            CompulsoryDeductionsContract::SUM  =>  'required',
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
