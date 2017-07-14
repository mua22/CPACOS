@extends('layouts.adminlte')
@section('content')
    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title">Edit</h3>
        </div>
        <form action="{{route('peos.update',$peo->id)}}" method="POST" class="form-horizontal">
            {{csrf_field()}}
            {{method_field('PUT')}}

            <div class="box-body">
                @include('peos._form')
            </div>
            <div class="box-footer">
                <button type="submit" class="btn btn-info">Save</button>
            </div>
        </form>
    </div>

@endsection