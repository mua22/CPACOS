@extends('layouts.adminlte')

@section('content')
    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title">PEO</h3>
            <a href="{{route('plos.create')}}" class="btn btn-sm btn-success pull-right">Create New</a>
        </div>
        <div class="box-body">
            <table class="table table-bordered table-striped" >
                @foreach($plos as $plo)
                    <tr>
                        <td>{{$plo->order}}</td>
                <td>{{$plo->title}}</td>
                    <td>
                        <a href="{{route('plos.edit',$plo->id)}}" class="btn btn-sm btn-warning"><i class="fa fa-edit"></i>Edit</a>
                        <form action="{{route('plos.destroy',$plo->id)}}" class="inline" method="POST">
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