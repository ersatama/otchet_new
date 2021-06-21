<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Domain\Contracts\AccessContract;

class AccessResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            AccessContract::USER_ID =>  $this->{AccessContract::USER_ID},
            AccessContract::IIN     =>  $this->{AccessContract::IIN},
            AccessContract::TAX     =>  $this->{AccessContract::TAX},
            AccessContract::VIRTUAL_WAREHOUSE   =>  $this->{AccessContract::VIRTUAL_WAREHOUSE},
            AccessContract::CASH_MACHINE    =>  $this->{AccessContract::CASH_MACHINE},
            AccessContract::DOCUMENTS   =>  $this->{AccessContract::DOCUMENTS},
            AccessContract::STATUS  =>  $this->{AccessContract::STATUS},
        ];
    }
}
