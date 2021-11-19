<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Resources\ScoresResource;
use App\Models\scores;

class APIManager extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $all_responses = scores::all();

        return ScoresResource::collection($all_responses);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'month' => 'required',
            'question1' => 'required',
            'question2' => 'required', 
            'question3' => 'required', 
            'question4' => 'required', 
            'question5' => 'required',
            'question6' => 'required',
            'question7' => 'required',
            'question8' => 'required',
            'question9' => 'required',
            'question10' => 'required',
            'question11' => 'required', 
            'question12' => 'required', 
            'question13' => 'required',
            'question14' => 'required',
            'question15' => 'required', 
            'question16' => 'required', 
            'question17' => 'required', 
            'question18' => 'required', 
            'question19' => 'required', 
            'question20' => 'required',
            'question21' => 'required', 
            'question22' => 'required', 
            'question23' => 'required',
        ]);

        $validator->validate();

        if($validator->fails()) {
            return responses($validator->errors(), 400);
        }

        $score_obj = new scores;
        $score_obj->month = $request->month;
        $score_obj->question1 = $request->question1;
        $score_obj->question2 = $request->question2;
        $score_obj->question3 = $request->question3;
        $score_obj->question4 = $request->question4;
        $score_obj->question5 = $request->question5;
        $score_obj->question6 = $request->question6;
        $score_obj->question7 = $request->question7;
        $score_obj->question8 = $request->question8;
        $score_obj->question9 = $request->question9;
        $score_obj->question10 = $request->question10;
        $score_obj->question11 = $request->question11;
        $score_obj->question12 = $request->question12;
        $score_obj->question13 = $request->question13;
        $score_obj->question14 = $request->question14;
        $score_obj->question15 = $request->question15;
        $score_obj->question16 = $request->question16;
        $score_obj->question17 = $request->question17;
        $score_obj->question18 = $request->question18;
        $score_obj->question19 = $request->question19;
        $score_obj->question20 = $request->question20;
        $score_obj->question21 = $request->question21;
        $score_obj->question22 = $request->question22;
        $score_obj->question23 = $request->question23;

        $score_obj->save();

        return responses(new ScoresResource($score_obj), 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
