<div class="form-group">
    <label for="title" class="col-sm-2 control-label">Title</label>
    <div class="col-sm-10">
        <input type="text" name="title" class="form-control" id="title" placeholder="Title">
    </div>
</div>
<div class="form-group">
    <label for="type" class="col-sm-2 control-label">Type</label>
    <div class="col-sm-10">
        <select type="text" class="form-control" id="type" name="type">
            <option value="Assignment">Assignment</option>
            <option value="Quiz">Quiz</option>
        </select>
    </div>
</div>

<div class="form-group">
    <label for="type" class="col-sm-2 control-label">Assign CLOS to this assessment</label>
    <dic class="col-sm-10">
    @foreach($course->clos as $clo)
    <div class="checkbox">
        <label>
            <input type="checkbox" class="" name="clos[{{$clo->id}}]">
            {{$clo->order}}: {{$clo->title}}
        </label>
    </div>

@endforeach
    </dic>
</div>

@section('styles')
    <link rel="stylesheet" href="/bower_components/AdminLTE/plugins/iCheck/all.css">
    @endsection
@section('scripts')
    <script src="/bower_components/AdminLTE/plugins/iCheck/icheck.min.js"></script>

    <script>
        //iCheck for checkbox and radio inputs
        $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
            checkboxClass: 'icheckbox_minimal-blue',
            radioClass: 'iradio_minimal-blue'
        });
        //Red color scheme for iCheck
        $('input[type="checkbox"].minimal-red, input[type="radio"].minimal-red').iCheck({
            checkboxClass: 'icheckbox_minimal-red',
            radioClass: 'iradio_minimal-red'
        });
        //Flat red color scheme for iCheck
        $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
            checkboxClass: 'icheckbox_flat-green',
            radioClass: 'iradio_flat-green'
        });
    </script>
    @endsection