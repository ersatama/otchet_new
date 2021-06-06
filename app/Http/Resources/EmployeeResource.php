<?php

namespace App\Http\Resources;

use App\Domain\Contracts\MainContract;
use Illuminate\Http\Resources\Json\JsonResource;

class EmployeeResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            MainContract::ID    =>  $this->id,
            MainContract::SALARY    =>  $this->salary,
            MainContract::USER  =>  [
                MainContract::ID    =>  $this->user->id,
                MainContract::ROLE_ID   =>  $this->user->role_id,
                MainContract::RESIDENT  =>  $this->user->on,
                MainContract::IIN   =>  $this->user->iin,
                MainContract::NAME  =>  $this->user->name,
                MainContract::SURNAME   =>  $this->user->surname,
                MainContract::LAST_NAME =>  $this->user->last_name,
                MainContract::EMAIL =>  $this->user->email,
                MainContract::EMAIL_VERIFIED_AT =>  $this->user->email_verified_at,
                MainContract::GOVERNMENT_REVENUE_CODE   =>  $this->user->government_revenue_code,
                MainContract::GOVERNMENT_REVENUE_CODE_BY_PLACE  =>  $this->user->government_revenue_code_by_place,
            ],
            MainContract::ORGANIZATION  =>  [
                MainContract::ID    =>  $this->organization->id,
                MainContract::TITLE =>  $this->organization->title,
                MainContract::BIN   =>  $this->organization->bin,
                MainContract::EMAIL =>  $this->organization->email
            ]
        ];
    }
}
