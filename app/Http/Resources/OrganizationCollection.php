<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class OrganizationCollection extends ResourceCollection
{

    public function toArray($request)
    {
        return $this->collection->map(function($request) {
            return new OrganizationResource($request);
        })->toArray();
    }
}
