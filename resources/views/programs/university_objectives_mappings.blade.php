@extends('programs.showmaster')
@section('programcontent')
    <h3>Mapping</h3>
    <form action="{{route('programs.university.objectives.mappings.store',$program->id)}}" method="post">
        {{csrf_field()}}
        {{method_field('POST')}}

    <table class="table">
        <thead>
        <tr>
            @foreach($university_objectives as $university_objective)
                <th class="text-center">{{$university_objective->order}}</th>
            @endforeach
            <th></th>
        </tr>
        </thead>
        <tbody>
        @foreach($program_objectives as $program_objective)
            <tr>
                @foreach($university_objectives as $university_objective)
                    <td class="text-center"><input class="chkmapping icheckbox_square" type="checkbox" name="mappings[{{$program_objective->id}}][{{$university_objective->id}}]"
                        @if(isset($mappings[$program_objective->id][$university_objective->id])) checked="checked" @endif
                        ></td>
                @endforeach
                <td>{{$program_objective->order}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <button type="submit" class="btn btn-info">Update Mappings</button>
    </form>
    <hr>
<table class="table">
    <thead><tr><td colspan="2">University Objectives</td></tr></thead>
    <tbody>
        @foreach($university_objectives as $university_objective)
            <tr>
                <td>{{$university_objective->order}}</td>
                <td>{{$university_objective->title}}</td>
            </tr>
        @endforeach
    </tbody>
</table>

@endsection
{{--

@section('scripts')
    <script src="/bower_components/AdminLTE/plugins/iCheck/icheck.min.js"></script>
    <script>
        $(document).ready(function(){
            $("input[type='checkbox'], input[type='radio']").iCheck({
                checkboxClass: 'icheckbox_minimal',
                radioClass: 'iradio_minimal'
            });
        });
    </script>
@endsection
@section('styles')

    <link rel="stylesheet" href="/bower_components/AdminLTE/plugins/iCheck/all.css">
@endsection--}}
