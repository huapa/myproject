@extends('backend')
@section('content')
<div class="row">
@if(Session::has('message'))
  <span><p class="alert alert-success">{{Session::get('message')}}</p></span>
@endif
  <div class="col-lg-8">
    <div class="panel panel-default">
      <div class="panel-heading">Display Menu Information</div>
      <div class="panel-body">
        <table class="table table-striped">
          <tbody>
            <tr>
              <th>#</th>
              <th>Menu Title</th>
              <th>Menu Description</th>
              <th>position</th>
            </tr>
            @foreach($menulist as $key => $value)
            <tr>
              <td>{{$key+1}}</td>
              <td>{{$value->menu_title}}</td>
              <td>{{$value->menu_description}}</td>
              <td>{{$value->position}}</td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>
  <div class="col-lg-4">
    <div class="panel panel-default">
      <div class="panel-heading">Add Menu</div>
      <div class="panel-body">
      {{Form::model($menu,array('route'=>array('menu.update',$menu->id),'id' => "myform",'method' => 'PUT'))}}
          <div class="form-group">
            <label>Menu Name</label>  
            {{Form::text('menu_title',Input::old('menu_title'),array('class'=>'form-control','placeholder' => 'Menu name'))}}
            <span id="message">
              @if($errors->has('menu_name'))
                <p class="text-danger">* {{$errors->first('menu_name')}}</p>
              @endif
            </span>
          </div>
          <div class="form-group">
            <label>Menu Description</label>  
            {{Form::textarea('menu_description',Input::old('menu_description'),array('class'=>'form-control','placeholder' => 'Menu description'))}}
            <span id="message">
               @if($errors->has('menu_description')) 
               <p class="text-danger">* {{$errors->first('menu_description')}}</p>
               @endif
            </span>
          </div>
          <div class="form-group">
            <label>Position</label>  
            {{Form::text('position',Input::old('position'),array('class'=>'form-control','placeholder' => 'Position'))}}
          <span id="message">
          	@if($errors->has('position'))
          	<p class="text-danger">* {{$errors->first('position')}}</p>
          	@endif
          </span>
          </div>
          <div class="form-group">
            {{Form::submit('Submit',array('class' => 'btn btn-primary','id' => 'submit'))}}
          </div>
        {{Form::close()}}  
      </div>
    </div>  
  </div>
</div>
@stop