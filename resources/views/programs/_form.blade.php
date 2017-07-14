<div class="form-group">
    <label for="code" class="col-sm-2 control-label">Code</label>
    <div class="col-sm-6">
        <input type="text" name="code" class="form-control" id="code" placeholder="Code" @if(isset($program))value="{{$program->code}}@endif">
    </div>
    <div class="col-sm-4">e.g. BSSE</div>
</div>
<div class="form-group">
    <label for="title" class="col-sm-2 control-label">Title</label>
    <div class="col-sm-6">
        <input type="text" name="title" class="form-control" id="title" placeholder="Title" @if(isset($program))value="{{$program->title}}"@endif>
    </div>
    <div class="col-sm-4">Bachelors of Science in Computer Science</div>
</div>
