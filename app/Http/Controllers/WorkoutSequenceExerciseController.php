<?php

namespace App\Http\Controllers;

use App\Models\WorkoutSequenceExercises as WorkoutSequenceExercises;
use App\Http\Resources\WorkoutSequenceExercises as WorkoutSequenceExercisesResource;

use Illuminate\Http\Request;

class WorkoutSequenceExercisesController extends Controller
{
    //

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($idWorkoutSequence)
    {

        $workoutsequenceexercises = WorkoutSequenceExercises::where('idWorkoutSequence', '=', $idWorkoutSequence)->get();    
        return WorkoutSequenceExercisesResource::collection($workoutsequenceexercises);

    }
    
    public function getNextSequence($idWorkoutSequence)
    {

        $workoutsequenceexercisesmaxmodel = WorkoutSequenceExercises::where('idWorkoutSequence', '=', $idWorkoutSequence)->max('sequence');
        return $workoutsequenceexercisesmaxmodel;

    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $workoutsequenceexercises = new WorkoutSequenceExercises; 
        
        $workoutsequenceexercises->title = $request->input('title');
        $workoutsequenceexercises->qtySeries = $request->input('qtySeries');
        $workoutsequenceexercises->qtyRepetitions = $request->input('qtyRepetitions');
        $workoutsequenceexercises->qtyWeight = $request->input('qtyWeight');
        $workoutsequenceexercises->qtyInterval = $request->input('qtyInterval');
        $workoutsequenceexercises->idWorkoutSequence = $request->input('idWorkoutSequence');
        $workoutsequenceexercises->idUser = $request->input('idUser');

        $workoutsequenceexercisesmax = $this->getNextSequence($workoutsequenceexercises->idWorkoutSequence);

        $workoutsequenceexercises->sequence = ($workoutsequenceexercisesmax + 1);

        if( $workoutsequenceexercises->save()){
            return new WorkoutSequenceExercisesResource( $workoutsequenceexercises );
        }
        
    }

    public function update(Request $request, $id)
    {
        $workoutsequenceexercises = WorkoutSequenceExercises::findOrFail($id);
        
        $workoutsequenceexercises->title = $request->input('title');
        $workoutsequenceexercises->qtySeries = $request->input('qtySeries');
        $workoutsequenceexercises->qtyRepetitions = $request->input('qtyRepetitions');
        $workoutsequenceexercises->qtyWeight = $request->input('qtyWeight');
        $workoutsequenceexercises->qtyInterval = $request->input('qtyInterval');
        $workoutsequenceexercises->idWorkoutSequence = $request->input('idWorkoutSequence');
        $workoutsequenceexercises->idUser = $request->input('idUser');

        if( $workoutsequenceexercises->save()){
            return true;
        }else{
            return false;
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $workoutsequenceexercises = WorkoutSequenceExercises::findOrFail( $id );
        return new WorkoutSequenceExercisesResource($workoutsequenceexercises);
    }

    public function destroy($id){

        $res = WorkoutSequenceExercises::find($id)->delete();
        
        return $res;

    }

}
