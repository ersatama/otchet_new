<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class AccessCollection extends ResourceCollection
{
    public function toArray($request)
    {
        return $this->collection->map(function($request) {
            return new AccessResource($request);
        })->toArray();
    }
}
