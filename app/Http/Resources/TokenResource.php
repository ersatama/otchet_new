<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Domain\Contracts\TokenContract;

class TokenResource extends JsonResource
{

    public function toArray($request)
    {
        return [
            TokenContract::USER_ID  =>  $this->{TokenContract::USER_ID},
            TokenContract::DEVICE   =>  $this->{TokenContract::DEVICE},
            TokenContract::TOKEN    =>  $this->{TokenContract::TOKEN},
            TokenContract::STATUS   =>  $this->{TokenContract::STATUS}
        ];
    }
}
