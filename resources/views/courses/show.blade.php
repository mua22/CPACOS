@extends('layouts.adminlte')
@section('content')
    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title">Assessments</h3>
            <div class="pull-right">
                <a href="{{route('assessments.create',$course->id)}}" class="btn btn-info">Add New Assessment</a>
            </div>
        </div>
        <div class="box-body">
            @if(count($course->assessments)>0)
            <table class="table table-striped">
                <thead>
                <tr>
                    <th>Title</th>
                    <th>Type</th>

                    <th>Actions</th>
                </tr>
                </thead>
                <tbody>

                    @foreach($course->assessments as $assessment)
                        <tr>
                            <td><a href="{{route('assessments.show',$assessment->id)}}">{{$assessment->title}}</a></td>
                            <td>{{$assessment->type}}</td>
                            <td><a href="{{route('assessments.edit',$assessment->id)}}" class="btn btn-sm btn-info">Edit</a></td>
                        </tr>
                    @endforeach

                </tbody>
                @else No Assessments Yet. @endif
            </table>
        </div>

    </div>
    <div class="box box-warning">
        <div class="box-header with-border">
            <h3 class="box-title">Import data from file</h3>
        </div>
        <form action="{{route('students.uploadExcel.course',$course->id)}}" method="post" enctype="multipart/form-data">
        {{csrf_field()}}
            {{method_field('POST')}}
            <div class="box-body">
            <div class="form-group">
                <label for="file" class="col-sm-2 control-label">File</label>
                <div class="col-sm-10">
                    <input type="file" name="file" class="form-control" id="file" placeholder="File">
                </div>
            </div>

        </div>
        <div class="box-footer">
            <button class="btn btn-info">Upload Excel File</button>
        </div>
        </form>
    </div>
    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title">Registered Students</h3>
        </div>
        <div class="box-body">
            @if(count($course->students)>0)
                @php
            $i=1;
            @endphp
                <table class="table table-striped table-bordered">
                    <thead>
                    <tr>
                        <th>Sr. No.</th>
                        <th>Registration No</th>
                        <th>Name</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($course->students as $student)
                        <tr>
                            <td>{{$i++}}</td>
                            <td>{{$student->registration_no}}</td>
                            <td>{{$student->name}}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                @else No Students Registered to this course yet
            @endif
        </div>
        <div class="box-footer">
        </div>
    </div>
@endsection