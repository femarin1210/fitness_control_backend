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
    public function index($idUser)
    {

        $workoutsequence = WorkoutSequence::where('idUser', '=', $idUser)->paginate(15);
        //
        $workoutsequence = WorkoutSequence::paginate();

        return WorkoutSequenceResource::collection($workoutsequence);
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
        $workoutsequence->sequence = $request->input('sequence');
        $workoutsequence->status = $request->input('status');
        $workoutsequence->idWorkout = $request->input('idWorkout');
        $workoutsequence->idUser = $request->input('idUser');

        if( $workoutsequence->save()){
            //return new WorkoutSequence( $workoutsequence );
            return new WorkoutSequenceResource( $workoutsequence );
            //return "ok";
        }
    }

    public function update(Request $request, $id)
    {
        $workoutsequence = WorkoutSequence::findOrFail($id);
        
        $workoutsequence->title = $request->input('title');
        $workoutsequence->sequence = $request->input('sequence');
        $workoutsequence->status = $request->input('status');
        $workoutsequence->idWorkout = $request->input('idWorkout');
        $workoutsequence->idUser = $request->input('idUser');


        if( $workoutsequence->save()){
            return true;
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