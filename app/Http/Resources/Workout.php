<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Workout extends JsonResource
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
            'title' => $this->title,
            'dateStart' => $this->dateStart,
            'dateFinal' => $this->dateFinal,
            'idUser' => $this->idUser,
            'status' => $this->status,
            'qtyWorkoutsWeek' => $this->qtyWorkoutsWeek
        ];
    
    }
}
