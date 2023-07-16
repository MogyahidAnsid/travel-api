<?php

namespace App\Http\Resources\V1;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class TourResource extends JsonResource
{

    public $preserveKeys = true;

    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            // 'travels' => new TravelResource($this->whenLoaded('travels')),
            'name' => $this->name,
            'startingDate' => $this->starting_date,
            'endingDate' => $this->ending_date,
            'price' => number_format($this->price, 2),
        ];
    }
}
