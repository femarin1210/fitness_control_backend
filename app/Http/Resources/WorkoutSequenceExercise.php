<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class WorkoutSequenceExercises extends JsonResource
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
            'qtySeries' => $this->qtySeries,
            'qtyRepetitions' => $this->qtyRepetitions,
            'qtyWeight' => $this->qtyWeight,
            'qtyInterval' => $this->qtyInterval,
            'idWorkoutsequence' => $this->idWorkoutsequence,
            'idUser' => $this->idUser
        ];
    
    }
}
