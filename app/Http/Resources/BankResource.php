<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Domain\Contracts\BankContract;

class BankResource extends JsonResource
{

    public function toArray($request)
    {
        return [
            BankContract::ID    =>  $this->{BankContract::ID},
            BankContract::USER_ID   =>  $this->{BankContract::USER_ID},
            BankContract::BIC   =>  $this->{BankContract::BIC},
            BankContract::IIC   =>  $this->{BankContract::IIC},
            BankContract::NAME  =>  $this->{BankContract::NAME},
            BankContract::STATUS    =>  $this->{BankContract::STATUS},
        ];
    }
}
