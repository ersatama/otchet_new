<?php

namespace App\Http\Requests\Tax;

use App\Domain\Contracts\MainContract;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class TaxCreateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            MainContract::USER_ID   =>  'required|exists:users,id',
            MainContract::ORGANIZATION_ID   =>  'required|exists:organizations,id',
            MainContract::IIN   =>  'required|digits:12|exits:users,iin',
            MainContract::FULL_NAME =>  'required|min:2|max:255',
            MainContract::YEAR  =>  'required|min:4|max:4',
            MainContract::SEMESTER  =>  'required|min:1|max:1',
            MainContract::SEPARATE_CATEGORIES   =>  'required|min:1|max:2',
            MainContract::DECLARATION_TYPE      =>  'required|min:1|max:2',
            MainContract::NOTIFICATION_NUMBER   =>  'required',
            MainContract::NOTIFICATION_DATE =>  'required|date',
            MainContract::RESIDENT  =>  'required',
            MainContract::BODY      =>  'required',
            MainContract::FULL_NAME_TAXPAYER    =>  'required',
            MainContract::DECLARATION_DATE  =>  'required|date',
            MainContract::GOVERNMENT_REVENUE_CODE   =>  'required',
            MainContract::GOVERNMENT_REVENUE_CODE_BY_PLACE  =>  'required',
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
