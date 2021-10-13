<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @foreach($all_responses as $response)
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg" style="margin-top: 20px;">
                <div class="p-6 m-6 bg-white border-b border-gray-200">
                    Scores for <strong> {{$response['player']}} </strong>
                </div>
                <table class="p-6 m-6">
                <tr>
                    <th>Response 1</th>
                    <th>Response 2</th>
                    <th>Response 3</th>
                    <th>Response 4</th>
                    <th>Response 5</th>
                    <th>Grade</th>
                </tr>
                @foreach($response['scores'] as $row)
                <tr>
                    <td>{{$row['response1']}}</td>
                    <td>{{$row['response2']}}</td>
                    <td>{{$row['response3']}}</td>
                    <td>{{$row['response4']}}</td>
                    <td>{{$row['response5']}}</td>
                    <td>TBD</td>
                </tr>
                @endforeach
                </table>
            </div>
            @endforeach
        </div>
    </div>
</x-app-layout>
