<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Magnitude extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request): array
    {
        return [
            'data' => [
                'id' => $this->id,
                'name' => $this->name
            ]
        ];
    }
}
