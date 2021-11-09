<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div style="width: 80%;margin: 100px auto;">
        {!! $chart->container() !!}
    </div>
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.min.js" charset="utf-8"></script>
    {!! $chart->script() !!}

    <div style="width: 80%;margin: 100px auto;">
        {!! $barchart->container() !!}
    </div>
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.min.js" charset="utf-8"></script>
    {!! $barchart->script() !!}

    <div style="width: 80%;margin: 100px auto;">
        {!! $intervalschart->container() !!}
    </div>
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.min.js" charset="utf-8"></script>
    {!! $intervalschart->script() !!}

    <div class="py-12">
        <div class="max-w-8xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg" style="margin-top: 20px;">
            <div class="p-6 m-6 bg-white border-b border-gray-200">
                    Average scores by month
                </div>
                <table class="p-6 m-6">
                <tr>
                @foreach($month_breakdown as $title)
                    <th>{{array_keys($month_breakdown)[$loop->index]}}</th>
                @endforeach
                </tr>
                
                <tr>
                @foreach($month_breakdown as $value)
                    <td>{{$value}}</td>
                @endforeach
                </tr>
                </table>
            </div>
        </div>
    </div>

    <div class="py-12">
        <div class="max-w-12xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg" style="margin-top: 20px;">
            <div class="p-6 m-6 bg-white border-b border-gray-200">
                    The Scores!!!! 
                </div>
                <table class="p-6 m-6">
                <tr>
                    <th>1</th>
                    <th>2</th>
                    <th>3</th>
                    <th>4</th>
                    <th>5</th>
                    <th>6</th>
                    <th>7</th>
                    <th>8</th>
                    <th>9</th>
                    <th>10</th>
                    <th>11</th>
                    <th>12</th>
                    <th>13</th>
                    <th>14</th>
                    <th>15</th>
                    <th>16</th>
                    <th>17</th>
                    <th>18</th>
                    <th>19</th>
                    <th>20</th>
                    <th>21</th>
                    <th>22</th>
                    <th>23</th>
                </tr>

                @foreach($all_responses as $row)
                <tr>
                    <td>{{$row['question1']}}</td>
                    <td>{{$row['question2']}}</td>
                    <td>{{$row['question3']}}</td>
                    <td>{{$row['question4']}}</td>
                    <td>{{$row['question5']}}</td>
                    <td>{{$row['question6']}}</td>
                    <td>{{$row['question7']}}</td>
                    <td>{{$row['question8']}}</td>
                    <td>{{$row['question9']}}</td>
                    <td>{{$row['question10']}}</td>
                    <td>{{$row['question11']}}</td>
                    <td>{{$row['question12']}}</td>
                    <td>{{$row['question13']}}</td>
                    <td>{{$row['question14']}}</td>
                    <td>{{$row['question15']}}</td>
                    <td>{{$row['question16']}}</td>
                    <td>{{$row['question17']}}</td>
                    <td>{{$row['question18']}}</td>
                    <td>{{$row['question19']}}</td>
                    <td>{{$row['question20']}}</td>
                    <td>{{$row['question21']}}</td>
                    <td>{{$row['question22']}}</td>
                    <td>{{$row['question23']}}</td>
                </tr>
                @endforeach
                </table>
            </div>
        </div>
    </div>

    <div class="py-12">
        <div class="max-w-8xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg" style="margin-top: 20px;">
            <div class="p-6 m-6 bg-white border-b border-gray-200">
                    Tabulated Scores 
                </div>
                <table class="p-6 m-6">
                <tr>
                    <th>Total Score</th>
                    <th>Grade</th>
                    <th>Physical Exams</th>
                    <th>Order Investigations</th>
                    <th>Interpreting CXR</th>
                    <th>Interpreting ECG</th>
                    <th>Management</th>
                </tr>

                @foreach($section_breakdown as $row)
                <tr>
                    <td>{{$row['totalscore']}}</td>
                    <td>{{$row['letter_grade']}}</td>
                    <td>{{$row['physical_exams']}}</td>
                    <td>{{$row['ordering_investigations']}}</td>
                    <td>{{$row['interpreting_cxr']}}</td>
                    <td>{{$row['interpreting_ecg']}}</td>
                    <td>{{$row['management']}}</td>
                </tr>
                @endforeach
                </table>
            </div>
        </div>
    </div>
</x-app-layout>
