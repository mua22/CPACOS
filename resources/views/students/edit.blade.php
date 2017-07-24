@extends('layouts.adminlte')


@section('content')

    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title">Edit Student Information</h3>
        </div>
        <form action="{{route('students.update',$student->id)}}" method="POST" class="form-horizontal">
            {{csrf_field()}}
            {{method_field('PUT')}}

            <div class="box-body ">

                <div class="form-group">
                    <label for="code" class="col-sm-2 control-label">Registration ID</label>
                    <div class="col-sm-8">
                        <input type="text" name="registration_no" class="form-control" id="registration_no" placeholder="Enter the Registration Number">
                    </div>
                </div>
                <div class="form-group">
                    <label for="title" class="col-sm-2 control-label">Name</label>
                    <div class="col-sm-8">
                        <input type="text" name="name" class="form-control" id="name" placeholder="Enter the name of student">
                    </div>
                </div>


            </div>
            <div class="box-footer">
                <button style="float: right" type="submit" class="btn btn-info">Update</button>
            </div>
        </form>
    </div>

@endsection