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

                    <th>Actions</th>
                </tr>
                </thead>
                <tbody>

                @foreach($course->assessments as $assessment)
                    <tr>
                        <td><a href="{{route('assessments.show',$assessment->id)}}">{{$assessment->title}}</a></td>
                        <td>{{$assessment->type}}</td>
                        <td><a href="{{route('assessments.edit',$assessment->id)}}" class="btn btn-sm btn-info">Edit</a></td>
                    </tr>
                @endforeach

                </tbody>
                @else No Assessments Yet. @endif
            </table>
    </div>

</div>