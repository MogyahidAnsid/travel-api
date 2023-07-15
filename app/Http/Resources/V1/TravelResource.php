<?php

namespace App\Http\Resources\V1;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class TravelResource extends JsonResource
{

    public $preserveKeys = true;

    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'isPublic' => $this->is_public,
            'name' => $this->name,
            'slug' => $this->slug,
            'description' => $this->description,
            'numberOfDays' => $this->number_of_days,
            'numberOfNights' => $this->number_of_nights
        ];
    }
}
