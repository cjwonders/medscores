<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Resources\ScoresResource;
use App\Models\scores;
use App\Models\student;
use App\Models\Timestamp;
use Illuminate\Support\Facades\Validator;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Support\Facades\Crypt;
use App\Http\Controllers\ChartController;
use App\Charts\UserChart;

class TimeIntervalsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $all_times = Timestamp::all();
        $month_breakdown = $this->averageByMonth($all_responses);

        $intervalschart = new UserChart;
        $intervalschart->labels(['question1', 'question2', 'question3', 'question4', 'question5', 'question6', 'question7', 'question8', 'question9', 'question10',
        'question11', 'question12', 'question13', 'question14', 'question15', 'question16', 'question17', 'question18', 'question19', 'question20',
        'question21', 'question22', 'question23']);
        $intervalschart->dataset('Time Interval by Question', 'line', array_values($month_breakdown))->options([
            'fill' => 'true',
            'borderColor' => '#51C1C0'
        ]);
    }

    public function averageByMonth($allresponses)
    {
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
            if ($responses->scores->month == 1) {
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
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
