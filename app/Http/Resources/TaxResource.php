<?php

namespace App\Http\Resources;

use App\Domain\Contracts\MainContract;
use Illuminate\Http\Resources\Json\JsonResource;

class TaxResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        //return parent::toArray($request);
        return [
            MainContract::ID    =>  $this->id,
            MainContract::IIN   =>  $this->iin,
            MainContract::FULL_NAME =>  $this->full_name,
            MainContract::YEAR  =>  $this->year,
            MainContract::SEMESTER  =>  $this->semester,
            MainContract::SEPARATE_CATEGORIES   =>  $this->separate_categories,
            MainContract::DECLARATION_TYPE  =>  $this->declaration_type,
            MainContract::NOTIFICATION_NUMBER   =>  $this->notification_number,
            MainContract::NOTIFICATION_DATE =>  $this->notification_date,
            MainContract::RESIDENT  =>  $this->resident,
            MainContract::BODY  =>  json_decode($this->body,true),
            MainContract::FULL_NAME_TAXPAYER    =>  $this->full_name_taxpayer,
            MainContract::DECLARATION_DATE  =>  $this->declaration_type,
            MainContract::GOVERNMENT_REVENUE_CODE   =>  $this->government_revenue_code,
            MainContract::GOVERNMENT_REVENUE_CODE_BY_PLACE  =>  $this->government_revenue_code_by_place,
            MainContract::SENT  =>  $this->sent,
        ];
    }
}
