<?php

namespace App\Http\Controllers;

use App\Models\Workout as Workout;
use App\Http\Resources\Workout as WorkoutResource;

use Illuminate\Http\Request;

class WorkoutController extends Controller
{
    //

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($idUser)
    {

        $workout = Workout::where('idUser', '=', $idUser)->paginate(15);
        //
        $workout = Workout::paginate();

        return WorkoutResource::collection($workout);
    }
    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $workout = new Workout;
        
        $workout->title = $request->input('title');
        $workout->dateStart = $request->input('dateStart');
        $workout->dateFinal = $request->input('dateFinal');
        $workout->idUser = $request->input('idUser');
        $workout->status = $request->input('status');
        $workout->qtyWorkoutsWeek = $request->input('qtyWorkoutsWeek');

        if( $workout->save()){
            //return new Workout( $workout );
            return new WorkoutResource( $workout );
            //return "ok";
        }
    }

    public function update(Request $request, $id)
    {
        $workout = Workout::findOrFail($id);
        $workout->title = $request->input('title');
        $workout->dateStart = $request->input('dateStart');
        $workout->dateFinal = $request->input('dateFinal');
        $workout->idUser = $request->input('idUser');
        $workout->status = $request->input('status');
        $workout->qtyWorkoutsWeek = $request->input('qtyWorkoutsWeek');

        if( $workout->save()){
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
        $workout = Workout::findOrFail( $id );
        return new WorkoutResource($workout);
    }

    public function destroy($id){

        $res = Workout::find($id)->delete();
        
        return $res;

    }

}
