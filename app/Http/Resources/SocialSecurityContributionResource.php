<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Domain\Contracts\SocialSecurityContributionsContract;

class SocialSecurityContributionResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            SocialSecurityContributionsContract::USER_ID        =>  $this->{SocialSecurityContributionsContract::USER_ID},
            SocialSecurityContributionsContract::PAYMENT_TYPE   =>  $this->{SocialSecurityContributionsContract::PAYMENT_TYPE},
            SocialSecurityContributionsContract::PAYMENT_DATE   =>  $this->{SocialSecurityContributionsContract::PAYMENT_DATE},
            SocialSecurityContributionsContract::BIN            =>  $this->{SocialSecurityContributionsContract::BIN},
            SocialSecurityContributionsContract::IIN            =>  $this->{SocialSecurityContributionsContract::IIN},
            SocialSecurityContributionsContract::SUM            =>  $this->{SocialSecurityContributionsContract::SUM},
            SocialSecurityContributionsContract::STATUS         =>  $this->{SocialSecurityContributionsContract::STATUS},
            SocialSecurityContributionsContract::SENT           =>  $this->{SocialSecurityContributionsContract::SENT},
        ];
    }
}
