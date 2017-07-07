@extends('layouts.adminlte')
@section('content')
    <div class="row">
        <div class="col-md-9">
            @include('courses.assessments')
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
        </div>
        <div class="col-md-3">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">{{$course->title}}</h3>
                </div>
                <div class="box-body">
                    <div class="navbar">

                        <ul class="nav nav-pills nav-stacked">
                            <li><a href="{{route('clos.index',$course->id)}}">CLOs</a></li>
                            <li><a href="#info"><i class="fa fa-info-circle"></i><span> Link2 </span></a></li>
                            <li><a href="#love"><i class="fa fa-heart"></i><span> Link3 </span></a></li>
                            <li><a href="#work"><i class="fa fa-briefcase"></i><span> Link4 </span></a></li>
                            <li><a href="#contact"><i class="fa fa-envelope"></i><span> Link5 </span></a></li>
                        </ul>
                    </div>
                </div>

            </div>
        </div>
    </div>

@endsection