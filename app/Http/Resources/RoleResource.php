<?php

namespace App\Http\Resources;

use App\Domain\Contracts\RoleContract;
use Illuminate\Http\Resources\Json\JsonResource;

class RoleResource extends JsonResource
{

    public function toArray($request)
    {
        return [
            RoleContract::ID    =>  $this->id,
            RoleContract::NAME  =>  $this->name
        ];
    }

}
