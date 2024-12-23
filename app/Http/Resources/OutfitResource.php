<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class OutfitResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'ime'=>$this->ime,
            'datum'=>$this->datum,
            'temperatura'=>$this->temperatura,
            'dogadjaj'=>$this->dogadjaj,
            'user_id'=>$this->user_id,
        ];

            
        ;
    }
}
