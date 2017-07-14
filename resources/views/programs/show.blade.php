@extends('programs.showmaster')
@section('programcontent')
    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <td colspan="2" class="text-center text-bold">Program Educational Objectives</td>
            </tr>
        </thead>
        <tbody>
            @foreach($objectives as $objective)
                <tr>
                    <td class=" text-bold" width="75px">{{$objective->order}}</td>
                    <td>{{$objective->title}}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <hr>
    <table class="table table-bordered table-striped">
        <thead>
        <tr>
            <td colspan="2" class="text-center text-bold">Program Learning Outcomes</td>
        </tr>
        </thead>
        <tbody>
        @foreach($outcomes as $outcome)
            <tr>
                <td class=" text-bold"  width="75px">{{$outcome->order}}</td>
                <td>{{$outcome->title}}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection