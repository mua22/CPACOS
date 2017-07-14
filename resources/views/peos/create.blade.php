@extends('programs.showmaster')
@section('programcontent')

        <form action="{{route('peos.store',$program->id)}}" method="POST" class="form-horizontal">
            {{csrf_field()}}
            {{method_field('POST')}}

            <div class="box-body">
                @include('peos._form')
            </div>
            <div class="box-footer">
                <button type="submit" class="btn btn-info">Save</button>
            </div>
        </form>


@endsection