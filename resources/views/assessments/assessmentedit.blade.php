@extends('layouts.adminlte')
@section('content')
    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title">Edit Assessment</h3>
        </div>
        <form action="{{route('assessments.update',$assessment->id)}}" method="POST" class="form-horizontal">
            {{csrf_field()}}
            {{method_field('PUT')}}

            <div class="box-body">

                <div class="form-group">
                    <label for="title" class="col-sm-2 control-label">Title</label>
                    <div class="col-sm-10">
                        <input type="text" name="title" class="form-control" id="title" placeholder="Title">
                    </div>
                </div>
                <div class="form-group">
                    <label for="type" class="col-sm-2 control-label">Type</label>
                    <div class="col-sm-10">
                        <select type="text" class="form-control" id="type" name="type">
                            <option value="Assignment">Assignment</option>
                            <option value="Quiz">Quiz</option>
                        </select>
                    </div>
                </div>


            </div>
            <div class="box-footer">
                <button type="submit" class="btn btn-info">Update</button>
            </div>
        </form>
    </div>

@endsection
