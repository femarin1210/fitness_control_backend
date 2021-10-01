<?php

namespace App\Http\Controllers;

use App\Models\Assessment as Assessment;

use Illuminate\Http\Request;

class AssessmentController extends Controller
{
    //

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $assessment = new Assessment;
        
        $assessment->title = $request->input('title');
        $assessment->type = $request->input('type');
        $assessment->date = $request->input('date');
        $assessment->height = $request->input('height');
        $assessment->weight = $request->input('weight');
        $assessment->fatPercentage = $request->input('fatPercentage');
        $assessment->chest = $request->input('chest');
        $assessment->biceps = $request->input('biceps');
        $assessment->waist = $request->input('waist');
        $assessment->hip = $request->input('hip');
        $assessment->thigh = $request->input('thigh');
        $assessment->calf = $request->input('calf');
        $assessment->active = $request->input('active');
        $assessment->userId = $request->input('userId');

        /*
        $assessment->title = 'title';
        $assessment->type = 'A';
        $assessment->date = null;
        $assessment->height = 100;
        $assessment->weight = 100;
        $assessment->fat_percentage = 100;
        $assessment->chest = 100;
        $assessment->biceps = 100;
        $assessment->waist = 100;
        $assessment->hip = 100;
        $assessment->thigh = 100;
        $assessment->calf = 100;
        $assessment->active = "S";
        */

        if( $assessment->save()){
            return new Assessment( $assessment );
            //return "ok";
        }
    }

}
