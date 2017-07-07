@extends('layouts.adminlte')

@section('content')
    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title">CLOS</h3>
            <a href="{{route('clos.create',$course->id)}}" class="btn btn-sm btn-success pull-right">Create New</a>
        </div>
        <div class="box-body">
            <table class="table table-bordered table-striped" >
                @foreach($clos as $clo)
                    <tr>
                        <td>{{$clo->order}}</td>
                <td>{{$clo->title}}</td>
                    <td>

                        <a href="{{route('plos.edit',$clo->id)}}" class="btn btn-sm btn-warning"><i class="fa fa-edit"></i>Edit</a>
                        <form action="{{route('clos.destroy',$clo->id)}}" class="inline" method="POST">
                            {{csrf_field()}}
                            {{method_field('DELETE')}}
                            <button class="btn btn-sm btn-danger"><i class="fa fa-remove"></i>Delete</button>
                        </form>
                    </td>
                    </tr>
                @endforeach
            </table>
        </div>

    </div>
@endsection