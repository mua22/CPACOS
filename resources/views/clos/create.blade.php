@extends('layouts.adminlte')
@section('content')
    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title">Add new CLO</h3>
        </div>
        <form action="{{route('clos.store',$course->id)}}" method="POST" class="form-horizontal">
            {{csrf_field()}}
            {{method_field('POST')}}

            <div class="box-body">
                @include('clos._form')
            </div>
            <div class="box-footer">
                <button type="submit" class="btn btn-info">Save</button>
            </div>
        </form>
    </div>

@endsection

