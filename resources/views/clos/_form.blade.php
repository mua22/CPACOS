<div class="form-group">
    <label for="title" class="col-sm-2 control-label"></label>
    <div class="col-sm-8">
        <textarea type="text" name="title" class="form-control" id="" placeholder="">@if(isset($clo)){{$clo->title}}@endif</textarea>
    </div>
    @if ($errors->has('title'))

    <div class="col-sm-2">
        Title is required
    </div>
        @endif
</div>
