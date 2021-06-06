<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Domain\Contracts\OrganizationContract;

class OrganizationResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            OrganizationContract::ID    =>  $this->id,
            OrganizationContract::USER_ID   =>  $this->user_id,
            OrganizationContract::NAME      =>  $this->name,
            OrganizationContract::BIN       =>  $this->bin,
            OrganizationContract::EMAIL     =>  $this->email,
        ];
    }
}
