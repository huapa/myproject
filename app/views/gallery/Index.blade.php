@extends('backend')
@section('content')
<div class="row">
  <div class="col-md-8 col-md-offset-2">
    <div class="panel panel-default">
      <div class="panel-heading">Album</div>
      <div class="panel-body">
        <form role="form">
          <div class="form-group">
            <label for="Album name">Album name</label>
            <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Enter email">
          </div>
          <div class="form-group">
            <label for="Album description">Album description</label>
            <textarea row="2" class="form-control"></textarea>
          </div>
          <hr>
          <button type="submit" class="btn btn-default">Submit</button>
        </form>
      </div>
    </div>
  </div>
</div>
@stop