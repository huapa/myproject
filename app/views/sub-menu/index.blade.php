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
              <th>Action</th>
            </tr>
            @foreach($submenu as $key => $value)
            <tr>
              <td>{{$key+1}}</td>
              <td>{{$value->sub_menu_title}}</td>
              <td>{{$value->menu_title}}</td>
              <td>{{$value->menu_description}}</td>
              <td>{{$value->position}}</td>
              <td>
                <table>
                  <tr>
                    <td><a href="{{URL::route('sub-menu.edit',$value->id)}}"><button class="btn-default"><i class="glyphicon glyphicon-pencil"></i></button></a></td>
                    <td style="padding-left:20px;">
                    {{Form::open(array('route'=>array('sub-menu.destroy',$value->id),'method' => 'DELETE','id' => 'del'))}}
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
      <div class="panel-heading">Add Sub-Menu</div>
      <div class="panel-body">
      {{Form::open(array('route'=>'sub-menu.store','id' => "myform"))}}
          <div class="form-group">
            <label>Sub Menu Name</label>  
            {{Form::text('menu_name','',array('class'=>'form-control','placeholder' => 'Menu name'))}}
            <span id="message">
              @if($errors->has('menu_name'))
                <p class="text-danger">* {{$errors->first('menu_name')}}</p>
              @endif
            </span>
          </div>
          <div class="form-group">
            <label>Sub Menu Description</label>  
            {{Form::textarea('menu_description','',array('class'=>'form-control','placeholder' => 'Menu description'))}}
            <span id="message">
               @if($errors->has('menu_description')) 
               <p class="text-danger">* {{$errors->first('menu_description')}}</p>
               @endif
            </span>
          </div>
          <div class="form-group">
            <label>Parent Menu</label>  
            {{Form::select('parent_menu',$sub_menu,'',array('class' => 'form-control','id' => 'test'))}}
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