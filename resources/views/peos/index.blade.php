@extends('programs.showmaster')
@section('programcontent')
    <a href="{{route('peos.create',$program->id)}}" class="btn btn-info pull-right">Create New PEO</a>
            <table class="table table-bordered table-striped" >
                <?php $c=1;?>
                @foreach($peos as $peo)
                    <tr>
                        <td>{{$peo->order}}</td>
                <td>{{$peo->title}}</td>
                    <td width="250px">
                        <a href="{{route('peos.up',['peo_id'=>$peo->id,'program_id'=>$program->id])}}" class="btn btn-xs btn-info" @if($c==1)disabled="disabled"@endif><i class="fa fa-arrow-up"></i>Up</a>
                        <a href="{{route('peos.down',['peo_id'=>$peo->id,'program_id'=>$program->id])}}" class="btn btn-xs btn-info" @if($c==count($peos))disabled="disabled"@endif><i class="fa fa-arrow-down"></i>Down</a>
                        <a href="{{route('peos.edit',['peo_id'=>$peo->id,'program_id'=>$program->id])}}" class="btn btn-xs btn-warning"><i class="fa fa-edit"></i>Edit</a>
                        <form action="{{route('peos.destroy',['peo_id'=>$peo->id,'program_id'=>$program->id])}}" class="inline" method="POST">
                            {{csrf_field()}}
                            {{method_field('DELETE')}}
                            <button class="btn btn-xs btn-danger"><i class="fa fa-remove"></i>Delete</button>
                        </form>
                    </td>
                    </tr>
                        <?php $c = $c+1;?>
                @endforeach
            </table>

@endsection