{{--@extends('layouts.app')--}}
@extends('layouts.adminlte')

@section('content')
    <div class="box box-primary">
        {{--<div class="box-header with-border">--}}
            {{--<h3 class="box-title">Courses</h3>--}}
        {{--</div>--}}
        <div class="box-body">
            <table class="table table-striped">
                <thead>
                <tr>
                    <th>Code</th>
                    <th>Title</th>
                    <th>Assessment Count</th>
                    <th>Registrants</th>
                </tr>
                </thead>
                <tbody>
                    @foreach($courses as $course)
                        <tr>
                            <td>{{$course->code}}</td>
                            <td><a href="{{route('courses.show',$course->id)}}">{{$course->title}}</a></td>
                            <td>{{$course->assessments_count}}</td>
                            <td>{{count($course->students)}}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="box-footer">
            <a href="{{route('courses.create')}}" class="btn btn-info">Create New Course</a>
        </div>
    </div>
@endsection