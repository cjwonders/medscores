<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\scores;
use App\Charts\UserChart;
use App\Http\Controllers\ScoresController;

class ChartController extends Controller
{
    public function index()
    {
        $data = [1];
        $chart = new UserChart;
        $chart->labels(['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec']);
        $chart->dataset('New User Register Chart', 'line', $data)->options([
            'fill' => 'true',
            'borderColor' => '#51C1C0'
        ]);

        return view('chart', compact('chart'));
    }
}
