@extends('backend')
@section('content')
<div class="row">
@include('alert.message')
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
              <th>Action</th>
            </tr>
            @foreach($menu as $key => $value)
            <tr>
            	<td>{{$key+1}}</td>
            	<td>{{$value->menu_title}}</td>
            	<td>{{$value->menu_description}}</td>
            	<td>{{$value->position}}</td>
            	<td>
            		<table>
                  <tr>
                    <td><a href="{{URL::route('menu.edit',$value->id)}}"><button class="btn-default"><i class="glyphicon glyphicon-pencil"></i></button></a></td>
                      <td style="padding-left:20px;">
                        {{Form::open(array('route'=>array('menu.destroy',$value->id),'method' => 'DELETE','id' => 'del'))}}
                          <button><i class="glyphicon glyphicon-trash"></i></button>
                          <!-- <a href="javascript:void();" onclick="$('form').submit()"><i class="glyphicon glyphicon-trash"></i></a> -->
                        {{Form::close()}}
                      </td>
                  </tr>
                </table>
            	</td>
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
      {{Form::open(array('route'=>'menu.store','id' => "myform"))}}
          <div class="form-group">
            <label>Menu Name</label>  
            {{Form::text('menu_name','',array('class'=>'form-control','placeholder' => 'Menu name'))}}
            <span id="message">
              @if($errors->has('menu_name'))
                <p class="text-danger">* {{$errors->first('menu_name')}}</p>
              @endif
            </span>
          </div>
          <div class="form-group">
            <label>Menu Description</label>  
            {{Form::textarea('menu_description','',array('class'=>'form-control','placeholder' => 'Menu description'))}}
            <span id="message">
               @if($errors->has('menu_description')) 
               <p class="text-danger">* {{$errors->first('menu_description')}}</p>
               @endif
            </span>
          </div>
          <div class="form-group">
            <label>Position</label>  
            {{Form::text('position','',array('class'=>'form-control','placeholder' => 'Position'))}}
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