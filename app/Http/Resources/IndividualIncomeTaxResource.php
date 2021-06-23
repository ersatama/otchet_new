<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Domain\Contracts\IndividualIncomeTaxContract;

class IndividualIncomeTaxResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            IndividualIncomeTaxContract::USER_ID    =>  $this->{IndividualIncomeTaxContract::USER_ID},
            IndividualIncomeTaxContract::IIN        =>  $this->{IndividualIncomeTaxContract::IIN},
            IndividualIncomeTaxContract::SUM        =>  $this->{IndividualIncomeTaxContract::SUM},
            IndividualIncomeTaxContract::STATUS     =>  $this->{IndividualIncomeTaxContract::STATUS},
            IndividualIncomeTaxContract::SENT       =>  $this->{IndividualIncomeTaxContract::SENT},
        ];
    }
}
