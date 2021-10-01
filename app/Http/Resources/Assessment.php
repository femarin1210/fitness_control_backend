<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Assessment extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        //return parent::toArray($request);
        return [
            'id' => $this->id,
            'type' => $this->type,
            'title' => $this->title,
            'date' => $this->date,
            'height' => $this->height,
            'weight' => $this->weight,
            'fatPercentage' => $this->fatPercentage,
            'chest' => $this->chest,
            'biceps' => $this->biceps,
            'waist' => $this->waist,
            'hip' => $this->hip,
            'thigh' => $this->thigh,
            'calf' => $this->calf,
            'active' => $this->active,
            'idUser' => $this->idUser
        ];
    
    }
}
