<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Domain\Contracts\NotificationContract;

class NotificationResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            NotificationContract::ID    =>  $this->{NotificationContract::ID},
            NotificationContract::TITLE =>  $this->{NotificationContract::TITLE},
            NotificationContract::DESCRIPTION   =>  $this->{NotificationContract::DESCRIPTION},
            NotificationContract::STATUS    =>  $this->{NotificationContract::STATUS}
        ];
    }
}
