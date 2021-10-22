<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Resources\ScoresResource;
use App\Models\scores;
use App\Models\student;
use Illuminate\Support\Facades\Validator;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Support\Facades\Crypt;


class ScoresController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $all_responses = scores::all();
        $section_breakdown = [];

        foreach($all_responses as $test_entry) {
            $breakdown = $test_entry->tabulateScore();
            $section_breakdown[] = $breakdown;
        }

        return view('dashboard', ['all_responses' => $all_responses,
                                  'section_breakdown' => $section_breakdown]);
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
            'response1' => 'nullable',
            'response2' => 'nullable',
            'response3' => 'nullable',
            'response4' => 'nullable',
            'response5' => 'nullable',
            'student_alias' => 'required',
        ]);

        $validator->validate();

        if($validator->fails()) {
            return response($validator->errors(), 400);
        }

        $score_obj = new scores;

        $score_obj->response1 = $request->response1;
        $score_obj->response2 = $request->response2;
        $score_obj->response3 = $request->response3;
        $score_obj->response4 = $request->response4;
        $score_obj->response5 = $request->response5;
        
        if (student::where('student_alias', $request->student_alias)->exists()) {
            $student = student::where('student_alias', $request->student_alias)->first();
            $score_obj->attachStudent($student->id);
        } else {
            $student = new student;
            $student->student_alias = Crypt::encryptString($request->student_alias);
            $student->save();
            $score_obj->attachStudent($student->id);
        }

        $score_obj->save();

        return response(new ScoresResource($score_obj), 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $score_item = scores::find($id);
        return $score_item;
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
