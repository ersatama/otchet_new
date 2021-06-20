<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Domain\Contracts\MandatoryContributionsContract;

class MandatoryContributionsResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            MandatoryContributionsContract::USER_ID         =>  $this->{MandatoryContributionsContract::USER_ID},
            MandatoryContributionsContract::PAYMENT_TYPE    =>  $this->{MandatoryContributionsContract::PAYMENT_TYPE},
            MandatoryContributionsContract::PAYMENT_DATE    =>  $this->{MandatoryContributionsContract::PAYMENT_DATE},
            MandatoryContributionsContract::IIN             =>  $this->{MandatoryContributionsContract::IIN},
            MandatoryContributionsContract::SUM             =>  $this->{MandatoryContributionsContract::SUM},
            MandatoryContributionsContract::STATUS          =>  $this->{MandatoryContributionsContract::STATUS},
            MandatoryContributionsContract::SENT            =>  $this->{MandatoryContributionsContract::SENT},
        ];
    }
}
