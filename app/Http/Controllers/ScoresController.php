<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Resources\ScoresResource;
use App\Models\scores;
use App\Models\student;
use Illuminate\Support\Facades\Validator;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Support\Facades\Crypt;
use App\Http\Controllers\ChartController;
use App\Charts\UserChart;


class ScoresController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Responses
     */
    public function index()
    {
        $all_responses = scores::all();
        $section_breakdown = [];
        $month_breakdown = $this->averageByMonth($all_responses);

        $chart = new UserChart;
        $chart->labels(['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec']);
        $chart->dataset('Average Scores By Month', 'line', array_values($month_breakdown))->options([
            'fill' => 'true',
            'borderColor' => '#51C1C0'
        ]);

        foreach($all_responses as $test_entry) {
            $breakdown = $test_entry->tabulateScore();
            $section_breakdown[] = $breakdown;
        }
        
        /*
        $intervalschart = new UserChart;
        $intervalschart->labels(['Physical Exams', 'Order Investigations', 'Interpreting CXR', 'Interpreting ECG', 'Management']);
        $intervalschart->dataset('Scores By Category', 'bar', $this->TimeIntervalAverage(0))->options([
            'fill' => 'true',
            'borderColor' => '#51C1C0'
        ]);
        */

        return view('dashboard', compact('chart'), ['all_responses' => $all_responses,
                                  'section_breakdown' => $section_breakdown,
                                  'month_breakdown' => $month_breakdown]);
    }

    public function averageBySection($sections) {
        $result = ['Physical Exams' => 0, 
                    'Order Investigations' => 0, 
                    'Interpreting CXR' => 0, 
                    'Interpreting ECG' => 0, 
                    'Management' => 0];

        foreach ($sections as $row) {
            
        }
    }

    public function TimeIntervalAverage () {
        $result = [];
        $i = 1;
        
        while ($i <= 23) {
            $result[$i] = rand(2,10);
            $i++;
        }
        return $result;
    }

    public function averageByMonth($allresponses) {

        $result = ['January' => 0,
                    'February' => 0,
                    'March' => 0,
                    'April' => 0,
                    'May' => 0,
                    'June' => 0,
                    'July' => 0,
                    'August' => 0,
                    'September' => 0,
                    'October' => 0,
                    'November' => 0,
                    'December' => 0
                ];

        foreach ($allresponses as $responses) {
            if ($responses->month == 1) {
                $result['January'] = $result['January'] + (($responses->question1 + $responses->question2 + $responses->question3 + $responses->question4 + $responses->question5 + $responses->question6 + $responses->question7 + $responses->question8 + $responses->question9 + $responses->question10 + $responses->question11 + $responses->question12 + $responses->question13 + $responses->question14 + $responses->question15 + $responses->question16 + $responses->question17 + $responses->question18 + $responses->question19 + $responses->question20 + $responses->question21 + $responses->question22 + $responses->question23) / 23);
            } else if ($responses->month == 2) {
                $result['February'] = $result['February'] + (($responses->question1 + $responses->question2 + $responses->question3 + $responses->question4 + $responses->question5 + $responses->question6 + $responses->question7 + $responses->question8 + $responses->question9 + $responses->question10 + $responses->question11 + $responses->question12 + $responses->question13 + $responses->question14 + $responses->question15 + $responses->question16 + $responses->question17 + $responses->question18 + $responses->question19 + $responses->question20 + $responses->question21 + $responses->question22 + $responses->question23) / 23);
            } else if ($responses->month == 3) {
                $result['March'] = $result['March'] + (($responses->question1 + $responses->question2 + $responses->question3 + $responses->question4 + $responses->question5 + $responses->question6 + $responses->question7 + $responses->question8 + $responses->question9 + $responses->question10 + $responses->question11 + $responses->question12 + $responses->question13 + $responses->question14 + $responses->question15 + $responses->question16 + $responses->question17 + $responses->question18 + $responses->question19 + $responses->question20 + $responses->question21 + $responses->question22 + $responses->question23) / 23);
            } else if ($responses->month == 4) {
                $result['April'] = $result['April'] + (($responses->question1 + $responses->question2 + $responses->question3 + $responses->question4 + $responses->question5 + $responses->question6 + $responses->question7 + $responses->question8 + $responses->question9 + $responses->question10 + $responses->question11 + $responses->question12 + $responses->question13 + $responses->question14 + $responses->question15 + $responses->question16 + $responses->question17 + $responses->question18 + $responses->question19 + $responses->question20 + $responses->question21 + $responses->question22 + $responses->question23) / 23);
            } else if ($responses->month == 5) {
                $result['May'] = $result['May'] + (($responses->question1 + $responses->question2 + $responses->question3 + $responses->question4 + $responses->question5 + $responses->question6 + $responses->question7 + $responses->question8 + $responses->question9 + $responses->question10 + $responses->question11 + $responses->question12 + $responses->question13 + $responses->question14 + $responses->question15 + $responses->question16 + $responses->question17 + $responses->question18 + $responses->question19 + $responses->question20 + $responses->question21 + $responses->question22 + $responses->question23) / 23);
            } else if ($responses->month == 6) {
                $result['June'] = $result['June'] + (($responses->question1 + $responses->question2 + $responses->question3 + $responses->question4 + $responses->question5 + $responses->question6 + $responses->question7 + $responses->question8 + $responses->question9 + $responses->question10 + $responses->question11 + $responses->question12 + $responses->question13 + $responses->question14 + $responses->question15 + $responses->question16 + $responses->question17 + $responses->question18 + $responses->question19 + $responses->question20 + $responses->question21 + $responses->question22 + $responses->question23) / 23);
            } else if ($responses->month == 7) {
                $result['July'] = $result['July'] + (($responses->question1 + $responses->question2 + $responses->question3 + $responses->question4 + $responses->question5 + $responses->question6 + $responses->question7 + $responses->question8 + $responses->question9 + $responses->question10 + $responses->question11 + $responses->question12 + $responses->question13 + $responses->question14 + $responses->question15 + $responses->question16 + $responses->question17 + $responses->question18 + $responses->question19 + $responses->question20 + $responses->question21 + $responses->question22 + $responses->question23) / 23);
            } else if ($responses->month == 8) {
                $result['August'] = $result['August'] + (($responses->question1 + $responses->question2 + $responses->question3 + $responses->question4 + $responses->question5 + $responses->question6 + $responses->question7 + $responses->question8 + $responses->question9 + $responses->question10 + $responses->question11 + $responses->question12 + $responses->question13 + $responses->question14 + $responses->question15 + $responses->question16 + $responses->question17 + $responses->question18 + $responses->question19 + $responses->question20 + $responses->question21 + $responses->question22 + $responses->question23) / 23);
            } else if ($responses->month == 9) {
                $result['September'] = $result['September'] + (($responses->question1 + $responses->question2 + $responses->question3 + $responses->question4 + $responses->question5 + $responses->question6 + $responses->question7 + $responses->question8 + $responses->question9 + $responses->question10 + $responses->question11 + $responses->question12 + $responses->question13 + $responses->question14 + $responses->question15 + $responses->question16 + $responses->question17 + $responses->question18 + $responses->question19 + $responses->question20 + $responses->question21 + $responses->question22 + $responses->question23) / 23);
            } else if ($responses->month == 10) {
                $result['October'] = $result['October'] + (($responses->question1 + $responses->question2 + $responses->question3 + $responses->question4 + $responses->question5 + $responses->question6 + $responses->question7 + $responses->question8 + $responses->question9 + $responses->question10 + $responses->question11 + $responses->question12 + $responses->question13 + $responses->question14 + $responses->question15 + $responses->question16 + $responses->question17 + $responses->question18 + $responses->question19 + $responses->question20 + $responses->question21 + $responses->question22 + $responses->question23) / 23);
            } else if ($responses->month == 11) {
                $result['November'] = $result['November'] + (($responses->question1 + $responses->question2 + $responses->question3 + $responses->question4 + $responses->question5 + $responses->question6 + $responses->question7 + $responses->question8 + $responses->question9 + $responses->question10 + $responses->question11 + $responses->question12 + $responses->question13 + $responses->question14 + $responses->question15 + $responses->question16 + $responses->question17 + $responses->question18 + $responses->question19 + $responses->question20 + $responses->question21 + $responses->question22 + $responses->question23) / 23);
            } else if ($responses->month == 12) {
                $result['December'] = $result['December'] + (($responses->question1 + $responses->question2 + $responses->question3 + $responses->question4 + $responses->question5 + $responses->question6 + $responses->question7 + $responses->question8 + $responses->question9 + $responses->question10 + $responses->question11 + $responses->question12 + $responses->question13 + $responses->question14 + $responses->question15 + $responses->question16 + $responses->question17 + $responses->question18 + $responses->question19 + $responses->question20 + $responses->question21 + $responses->question22 + $responses->question23) / 23);
            }
        }

        return $result;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Responses
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
     * @return \Illuminate\Http\Responses
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
     * @return \Illuminate\Http\Responses
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Responses
     */
    public function destroy($id)
    {
        //
    }
}
