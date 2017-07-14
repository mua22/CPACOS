@extends('layouts.adminlte')
@section('content')
    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title">University Objectives</h3>
            <a href="{{route('university.create')}}" class="btn btn-sm btn-success pull-right">Create New</a>
        </div>
        <div class="box-body">
            <table class="table table-bordered table-striped" >
                <?php $c=1;?>
                @foreach($objectives as $objective)
                    <tr>
                        <td>{{$objective->order}}</td>
                <td >{{$objective->title}}</td>
                    <td width="250px">
                        <a href="{{route('university.up',$objective->id)}}" class="btn btn-xs btn-info" @if($c==1)disabled="disabled"@endif><i class="fa fa-arrow-up"></i>Up</a>
                        <a href="{{route('university.down',$objective->id)}}" class="btn btn-xs btn-info" @if($c==count($objectives))disabled="disabled"@endif><i class="fa fa-arrow-down"></i>Down</a>
                        <a href="{{route('university.edit',$objective->id)}}" class="btn btn-xs btn-warning"><i class="fa fa-edit"></i>Edit</a>
                        <form action="{{route('university.destroy',$objective->id)}}" class="inline" method="POST">
                            {{csrf_field()}}
                            {{method_field('DELETE')}}
                            <button class="btn btn-xs btn-danger"><i class="fa fa-remove"></i>Delete</button>
                        </form>
                    </td>
                    </tr>
                    <?php $c = $c+1;?>
                @endforeach
            </table>
        </div>

    </div>
@endsection