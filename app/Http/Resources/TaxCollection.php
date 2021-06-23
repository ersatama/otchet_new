<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class TaxCollection extends ResourceCollection
{

    public function toArray($request)
    {
        return $this->collection->map(function($request) {
            return new TaxResource($request);
        })->toArray();
    }
}
