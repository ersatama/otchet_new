<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Domain\Contracts\UserContract;

class UserResource extends JsonResource
{
    public function toArray($request)
    {

        $arr    =   [
            UserContract::ID    =>  $this->{UserContract::ID},
            UserContract::RESIDENT  =>  $this->{UserContract::RESIDENT},
            UserContract::IIN   =>  $this->{UserContract::IIN},
            UserContract::NAME  =>  $this->{UserContract::NAME},
            UserContract::SURNAME   =>  $this->{UserContract::SURNAME},
            UserContract::LAST_NAME =>  $this->{UserContract::LAST_NAME},
            UserContract::EMAIL     =>  $this->{UserContract::EMAIL},
            UserContract::EMAIL_VERIFIED_AT =>  $this->{UserContract::EMAIL_VERIFIED_AT},
            UserContract::GOVERNMENT_REVENUE_CODE   =>  $this->{UserContract::GOVERNMENT_REVENUE_CODE},
            UserContract::GOVERNMENT_REVENUE_CODE_BY_PLACE  =>  $this->{UserContract::GOVERNMENT_REVENUE_CODE_BY_PLACE},
            UserContract::STATUS    =>  $this->{UserContract::STATUS},
            UserContract::API_TOKEN =>  $this->{UserContract::API_TOKEN},
        ];

        if (isset($this->roles)) {
            $arr[UserContract::ROLE_ID] =   new RoleResource($this->roles);
        }

        if (isset($this->organization)) {
            $arr[UserContract::ORGANIZATION]    =   new OrganizationCollection($this->organization);
        }

        return $arr;
    }
}
