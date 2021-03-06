<?php

namespace App\Http\Controllers;

use App\Models\WorkoutSequence as WorkoutSequence;
use App\Http\Resources\WorkoutSequence as WorkoutSequenceResource;

use Illuminate\Http\Request;

class WorkoutSequenceController extends Controller
{
    //

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($idWorkout)
    {

        $workoutsequence = WorkoutSequence::where('idWorkout', '=', $idWorkout)->get();    
        return WorkoutSequenceResource::collection($workoutsequence);

    }
    
    public function getNextSequence($idWorkout)
    {

        $workoutsequencemaxmodel = WorkoutSequence::where('idWorkout', '=', $idWorkout)->max('sequence');
        return $workoutsequencemaxmodel;

    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $workoutsequence = new WorkoutSequence; 
        
        $workoutsequence->title = $request->input('title');
        $workoutsequence->workout = $request->input('workout');
        $workoutsequence->status = $request->input('status');
        $workoutsequence->idWorkout = $request->input('idWorkout');
        $workoutsequence->idUser = $request->input('idUser');

        $workoutsequencemax = $this->getNextSequence($workoutsequence->idWorkout);

        $workoutsequence->sequence = ($workoutsequencemax + 1);

        if( $workoutsequence->save()){
            return new WorkoutSequenceResource( $workoutsequence );
        }
        
    }

    public function update(Request $request, $id)
    {
        $workoutsequence = WorkoutSequence::findOrFail($id);
        
        $workoutsequence->title = $request->input('title');
        $workoutsequence->workout = $request->input('workout');
        $workoutsequence->sequence = $request->input('sequence');
        $workoutsequence->status = $request->input('status');
        $workoutsequence->idWorkout = $request->input('idWorkout');
        $workoutsequence->idUser = $request->input('idUser');

        if( $workoutsequence->save()){
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
        $workoutsequence = WorkoutSequence::findOrFail( $id );
        return new WorkoutSequenceResource($workoutsequence);
    }

    public function destroy($id){

        $res = WorkoutSequence::find($id)->delete();
        
        return $res;

    }

}
