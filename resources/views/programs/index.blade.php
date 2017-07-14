@extends('layouts.adminlte')

@section('content')
    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title">Programs</h3>
            <a href="{{route('programs.create')}}" class="btn btn-sm btn-success pull-right">Create New Program</a>
        </div>
        <div class="box-body">
            <table class="table table-bordered table-striped" >
                @foreach($programs as $program)
                    <tr>

                <td>{{$program->code}}</td>
                <td><a href="{{route('programs.show',$program->id)}}">{{$program->title}} <i class="fa fa-link"></i></a>    </td>
                    <td width="130px">
                        <a href="{{route('programs.edit',$program->id)}}" class="btn btn-xs btn-warning"><i class="fa fa-edit"></i>Edit</a>
                        <form action="{{route('programs.destroy',$program->id)}}" class="inline" method="POST">
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