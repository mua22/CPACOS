@extends('programs.showmaster')
@section('programcontent')
    <a href="{{route('plos.create',$program->id)}}" class="btn btn-info pull-right">Create New PLO</a>
            <table class="table table-bordered table-striped" >
                <?php $c=1;?>
                @foreach($plos as $plo)
                    <tr>
                        <td>{{$plo->order}}</td>
                <td>{{$plo->title}}</td>
                    <td width="250px">
                        <a href="{{route('plos.up',['plo_id'=>$plo->id,'program_id'=>$program->id])}}" class="btn btn-xs btn-info" @if($c==1)disabled="disabled"@endif><i class="fa fa-arrow-up"></i>Up</a>
                        <a href="{{route('plos.down',['plo_id'=>$plo->id,'program_id'=>$program->id])}}" class="btn btn-xs btn-info" @if($c==count($plos))disabled="disabled"@endif><i class="fa fa-arrow-down"></i>Down</a>
                        <a href="{{route('plos.edit',['plo_id'=>$plo->id,'program_id'=>$program->id])}}" class="btn btn-xs btn-warning"><i class="fa fa-edit"></i>Edit</a>
                        <form action="{{route('plos.destroy',['plo_id'=>$plo->id,'program_id'=>$program->id])}}" class="inline" method="POST">
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