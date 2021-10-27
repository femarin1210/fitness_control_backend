<?php

namespace App\Http\Controllers;

use App\Models\WorkoutSequenceExercise as WorkoutSequenceExercise;
use App\Http\Resources\WorkoutSequenceExercise as WorkoutSequenceExerciseResource;

use Illuminate\Http\Request;

class WorkoutSequenceExerciseController extends Controller
{
    //

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($idWorkoutSequence)
    {

        $workoutsequenceexercise = WorkoutSequenceExercise::where('idWorkoutSequence', '=', $idWorkoutSequence)->get();    
        return WorkoutSequenceExerciseResource::collection($workoutsequenceexercise);

    }
    
    public function getNextSequence($idWorkoutSequence)
    {

        $workoutsequenceexercisemaxmodel = WorkoutSequenceExercise::where('idWorkoutSequence', '=', $idWorkoutSequence)->max('sequence');
        return $workoutsequenceexercisemaxmodel;

    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $workoutsequenceexercise = new WorkoutSequenceExercise; 
        
        $workoutsequenceexercise->title = $request->input('title');
        $workoutsequenceexercise->qtySeries = $request->input('qtySeries');
        $workoutsequenceexercise->qtyRepetitions = $request->input('qtyRepetitions');
        $workoutsequenceexercise->qtyWeight = $request->input('qtyWeight');
        $workoutsequenceexercise->qtyInterval = $request->input('qtyInterval');
        $workoutsequenceexercise->idWorkoutSequence = $request->input('idWorkoutSequence');
        $workoutsequenceexercise->idUser = $request->input('idUser');

        $workoutsequenceexercisemax = $this->getNextSequence($workoutsequenceexercise->idWorkoutSequence);

        $workoutsequenceexercise->sequence = ($workoutsequenceexercisemax + 1);

        if( $workoutsequenceexercise->save()){
            return new WorkoutSequenceExerciseResource( $workoutsequenceexercise );
        }
        
    }

    public function update(Request $request, $id)
    {
        $workoutsequenceexercise = WorkoutSequenceExercise::findOrFail($id);
        
        $workoutsequenceexercise->title = $request->input('title');
        $workoutsequenceexercise->qtySeries = $request->input('qtySeries');
        $workoutsequenceexercise->qtyRepetitions = $request->input('qtyRepetitions');
        $workoutsequenceexercise->qtyWeight = $request->input('qtyWeight');
        $workoutsequenceexercise->qtyInterval = $request->input('qtyInterval');
        $workoutsequenceexercise->idWorkoutSequence = $request->input('idWorkoutSequence');
        $workoutsequenceexercise->idUser = $request->input('idUser');

        if( $workoutsequenceexercise->save()){
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
        $workoutsequenceexercise = WorkoutSequenceExercise::findOrFail( $id );
        return new WorkoutSequenceExerciseResource($workoutsequenceexercise);
    }

    public function destroy($id){

        $res = WorkoutSequenceExercise::find($id)->delete();
        
        return $res;

    }

}
