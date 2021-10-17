<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class WorkoutSequence extends JsonResource
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
            'sequence' => $this->sequence,
            'status' => $this->status,
            'idWorkout' => $this->idWorkout,
            'idUser' => $this->idUser
        ];
    
    }
}
