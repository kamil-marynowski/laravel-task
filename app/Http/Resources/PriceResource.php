<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PriceResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'net' => $this->net,
            'gross' => $this->gross,
            'vat' => $this->vat,
            'vat_percentage' => $this->vat_percentage,
        ];
    }
}
