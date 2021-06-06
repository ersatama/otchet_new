<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Domain\Contracts\UserContract;

class UserResource extends JsonResource
{
    public function toArray($request)
    {
        return $this;
        $arr    =   [
            UserContract::ID    =>  $this->id,
            UserContract::RESIDENT  =>  $this->resident,
            UserContract::IIN   =>  $this->iin,
            UserContract::NAME  =>  $this->name,
            UserContract::SURNAME   =>  $this->surname,
            UserContract::LAST_NAME =>  $this->last_name,
            UserContract::EMAIL     =>  $this->email,
            UserContract::EMAIL_VERIFIED_AT =>  $this->email_verified_at,
            UserContract::GOVERNMENT_REVENUE_CODE   =>  $this->government_revenue_code,
            UserContract::GOVERNMENT_REVENUE_CODE_BY_PLACE  =>  $this->government_revenue_code_by_place,
            UserContract::STATUS    =>  $this->status,
            UserContract::API_TOKEN =>  $this->api_token,
        ];

        if (isset($this->role)) {
            $arr[UserContract::ROLE_ID] =   new RoleResource($this->role);
        }

        if (isset($this->organization)) {
            $arr[UserContract::ORGANIZATION]    =   new OrganizationResource($this->organization);
        }

        return $arr;
    }
}
