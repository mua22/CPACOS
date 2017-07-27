<div class="box box-primary">
    <div class="box-header with-border">
        <h3 class="box-title">Assessments</h3>
        <div class="pull-right">
            <a href="{{route('assessments.create',$course->id)}}" class="btn btn-info">Add New Assessment</a>
        </div>
    </div>
    <div class="box-body">
        @if(count($course->assessments)>0)
            <table class="table table-striped">
                <thead>
                <tr>
                    <th>Title</th>
                    <th>Type</th>

                    <th style="text-justify: auto">Actions</th>
                </tr>
                </thead>
                <tbody>

                @foreach($course->assessments as $assessment)
                    <tr>
                        <td><a href="{{route('assessments.show',$assessment->id)}}">{{$assessment->title}}</a></td>
                        <td>{{$assessment->type}}</td>
                        <td><a href="{{route('assessments.edit',$assessment->id,$course->id)}}" class="btn btn-sm btn-info">Edit</a>
                         <!--   <a style="margin-left: 10px;" href="{{route('assessments.edit',$assessment->id)}}" class="btn btn-sm btn-danger">Delete</a>-->
                            <form action="{{route('assessments.delete',$assessment->id)}}" class="inline" method="POST">
                                {{csrf_field()}}
                                {{method_field('DELETE')}}
                                <button class="btn btn-sm btn-danger">Delete</button>
                            </form>

                        </td>
                    </tr>
                @endforeach

                </tbody>
                @else No Assessments Yet. @endif
            </table>
    </div>

</div>