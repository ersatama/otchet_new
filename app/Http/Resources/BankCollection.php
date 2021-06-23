<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class BankCollection extends ResourceCollection
{

    public function toArray($request)
    {
        return $this->collection->map(function($request) {
            return new BankResource($request);
        })->toArray();
    }
}
