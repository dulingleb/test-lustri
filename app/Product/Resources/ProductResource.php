<?php

namespace App\Product\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
{
    public function toArray($request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'price' => $this->price,
            'quantity' => $this->quantity,
            'properties' => $this->properties->map(function ($option) {
                return [
                    'name' => $option->name,
                    'value' => $option->pivot->value,
                ];
            }),
        ];
    }
}
