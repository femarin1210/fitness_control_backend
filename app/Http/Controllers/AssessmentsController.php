<?php

namespace App\Http\Controllers;

use App\Models\Assessment as Assessment;

use Illuminate\Http\Request;

class AssessmentsController extends Controller
{
    //

    public function store(Request $request)
    {
        $assessment = new Assessment;
        $assessment->title = $request->input('title');
        $assessment->date = $request->input('date');
        $assessment->height = $request->input('height');
        $assessment->weight = $request->input('weight');
        $assessment->fat_percentage = $request->input('fat_percentage');
        $assessment->chest = $request->input('chest');
        $assessment->biceps = $request->input('biceps');
        $assessment->waist = $request->input('waist');
        $assessment->hip = $request->input('hip');
        $assessment->thigh = $request->input('thigh');
        $assessment->calf = $request->input('calf');
        $assessment->active = $request->input('active');
        

        //if( $assessment->save()){
            //return new UserResource( $assessment );
        //    return "ok";
        //}
    }

}
