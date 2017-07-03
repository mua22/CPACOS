@extends('layouts.adminlte')
@section('content')
    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title">{{$assessment->course->title}}: {{$assessment->title}}</h3>

        </div>
        <form action="{{route('assessments.massUpdate',$assessment->id)}}" method="post">
            {{csrf_field()}}
            {{method_field('POST')}}

        <div class="box-body">
            <table class="table table-striped table-bordered">
                <thead>
                <tr>
                    <th>Registration No.</th>
                    <th>Name</th>
                    <th>Marks</th>
                </tr>
                </thead>
                <tbody>
                    @foreach($marks as $mark)
                        <tr>
                            <td>{{$mark->student->registration_no}}</td>
                            <td>{{$mark->student->name}}</td>
                            <td><input type="text" value="{{$mark->numbers}}" name="marks[{{$mark->id}}]"></td>
                        </tr>    
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="box-footer">
            <button type="submit" class="btn btn-info">Save/Update Marks</button>
        </div>
        </form>
    </div>

@endsection