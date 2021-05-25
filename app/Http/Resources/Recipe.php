<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Recipe extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'data' => [
                'id' => $this->id,
                'name' => $this->name,
                'description' => $this->description,
                'level' => $this->level,
                'time' => $this->time,
                'steps' => $this->steps,
                'images' => $this->images,
                'ingredients' => $this->ingredients
            ]
        ];
    }
}
