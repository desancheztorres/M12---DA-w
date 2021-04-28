<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Ingredient extends JsonResource
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
                'name' => $this->name,
                'description' => $this->description,
                'image' => $this->image_path(),
                'magnitude' => new Magnitude($this->magnitude)
            ]
        ];
    }
}
