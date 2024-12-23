<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ItemResource extends JsonResource
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
            'kategorija'=>$this->kategorija,
            'boja'=>$this->boja,
            'temperatura'=>$this->temperatura,
            'slika'=>$this->slika,
            'wardrobe_id'=>$this->wardrobe_id,

        ];
    }
}
