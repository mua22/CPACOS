@extends('programs.showmaster')
@section('programcontent')

        <form action="{{route('peos.update',['peo_id'=>$peo->id,'program_id'=>$program->id])}}" method="POST" class="form-horizontal">
            {{csrf_field()}}
            {{method_field('PUT')}}

            <div class="box-body">
                @include('peos._form')
            </div>
            <div class="box-footer">
                <button type="submit" class="btn btn-info">Save</button>
            </div>
        </form>


@endsection