@extends('backend')
@section('content')
<div class="row">
@if(Session::has('message'))
  <span><p class="alert alert-success">{{Session::get('message')}}</p></span>
@endif
  <div class="col-lg-8">
    <div class="panel panel-default">
      <div class="panel-heading">Display Sub-Menu Information</div>
      <div class="panel-body">
        <table class="table table-striped">
          <tbody>
            <tr>
              <th>#</th>
              <th>Sub Menu Title</th>
              <th>Parent Menu</th>
              <th>Description</th>
              <th>Position</th>
            </tr>
            @foreach($submenu as $key => $value)
            <tr>
              <td>{{$key+1}}</td>
              <td>{{$value->sub_menu_title}}</td>
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
      <div class="panel-heading">Edit Sub-Menu</div>
      <div class="panel-body">
      {{Form::model($data,array('route'=>array('sub-menu.update',$data->id),'id' => "myform", 'method' => 'PUT'))}}
          <div class="form-group">
            <label>Sub Menu Name</label>  
            {{Form::text('sub_menu_title',Input::old('sub_menu_title'),array('class'=>'form-control','placeholder' => 'Menu name'))}}
            <span id="message">
              @if($errors->has('sub_menu_title'))
                <p class="text-danger">* {{$errors->first('sub_menu_title')}}</p>
              @endif
            </span>
          </div>
          <div class="form-group">
            <label>Sub Menu Description</label>  
            {{Form::textarea('menu_description',Input::old('menu_description'),array('class'=>'form-control','placeholder' => 'Menu description'))}}
            <span id="message">
               @if($errors->has('menu_description')) 
               <p class="text-danger">* {{$errors->first('menu_description')}}</p>
               @endif
            </span>
          </div>
          <div class="form-group">
            <label>Parent Menu</label>  
            {{Form::select('parent_menu_id',$sub_menu,Input::old('parent_menu_id'),array('class' => 'form-control','id' => 'test'))}}
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