<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Domain\Contracts\CompulsoryDeductionsContract;

class CompulsoryDeductionsResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            CompulsoryDeductionsContract::USER_ID        =>  $this->{CompulsoryDeductionsContract::USER_ID},
            CompulsoryDeductionsContract::PAYMENT_TYPE   =>  $this->{CompulsoryDeductionsContract::PAYMENT_TYPE},
            CompulsoryDeductionsContract::PAYMENT_DATE   =>  $this->{CompulsoryDeductionsContract::PAYMENT_DATE},
            CompulsoryDeductionsContract::BIN            =>  $this->{CompulsoryDeductionsContract::BIN},
            CompulsoryDeductionsContract::IIN            =>  $this->{CompulsoryDeductionsContract::IIN},
            CompulsoryDeductionsContract::SUM            =>  $this->{CompulsoryDeductionsContract::SUM},
            CompulsoryDeductionsContract::STATUS         =>  $this->{CompulsoryDeductionsContract::STATUS},
            CompulsoryDeductionsContract::SENT           =>  $this->{CompulsoryDeductionsContract::SENT},
        ];
    }
}
