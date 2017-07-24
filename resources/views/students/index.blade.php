
@extends('layouts.adminlte')

@section('title', ' |  Students ' )

@section('content')
    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title">Students</h3>
            <a href="{{route('students.create')}}" class="btn btn-sm btn-success pull-right">Create New Student</a>
        </div>
        <div class="box-body">
            <table class="table table-bordered table-striped" >

                <thead>
                <tr>
                    <th>Registration ID</th>
                    <th>Student Name</th>
                </tr>
                </thead>

                @foreach($students as $student)

                    <tr>
                        <td>{{$student->registration_no}}</td>
                        <td>{{$student->name}}</td>

                        <td width="130px">
                            <a href="{{route('students.edit',$student->id)}}" class="btn btn-xs btn-warning"><i class="fa fa-edit"></i>Edit</a>
                            <form action="{{route('students.delete',$student->id)}}" class="inline" method="POST">
                                {{csrf_field()}}
                                {{method_field('DELETE')}}
                                <button class="btn btn-xs btn-danger"><i class="fa fa-remove"></i>Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </table>
        </div>

    </div>

    @endsection