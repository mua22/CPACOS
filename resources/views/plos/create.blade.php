@extends('programs.showmaster')
@section('programcontent')

        <form action="{{route('plos.store',$program->id)}}" method="POST" class="form-horizontal">
            {{csrf_field()}}
            {{method_field('POST')}}

            <div class="box-body">
                @include('plos._form')
            </div>
            <div class="box-footer">
                <button type="submit" class="btn btn-info">Save</button>
            </div>
        </form>


@endsection