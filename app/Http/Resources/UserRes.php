<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UserRes extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  Request  $request
     * @return array
     */
    public function toArray($request): array
    {
        return [
            'data' => [
                'id' => $this->id,
                'name' => $this->name,
                'lastname' => $this->lastname,
                'email' => $this->email,
                'ingredients' => $this->pantries,
                'recipes' => $this->recipes
            ],
        ];
    }
}
